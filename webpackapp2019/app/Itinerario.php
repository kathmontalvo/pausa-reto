<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    //
    protected $table = 'itinerarios';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'title','descripcion','idRutas'
    ];

    public function ruta(){
    	return $this->hasmany(Ruta::class);
    }

    public static function listar_itinirario($id,$idioma){
        if($idioma == 'es'){
            return Itinerario::where('idRutas','=',$id)->get();
        }else{
            return Itinerario::where('idRutas','=',$id)
                        ->select('id','created_at','updated_at','title_en as title','descripcion_en as descripcion')
                        ->get();
        }
    }
}
