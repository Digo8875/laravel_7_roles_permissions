<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    //Nome da tabela
    protected $table = 'artigo';

    //TRUE = Cria os campos created_at e updated_at
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'texto', 'status',
    ];

    /**
     * The attributes that are not want to be mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'id_user_creator', 'id_user_reviewer',
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
     * Get the User creator that owns the Artigo.
     */
    public function userCreator()
    {
        return $this->belongsTo('App\User', 'id_user_creator');
    }

    /**
     * Get the User reviewer that owns the Artigo.
     */
    public function userReviewer()
    {
        return $this->belongsTo('App\User', 'id_user_reviewer');
    }
}
