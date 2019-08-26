<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    //
    protected $table = 'reclamos';
    protected $primarykey = 'id';
    protected $fillable = [
    	'nombre','email','telefono','mensaje'
    ];
}
