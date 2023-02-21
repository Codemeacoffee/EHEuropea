<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 19/07/2018
 * Time: 14:11
 */

namespace Eheuropea;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'image';
    public $timestamps = false;

    protected $fillable = [
        'code', 'img_link', 'video'
    ];

}