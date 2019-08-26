@extends('layout.app')
@section('titulo','Pausa | Gracias')

@section('css')
<link rel="stylesheet" href="{{asset('css/gracias.css')}}">
@endsection

@section('content')
<section class="container-fliud header-interno">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="title-btn">
					<div>
						<a href="#">Volver</a>
						<span>Amazonas - Bagua Grande</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="container-fliud c-box-section" id="contenedor-gracias">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="box-gracias">
					<div class="row">
						<div class="col-md-12">
							<h4>Hola!</h4>
							<h3>Alberto López</h3>
							<p><b>Tu reserva</b> ha sido aceptada con éxito.</p>
							<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Uenim ad minim veniam, quis nostrud.</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box-desripcion">
					<h3><img src="{{asset('img/icon-ruta2.png')}}" alt="img">Atractivos:</h3>
					<img src="{{asset('img/imgr.jpg')}}" alt="">
					<div>
						<h4>Descripción</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
						<h4>Fecha de incursión: 17 Julio 2017</h4>
						<ul>
							<li>Precio: <strong>S/300</strong></li>
							<li>Duración: <strong>2 días y 2 noches </strong> todo incluido.</li>
							<li>Cupos: <strong>30 (Quedan 5 cupos)</strong></li>
						</ul>
						<p class="text-pagar">Total a pagar S/300</p>
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
	});
</script>
@endsection