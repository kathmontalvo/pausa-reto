<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table = 'videos';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'url','alt','idRutas'
    ];

    public function ruta(){
    	return $this->hasmany(Ruta::class);
    }

    public static function listar_videos($id){
    	return Video::where('idRutas','=',$id)->get();
    }
}
