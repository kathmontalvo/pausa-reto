<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupones extends Model
{
    //
    protected $table = 'cupones';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'codigo','min_precio','porcentaje','precio','estado'
    ];
}
