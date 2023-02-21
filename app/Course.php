<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 16/07/2018
 * Time: 10:05
 */

namespace Eheuropea;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'course';
    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'init_date', 'schedule', 'level', 'presencial', 'public', 'display', 'type', 'location', 'sector', 'hours', 'img_code', 'img_offset'
    ];

}