@extends('layout.app')
@section('titulo','Pausa | ' . $ruta->nombre)

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
                        <!--<a href="#">Volver</a>-->
                        <span class="title-name">{{ $ruta->nombre }}</span>
                        <span class="min-titulo">{{ $ruta->departamento }}</span>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>
<section class="descripcion-mobile">
	<div class="col-xs-12 col-sm-4">
		<div class="dos-pasos">
			<div class="box-desripcion">
				<div class="figure">
					<div class="paquete-price">
						<span>{!!trans('registro_ec.reg1')!!} <strong>S/ {{ $ruta->precio }}</strong></span>
					</div>
					<img class="img-responsive"  style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
				</div>
				<div class="content-paquete">
					<h3>{{ $ruta->nombre }}</h3>
					<div class="row">
						<div class="col-xs-12">
							<p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
									alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
						</div>
                        <div class="col-xs-12" style="margin-top: 15px;">
                            <h4>{!!trans('registro_ec.reg2')!!}:</h4>
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
		<h2 class="title-registro">{!!trans('registro_ec.reg3')!!}</h2>
		<div class="barra">
			<div class="item-list" id="l-elegir">{!!trans('registro_ec.reg4')!!}</div>
			<div class="item-list" id="l-reservar"><span>{!!trans('registro_ec.reg5')!!}</span></div>
			<div class="item-list" id="l-pagar"><span>{!!trans('registro_ec.reg6')!!}</span></div>
			<div class="item-list" id="l-final">{!!trans('registro_ec.reg7')!!}</div>
		</div>
		<div class="linea"></div>
	</div>
</section>

<section class="container-fliud c-box-section" id="contenedor-registro">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<div class="box-linkregistrar">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<h3>{!!trans('registro_ec.reg8')!!}:</h3>
							<a href="{{asset('/login/facebook?id='.$ruta->id.'&idioma='. $language)}}" class="btn-face"><i class="fa fa-facebook"></i> Facebook</a>
							<a href="{{asset('/login/google?id='.$ruta->id. '&idioma='. $language)}}" class="btn-google"><i class="fa fa-google-plus"></i> Google +</a>
						</div>
						<div class="col-xs-12 col-md-6">
							<h3>{!!trans('registro_ec.reg9')!!}</h3>


							<form class="form-horizontal" method="POST" action="{{ route('login') }}" >
								<input type="hidden" value="{{ $ruta->id }}" name="idrutac">
								<input type="hidden" name="idioma" value="{{$language}}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        	{{ csrf_field() }}
								<div class="form-group">
								    <label >{!!trans('registro_ec.reg10')!!}</label>
								    <input type="email" name="email" class="form-control" id="" required placeholder="Email">
								</div>

								<div class="form-group">
								    <label >{!!trans('registro_ec.reg11')!!}:</label>
								    <input type="password" name="password" class="form-control" id="" required placeholder="{!!trans('registro_ec.reg11')!!}">
								</div>
								<div class="text-center">
                                    <p><a href="/resetpassword" style="max-width: 100%; padding: 0px !important;    font-size: 13px; display: block; ;text-align: left !important; color: #4A4A4A;">{!!trans('registro_ec.reg12')!!}</a></p>
                                </div>
								<div class="text-center">

									<button type="submit" class="btn btn-naranja">{!!trans('registro_ec.reg13')!!}</button>
									<p>{!!trans('registro_ec.reg14')!!},
										{{-- <a href="{{route('register')}}" style="text-decoration: underline">{!!trans('registro_ec.reg15')!!}</a> --}}
										<a href="{{asset($language . '/register?idrutac=' . $ruta->id)}}">{!!trans('registro_ec.reg15')!!}</a>
									</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-0 hidden-xs">
				<div class="box-desripcion">
					<div class="figure">
						<div class="paquete-price">
							<span>{!!trans('registro_ec.reg16')!!} <strong>{{$simbolo}} {{ $ruta->precio }}</strong></span>
						</div>
						<img class="img-responsive"  style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
					</div>
					<div class="content-paquete">
						<h3>{{ $ruta->nombre }}</h3>
						<div class="row">
							<div class="col-xs-12">
								<p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
										alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
							</div>
							<div class="col-xs-12" style="margin-top: 15px;">
								<h4>{!!trans('registro_ec.reg17')!!}:</h4>
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
	</div>
</section>

<a href="#navbar-collapse-grid" id="arriba" class="arriba" data-ancla="arriba"><i class="fa fa-angle-up"></i></a>
<div class="alert-msj"></div>
@endsection

@section('js')
<script type="text/javascript" src="{{asset('js/moment/moment-locales.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="{{asset('js/jquery-confirm/jquery-confirm.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$(window).scroll(function(){
			var windowHeight = $(window).scrollTop();
			if(windowHeight >= 400){
				$(".arriba").css("display","block");
			}
			else{
				$(".arriba").css("display","none");
			}
		});
		$('.arriba').click(function(e){
			e.preventDefault();		//evitar el eventos del enlace normal
			var strAncla=$(this).attr('href'); //id del ancla
			$('body,html').stop(true,true).animate({
				scrollTop: $(strAncla).offset().top
			},1000);
		});
		$(".app-fecha").datetimepicker({
        	format: 'DD/MM/YYYY',
        	locale: 'es'
   		});

   		$("#box-elegir").validate({
	       // e.preventDefault();
	        submitHandler: function(form){
	            console.log("exito");
	            $("#contenedor-elegir").css("display","none");
	            $(".item-list").removeClass("active");
	            $("#l-reservar").addClass("active");
	            $("#contenedor-reservar").css("display","block");
	        },
	    });
	    $("#login").validate({
	    	// e.preventDefault();
	        submitHandler: function(form){
	            console.log("exito");
	            $("#contenedor-registro").css("display","none");
	            $(".item-list").removeClass("active");
	            $("#l-elegir").addClass("active");
	            $("#contenedor-elegir").css("display","block");
	        },
	    });
	});
</script>
@endsection
