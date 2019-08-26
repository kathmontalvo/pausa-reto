<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atractivo extends Model
{
    //
    protected $table = 'atractivos';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'icono','nombre'
    ];

    public static function listar_atractivos($id,$idioma){
        
        if($idioma == 'es'){
            return Atractivo::join('rutas_atractivos','rutas_atractivos.idAtractivos','=','atractivos.id')
            ->where('rutas_atractivos.idRutas','=',$id)
            ->select('atractivos.*')
            ->get(); 
        }else{
            return Atractivo::join('rutas_atractivos','rutas_atractivos.idAtractivos','=','atractivos.id')
            ->where('rutas_atractivos.idRutas','=',$id)
            ->select('atractivos.id','atractivos.created_at','atractivos.updated_at','atractivos.nombre_en as nombre','atractivos.icono')
            ->get();
        }
    }

}
