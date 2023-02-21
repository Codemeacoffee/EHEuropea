<?php
/**
 * Created by PhpStorm.
 * User: Lionel
 * Date: 24/07/2018
 * Time: 13:09
 */

namespace Eheuropea;


use Illuminate\Database\Eloquent\Model;

class PreRegistration extends Model
{
    protected $table = 'pre_registration';

    public $timestamps = false;
    public $incrementing = false;

    public $fillable = [
        'id_course', 'email'
    ];

}