<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;

class Ruta extends Model
{
    //
    protected $table = 'rutas';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'nombre','subtitulo','departamento','region','tiempo','dificultad','clima','relieve','altura','alojamiento','precio','descripcion','llegar','avatar','text','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden'
    ];


    // private $language;
	// function __construct(Request $request){
	// 	$prefix = $request->route()->getPrefix();
	// 	if ($prefix != null) {
	// 		Session::put('language', str_replace('/', '', $prefix));
	// 	} else if (!Session::has('language')) {
	// 	}
	// 	$this->language = Session::get('language');
	// 	\App::setLocale(Session::get('language'));
	// 	view()->share('language', $this->language);
	// 	Carbon::setLocale($this->language);
    //     if (is_null( Session::get('language'))) {
    //         $this->language = 'es';
    //     }
    // }


    public function rutas_atractivos(){
		//return $this->hasmany(RutaAtractivo::class,'id');

 		return $this->hasmany('App\RutaAtractivo','idRutas');

 		//return $this->belongsToMany(Atractivo::class,'rutas_atractivos','idRutas');

	}

    public function rutas_paquetes(){
        return $this->hasmany('App\RutaPaquete','ruta_id');
    }

    public function rutas_atractivos_real(){
        //return $this->hasmany(RutaAtractivo::class,'id');

        return $this->belongsToMany('App\Atractivo', 'rutas_atractivos', 'idRutas', 'idAtractivos');

        //return $this->belongsToMany(Atractivo::class,'rutas_atractivos','idRutas');

    }
    public static function ruta_slug($id,$idioma){
        // $idioma = $this->language;
        if($idioma == 'es'){
            return Ruta::where('url','=',$id)->first();
        }else{
            return Ruta::where('url','=',$id)
                    ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura_en as altura','alojamiento_en as alojamiento','precio_en as precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden','banner')
                    ->first();
        }
    }

    public static function ruta_id($id,$idioma){
        if($idioma == 'es'){
            return Ruta::where('id','=',$id)->first();
        }else{
            return Ruta::where('id','=',$id)
                    ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura_en as altura','alojamiento_en as alojamiento','precio_en as precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra_en as precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden','banner')
                    ->first();
        }

    }

    public static function listar_menus_rutas($ru,$idioma){
        if($idioma == 'es'){
            return Ruta::where('region','=',$ru)->where('estado',1)->get();
        }else{
            return Ruta::where('region','=',$ru)
                    ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura_en as altura','alojamiento_en as alojamiento','precio_en as precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')
                    ->where('estado',1)->get();
        }
    }

    public static function listado_rutas($idr){
        if($idr){

        }
        else{
            return DB::table ('rutas')->skip(3)->take(0)->get();
        }
    }
}
