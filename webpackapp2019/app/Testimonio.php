<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    //
    protected $table = 'testimonios';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'nombre','descripcion','descripcion_en','foto','idRutas'
    ];

    public function ruta(){
		return $this->hasmany(Ruta::class);
	}

	public static function listar_testimonios($id,$idioma){
        if($idioma == 'es'){
            if($id){
                return Testimonio::where('idRutas','=',$id)->get();
            }
            else{
                return Testimonio::all();
            }            

        }else{
            if($id){
                return Testimonio::where('idRutas','=',$id)
                                    ->select('id','created_at','updated_at','nombre','descripcion_en as descripcion','foto','idRutas')
                                    ->get();
            }
            else{
                return Testimonio::select('id','created_at','updated_at','nombre','descripcion_en as descripcion','foto','idRutas')
                ->get();
            }
        }
	}
}
