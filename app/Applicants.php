<?php
/**
 * Created by PhpStorm.
 * User: Lionel
 * Date: 30/07/2018
 * Time: 12:34
 */

namespace Eheuropea;


use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    protected $table = 'applicants';

    public $timestamps = false;
    public $incrementing = false;
	protected $primaryKey = 'email';

    protected $fillable = [
        'name', 'email', 'telefono', 'puesto', 'routeCV'
    ];
}