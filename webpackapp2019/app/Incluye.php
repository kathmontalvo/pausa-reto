<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incluye extends Model
{
    //
    protected $table = 'incluyes';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'icono','nombre'
    ];

    public static function listar_incluyes($id,$idioma){
        if($idioma == 'es'){
            return Incluye::join('rutas_incluyes','rutas_incluyes.idIncluyes','=','incluyes.id')
    		->where('rutas_incluyes.idRutas','=',$id)
    		->select('incluyes.*')
    		->get();
        }else{
            return Incluye::join('rutas_incluyes','rutas_incluyes.idIncluyes','=','incluyes.id')
    		->where('rutas_incluyes.idRutas','=',$id)
    		->select('incluyes.id','incluyes.created_at','incluyes.updated_at','nombre_en as nombre','icono')
    		->get();  
        }
    }
}
