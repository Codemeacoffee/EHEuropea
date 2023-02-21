<?php
/**
 * Created by PhpStorm.
 * User: Lionel
 * Date: 24/07/2018
 * Time: 14:31
 */

namespace Eheuropea;


use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';
    public $timestamps = false;
    public $incrementing = false;
	protected $primaryKey = 'email';

    public $fillable = [
        'name', 'email', 'telefono'
    ];

}