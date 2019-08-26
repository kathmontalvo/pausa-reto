<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlianzaEmprendedor extends Model
{
    //
    protected $table = 'alianzas_emprendedor';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'nombre','url','icono','idEmprendedor'
    ];

    public static function listar_alianzas($id,$idioma){
        if($idioma == 'es'){
            return AlianzaEmprendedor::where('idEmprendedor','=',$id)->get();
        }else{
            return AlianzaEmprendedor::where('idEmprendedor','=',$id)
            ->select('id','created_at','updated_at','nombre_en as nombre','icono','idEmprendedor')
            ->get();
        }
	}
}
