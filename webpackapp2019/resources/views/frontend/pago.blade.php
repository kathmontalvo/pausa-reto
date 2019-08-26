@extends('layout.app')
@section('titulo','Pausa | Registro')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('js/datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('js/jquery-confirm/jquery-confirm.min.css')}}">
<link rel="stylesheet" href="{{asset('css/registro.css')}}">
<meta http-equiv="Expires" content="0" />
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
if($reserva->idioma == 'en'){
  $simbolo = '$';
}
else{
  $simbolo = 'S/';
}
?>
<input type="hidden" name="custom_moneda" value="{{$reserva->idioma}}">
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
	<div class="col-md-4">
		<div class="dos-pasos">
			<div class="box-desripcion">
				<div class="figure">
						<img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="">
				</div>
				<div class="content-paquete">
					<h3>{{ $ruta->nombre }} - {{ $ruta->departamento }}</h3>
					<div class="row">
						<div class="col-xs-12">
							<p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}" alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
						</div>
						<div class="col-xs-12" style="margin-top: 15px;">
							<h4>Qué incluye:</h4>
							<div class="incluye">
							@foreach($incluyes as $incluye)
								<span> {{ $incluye->nombre }}</span>
							@endforeach
							</div>
						</div>
					</div>
				</div>
				{{-- <h3><img src="{{asset('img/icon-ruta2.png')}}" alt="img">{{ $ruta->nombre }} - {{ $ruta->departamento }}</h3> --}}
				{{-- <img src="{{asset('img/'.$ruta->avatar)}}" alt=""> --}}
				{{-- <div>
					<div class="incluye">
						<h4>{!!trans('pago.p1')!!}:</h4>
						<ul>
							@foreach($incluyes as $incluye)
								<li><i class="{{ $incluye->icono }}"></i> {{ $incluye->nombre }}</li>
							@endforeach
						</ul>
					</div>
					<h4>{!!trans('pago.p5')!!}</h4>
					<p><strong>{{ $ruta->tiempo }}</strong></p>
				</div> --}}
			</div>
		</div>
		<div class="tres-paso" style="display: none;">
			<div class="box-desripcion">
				<h3><img src="{{asset('img/icon-ruta2.png')}}" alt="img"> {{ $ruta->nombre }} - {{ $ruta->departamento }}</h3>
				<img src="{{asset('img/'.$ruta->avatar)}}" alt="">
				<div>
					<h4>{!!trans('pago.p2')!!}</h4>
					<?php $descripcion = substr($ruta->descripcion, 0, 120);?>
					<p>{!! $descripcion !!}...</p>
					<div class="incluye">
						<h4>{!!trans('pago.p3')!!}:</h4>
						<ul>
							@foreach($incluyes as $incluye)
							<li><i class="{{ $incluye->icono }}"></i> {{ $incluye->nombre }}</li>
							@endforeach
						</ul>
					</div>
					<h4>{!!trans('pago.p4')!!}</h4>
					<ul>
						<li>{!!trans('pago.p6')!!}: <strong>{!!trans('pago.p9')!!}</strong></li>
						<li>{!!trans('pago.p7')!!}: <strong>{!!trans('pago.p10')!!} </strong> {!!trans('pago.p11')!!}</li>
						<li>{!!trans('pago.p8')!!}: <strong>{!!trans('pago.p12')!!}</strong></li>
					</ul>
					<p class="text-pagar">{!!trans('pago.p13')!!}</p>
				</div>
			</div>
			<div class="box-seguridad">
				<h3>{!!trans('pago.p14')!!}:</h3>
				<img src="{{asset('img/card.jpg')}}" alt="">
				<p><img src="{{asset('img/seguridad.jpg')}}" alt="">{!!trans('pago.p15')!!} <strong>{!!trans('pago.p16')!!}</strong></p>
			</div>
		</div>
		<div class="cuatro-paso" style="display: none">
			<div class="box-desripcion">
				<h3><img src="{{asset('img/icon-ruta2.png')}}" alt="img"> {{ $ruta->nombre }} - {{ $ruta->departamento }}</h3>
				<img src="{{asset('img/'.$ruta->avatar)}}" alt="">
				<div>
					<h4>{!!trans('pago.p17')!!}</h4>
					<?php $descripcion = substr($ruta->descripcion, 0, 120);?>
					<p>{!! $descripcion !!}...</p>
					<div class="incluye">
						<h4>{!!trans('pago.p18')!!}:</h4>
						<ul>
							@foreach($incluyes as $incluye)
							<li><i class="{{ $incluye->icono }}"></i> {{ $incluye->nombre }}</li>
							@endforeach
						</ul>
					</div>
					<h4>{!!trans('pago.p19')!!}</h4>
					<ul>
						<li>{!!trans('pago.p6')!!}: <strong>{!!trans('pago.p9')!!}</strong></li>
						<li>{!!trans('pago.p7')!!}: <strong>{!!trans('pago.p10')!!} </strong> {!!trans('pago.p11')!!}</li>
						<li>{!!trans('pago.p8')!!}: <strong>{!!trans('pago.p12')!!}</strong></li>
					</ul>
					<p class="text-pagar">{!!trans('pago.p13')!!}</p>
				</div>
			</div>
		</div>
	</div>
