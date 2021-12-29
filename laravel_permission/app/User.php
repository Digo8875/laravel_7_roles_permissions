<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the Roles that owns the User.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'id_user', 'id_role')->as('user_role')->withTimestamps()->withPivot('created_at', 'updated_at');
    }

    /**
     * Get the Permissions that owns the User.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'user_permission', 'id_user', 'id_permission')->as('user_permission')->withTimestamps()->withPivot('created_at', 'updated_at');
    }

    /**
     * Get the Artigos created for the User.
     */
    public function artigosCreated()
    {
        return $this->hasMany('App\Models\Artigo', 'id_user_creator');
    }

    /**
     * Get the Artigos reviewed for the User.
     */
    public function artigosReviewed()
    {
        return $this->hasMany('App\Models\Artigo', 'id_user_reviewer');
    }
}
