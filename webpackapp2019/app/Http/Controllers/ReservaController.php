<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Ruta;
use App\User;
use App\PrecioOpcional;
use App\RutaHabitacion;
use App\RutaPaquete;
use App\Cupones;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoSend;
class ReservaController extends Controller
{
    public function reservar(Request $request){

        // return $request->all();
        $idioma = $request->idioma;
        //hacemos consulta para capturar los datos
        $fecha_l = explode("/", $request->fecha_llegada);

        if($request->extras){
            $nextra = Ruta::find($request->ruta_id);
            if($idioma == 'es'){
              $pex = $nextra->precio_extra;
            }
            else{
              $pex = $nextra->precio_extra_en;
            }
            $cex = $request->extras;
        }
        else{
            $pex = 0;
            $cex = 0;
        }

        if($request->cantidad){
            $getcant = PrecioOpcional::find($request->cantidad);
            $gcant = $getcant->cantidad;
            if($idioma == 'es'){
              $gprecio = $getcant->precio;
            }
            else{
              $gprecio = $getcant->precio_en;
            }
            // $ruta = Ruta::find($request->ruta_id);
            // $fechas4 = explode("/", $ruta->tiempo);
            // $fsalida = substr($fechas4[1], 0, 1);
            $nf = (int)$getcant->cant_noche;
            $newfecha = $fecha_l[2].'-'.$fecha_l[1].'-'.$fecha_l[0];
            $nfecha = strtotime ( '+'.$nf.' day' , strtotime ( $newfecha ) ) ;
            $nfecha = date ( 'Y-m-j' , $nfecha );
        }
        else{
            $gethabita = RutaHabitacion::find($request->habitacion);
            if( $idioma == 'es'){
              $gprecio = $gethabita->precio;
            }
            else {
              $gprecio = $gethabita->precio_en;
            }
            //$deshabita = $gethabita->nombre;
            $fechas = explode("/", $gethabita->nombre);
            $nf = (int)$gethabita->cant_noche;

            $newfecha = $fecha_l[2].'-'.$fecha_l[1].'-'.$fecha_l[0];
            $nfecha = strtotime ( '+'.$nf.' day' , strtotime ( $newfecha ) ) ;
            $nfecha = date ( 'Y-m-j' , $nfecha );

            $gcant = $gethabita->cantidad_persona;

        }

        // $request->codigo;
        // $codigo = Cupones::find(1);
        if($request->codigo == ""){

            $reserva = new Reserva();
            if( isset($request->utm_source) ){
              $reserva->utm_source = $request->utm_source;
            }
            else{
              $reserva->utm_source = 'Orgánico';
            }
            $reserva->cantidad = $gcant;
            $reserva->fecha_llegada = $fecha_l[2].'-'.$fecha_l[1].'-'.$fecha_l[0];
            $reserva->fecha_salida = $nfecha;
            $reserva->extras = $pex;
            $reserva->estado = 10;
            $reserva->user_id = \Auth::user()->id;
            $reserva->ruta_id = $request->ruta_id;

            if($request->paquete){
                $getpaquete = RutaPaquete::find($request->paquete);
                if( $idioma == 'es' ){
                  $getppaquete = $getpaquete->precio;
                }
                else{
                  $getppaquete = $getpaquete->precio_en;
                }
                $reserva->paquete_id = $request->paquete;
            }
            else{
                $reserva->paquete_id = 0;
                $getppaquete = 0;
                //$despaquete = 0;
            }

            if($request->habitacion){
                $gethabita = RutaHabitacion::find($request->habitacion);
                if( $idioma == 'es' ){
                  $getphabita = $gethabita->precio;
                }
                else{
                  $getphabita = $gethabita->precio_en;
                }
                $deshabita = $gethabita->nombre;
                $reserva->habitacion_id = $request->habitacion;
                $reserva->tipo_habitacion = $gethabita->id;
            }
            else{
                $getphabita = 0;
                $deshabita = 0;
                $reserva->habitacion_id = 0;
                $reserva->tipo_habitacion = 0;
            }


            $reserva->precio_id = 0;
            $reserva->descuento = 0;

            $reserva->precio_persona = $gprecio;
            $reserva->cant_noche = $cex;
            $reserva->precio_habitacion = $getphabita;
            $reserva->precio_paquete = $getppaquete;

            $reserva->save();

            $r_data = [
              'id' => $reserva->id,
            ];
            return $r_data;
        }
        else{
			       $codigo = Cupones::where('codigo','=',$request->codigo)
                        ->where('estado','=','1')
						            ->first();
            if( isset($codigo->codigo) ){
      				$reserva = new Reserva();
      				if( isset($request->utm_source) ){
                      $reserva->utm_source = $request->utm_source;
                    }
                    else{
                      $reserva->utm_source = 'Orgánico';
                    }
      				$reserva->cantidad = $gcant;
      				$reserva->fecha_llegada = $fecha_l[2].'-'.$fecha_l[1].'-'.$fecha_l[0];
      				$reserva->fecha_salida = $nfecha;
      				$reserva->extras = $pex;
      				$reserva->estado = 10;
      				$reserva->user_id = \Auth::user()->id;
      				$reserva->ruta_id = $request->ruta_id;

      				if($request->paquete){
      					$getpaquete = RutaPaquete::find($request->paquete);
                if( $idioma == 'es'){
                  $getppaquete = $getpaquete->precio;
                }
                else{
                  $getppaquete = $getpaquete->precio_en;
                }
      					$reserva->paquete_id = $request->paquete;
      				}
      				else{
      					$reserva->paquete_id = 0;
      					$getppaquete = 0;
      				}

      				if($request->habitacion){
      					$gethabita = RutaHabitacion::find($request->habitacion);
                        if($idioma == 'es'){
                          $getphabita = $gethabita->precio;
                        }
              					else{
                          $getphabita = $gethabita->precio_en;
                        }
      					$deshabita = $gethabita->nombre;
      					$reserva->habitacion_id = $request->habitacion;
      					$reserva->tipo_habitacion = $gethabita->id;
      				}
      				else{
      					$getphabita = 0;
      					$deshabita = 0;
      					$reserva->habitacion_id = 0;
      					$reserva->tipo_habitacion = 0;
      				}

      				$reserva->precio_id = 0;
      				$reserva->descuento = $codigo->id;
      				$reserva->precio_persona = $gprecio;
      				$reserva->cant_noche = $cex;
      				$reserva->precio_habitacion = $getphabita;
      				$reserva->precio_paquete = $getppaquete;

      				$reserva->save();

              if($idioma == 'es'){
                $minimo = $codigo->min_precio;
                $porcentaje = $codigo->porcentaje;
                $pp = $codigo->precio;
              }
              else{
                $minimo = $codigo->min_precio_en;
                $porcentaje = $codigo->porcentaje_en;
                $pp = $codigo->precio_en;
              }

              $r_data = [
                'minimo' => $minimo,
                'porcentaje' => $porcentaje,
                'precio' => $pp,
                'id' => $reserva->id,
              ];
      				return $r_data;
            }
            else{
                return "fail";
            }

        }


    }

