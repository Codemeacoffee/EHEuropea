<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 16/07/2018
 * Time: 10:05
 */

namespace Eheuropea;

use Illuminate\Database\Eloquent\Model;

class Professional_departure extends Model
{

    protected $table = 'professional_departure';
    public $timestamps = false;

    protected $fillable = [
       'name'
    ];

}