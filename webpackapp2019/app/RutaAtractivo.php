<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaAtractivo extends Model
{
    //
    protected $table = 'rutas_atractivos';
    protected $primarykey = 'id';

    public function ruta(){
    	return $this->belongsto(Ruta::class);
    }

    public function atractivo(){
    	return $this->belongsto(Atractivo::class);
    }

}
