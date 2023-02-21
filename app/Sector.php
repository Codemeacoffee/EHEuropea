<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 02/08/2018
 * Time: 9:42
 */

namespace Eheuropea;


use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sector';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

}