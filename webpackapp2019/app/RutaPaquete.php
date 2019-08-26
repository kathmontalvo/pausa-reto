<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaPaquete extends Model
{
    //
    protected $table = 'rutas_paquetes';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'nombre','precio'
    ];

    public static function listar_paquetes($id,$idioma){
        if($idioma == 'es'){
            return RutaPaquete::where('ruta_id','=',$id)->get();
        }else{
            return RutaPaquete::where('ruta_id','=',$id)
            ->select('id','nombre_en as nombre','precio_en as precio','ruta_id','created_at','updated_at')
            ->get();
        }
    }
}
