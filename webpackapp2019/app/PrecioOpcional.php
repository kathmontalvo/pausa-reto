<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrecioOpcional extends Model
{
    //
    protected $table = 'precios_opcional';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'opcion','cantidad','precio','idRutas'
    ];

    public function ruta(){
    	return $this->hasmany(Ruta::class);
    }

    public static function list_precios($id,$idioma){
        if($idioma == 'es'){
            return PrecioOpcional::where('idRutas','=',$id)->get();
        }else{
            // return PrecioOpcional::where('idRutas','=',$id)
            // ->select('id','created_at','updated_at','opcion_en as opcion','cantidad','precio_en as precio','idRutas')
            // ->get();
            return PrecioOpcional::where('idRutas','=',$id)
            ->select('id','created_at','updated_at','opcion_en as opcion','cantidad','precio_en as precio','idRutas','duracion','cant_noche')
            ->get();
        }
    }
}
