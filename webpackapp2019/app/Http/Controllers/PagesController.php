<?php
//include_once dirname(__FILE__).'/vendor/autoload.php';

namespace App\Http\Controllers;
//namespace Apiculqui;

use App\Ruta;
use App\Atractivo;
use App\RutaAtractivo;
use App\Testimonio;
use App\Ubicacion;
use App\Contacto;
use App\PreguntaFrecuentes;
use App\CategoriaPreguntas;
use App\Incluye;
use App\Itinerario;
use App\Reserva;
use App\User;
use App\PrecioOpcional;
use App\RutaHabitacion;
use App\RutaPaquete;
use App\FechaProgramada;
use App\Emprendedor;
use App\AlianzaEmprendedor;
use App\VideoEmprendedor;
use App\FotoEmprendedor;
use App\TestimonioEmprendedor;
use App\Cupones;
use App\Reclamo;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoSend;
//use Mail;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Culqi\Culqi;
use Culqi\CulqiException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class PagesController extends Controller
{

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

    public function change($language){
		Session::put('language', $language);
		$beforeChange = ($language == "es") ? "en" : "es";
		$redirect = str_replace("/" . $beforeChange, "/" . $language, URL::previous());
		return redirect($redirect);
    }

	public function verify(){
        return redirect('/es');
	}
    //
    public function home(){
        $idioma = $this->language;
        if ($idioma == 'es') {
            $atractivos = Atractivo::all();
            $testimonios = Testimonio::join('rutas', 'testimonios.idRutas', '=', 'rutas.id')
                ->select('testimonios.*', 'rutas.nombre as rutan')
                ->get();
            $ubicaciones = Ubicacion::join('rutas', 'ubicaciones.idRutas', '=', 'rutas.id')
                ->where('rutas.estado','=', 1)
                ->get();
        }
        else{
            // $atractivos = Atractivo::all();
            $atractivos = Atractivo::select('id','created_at','updated_at','nombre_en as nombre','icono')->get();

            // dd($atractivos);

            $testimonios = Testimonio::join('rutas', 'testimonios.idRutas', '=', 'rutas.id')
                ->select('testimonios.id','testimonios.created_at','testimonios.updated_at','testimonios.nombre','testimonios.descripcion_en as descripcion','testimonios.foto','testimonios.idRutas','rutas.nombre as rutan')
                ->get();

            $ubicaciones = Ubicacion::join('rutas', 'ubicaciones.idRutas', '=', 'rutas.id')
                ->where('rutas.estado','=', 1)
                ->select()
                ->get();
        }
        // dd($atractivos);

        return view('frontend.home')
            ->with('atractivos',$atractivos)
            ->with('testimonios',$testimonios)
            ->with('ubicaciones',$ubicaciones);
    }

    public function contacto(){

        return view('frontend.contacto');
    }

    //
    public function emprendedor($slug){
        $idioma = $this->language;
        //buscamos una ruta x id


        $emprendedor = Emprendedor::emprededor_slug($slug,$idioma);
        $ii = $emprendedor->id;

        //$rutas = Ruta::all();
        // $rutase = Ruta::where('idEmprendedor','=',$ii)->get();

        if($idioma == 'es'){
            $rutase = Ruta::where('idEmprendedor','=',$ii)->where('estado','=',1)->get();
        }else{
            // $rutase = Ruta::where('idEmprendedor','=',$ii)
            //             ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura','alojamiento','precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra_en as precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')
            //             ->get();
            $rutase = Ruta::where('idEmprendedor','=',$ii)->where('estado','=',1)
                        ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura','alojamiento','precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')
                        ->get();
        }

        $alianzas = AlianzaEmprendedor::listar_alianzas($ii,$idioma);
        $videos = VideoEmprendedor::listar_videos($ii);
        $fotos = FotoEmprendedor::listar_fotos($ii);
        //$testimonios = TestimonioEmprendedor::listar_testimonios($ii);

        // $testimonios = TestimonioEmprendedor::join('rutas', 'testimonios_emprendedor.idRutas', '=', 'rutas.id')
        //     ->where('testimonios_emprendedor.idEmprendedor','=',$ii)
        //     ->select('testimonios_emprendedor.*', 'rutas.nombre as rutan')
        //     ->get();



        // $testimonios = Emprendedor::join('rutas','rutas.idEmprendedor','=','emprendedor.id')
        //     ->join('testimonios','testimonios.idRutas','=','rutas.id')
        //     ->where('rutas.idEmprendedor', $ii)
        //     ->select('emprendedor.id','testimonios.descripcion','testimonios.nombre','testimonios.foto','rutas.nombre as ruta')
        //     ->get();

        if($idioma == 'es'){
            $testimonios = Emprendedor::join('rutas','rutas.idEmprendedor','=','emprendedor.id')
            ->join('testimonios','testimonios.idRutas','=','rutas.id')
            ->where('rutas.idEmprendedor', $ii)
            ->select('emprendedor.id','testimonios.descripcion','testimonios.nombre','testimonios.foto','rutas.nombre as ruta')
            ->get();
        }else{
            $testimonios = Emprendedor::join('rutas','rutas.idEmprendedor','=','emprendedor.id')
            ->join('testimonios','testimonios.idRutas','=','rutas.id')
            ->where('rutas.idEmprendedor', $ii)
            ->select('emprendedor.id','testimonios.descripcion_en as descripcion','testimonios.nombre','testimonios.foto','rutas.nombre_en as ruta')
            ->get();
        }

        // dd($testimonios);
        //una vista de una ruta

        return view('frontend.emprendedor')
            ->with('rutase',$rutase)
            ->with('emprendedor',$emprendedor)
            ->with('alianzas',$alianzas)
            ->with('videos',$videos)
            ->with('fotos',$fotos)
            ->with('testimonios',$testimonios);
    }

    public function actualizar_reserva($id){
        $idioma = $this->language;
        // dd($idioma);
        $reserva = Reserva::find($id);
        // if($idioma == 'es'){
        //     $reserva = Reserva::where('id',$id)->first();
        // }else{
        //     $reserva = Reserva::where('id',$id)
        //     ->select('id','created_at','updated_at','cantidad','fecha_llegada','fecha_salida','extras_en as extras','nombre','apellidos','email','telefono','comentarios','estado','precio_total_en','user_id','ruta_id','descuento','precio_id','habitacion_id','paquete_id','precio_descuento','precio_descuento_en','precio_persona','precio_persona_en','cant_noche','precio_habitacion','precio_habitacion_en','tipo_habitacion','precio_paquete','precio_paquete_en')
        //     ->first();
        // }
        //duda
        $reserva->estado = 2;
        $reserva->save();

        $ruta = Ruta::ruta_id($reserva->ruta_id,$idioma);
        //$precio = PrecioOpcional::find($reserva->precio_id);

        $nextra = Ruta::find($reserva->ruta_id);
        $ss = $nextra->precio_extra;

        $habitacion = RutaHabitacion::find($reserva->habitacion_id);
        $paquete = RutaPaquete::find($reserva->paquete_id);

        //dd($reserva->precio_total);
        Mail::send('emails.reserva', ['dni'=>$reserva->dni,'idioma'=>$reserva->idioma,'nombres'=>$reserva->nombre,'apellidos'=>$reserva->apellidos,'email'=>$reserva->email,'ruta'=>$ruta->nombre,'depa'=>$ruta->departamento,'personas'=>$reserva->cantidad,'fecha'=>$reserva->fecha_llegada,'fecha_salida'=>$reserva->fecha_salida,'precio'=>$reserva->precio_total], function ($message)
        {
            $message->from('info@pausa.la', 'WebPausa');
            $message->to('info@pausa.la');
            $message->bcc('julio@pausa.la');
            $message->subject("Reserva Pausa");

        });


    }
    public function showreserva(){
        $idioma = $this->language;

        $user_id = \Auth::user()->id;
        $pendientes = Reserva::where('user_id',$user_id)
            ->where('estado',10)
            ->get();

        foreach($pendientes as $pendiente){
            Reserva::destroy($pendiente->id);
        }

        $reservas = Reserva::join('rutas','rutas.id','=','reservas.ruta_id')
            ->where('reservas.user_id', $user_id)
            ->select('reservas.*','rutas.nombre as ruta','rutas.avatar as imagen')
            ->orderBy('reservas.id','desc')
            ->paginate(5);
        //$precio = PrecioOpcional::all();
        //dd($precio);
        return view('user.reservas')
            //->with('precio',$precio)
            ->with('reservas',$reservas);
    }

    public function update_perfil(Request $request){
        $user = User::find(\Auth::user()->id);
        $user->fill($request->all());
        if($request->file('photo'))
        {
            $file = $request->file('photo');
            $name = 'packapp'.time().'.'.$file->getClientOriginalExtension();
            $path = '/home/u3y67ocw5zh4/public_html/img/user/';
            //$path = public_path().'/img/user/';
            $file->move($path, $name);
            $user->photo = $name;
        }
        $user->save();

        return back()->with('status', 'Datos actualizados');
    }

    public function showdetallereserva($id){
        $idioma = $this->language;

        $reserva = Reserva::find($id);
        $tipo_habitacion = "";
        if($reserva->user_id != \Auth::user()->id){
            return back();
        }else{
            if( $idioma == "es" ){
                $detalle = Reserva::join('rutas','rutas.id','=','reservas.ruta_id')
                ->where('reservas.id',$reserva->id)
                ->select('rutas.nombre as nombre_ruta','reservas.*')
                ->first();
                if( $reserva->habitacion_id > 0){
                    $tipo_habitacion = RutaHabitacion::where('id','=',$reserva->habitacion_id)->select('nombre')->first();
                }
                $paquete = RutaPaquete::find($detalle->paquete_id);
            }
            else {
                $detalle = Reserva::join('rutas','rutas.id','=','reservas.ruta_id')
                ->where('reservas.id',$reserva->id)
                ->select('rutas.nombre as nombre_ruta','reservas.*')
                ->first();
                if( $reserva->habitacion_id > 0){
                    $tipo_habitacion = RutaHabitacion::where('id','=',$reserva->habitacion_id)->select('nombre_en as nombre')->first();
                }
                $paquete = RutaPaquete::where('id','=',$detalle->paquete_id)->select("nombre_en as nombre")->first();

            }

            return view('user.detalle_reserva')
                    ->with('reserva',$reserva)
                    ->with('paquete',$paquete)
                    ->with('tipo_habitacion',$tipo_habitacion)
                    ->with('detalle',$detalle);

        }

    }

    public function showperfil(){
        return view('user.perfil');
    }

    public function registro($id){
        $idioma = $this->language;

        $ruta = Ruta::ruta_id($id,$idioma);
        // dd($ruta);
        if($ruta){
            $precios = PrecioOpcional::list_precios($id,$idioma);
            $habitaciones = RutaHabitacion::list_habitaciones($id,$idioma); //nel
            $incluyes = Incluye::listar_incluyes($id,$idioma);
            $paquetes = RutaPaquete::listar_paquetes($id,$idioma);
            $fechas = FechaProgramada::listar_fechas($id);

            $cupones = Cupones::where('estado','=','1')->get();

            // dd($cupones);
            if($ruta->estado == 1){
                if(!\Auth::user()){
                return view('frontend.registro')
                        ->with('ruta',$ruta)
                        ->with('incluyes',$incluyes);
                }else{
                    //dd($precios);
                return view('frontend.reserva')
                        ->with('ruta',$ruta)
                        ->with('precios',$precios)
                        ->with('habitaciones',$habitaciones)
                        ->with('paquetes',$paquetes)
                        ->with('fechas',$fechas)
                        ->with('incluyes',$incluyes)
						->with('cupones',$cupones);
                }
            }
            else{
                return redirect('/');
            }
        }
        else{
            return view('errors.404');
        }
    }

    public function pagar($id){
        $idioma = $this->language;
        //$reserva = Reserva::find($id);
        $reserva = Reserva::where('id','=',$id)->first();
        $ruta = Ruta::ruta_id($reserva->ruta_id,$idioma);
        $incluyes = Incluye::listar_incluyes($reserva->ruta_id,$idioma);
        //$precio = PrecioOpcional::find($reserva->precio_id);
        // $nextra = Ruta::find($reserva->ruta_id);
        // $ss = $nextra->precio_extra;
        //$habitacion = RutaHabitacion::find($reserva->habitacion_id);
        if($idioma == "es"){
            $paquete = RutaPaquete::find($reserva->paquete_id);
            $habitacion = RutaHabitacion::where('id','=',$reserva->habitacion_id)->select('nombre')->first();
        }
        else{
            $paquete = RutaPaquete::where('id','=',$reserva->paquete_id)->select('nombre_en as nombre')->first();
            $habitacion = RutaHabitacion::where('id','=',$reserva->habitacion_id)->select('nombre_en as nombre')->first();
        }
        return view('frontend.pago')
                ->with('reserva',$reserva)
                ->with('ruta',$ruta)
                //->with('precio',$precio)
                ->with('habitacion',$habitacion)
                ->with('paquete',$paquete)
                //->with('nextra', $ss)
                ->with('incluyes',$incluyes);
        // if(isset($reserva->ruta_id)){
        // }
        // else{

        //     return redirect('/');
        // }
    }

    public function preguntas(){
        $idioma = $this->language;

        // $preguntas = PreguntaFrecuentes::join('categorias_preguntas','categorias_preguntas.id','=','preguntas_frecuentes.idcat')->orderBy('idcat','ASC')->get();

        if($idioma == 'es'){
            $preguntas = PreguntaFrecuentes::join('categorias_preguntas','categorias_preguntas.id','=','preguntas_frecuentes.idcat')->orderBy('idcat','ASC')->get();
        }else{
            $preguntas = PreguntaFrecuentes::join('categorias_preguntas','categorias_preguntas.id','=','preguntas_frecuentes.idcat')->select('preguntas_frecuentes.id','preguntas_frecuentes.created_at','preguntas_frecuentes.updated_at','preguntas_frecuentes.titulo_en as titulo','preguntas_frecuentes.descripcion_en as descripcion','preguntas_frecuentes.idcat')->orderBy('idcat','ASC')->get();
        }

        // dd($preguntas);

        return view('frontend.preguntas-frecuentes')
                ->with('preguntas',$preguntas);
    }

    public function terminos(){
        return view('frontend.terminos-condiciones');
    }

    public function politica(){
        return view('frontend.politica-privacidad');
    }
    public function pviaje(){
        return view('frontend.politica-viaje');
    }
    public function libro_reclamos(){
        return view('frontend.libro_reclamo');
    }

    public function buscar(){

        $like = $_GET["rutabuscar"];
        //$r1 = Ruta::with('rutas_atractivos')->paginate(3);
        $c=0;
        $r1 = Ruta::where('nombre','like','%'.$like.'%')
            ->where('estado','=',1)
            ->orderBy('orden','asc')
            ->get();
        $r2 = Ruta::where('region','like','%'.$like.'%')
            ->where('estado','=',1)
            ->orderBy('orden','asc')
            ->get();
        $r3 = Ruta::where('departamento','like','%'.$like.'%')
            ->where('estado','=',1)
            ->orderBy('orden','asc')
            ->get();
        $r4 = Ruta::where('descripcion','like','%'.$like.'%')
            ->where('estado','=',1)
            ->orderBy('orden','asc')
            ->get();
        $r5 = Ruta::where('clima','like','%'.$like.'%')
            ->where('estado','=',1)
            ->orderBy('orden','asc')
            ->get();

        $aa = Atractivo::join('rutas_atractivos','rutas_atractivos.idAtractivos','=','atractivos.id')
            ->where('atractivos.nombre','like','%'.$like.'%')->first();
        if(count($aa) > 0){
            $r6 = Ruta::join('rutas_atractivos','rutas_atractivos.idRutas','=','rutas.id')
                ->where('rutas_atractivos.idAtractivos','=',$aa->id)
                ->where('rutas.estado','=',1)
                ->orderBy('orden','asc')
                ->get();
        }
        else{
           $r6 = '';
        }

        //dd($r6);
        $search = max($r1, $r2, $r3, $r4, $r5, $r6);


        $atractivos = RutaAtractivo::join('atractivos','rutas_atractivos.idAtractivos','=','atractivos.id')->select('*','atractivos.id as idaa')
            ->get();
        //dd($rutas);
        return view('frontend.buscar')
            ->with('search',$search)
            ->with('atractivos',$atractivos);

    }
    public function rutas(Request $request){
        $idioma = $this->language;
        $rutas = Ruta::orderBy('orden','asc')->where('estado',1)->get();
        //$rutas = Ruta::with('rutas_atractivos')->paginate(3);
        //$rutas = Ruta::with('listado_rutas');
        $atractivos = Atractivo::all();
        //$testimonios = Testimonio::listar_testimonios();

        // $testimonios = Testimonio::join('rutas', 'testimonios.idRutas', '=', 'rutas.id')
        //     ->select('testimonios.*', 'rutas.nombre as rutan')
        //     ->get();

        $ubicaciones = Ubicacion::all();

        if($idioma == 'es'){
            $rutas = Ruta::orderBy('orden','asc')->where('estado',1)->get();
            $atractivos = Atractivo::all();
            $ubicaciones = Ubicacion::all();
        }else{
            $rutas = Ruta::orderBy('orden','asc')
                        ->where('estado',1)
                        ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura','alojamiento','precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')
                        ->get();
            $atractivos = Atractivo::select('id','created_at','updated_at','nombre_en as nombre','icono')->get();
            $ubicaciones = Ubicacion::all();
        }

        // dd($atractivos);
        //dd($rutas);
        // if ($request->ajax()) {
        //     $num = $request->page;
        //     $pagina= ($num-1)*5;
        //     $view = view('frontend.rutas_mas')
        //         ->with('rutas',$rutas)
        //         ->with('atractivos',$atractivos)
        //         ->with('testimonios',$testimonios)
        //         ->with('ubicaciones',$ubicaciones)
        //         ->render();
        //         return response()->json(['html'=>$view]);
        // }
        return view('frontend.rutas')
            ->with('rutasall',$rutas)
            ->with('atractivos',$atractivos)
            ->with('ubicaciones',$ubicaciones);

    }

    public function rutaid(){
        $idioma = $_POST["idioma"];
        // $id = $_POST['id'];
        // $ruta = Ruta::find($id);
        // $rutasdet = Ruta::where('estado',1)->where('departamento',$ruta->departamento)->get();
        // $atractivos = Atractivo::listar_atractivos($id,$idioma);

        // dd($idioma);

        if($idioma =='es'){
            $id = $_POST['id'];
            $ruta = Ruta::find($id);
            $rutasdet = Ruta::where('estado',1)->where('departamento',$ruta->departamento)->get();
            $atractivos = Atractivo::listar_atractivos($id,$idioma);
        }else{
            $id = $_POST['id'];
            $ruta = Ruta::select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura','alojamiento','precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')->find($id);
            $rutasdet = Ruta::where('estado',1)
                            ->where('departamento',$ruta->departamento)
                            ->select('id','created_at','updated_at','nombre_en as nombre','subtitulo_en as subtitulo','departamento','region_en as region','tiempo','dificultad_en as dificultad','clima_en as clima','relieve_en as relieve','altura','alojamiento','precio_en as precio','descripcion_en as descripcion','text_en as text','llegar_en as llegar','avatar','url','precio_extra','campo_hab','campo_fech','idEmprendedor','estado','orden')
                            ->get();
            $atractivos = Atractivo::listar_atractivos($id,$idioma);
        }
        // dd($idioma);
        // dd($rutasdet);
        // dd($atractivos);

        return view('frontend.ruta_detalle')
            ->with('rutasdet',$rutasdet)
            ->with('atractivos',$atractivos);
    }

    public function rutadescp(){
    	$id = $_POST['id'];
        $idioma = $_POST['idioma'];
        if($idioma == 'es'){
            $ruta = Ruta::find($id);
        }
        else{
            $ruta = Ruta::where('id','=',$id)->select('text_en as text')->first();
        }
        return $ruta->text;
    }

    public function menuid(){

        // dd($idioma);

        $idioma = $_POST['idioma'];
        $ru = $_POST['re'];
        // $ruta = Ruta::find($id);
        $menurutas = Ruta::listar_menus_rutas($ru,$idioma);

        // dd($menurutas);

        return view('layout.menu_rutas')
            ->with('menurutas',$menurutas);
    }

    public function culquitarjeta(Request $request){

        $tok = $_POST["token"];
        $ema = $_POST["email"];
        $pre = $_POST["amount"];
        $des = $_POST["description"];
        $currency = $_POST["currency"];
        //dd($menurutas);
        // $PUBLIC_KEY = "sk_test_QoyPKCji5KudUf2c";
        $PUBLIC_KEY = "sk_live_cIrNiCqrs4psxVv2";
        $culqi = new Culqi(array('api_key' => $PUBLIC_KEY));
        //$culqi->setEnv("INTEG");
        try {

          $charge = $culqi->Charges->create(
          array(
            "amount" => $pre,
            "capture" => true,
            "currency_code" => $currency,
            "description" => $des,
            "email" => $ema,
            "installments" => 0,
            "source_id" => $tok
          ));

          $data = "ok";
          //$msjs = array('msjs' => $msjs);

        } catch(Exception $e) {
          // ERROR: El cargo tuvo algún error o fue rechazado
          $data = $e->getMessage();
        }
        return $data;
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function enviarcorreos(Request $request){
        $n = $_POST['nombre'];
        $e = $_POST['email'];
        $m = $_POST['mensaje'];
        $p = $_POST['pagina'];
        $mes = $_POST['mes'];
        if(isset($_POST['utm_source']) ){
          $utm_source = $_POST['utm_source'];
        }
        else{
          $utm_source = 'Orgánico';
        }

        // Mail::to('genixx_10@hotmail.com')->send(new ContactoSend($msjs));

        //$msjs = array('msjs' => $msjs);
        Mail::send('emails.contacto', ['idioma'=>$this->language,'nombres'=>$n,'email'=>$e,'mensaje'=>$m,'pagina'=>$p,'mes'=>$mes], function ($message)
        {

            $message->from('info@pausa.la', 'WebPausa');
            $message->to('info@pausa.la');
			      $message->bcc('genixx_10@hotmail.com');
            $message->bcc('julio@pausa.la');
            $message->subject("Contacto Pausa");

        });

        $contacto = Contacto::create([
            'nombres'=>$n,
            'email'=>$e,
            'mensaje'=>$m,
            'pagina'=>$p,
            'mes'=>$mes,
            'utm_source' => $utm_source
        ]);

        if($contacto){
            return "exito";
        }
        else{
            return "error";
        }
    }

    public function createReclamo(Request $request){
        $n = $_POST['nombre'];
        $e = $_POST['email'];
        $m = $_POST['mensaje'];
        $p = $_POST['telefono'];

        Mail::send('emails.reclamo', ['idioma'=>$this->language,'nombres'=>$n,'email'=>$e,'mensaje'=>$m,'telefono'=>$p], function ($message)
        {
            $message->from('info@pausa.la', 'WebPausa');
            $message->to('info@pausa.la');
			      $message->bcc('gg@mediaimpact.pe');
            $message->bcc('julio@pausa.la');
            $message->subject("Libro de Reclamo - Pausa");

        });

        $contacto = Reclamo::create([
            'nombre'=>$n,
            'email'=>$e,
            'mensaje'=>$m,
            'telefono'=>$p,
        ]);

        if($contacto){
            return "exito";
        }
        else{
            return "error";
        }
    }

}