</section>




<section class="container-fliud contenedor-contenido">
	<div class="container">
		<h2 class="title-registro">{!!trans('pago.p20')!!}</h2>
		<div class="barra">
			<div class="item-list" id="l-elegir">{!!trans('pago.p21')!!}</div>
			<div class="item-list" id="l-reservar"><span>{!!trans('pago.p22')!!}</span></div>
			<div class="item-list <?php if($reserva->estado == 1){ echo "active";}?>" id="l-pagar"><span>{!!trans('pago.p23')!!}</span></div>
			<div class="item-list <?php if($reserva->estado == 2){ echo "active";}?>" id="l-final">{!!trans('pago.p24')!!}</div>
		</div>
		<div class="linea"></div>
	</div>
</section>

@if($reserva->estado == 1)
<section class="container-fliud c-box-section" id="contenedor-pagar">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="box-pagar">
					<div class="row">
						<div class="col-md-12">
							<h4><i class="fa fa-angle-right"></i> {!!trans('pago.p25')!!}</h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label>{!!trans('pago.p26')!!}:</label>
									    <p class="g-nombre">{{$reserva->nombre}}</p>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									    <label >{!!trans('pago.p27')!!}:</label>
									    <p class="g-apellido">{{$reserva->apellidos}}</p>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									    <label >Email:</label>
									    <p class="g-email">{{$reserva->email}}</p>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
									    <label >{!!trans('pago.p28')!!}:</label>
									    <p class="g-celular">{{$reserva->telefono}}</p>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
									    <label >{!!trans('pago.p60')!!}:</label>
									    <p class="g-celular">{{$reserva->dni}}</p>
									</div>
								</div>

								<div class="col-md-12">
									<div class="detalle">
									    <label>{!!trans('pago.p29')!!}:</label>
									    <p><strong class="g-ruta">{{ $ruta->nombre }} - {{ $ruta->departamento }}</strong></p>
									    <p><strong class="g-persona">*{{ $reserva->cantidad }} {!!trans('pago.p38')!!}</strong></p>
									    <p><strong>{!!trans('pago.p30')!!}: </strong><span class="g-fecha">{{$reserva->fecha_llegada}}</span> <strong>{!!trans('pago.p31')!!}: </strong>{{$reserva->fecha_salida}}</p>
									    <p><strong>{!!trans('pago.p32')!!}: </strong> <span class="g-precio">{{$simbolo}} {{$reserva->precio_total}}</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center">
					<a href="#" id="buyButton" class="btn-naranja">
						<i class="icon-23"></i>
						<h3>{!!trans('pago.p33')!!}</h3>
					</a>
				</div>
			</div>
			<div class="col-md-4 hidden-xs">
				<div class="box-desripcion">
					<div class="figure">
							<div class="paquete-price">
									<span>{!!trans('pago.p34')!!} <strong>@if($language == 'es')S/@else $ @endif {{ $ruta->precio }}</strong></span>
							</div>
							<img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
					</div>
					<div class="content-paquete">
						<div class="row">
								<div class="col-xs-12">
									<h3>{{ $ruta->nombre }}</h3>
									<p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
											alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
								</div>
						</div>
						<div class="incluye">
							<h4>{!!trans('pago.p35')!!}:</h4>
							@foreach($incluyes as $incluye)
							<span>{{ $incluye->nombre }}</span>
							@endforeach
						</div>
						<h4 style="margin-top: 15px">{!!trans('pago.p36')!!}: {{$reserva->fecha_llegada}}</h4>
						<ul>
							<li>{!!trans('pago.p37')!!}: {{$simbolo}} <strong class="r_precio_i">{{ $reserva->precio_persona }}</strong></li>
							<li>{!!trans('pago.p38')!!}: <strong class="r_cantidad">{{ $reserva->cantidad }}</strong></li>
							<li>{!!trans('pago.p39')!!}: <strong class="r_descuento" >{{$simbolo}} {{ $reserva->precio_descuento }}</strong></li>
							<li>{!!trans('pago.p40')!!}:
								<strong class="r_noche_extra">
									@if($reserva->cant_noche > 0)
										{{ $reserva->cant_noche }} - {{$simbolo}} {{ $reserva->extras }}
									@endif
								</strong>
							</li>
							<li>{!!trans('pago.p41')!!}:
								<strong>
									@if(isset($paquete->nombre))
									{{ $paquete->nombre }} - {{$simbolo}} {{ $reserva->precio_paquete }}
									@endif
								</strong>
							</li>
							<li>{!!trans('pago.p42')!!}:
								<strong class="r_habitacion">
									@if($reserva->precio_habitacion > 0)
									{{ $habitacion->nombre }}
									@endif
								</strong>
							</li>
						</ul>
						<h4 class="text-pagar">{!!trans('pago.p43')!!} {{$simbolo}} {{$reserva->precio_total}}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@else
