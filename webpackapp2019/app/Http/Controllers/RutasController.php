<?php

namespace App\Http\Controllers;

use App\Ruta;
use App\Itinerario;
use App\Atractivo;
use App\Ubicacion;
use App\Testimonio;
use App\Incluye;
use App\Foto;
use App\Video;
use App\Emprendedor;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
class RutasController extends Controller
{
    //
    private $language;
	function __construct(Request $request){
		$prefix = $request->route()->getPrefix();
		if ($prefix != null) {
			Session::put('language', str_replace('/', '', $prefix));
		} else if (!Session::has('language')) {
		}
		$this->language = Session::get('language');
		\App::setLocale(Session::get('language'));
		view()->share('language', $this->language);
		Carbon::setLocale($this->language);
        if (is_null( Session::get('language'))) {
            $this->language = 'es';
        }
    }

    public function show($id){
        //buscamos una ruta x id
        $idioma = $this->language;
        // $rutas = Ruta::with('rutas_atractivos')->get();
        // $ruta = Ruta::ruta_slug($id);

        if($idioma == 'es'){
            $rutas = Ruta::with('rutas_atractivos')->get();
            $ruta = Ruta::ruta_slug($id,$idioma);
        }else{
            $rutas = Ruta::with('rutas_atractivos')
                        ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura_en as altura','alojamiento_en as alojamiento','precio_en as precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden','banner')
                        ->get();
            $ruta = Ruta::ruta_slug($id,$idioma);
        }

        // dd($rutas);
        // dd($ruta);

        if($ruta){
        	//buscamos el itinerario
        	//$itinerarios = Itinerario::where('idRutas','=',$id)->get();
            $ii = $ruta->id;
            $itinerarios = Itinerario::listar_itinirario($ii,$idioma);
            $atractivos = Atractivo::listar_atractivos($ii,$idioma);
            $ubicacion = Ubicacion::ubicacion($ii);
            $testimonios = Testimonio::listar_testimonios($ii,$idioma);
            $incluyes = Incluye::listar_incluyes($ii,$idioma);
            $fotos = Foto::listar_fotos($ii);
            $videos = Video::listar_videos($ii);
            $ie = $ruta->idEmprendedor; // 6
            $emprendedor = Emprendedor::emprededor_id($ie,$idioma);

            // dd($emprendedor);
        	//una vista de una ruta

        	return view('frontend.donde-ir')
                ->with('rutas',$rutas)
                ->with('ruta',$ruta)
                ->with('itinerarios',$itinerarios)
                ->with('atractivos',$atractivos)
                ->with('ubicacion',$ubicacion)
                ->with('testimonios',$testimonios)
                ->with('incluyes',$incluyes)
                ->with('emprendedor',$emprendedor)
                ->with('fotos',$fotos)
                ->with('videos',$videos);
        }
        else{
            return view('errors.404');
        }
    }


}
