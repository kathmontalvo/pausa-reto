@extends('layout.app')
@section('titulo','Pausa | Reserva')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('js/datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('js/jquery-confirm/jquery-confirm.min.css')}}">
<link rel="stylesheet" href="{{asset('css/registro.css')}}">
<script src="https://checkout.culqi.com/v2"></script>
@endsection

@section('content')
<?php
if( $ruta->banner != ""){
    $custom_banner = 'background: url('.URL::to('/').'/img/'.$ruta->banner.');background-size: cover';
}
else{
    $custom_banner = '';
}
// para saber si es soles o dolares simbolo
if ( $language == 'es' ) {
  $simbolo = 'S/';
}
else{
  $simbolo = '$';
}
?>
<section class="container-fliud header-interno hidden-xs" style="{{ $custom_banner }}">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-btn">
                    <div>
                        <p><img height="90" src="{{asset('img/icons/location-icon-lg.png')}}" alt=""></p>
                        <span class="title-name">{{ $ruta->nombre }}</span>
                        <span class="min-titulo">{{ $ruta->departamento }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="descripcion-mobile">
    <div class="col-md-4">
        <div class="dos-pasos">
            <div class="box-desripcion">
                <div class="figure">
                    <div class="paquete-price">
                        <span>{!!trans('reserva_ec.res1')!!} <strong>{{$simbolo}} {{ $ruta->precio }}</strong></span>
                    </div>
                    <img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                </div>
                <div class="content-paquete">
                    <h3>{{ $ruta->nombre }}</h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
                                    alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
                        </div>
                        <div class="col-xs-12" style="margin-top: 15px;">
                            <h4>{!!trans('reserva_ec.res2')!!}:</h4>
                            <div class="incluye">
                                @foreach($incluyes as $incluye)
                                <span>{{ $incluye->nombre }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tres-paso" style="display: none;">
            <div class="box-desripcion">
                <div class="figure">
                    <div class="paquete-price">
                        <span>{!!trans('reserva_ec.res3')!!} <strong>{{$simbolo}} {{ $ruta->precio }}</strong></span>
                    </div>
                    <img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                </div>
                <div class="content-paquete">
                    <h3>{{ $ruta->nombre }}</h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
                                    alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
                        </div>
                        <div class="col-xs-12" style="margin-top: 15px;">
                            <h4>{!!trans('reserva_ec.res4')!!}:</h4>
                            <div class="incluye">
                                @foreach($incluyes as $incluye)
                                <span>{{ $incluye->nombre }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>s
            <div class="box-seguridad">
                <h3>{!!trans('reserva_ec.res5')!!}:</h3>
                <img src="{{asset('img/card.jpg')}}" alt="">
                <p><img src="{{asset('img/seguridad.jpg')}}" alt="">{!!trans('reserva_ec.res6')!!} <strong>{!!trans('reserva_ec.res7')!!}.</strong></p>
            </div>
        </div>
        <div class="cuatro-paso" style="display: none">
            <div class="box-desripcion">
                <div class="figure">
                    <div class="paquete-price">
                        <span>{!!trans('reserva_ec.res8')!!} <strong>{{$simbolo}} {{ $ruta->precio }}</strong></span>
                    </div>
                    <img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                </div>
                <div class="content-paquete">
                    <h3>{{ $ruta->nombre }}</h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
                                    alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
                        </div>
                        <div class="col-xs-12" style="margin-top: 15px;">
                            <h4>{!!trans('reserva_ec.res9')!!}:</h4>
                            <div class="incluye">
                                @foreach($incluyes as $incluye)
                                <span>{{ $incluye->nombre }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-fliud contenedor-contenido">
    <div class="container">
        <h2 class="title-registro">{!!trans('reserva_ec.res10')!!}</h2>
        <div class="barra">
            <div class="item-list active" id="l-elegir">{!!trans('reserva_ec.res11')!!}</div>
            <div class="item-list" id="l-reservar"><span>{!!trans('reserva_ec.res12')!!}</span></div>
            <div class="item-list" id="l-pagar"><span>{!!trans('reserva_ec.res13')!!}</span></div>
            <div class="item-list" id="l-final">{!!trans('reserva_ec.res14')!!}</div>
        </div>
        <div class="linea"></div>
    </div>
</section>


<section class="container-fliud c-box-section" id="contenedor-elegir">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-offset-0 col-md-8">
                <div class="box-elegir">
                    <div class="row">
                        <div class="col-md-12">
                            <p><img src="{{asset('img/icons/form-icon.png')}}" alt="icon"></p>
                            <h4>{!!trans('reserva_ec.res15')!!}:</h4>
                            <form action="{{route('reservar')}}" id="box-elegir" method="post">
                                <input type="hidden" value="{{$ruta->id}}" name="ruta_id">
                                @if(Session('utm_source'))
								<input type="hidden" name="utm_source" value="{{ Session('utm_source') }}">
								@endif
                                {{ csrf_field() }}
                                <div class="row">
                                    @if($ruta->campo_hab == 0)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{!!trans('reserva_ec.res16')!!}</label>
                                            <select class="form-control" name="cantidad" id=""
                                                    placeholder="Cantidad de personas:" required>
                                                <option data-cant="0" data-precio="0" hidden>{!!trans('reserva_ec.res17')!!}</option>
                                                @foreach($precios as $precio)
                                                <option value="{{ $precio->id }}"
                                                        data-cant="{{ $precio->cantidad }}"
                                                        data-precio="{{ $precio->precio }}">
                                                    {{ $precio->opcion }} - {{$simbolo}} {{ $precio->precio }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        @if( $ruta->campo_fech == 0 )
                                        <div class="form-group">
                                            <label>{!!trans('reserva_ec.res18')!!}: </label>
                                            <input type="text" class="form-control app-fecha"
                                                   name="fecha_llegada" required id="data_fecha"
                                                   placeholder="Fecha de llegada">
                                            <i class="icon-22"></i>
                                        </div>
                                        @else
                                        @if(count($fechas) > 0)
                                        <div class="form-group">
                                            <label>{!!trans('reserva_ec.res19')!!}:</label>
                                            <select class="form-control" name="fecha_llegada" id=""
                                                    required>
                                                <option value=""></option>
                                                @foreach($fechas as $fecha)
                                                <?php
                                                $fec = date("d/m/Y", strtotime($fecha->fecha));
                                                $f1 = strtotime($fecha->fecha);
                                                $f2 = strtotime(date("Y-m-d"));
                                                if ($f1 >= $f2) {
                                                    ?>
                                                    <option value="{{ $fec }}">{{ $fec }}</option>
                                                    <?php
                                                }
                                                ?>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        @endif
                                    </div>

                                    @if($ruta->campo_hab == 1)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <p class="eliminar">Room: (Price x person)</p> -->
                                            <label >{!!trans('reserva_ec.res20')!!}</label>
                                            <select class="form-control" name="habitacion" id="" required>
                                                <option data-precio="0" data-canth="cero"></option>
                                                @foreach($habitaciones as $habitacion)
                                                <option value="{{ $habitacion->id }}"
                                                        data-precio="{{ $habitacion->precio }}"
                                                        data-canth="{{ $habitacion->cantidad_persona }}"
                                                        data-descrip="{{$habitacion->nombre}}">{{ $habitacion->nombre}}
                                                    - {{$simbolo}} {{ $habitacion->precio }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    @if($ruta->precio_extra > 0)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >{!!trans('reserva_ec.res21')!!}: {{$simbolo}} <span
                                                        id="p-extra">{{ $ruta->precio_extra }}</span> x
                                                        {!!trans('reserva_ec.res22')!!}</label>
                                            <select name="extras" class="form-control" id="">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @if(count($paquetes) > 0)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{!!trans('reserva_ec.res23')!!}:</label>
                                            <select name="paquete" id="paquetei" class="form-control">
                                                <option data-precio="0"></option>
                                                @foreach($paquetes as $paquete)
                                                <option value="{{ $paquete->id }}"
                                                        data-precio="{{ $paquete->precio }}">{{$paquete->nombre}}
                                                    - {{$simbolo}} {{ $paquete->precio }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @if(count($cupones) > 0)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{!!trans('reserva_ec.res24')!!}</label>
                                            <input type="text" class="form-control" name="codigo" id="codigo"
                                                   placeholder="Ingrese Código">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-naranja">{!!trans('reserva_ec.res25')!!}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 hidden-xs">
                <div class="box-desripcion">
                    <div class="figure">
                        <div class="paquete-price">
                            <span>{!!trans('reserva_ec.res26')!!} <strong>{{$simbolo}} {{ $ruta->precio }}</strong></span>
                        </div>
                        <img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                    </div>
                    <div class="content-paquete">
                        <h3>{{ $ruta->nombre }}</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
                                        alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
                            </div>
                            <div class="col-xs-12" style="margin-top: 15px;">
                                <h4>{!!trans('reserva_ec.res27')!!}:</h4>
                                <div class="incluye">
                                    @foreach($incluyes as $incluye)
                                    <span>{{ $incluye->nombre }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top: 15px;">
                                <h4>{!!trans('reserva_ec.res50')!!}: <span class="r_fecha_llegada"></span></h4>
                                <ul>
                                    <li>{!!trans('reserva_ec.res47')!!}: <strong>{{$simbolo}}</strong> <strong class="r_precio_i"></strong></li>
                                    <li>{!!trans('reserva_ec.res52')!!}: <strong class="r_cantidad"></strong></li>
                                    <li>{!!trans('reserva_ec.res53')!!}: <strong class="r_noche_extra"></strong></li>
                                    <li>{!!trans('reserva_ec.res54')!!}: <strong class="r_descuento"></strong></li>
                                    <li>{!!trans('reserva_ec.res55')!!}: <strong class="r_paquete"></strong>
                                    </li>
                                    <li>{!!trans('reserva_ec.res56')!!}: <strong class="r_habitacion"></strong></li>
                                </ul>
                                <h4>{!!trans('reserva_ec.res60')!!}: <strong>{{$simbolo}}</strong> <strong class="r_precio_total"></strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fliud c-box-section" id="contenedor-reservar" style="display: none">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-offset-0 col-md-8">
                <div class="box-reservar">
                    <div class="row">
                        <div class="col-md-12">
                            <p><img src="{{asset('img/icons/form-icon.png')}}" alt="icon"></p>
                            <h4>{!!trans('reserva_ec.res28')!!}:</h4>
                            <form action="{{route('reservar_nombres')}}" id="box-reservar">
                                {{ csrf_field() }}
                                <input type="hidden" value="" name="reserva_id" id="reserva">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >{!!trans('reserva_ec.res29')!!}:</label>
                                            <input type="text" class="form-control" name="nombre" id="" required
                                                   placeholder="{!!trans('reserva_ec.res29_1')!!}" value="{{\Auth::user()->name}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >{!!trans('reserva_ec.res30')!!}:</label>
                                            <input type="text" class="form-control" name="apellidos" required id=""
                                                   placeholder="{!!trans('reserva_ec.res30_1')!!}" value="{{\Auth::user()->lastname}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Email:</label>
                                            <?php
                                            $email = (filter_var(\Auth::user()->email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;

                                            if ($email == 0) {
                                                $email = "";
                                            } else {
                                                $email = \Auth::user()->email;
                                            }
                                            ?>
                                            <input type="email" class="form-control" name="email" required id=""
                                                   placeholder="{!!trans('reserva_ec.res30_2')!!}" value="{{$email}}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{!!trans('reserva_ec.res31')!!}:</label>
                                            <input type="text" class="form-control" name="telefono" required id=""
                                                   placeholder="{!!trans('reserva_ec.res32')!!}" value="{{\Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >{!!trans('reserva_ec.res61')!!}:</label>
                                            <input type="text" name="dni" class="form-control" required placeholder="{!!trans('reserva_ec.res61')!!}" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >{!!trans('reserva_ec.res33')!!}:</label>
                                            <textarea name="comentarios" class="form-control" id=""
                                                      placeholder="{!!trans('reserva_ec.res34')!!}" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-12">
                                        <div class="g-recaptcha" data-sitekey="6LfJpy8UAAAAADmjFtJO6xynOgn-rDzO5st1x4dG"></div>
                                    </div> -->

                                    <div class="col-md-12 text-right">
                                        <a href="javascript:void(0)" class="btn btn-primary" id="atras"
                                           style="margin-bottom: 10px">{!!trans('reserva_ec.res35')!!}</a>
                                        <button type="submit" class="btn btn-naranja" style="margin-bottom: 10px">
                                            {!!trans('reserva_ec.res36')!!}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 hidden-xs">
                <div class="box-desripcion">
                    <div class="figure">
                        <div class="paquete-price">
                            <span>{!!trans('reserva_ec.res37')!!} <strong>{{$simbolo}} {{ $ruta->precio }}</strong></span>
                        </div>
                        <img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                    </div>
                    <div class="content-paquete">
                        <h3>{{ $ruta->nombre }}</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
                                        alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
                            </div>
                            <div class="col-xs-12" style="margin-top: 15px;">
                                <h4>{!!trans('reserva_ec.res38')!!}:</h4>
                                <div class="incluye">
                                    @foreach($incluyes as $incluye)
                                    <span>{{ $incluye->nombre }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top: 15px;">
                                <h4>{!!trans('reserva_ec.res50')!!}: <span class="r_fecha_llegada"></span></h4>
                                <ul>
                                    <li>{!!trans('reserva_ec.res47')!!}: <strong>{{$simbolo}}</strong> <strong class="r_precio_i"></strong></li>
                                    <li>{!!trans('reserva_ec.res52')!!}: <strong class="r_cantidad"></strong></li>
                                    <li>{!!trans('reserva_ec.res53')!!}: <strong class="r_noche_extra"></strong></li>
                                    <li>{!!trans('reserva_ec.res54')!!}: <strong class="r_descuento"></strong></li>
                                    <li>{!!trans('reserva_ec.res55')!!}: <strong class="r_paquete"></strong>
                                    </li>
                                    <li>{!!trans('reserva_ec.res56')!!}: <strong class="r_habitacion"></strong></li>
                                </ul>
                                <h4>{!!trans('reserva_ec.res60')!!}: <strong>{{$simbolo}}</strong> <strong class="r_precio_total"></strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fliud c-box-section" id="contenedor-pagar" style="display: none">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-offset-0 col-md-8">
                <div class="box-pagar">
                    <div class="row">
                        <div class="col-md-12">
                            <p><img src="{{asset('img/icons/form-icon.png')}}" alt="icon"></p>
                            <h4> {!!trans('reserva_ec.res39')!!}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >{!!trans('reserva_ec.res40')!!}:</label>
                                        <p class="r_nombre"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >{!!trans('reserva_ec.res41')!!}:</label>
                                        <p class="r_apellido"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Email:</label>
                                        <p class="r_email"></p>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >{!!trans('reserva_ec.res42')!!}:</label>
                                        <p class="r_telefono"></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >{!!trans('reserva_ec.res61')!!}:</label>
                                        <p class="r_dni"></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="detalle">
                                        <label>{!!trans('reserva_ec.res43')!!}:</label>
                                        <p><strong>{{ $ruta->nombre }} - {{ $ruta->departamento }}</strong></p>
                                        <p><strong>*<span class="r_cantidad"></span> {!!trans('reserva_ec.res44')!!}</strong></p>
                                        <p><strong>{!!trans('reserva_ec.res45')!!}: </strong> <span class="r_fecha_llegada"></span>
                                            | <strong>{!!trans('reserva_ec.res46')!!}: </strong><span class="r_fecha_fin"></span></p>
                                        <p><strong>{!!trans('reserva_ec.res47')!!}: </strong>{{$simbolo}} <span class="r_precio_total"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 hidden-xs">
                <div class="box-desripcion">
                    <div class="figure">
                        <div class="paquete-price">
                            <span>{!!trans('reserva_ec.res48')!!} <strong>{{$simbolo}} {{ $ruta->precio }}</strong></span>
                        </div>
                        <img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                    </div>
                    <div class="content-paquete">
                        <h3>{{ $ruta->nombre }}</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
                                        alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
                            </div>
                            <div class="col-xs-12" style="margin-top: 15px;">
                                <h4>{!!trans('reserva_ec.res49')!!}:</h4>
                                <div class="incluye">
                                    @foreach($incluyes as $incluye)
                                    <span>{{ $incluye->nombre }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top: 15px;">
                                <h4>{!!trans('reserva_ec.res50')!!}: <span class="r_fecha_llegada"></span></h4>
                                <ul>
                                    <li>{!!trans('reserva_ec.res51')!!}: {{$simbolo}} <strong class="r_precio_i"></strong></li>
                                    <li>{!!trans('reserva_ec.res52')!!}: <strong class="r_cantidad"></strong></li>
                                    <li>{!!trans('reserva_ec.res53')!!}: <strong class="r_noche_extra"></strong></li>
                                    <li>{!!trans('reserva_ec.res54')!!}: <strong class="r_descuento"></strong></li>
                                    <li>{!!trans('reserva_ec.res55')!!}: <strong class="r_paquete"></strong> - <strong class="r_p_paquete"></strong>
                                    </li>
                                    <li>{!!trans('reserva_ec.res56')!!}: <strong class="r_habitacion"></strong></li>
                                </ul>
                                <h4>Total a pagar: <strong>{{$simbolo}}</strong> <strong class="r_precio_total"></strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-seguridad">
                    <h3>{!!trans('reserva_ec.res57')!!}:</h3>
                    <img src="{{asset('img/card.jpg')}}" alt="">
                    <p><img src="{{asset('img/seguridad.jpg')}}" alt="">{!!trans('reserva_ec.res58')!!} <strong>{!!trans('reserva_ec.res59')!!}.</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>

<a href="#navbar-collapse-grid" id="arriba" class="arriba" data-ancla="arriba"><i class="fa fa-angle-up"></i></a>
<div class="alert-msj"></div>

<input type="hidden" name="procesando" value="{!!trans('reserva_ec.resprocesando')!!}">
<input type="hidden" name="codigocupon" value="{!!trans('reserva_ec.rescuponinc')!!}">
<input type="hidden" name="resgracias" value="{!!trans('reserva_ec.resgracias')!!}">
<input type="hidden" name="resdispon" value="{!!trans('reserva_ec.resdispon')!!}">

@endsection
<style>
    .alert-msj {
        display: none;
        position: fixed;
        top: 0;
        background: rgba(0, 0, 0, 0.6);
        bottom: 0;
        right: 0;
        left: 0;
        z-index: 1;
        text-align: center;
    }

    .alert-msj > div {
        top: 40%;
        color: #000;
        background: #fff;
        width: 200px;
        margin: 0px auto;
        position: relative;
        padding: 16px;
    }
</style>
@section('js')
<script type="text/javascript" src="{{asset('js/moment/moment-locales.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="{{asset('js/jquery-confirm/jquery-confirm.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        if (window.location.hash == '#_=_') {
            if (history.replaceState) {
                var cleanHref = window.location.href.split('#')[0];
                history.replaceState(null, null, cleanHref);

            } else {
                window.location.hash = '';
            }
        }
    })
</script>
<script>
    $(document).ready(function () {
        if( $("input[name=data_idioma]").val() == 'es'){
          var simbolo = 'S/';
        }
        else{
          var simbolo = '$';
        }
        console.log(simbolo)
        //calculamos precio
        //var cc = $("select[data-val=cantidad]").val();
        $('select[name=cantidad]').change(function () {
            var cp = $(this).find(':selected').data('precio');
            var cc = $(this).find(':selected').data('cant');
            var ccp = cp * cc;

            var cpx = parseInt($("#p-extra").html());
            if (cpx) {
                var cpxc = $("select[name=extras]").val();
                var cpexc = cpx * cpxc * cc;
            }
            else {
                var cpexc = 0;
            }

            var cph = $("select[name=habitacion]").find(':selected').data('precio');
            if (cph) {
                var cphp = cph * cc;
            }
            else {
                var cphp = 0;
            }

            var cpxr = parseInt($("select[name=paquete]").find(':selected').data('precio'));
            if (cpxr) {
                cpxr = cpxr;
            }
            else {
                cpxr = 0;
            }

            var total = ccp + cpexc + cphp + cpxr;
            $(".r_precio_i").html(cp);
            $(".r_cantidad").html(cc);
            $(".r_precio_total").html(total.toFixed());
            $(".r_descuento").html("");
        });

        $('select[name=habitacion]').change(function () {
            var textt = $('select[name=habitacion]').find(':selected').data('descrip');
            var cc = $('select[name=habitacion]').find(':selected').data('canth');
            $(".r_habitacion").html(textt);
            // var te = textt.split(' ');
            // var cc = te[0];
            //
            // if (cc == "Simple") {
            //     cc = 1;
            // }
            // if (cc == "Doble") {
            //     cc = 2;
            // }
            // if (cc == "Triple") {
            //     cc = 3;
            // }
            // if (cc == "Cuádruple") {
            //     cc = 4;
            // }


            var cpx = parseInt($("#p-extra").html());
            if (cpx) {
                var cpxc = $("select[name=extras]").val();
                var cpexc = cpx * cpxc * cc;
            }
            else {
                var cpexc = 0;
            }

            var cph = $("select[name=habitacion]").find(':selected').data('precio');
            if (cph) {
                var cphp = cph * cc;
            }
            else {
                var cphp = 0;
            }

            var cpxr = parseInt($("select[name=paquete]").find(':selected').data('precio'));
            if (cpxr) {
                cpxr = cpxr;
            }
            else {
                cpxr = 0;
            }
            var total = cpexc + cphp + cpxr;

            $(".r_precio_i").html(cph);
            $(".r_cantidad").html(cc);
            $(".r_precio_total").html(total.toFixed());
            $(".r_descuento").html("");
        });

        $('select[name=extras]').change(function () {
            var cp = $('select[name=cantidad]').find(':selected').data('precio');
            console.log(cp);
            if ($('select[name=cantidad]').length) {
                var cc = $('select[name=cantidad]').find(':selected').data('cant');
                var ccp = cp * cc;

                var cphp = 0;
            }
            else {
                var ccp = 0;
                var cc = $('select[name=habitacion]').find(':selected').data('canth');
                // var te = textt.split(' ');
                // var cc = te[0];
                // if (cc == "Simple") {
                //     cc = 1;
                // }
                // else if (cc == "Doble") {
                //     cc = 2;
                // }
                // else if (cc == "Triple") {
                //     cc = 3;
                // }
                // else if (cc == "Cuádruple") {
                //     cc = 4;
                // }
                // else {
                //     cc = 0;
                // }

                var cph = $("select[name=habitacion]").find(':selected').data('precio');
                if (cph) {
                    var cphp = cph * cc;
                }
                else {
                    var cphp = 0;
                }
            }

            var cpx = parseInt($("#p-extra").html());
            if (cpx) {
                var cpxc = $("select[name=extras]").val();
                var cpexc = cpx * cpxc * cc;
            }
            else {
                var cpexc = 0;
            }
            var cpxr = parseInt($("select[name=paquete]").find(':selected').data('precio'));
            if (cpxr) {
                cpxr = cpxr;
            }
            else {
                cpxr = 0;
            }

            var total = ccp + cpexc + cphp + cpxr;
            $(".r_noche_extra").html(cpxc +' - '+simbolo+' '+cpx);
            $(".r_precio_total").html(total.toFixed());
            $(".r_descuento").html("");
            console.log(simbolo)
        });

        $('#paquetei').change(function () {
            var cp = $('select[name=cantidad]').find(':selected').data('precio');

            if ($('select[name=cantidad]').length) {
                var cc = $('select[name=cantidad]').find(':selected').data('cant');
                var ccp = cp * cc;

                var cphp = 0;
            }
            else {
                var ccp = 0;
                var cc = $('select[name=habitacion]').find(':selected').data('canth');
                // var te = textt.split(' ');
                // var cc = te[0];
                // if (cc == "Simple") {
                //     cc = 1;
                // }
                // else if (cc == "Doble") {
                //     cc = 2;
                // }
                // else if (cc == "Triple") {
                //     cc = 3;
                // }
                // else if (cc == "Cuádruple") {
                //     cc = 4;
                // }
                // else {
                //     cc = 0;
                // }
                var cph = $("select[name=habitacion]").find(':selected').data('precio');
                if (cph) {
                    var cphp = cph * cc;
                }
                else {
                    var cphp = 0;
                }
            }

            var cpx = parseInt($("#p-extra").html());
            if (cpx) {
                var cpxc = $("select[name=extras]").val();
                var cpexc = cpx * cpxc * cc;
            }
            else {
                var cpexc = 0;
            }

            var cpxr = parseInt($("select[name=paquete]").find(':selected').data('precio'));
            var total = ccp + cpexc + cphp + cpxr;
            //console.log(cpexc);
            $(".r_paquete").html($('select[name=paquete]').find(':selected').html());
            $(".r_precio_total").html(total.toFixed());
            $(".r_descuento").html("");
        });

        $(window).scroll(function () {
            var windowHeight = $(window).scrollTop();
            if (windowHeight >= 400) {
                $(".arriba").css("display", "block");
            }
            else {
                $(".arriba").css("display", "none");
            }
        });
        $('.arriba').click(function (e) {
            e.preventDefault();		//evitar el eventos del enlace normal
            var strAncla = $(this).attr('href'); //id del ancla
            $('body,html').stop(true, true).animate({
                scrollTop: $(strAncla).offset().top
            }, 1000);
        });
        $(".app-fecha").datetimepicker({
            format: 'DD/MM/YYYY',
            locale: 'es',
            minDate: new Date()
        }).on('dp.change', function(e){
            $(".r_fecha_llegada").html( $(this).val())
        });
        $("#data_fecha").on('change',function(){
          console.log($('input[name=fecha_llegada]').val())
          const tt = $("#data_fecha").val()
           $(".r_fecha_llegada").html(tt)
        } )
        $("#box-elegir").validate({
            // e.preventDefault();
            submitHandler: function (form) {

                var form = $('#box-elegir');
                var url = form.attr('action');
                var data = form.serialize() + '&idioma=' + $("input[name='data_idioma']").val();

                $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                    success: function (data) {
                        if (data == "fail") {
                            $.alert({
                                title: '',
                                content: '<div class="ty-modal-alert"><h2 style="color:#a94442">¡Error!</h2><p>'+$("input[name='codigocupon']").val()+'</p></div>',
                                theme: 'jconfirm-ty-theme',
                                closeIcon: true,
                                cancelLabel: 'Clear'
                            });
                        }
                        else {
                            $('#reserva').val(data.id);
                            var total = parseInt( $('.r_precio_total').html())
                            var precio_i = parseInt( $('.r_precio_i').html())
                            console.log(total)
                            console.log(precio_i)
                            if( precio_i >= data.minimo ){
                                if(data.porcentaje > 0){
                                    var ppp = (( parseInt(data.porcentaje)/100)* precio_i);
                                    ppp = Math.floor(ppp);
                                    // var cdesc = precio_i - ppp;
                                    var dsc = ppp;
                                }
                                else{
                                    // var cdesc = precio_i - parseInt(data.precio);
                                    var dsc = data.precio;
                                }
                                cdesc = parseInt(dsc) * parseInt($(".r_cantidad").html())
                                console.log(cdesc)
                                $(".r_descuento").html(simbolo+' '+ dsc);
                                var ttotal = parseInt(total) - parseInt(cdesc)
                                console.log(ttotal)
                                $(".r_precio_total").html(ttotal);
                            }
                            else{
                              $(".r_descuento").html("");
                            }
                            $("#contenedor-elegir").css("display", "none");
                            $(".item-list").removeClass("active");
                            $("#l-reservar").addClass("active");
                            $("#contenedor-reservar").css("display", "block");
                        }
                    }
                });
            },
        });

        $('.demo').click(function (e) {
            alert($('#reserva').val());
        })
        $("#atras").click(function () {
            console.log("sdsd");
            $("#contenedor-reservar").hide();
            $("#contenedor-elegir").show();
            $(".item-list").removeClass('active');
            $("#l-elegir").addClass('active');
        });

        $("#login").validate({
            // e.preventDefault();
            submitHandler: function (form) {
                console.log("exito");
                $("#contenedor-registro").css("display", "none");
                $(".item-list").removeClass("active");
                $("#l-elegir").addClass("active");
                $("#contenedor-elegir").css("display", "block");
            },
        });
        $("#box-reservar").validate({
            // e.preventDefault();
            submitHandler: function (form) {

                var form = $('#box-reservar');
                var url = form.attr('action');
                var data = form.serialize() + '&idioma=' + $("input[name='data_idioma']").val();

                $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                    beforeSend: function (objeto) {
                        $(".alert-msj").show();
                        $(".alert-msj").html('<div class="alert-success">'+$("input[name='procesando']").val()+'</div>');
                    },
                    success: function (data) {
                        $(".alert-msj div").remove();
                        $(".alert-msj").hide();
                        $.alert({
                            title: '',
                            content: '<div class="ty-modal-alert"><h2>'+$("input[name='resgracias']").val()+'</h2><p>'+$("input[name='resdispon']").val()+'</p></div>',
                            theme: 'jconfirm-ty-theme',
                            closeIcon: true,
                            cancelLabel: 'Clear'
                        });

                        console.log(data.apellidos);
                        $(".r_cantidad").html(data.cantidad);
                        $(".r_nombre").html(data.nombre);
                        $(".r_email").html(data.email);
                        $(".r_apellido").html(data.apellidos);
                        $(".r_telefono").html(data.telefono);
                        $(".r_dni").html(data.dni);
                        $(".r_fecha_llegada").html(data.fecha_llegada);
                        $(".r_fecha_fin").html(data.fecha_salida);
                        $(".r_precio_total").html(data.precio_total);
                        if(data.descuento >0){
                            $(".r_descuento").html(simbolo+' '+data.descuento);
                        }
                        if(data.extras > 0){
                          $(".r_noche_extra").html(data.extras+' - '+simbolo+' '+data.p_extra);
                        }

                        if (data.habitacion > 0) {
                            $(".r_habitacion").html(data.tipohabitacion);
                            // $(".r_p_habitacion").html("S/ "+data.habitacion);
                        }
                        $(".r_precio_i").html(data.precio);
                        if (data.p_paquete > 0) {
                            $(".r_paquete").html(data.paquete);
                            $(".r_p_paquete").html(simbolo+' '+data.p_paquete);
                        }

                        $("#contenedor-reservar").css("display", "none");
                        $(".item-list").removeClass("active");
                        $("#l-pagar").addClass("active");
                        $(".dos-pasos").css("display", "none");
                        $(".tres-paso").css("display", "block");
                        $("#contenedor-pagar").css("display", "block");
                    }
                });
            },
        });
    });
</script>
@endsection
