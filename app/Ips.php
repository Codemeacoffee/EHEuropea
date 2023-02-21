<?php

namespace Eheuropea;

use Illuminate\Database\Eloquent\Model;

class Ips extends Model
{
    protected $table = 'ips';

    public $timestamps = false;

    protected $fillable = ['ip', 'tries', 'timestamp'];

    protected $hidden = [
        'ip',
    ];
}
