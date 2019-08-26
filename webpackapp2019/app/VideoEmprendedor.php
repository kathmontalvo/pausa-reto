<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoEmprendedor extends Model
{
    //
    protected $table = 'videos_emprendedor';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'url_video','idEmprendedor'
    ];

    public static function listar_videos($id){
    	return VideoEmprendedor::where('idEmprendedor','=',$id)->get();
	}
}
