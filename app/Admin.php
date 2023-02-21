<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 16/07/2018
 * Time: 10:05
 */

namespace Eheuropea;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $table = 'admin';
    public $timestamps = false;

    protected $fillable = [
        'email', 'password', '_session'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', '_session',
    ];
}