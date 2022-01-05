<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRolesPermissionsTrait
{
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'id_user', 'id_role')->as('user_role')->withTimestamps()->withPivot('created_at', 'updated_at');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission', 'id_user', 'id_permission')->as('user_permission')->withTimestamps()->withPivot('created_at', 'updated_at', 'expires_at', 'status');
    }

    public function giveRoles($roles_ids){

        $user_roles_ids = $this->roles()->pluck('role.id')->toArray();

        $roles_ids = array_unique($roles_ids);
        $roles_ids = array_diff($roles_ids, $user_roles_ids);

        foreach($roles_ids as $role_id){
            $this->roles()->attach($role_id);
        }

        return $this;
    }

    public function revokeRoles($roles_ids){

        $roles_ids = array_unique($roles_ids);

        foreach($roles_ids as $role_id) {
            $this->roles()->detach($roles_ids);
        }

        return $this;
    }

    public function hasRole($roles){

        $roles = explode('|', $roles);

        foreach($roles as $role){
            if(!is_null($this->roles->where('slug', '=', $role)->first()))
                return true;
        }

        return false;
    }

    public function hasAllRoles($roles){

        $roles = explode('|', $roles);

        $user_roles_count = 0;

        foreach($roles as $role){
            if(!is_null($this->roles->where('slug', '=', $role)->first()))
                $user_roles_count++;
        }

        if($user_roles_count == count($roles))
            return true;

        return false;
    }

    public function givePermissions($permissions_ids){

        $user_permissions_ids = $this->permissions()->pluck('permission.id')->toArray();
        $user_permissions_locked_ids = $this->permissions()->where('user_permission.status', '=', 'LOCKED')->pluck('permission.id')->toArray();

        $permissions_ids = array_unique($permissions_ids);
        $permissions_ids_to_add = array_diff($permissions_ids, $user_permissions_ids);
        $permissions_ids_to_unlock = array_intersect($user_permissions_locked_ids, $permissions_ids);

        foreach($permissions_ids_to_add as $permission_id_add){
            $this->permissions()->attach($permission_id_add, ['status' => 'UNLOCKED']);
        }

        foreach($permissions_ids_to_unlock as $permission_id_unlock){
            $user_permission = $this->permissions->where('id', '=', $permission_id_unlock)->first()->user_permission;
            $user_permission->status = 'UNLOCKED';
            $user_permission->save();
        }

        return $this;
    }

    public function revokePermissions($permissions_ids){

        $permissions_ids = array_unique($permissions_ids);

        foreach($permissions_ids as $permission_id) {
            $permission = $this->permissions()->where('permission.id', '=', $permission_id)->first();
            $permission->user_permission->status = 'LOCKED';
            $permission->user_permission->save();
        }

        return $this;
    }

    public function hasPermission($permission){

        return (bool) $this->permissions->where('slug', '=', $permission)->where('user_permission.status', '=', 'UNLOCKED')->first();
    }
}
