<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel-Inv.Borma
 * Date: 19/07/2018
 * Time: 14:32
 */

namespace Eheuropea;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;

    protected $fillable = [
        'title', 'text', 'date', 'img_code'
    ];

}