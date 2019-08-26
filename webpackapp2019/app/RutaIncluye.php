<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaIncluye extends Model
{
    //
    protected $table = 'rutas_incluyes';
    protected $primarykey = 'id';

    public function ruta(){
    	return $this->belongsto(Ruta::class);
    }

    public function incluye(){
    	return $this->belongsto(Incluye::class);
    }
}
