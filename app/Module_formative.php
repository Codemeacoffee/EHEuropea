<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 16/07/2018
 * Time: 10:05
 */

namespace Eheuropea;

use Illuminate\Database\Eloquent\Model;

class Module_formative extends Model
{

    protected $table = 'module_formative';
    public $timestamps = false;

    protected $fillable = [
        'cod_mod', 'cod_unitformative'
    ];

}