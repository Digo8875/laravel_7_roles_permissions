<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //Nome da tabela
    protected $table = 'permission';

    //TRUE = Cria os campos created_at e updated_at
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'descricao',
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
     * Get the Roles that owns the Permission.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_permission', 'id_permission', 'id_role')->as('role_permission')->withTimestamps()->withPivot('created_at', 'updated_at', 'expires_at', 'status');
    }

    /**
     * Get the Users that owns the Permission.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_permission', 'id_permission', 'id_user')->as('user_permission')->withTimestamps()->withPivot('created_at', 'updated_at', 'expires_at', 'status');
    }
}
