<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use App\Ruta as Ruta;

class ProfileComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    private $language;

    function __construct(Request $request){
    // dd($request->route());
    if($request->route() == null){
      return view('errors.404');
    }

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
    public function compose(View $view)
    {
        if ( Session('utm_source') ){

        }
	      else{
          // Session::forget('utm_source');
        }
        if(isset( $_GET['utm_source']) && $_GET['utm_source'] ){
          session( ['utm_source' => $_GET['utm_source'] ]);
        }
        
        $idioma = $this->language;
        if($idioma == 'es'){
            $rutas = Ruta::where('estado',1)->where('region','=','costa')
            ->with('rutas_atractivos')
            ->orderBy('orden','asc')
            ->get();
        }else{
            $rutas = Ruta::where('estado',1)->where('region','=','costa')
            ->with('rutas_atractivos')
            ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura','alojamiento','precio_en as precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra_en as precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')
            ->orderBy('orden','asc')
            ->get();
        }
        // $rutas = Ruta::where('estado',1)->where('region','=','costa')
        // ->with('rutas_atractivos')
        // ->orderBy('orden','asc')
        // ->get();

        // dd($rutas);

        if($idioma == 'es'){
            $rutasall = Ruta::where('estado',1)
            ->with('rutas_atractivos')
            ->orderBy('orden','asc')
            ->get();
        }else{
            $rutasall = Ruta::where('estado',1)
            ->with('rutas_atractivos')
            ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura','alojamiento','precio_en as precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra_en as precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')
            ->orderBy('orden','asc')
            ->get();
        }
        // $rutasall = Ruta::where('estado',1)
        // ->with('rutas_atractivos')
        // ->orderBy('orden','asc')
        // ->get();

        // dd($rutasall);
        $view->with('rutas', $rutas)->with('rutasall',$rutasall);
    }

}
