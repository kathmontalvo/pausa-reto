<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprendedor extends Model
{
    //
    protected $table = 'emprendedor';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'nombre','descripcion','foto','facebook','twitter','instagram','web','url'
    ];

    public static function emprededor_slug($id,$idioma){
        if($idioma == 'es'){
            return Emprendedor::where('url','=',$id)->first();
        }else{
            return Emprendedor::where('url','=',$id)
                        ->select('id','created_at','updated_at','nombre_en as nombre','descripcion_en as descripcion','intro_en as intro','foto','facebook','twitter','instagram','web','url')
                        ->first();
        }
    }

    public static function emprededor_id($id,$idioma){
        if($idioma == 'es'){
            return Emprendedor::where('id','=',$id)->first();
        }else{
            return Emprendedor::where('id','=',$id)
            ->select('id','created_at','updated_at','nombre_en as nombre','descripcion_en as descripcion','intro_en as intro','foto','facebook','twitter','instagram','web','url')
            ->first();
        }
    }
}