    public function reservar_nombres(Request $request){
      $idioma = $request->idioma;
    	$reserva = Reserva::find($request->reserva_id);

        $ruta = Ruta::find($reserva->ruta_id);

        $cantidad = $reserva->cantidad;
        $precio = $reserva->precio_persona;
        // el descuento por persona
        $dsc = 0;
        if($reserva->descuento >= 1){
			       $codigo = Cupones::where('id','=',$reserva->descuento)->first();
            if($idioma == 'es'){
              $pmin = $codigo->min_precio;
              $cporcentaje = $codigo->porcentaje;
              $coprecio = $codigo->precio;
            }
            else{
              $pmin = $codigo->min_precio_en;
              $cporcentaje = $codigo->porcentaje_en;
              $coprecio = $codigo->precio_en;
            }
            if($precio >= $pmin ){
                if($cporcentaje > 0){
                    $ppp = floor( (($cporcentaje/100)* $precio) );
                    $precio = $precio - $ppp;
                    $dsc = $ppp;
                }
                else{
                    $precio = $precio - $coprecio ;
                    $dsc = $coprecio;
                }
            }
            else{
                $precio = $precio;
                $dsc = 0;
            }
        }

        //habitacion
        if($reserva->precio_habitacion > 0){
            $phabitacion = $cantidad * $reserva->precio_habitacion;
            $habitacionget = RutaHabitacion::find($reserva->tipo_habitacion);
            if($idioma == 'es'){
              $nh = $habitacionget->nombre;
            }
            else{
              $nh = $habitacionget->nombre_en;
            }
        }
        else{
            $nh = " ";
            $phabitacion = 0 ;
        }

        //paquete
        if($reserva->paquete_id > 0){
            $paquete = RutaPaquete::find($reserva->paquete_id);
            if($idioma == 'es'){
              $ppaquete = $paquete->precio;
              $dpaquete = $paquete->nombre;
            }
            else{
              $ppaquete = $paquete->precio_en;
              $dpaquete = $paquete->nombre_en;
            }
            
        }
        else{
            $ppaquete = 0;
            $dpaquete = "";
        }

        if($reserva->extras > 0){
            $pext = $reserva->extras * $reserva->cant_noche * $cantidad;
        }
        else{
            $pext = 0;
        }

        $totall = ($cantidad*$precio)+($pext) + ($ppaquete);

    	$reserva->nombre = $request->nombre;
    	$reserva->apellidos = $request->apellidos;
    	$reserva->email = $request->email;
    	$reserva->telefono = $request->telefono;
    	$reserva->comentarios = $request->comentarios;
    	$reserva->precio_total = $totall;
        $reserva->precio_descuento = $dsc;
    	$reserva->estado = 0;
        $reserva->idioma = $idioma;
        $reserva->dni = $request->dni;
    	$reserva->save();

        $user = User::find(\Auth::user()->id);
        $user->lastname = $request->apellidos;
        $user->phone = $request->telefono;
        if($user->email==""){
            $user->email = $request->email;
        }
        $user->save();

        Mail::send('emails.alerta', ['comentario'=>$request->comentarios,'celular'=>$request->telefono,'dni' => $request->dni,'idioma'=>$idioma,'nombres'=>$request->nombre,'apellidos'=>$request->apellidos,'email'=>$request->email,'comentario'=>$request->comentarios,'telefono'=>$request->telefono,'ruta'=>$ruta->nombre,'departamento'=>$ruta->departamento,'personas'=>$cantidad,'fecha' => $reserva->fecha_llegada,'fecha_salida' => $reserva->fecha_salida,'total'=>$totall], function ($message)
        {

            $message->from('info@pausa.la', 'WebPausa');
            //$message->to('genixxavier@gmail.com');
            $message->to('info@pausa.la');
            $message->bcc('julio@pausa.la');
            $message->bcc('genixx_10@hotmail.com');
            $message->subject("Alerta Reserva Pausa");

        });

        $datos = array('dni' => $request->dni,"id" => $reserva->id,"apellidos" => $reserva->apellidos,"nombre" => $reserva->nombre,"email" => $reserva->email,"fecha_llegada" => $reserva->fecha_llegada,"fecha_salida" => $reserva->fecha_salida,"precio_total" => $reserva->precio_total,"p_extra"=>$reserva->extras, "extras"=> $reserva->cant_noche,"paquete" => $dpaquete,"p_paquete" => $ppaquete,"tipohabitacion"=> $nh, "habitacion" => $phabitacion, "descuento" => $dsc, "cantidad" => $cantidad, "precio" => $reserva->precio_persona, "telefono" => $reserva->telefono);

    	return $datos;
    }
}