<section class="container-fliud c-box-section" id="contenedor-gracias"
@if($reserva->estado == 1)style="display: none"@endif
>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="box-gracias">
					<div class="row">
						<div class="col-md-12">
							<h4>{!!trans('pago.p44')!!}</h4>
							<h3>{{$reserva->nombre}} {{$reserva->apellidos}}</h3>
							<p><b>{!!trans('pago.p45')!!}</b> {!!trans('pago.p46')!!}</p>
							<div>
								<p>{!!trans('pago.p47')!!}</p>
								<p>{!!trans('pago.p48')!!}<a href="mailto:info@pausa.la">info@pausa.la</a>) {!!trans('pago.p49')!!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 hidden-xs">
				<div class="box-desripcion">
					<div class="figure">
							<div class="paquete-price">
									<span>{!!trans('pago.p50')!!} <strong>@if($language == 'es')S/@else $ @endif {{ $ruta->precio }}</strong></span>
							</div>
							<img class="img-responsive" style="width: 100%" src="{{asset('img/'.$ruta->avatar)}}" alt="img">
					</div>
					<div class="content-paquete">
						<div class="row">
								<div class="col-xs-12">
									<h3>{{ $ruta->nombre }}</h3>
									<p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
											alt="clock"> <strong>{{ $ruta->tiempo }}</strong></p>
								</div>
						</div>
						<div class="incluye">
							<h4>{!!trans('pago.p51')!!}:</h4>
							@foreach($incluyes as $incluye)
							<span>{{ $incluye->nombre }}</span>
							@endforeach
						</div>
						<h4 style="margin-top: 15px">{!!trans('pago.p52')!!}: {{$reserva->fecha_llegada}}</h4>
						<ul>
							<li>{!!trans('pago.p53')!!}: {{$simbolo}} <strong class="r_precio_i">{{ $reserva->precio_persona }}</strong></li>
							<li>{!!trans('pago.p54')!!}: <strong class="r_cantidad">{{ $reserva->cantidad }}</strong></li>
							<li>{!!trans('pago.p55')!!}: <strong class="r_descuento" >{{$simbolo}} {{ $reserva->precio_descuento }}</strong></li>
							<li>{!!trans('pago.p56')!!}:
								<strong class="r_noche_extra">
									@if($reserva->cant_noche > 0)
										{{ $reserva->cant_noche }} - {{$simbolo}} {{ $reserva->extras }}
									@endif
								</strong>
							</li>
							<li>{!!trans('pago.p57')!!}:
								<strong>
									@if(isset($paquete->nombre))
									{{ $paquete->nombre }} - {{$simbolo}} {{ $reserva->precio_paquete }}
									@endif
								</strong>
							</li>
							<li>{!!trans('pago.p58')!!}:
								<strong class="r_habitacion">
									@if($reserva->precio_habitacion > 0)
									{{ $habitacion->nombre }}
									@endif
								</strong>
							</li>
						</ul>
						<h4 class="text-pagar">{!!trans('pago.p59')!!} {{$simbolo}} {{$reserva->precio_total}}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
<?php $total = $reserva->precio_total.'00'; ?>
<input type="hidden" id="precioculqui" value="{{$total}}">
<input type="hidden" id="reserva_id" value="{{$reserva->id}}">
<a href="#navbar-collapse-grid" id="arriba" class="arriba" data-ancla="arriba"><i class="fa fa-angle-up"></i></a>
<div class="alert-msj"></div>
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
.alert-msj > div{
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
<script>
window.onload=function(){
	Objeto=document.getElementsByTagName("a");
	for(a=0;a<Objeto.length;a++){
		Objeto[a].onclick=function(){
			location.replace(this.href);
			return false;
		}
	}
}

</script>
<script>
	$(document).ready(function(){
	    $('#buyButton').on('click', function(e) {
	        // Abre el formulario con las opciones de Culqi.settings
	        Culqi.open();
	        e.preventDefault();
	    });
	});

	var precio = $("#precioculqui").val();
	var desc = $(".title-btn div span").html();
	if( $('input[name=custom_moneda]').val() == 'en'){
		var simbolo = 'USD';
	}
	else{
		var simbolo = 'PEN';
	}
    // Culqi.publicKey = 'pk_test_Bo46hdGP4XDNkDQ9'; // Colocar tu Código de Comercio (llave pública)
    Culqi.publicKey = 'pk_live_IzQc0lwLaJ2LtpB6'; // Colocar tu Código de Comercio (llave pública)
    Culqi.settings({
        title: 'Packapp',
        currency: simbolo, // Código de la moneda, 'PEN' o 'USD'
        description: desc, // Descripción acerca de la compra
        amount: precio, // Monto de la compra (sin punto decimal, en este caso 35.00 soles)
        guardar: true
    });
    // Recibimos el token desde los servidores de Culqi
    function culqi() {
        if (Culqi.token) {
            // se realizo el pago
            var token = Culqi.token.id;
            //alert('pagorealizado: '+token);
             $(".alert-msj").show();
             $(".alert-msj").html('<div class="alert-success">Procesando su reserva, espere por favor</div>');
            $.post("culquitarjeta", {token: Culqi.token.id, amount: precio, description: desc, email: Culqi.token.email,currency: simbolo}, function(data, status){
	              if(data == "ok"){
	              	var reserva_id =$('#reserva_id').val();
				    $.ajax({
				      url: '../../actualizar_reserva/'+reserva_id,
				      type: "get",
				      success: function(data){
				      }
				    });
	              	console.log("reserva realizada");
	              	$(".alert-msj div").html('Exito');
						setTimeout(function(){
						$(".alert-msj div").remove();
	              		$(".alert-msj").hide();
		              	$("#contenedor-pagar").css("display","none");
			            $(".item-list").removeClass("active");
			            $("#l-final").addClass("active");
			            $(".dos-pasos").css("display", "none");
			            $(".tres-paso").css("display", "none");
			            $(".cuatro-paso").css("display", "block");
			            $("#contenedor-gracias").css("display","block");
						}, 1000);
		            	setTimeout(function(){
	              			location.reload();
						}, 5);
	              }
	              else{
	                console.log("error"+ data);
	                $(".alert-msj").html('<div class="alert-danger">Error: su reserva no pudo ser procesada.</div>');
					setTimeout(function(){
						$(".alert-msj div").remove();
	              		$(".alert-msj").hide();
						}, 1000);
	              }
	        }).fail(function() {
		    	$(".alert-msj").html('<div class="alert-danger" style="color:#a94442">Error: su reserva no pudo ser procesada, Compruebe los datos de su tarjeta</div>');
				setTimeout(function(){
					$(".alert-msj div").remove();
              		$(".alert-msj").hide();
				}, 5000);
		  	});

        } else { // Hubo algun problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            if(Culqi.error){
            }
            alert(Culqi.error.mensaje);
        }
    };
</script>
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
	    $("#box-reservar").validate({
	       // e.preventDefault();
	        submitHandler: function(form){
	            console.log("exito");
	             $.alert({
	                title: '',
	                content: '<div class="ty-modal-alert"><h2>¡Gracias por reservar con nosotros!</h2><p>Estamos confirmando disponibilidad para la fecha que solicitaste, te enviaremos un correo con la información para que realices el pago</p></div>',
	                theme : 'jconfirm-ty-theme',
	                closeIcon: true,
	                cancelLabel: 'Clear'
	            });
	            $("#contenedor-reservar").css("display","none");
	            $(".item-list").removeClass("active");
	            $("#l-pagar").addClass("active");
	            $(".dos-pasos").css("display", "none");
	            $(".tres-paso").css("display", "block");
	            $("#contenedor-pagar").css("display","block");
	        },
	    });
	});
</script>
<script type="text/javascript">
  if(history.forward(1)){
    location.replace( history.forward(1) );
  }
</script>
@endsection
