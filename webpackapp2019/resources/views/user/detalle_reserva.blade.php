<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>
@extends('user.layout.app')
@section('titulo','Pausa | Mi Cuenta')

@section('css')
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<link rel="stylesheet" href="{{asset('css/user/login.css')}}">
@endsection

@section('content')
<?php
if($reserva->idioma == 'en'){
 	$simbolo = '$';
}
else{
	$simbolo = 'S/';
}
if($language == 'es'){
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
}
else{
	$meses = array("January","February","March","April","May","June","July","August","September","October","November","December");
}
?>
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						@include('user.layout.menu')
					</div>
					<div class="col-md-10 section-detallereserva">
						<h3><i class="fa fa-chevron-right"></i> {!!trans('reservadtll_u.resdtll1')!!} </h3>
						<div class="row">
							<div class="col-md-8">
								<form action="#">
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll2')!!}:</label>
										<div class="col-md-6">{{$detalle->nombre_ruta}}</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll3')!!}:</label>
										<div class="col-md-6">
											<?php
											$fech = explode('-', $detalle->fecha_llegada );
											$n = (int)$fech[1] - 1;
											?>
											{{$fech[2]}} - {{$meses[$n]}} - {{$fech[0]}}
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll4')!!}:</label>
										<div class="col-md-6">
											<?php
												$fech1 = explode('-', $detalle->fecha_salida );
												$n = (int)$fech1[1] - 1;
											?>
											{{$fech1[2]}} - {{$meses[$n]}} - {{$fech1[0]}}
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll5')!!}:</label>
										<div class="col-md-6">{{$simbolo}} {{$reserva->precio_persona}}</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll6')!!}:</label>
										<div class="col-md-6">{{$reserva->cantidad}}</div>
									</div>
									@if($reserva->precio_habitacion > 0)
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll7')!!}:</label>
										<div class="col-md-6">{{ $tipo_habitacion->nombre }} </div>
									</div>
									@endif
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll8')!!}:</label>

										<div class="col-md-6">
											@if(isset($paquete->nombre))
											{{ $paquete->nombre }} - {{$simbolo}} {{ $reserva->precio_paquete }}
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll9')!!}:</label>

										<div class="col-md-6">
											@if($reserva->cant_noche > 0) {{ $reserva->cant_noche }} - {{$simbolo}} {{ $reserva->extras }} @endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll10')!!}:</label>

										<div class="col-md-6">
											{{$simbolo}} {{ $reserva->precio_descuento }}
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-6 control-label">{!!trans('reservadtll_u.resdtll11')!!}:</label>

										<div class="col-md-6">
											<b>{{$simbolo}} {{ $reserva->precio_total }}</b>
										</div>
									</div>
									@if($detalle->estado == 1)
									<div class="row">
										<div class="col-md-12 text-center">

												<h3 style="font-size: 17px;">{!!trans('reservadtll_u.resdtll12')!!}</h3>
												<h5>{!!trans('reservadtll_u.resdtll13')!!}</h5>
{{-- 												<button type="submit" class="btn btn-naranja">Continuar con el pago</button> --}}
												{{-- <a href="{{route('pagar',$reserva->id)}}" class="btn btn-naranja">{!!trans('reservadtll_u.resdtll14')!!}</a> --}}
												<a href="{{asset($language . '/user/pagar/' . $reserva->id)}}" class="btn btn-naranja">{!!trans('reservadtll_u.resdtll14')!!}</a>
										</div>
									</div>
									@endif
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script src="{{asset('js/user/login.js')}}"></script>
<script type="text/javascript">
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
@endsection