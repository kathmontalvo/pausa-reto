<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    //
    protected $table = 'ubicaciones';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'direccion','foto','coord_top','coord_left','coord_rigth','url_maps','idRutas'
    ];

    public function ruta(){
    	return $this->hasmany(Ruta::class);
    }

    public static function ubicacion($id){
        return Ubicacion::where('idRutas','=',$id)->first();
    }
}
