<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 16/07/2018
 * Time: 10:05
 */

namespace Eheuropea;

use Illuminate\Database\Eloquent\Model;

class Course_module extends Model
{

    protected $table = 'course_module';
    public $timestamps = false;

    protected $fillable = [
        'id_course', 'cod_mod'
    ];

}