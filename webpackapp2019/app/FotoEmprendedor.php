<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoEmprendedor extends Model
{
    //
    //
    protected $table = 'fotos_emprendedor';
    protected $primary = 'id';
    protected $fillabel = [
    	'url','alt','idEmprendedor'
    ];

    public static function listar_fotos($id){
    	return FotoEmprendedor::where('idEmprendedor','=',$id)->get();
	}
}
