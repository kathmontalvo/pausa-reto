<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechaProgramada extends Model
{
    //
    protected $table = 'fechas_programadas';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'fecha','idRutas'
    ];

    public static function listar_fechas($id){
    	return FechaProgramada::where('idRutas','=',$id)->get();
    }
}
