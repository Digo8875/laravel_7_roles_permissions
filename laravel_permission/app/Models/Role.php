<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Nome da tabela
    protected $table = 'role';

    //TRUE = Cria os campos created_at e updated_at
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    /**
     * The attributes that are not want to be mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        '',
    ];

    /**
     * Get the Users that owns the Role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role', 'id_role', 'id_user')->as('user_role')->withTimestamps()->withPivot('created_at', 'updated_at');
    }

    /**
     * Get the Permissions that owns the Role.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permission', 'id_role', 'id_permission')->as('role_permission')->withTimestamps()->withPivot('created_at', 'updated_at');
    }
}
