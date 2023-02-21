<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 19/07/2018
 * Time: 14:03
 */

namespace Eheuropea;


use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    public $timestamps = false;

    protected $fillable = [
        'area', 'telephone', 'email', 'location', 'hours', 'days', 'img_code'
    ];
}