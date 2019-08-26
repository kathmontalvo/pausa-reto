<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaHabitacion extends Model
{
    //
    protected $table = 'rutas_habitaciones';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'nombre','precio'
    ];

    public static function list_habitaciones($id,$idioma){
        if($idioma == 'es'){
            return  RutaHabitacion::where('ruta_id','=',$id)->get();
        }else{
            return  RutaHabitacion::where('ruta_id','=',$id)
            ->select('id','nombre_en as nombre','precio_en as precio','ruta_id','duracion','cantidad_persona','created_at','updated_at')
            ->get();
        }
    }
}
