<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonioEmprendedor extends Model
{
   //
    protected $table = 'testimonios_emprendedor';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'nombre','descripcion','foto','idEmprendedor','idRutas'
    ];

    public static function listar_testimonios($id){
    	return TestimonioEmprendedor::where('idEmprendedor','=',$id)->get();
	}
}
