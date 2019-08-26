<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $table = 'fotos';
    protected $primary = 'id';
    protected $fillabel = [
    	'url','alt','idRutas'
    ];

    public function ruta(){
    	return $this->hasmany(Ruta::class);
    }

    public static function listar_fotos($id){
        return Foto::where('idRutas','=',$id)->get();
        
    }
}
