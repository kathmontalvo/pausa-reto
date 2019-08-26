@extends('layout.app')
@section('titulo','Pausa | Libro de reclamaciones')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<style>
	.section-contacto{
		padding-top: 4em !important;
	}
	.section-contacto .box-contacto{
		margin-top:0px !important;
	}
</style>
@endsection

@section('content')
<section class="container-fliud slider-home">
	<div class="container">
		<div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="titulo-pck"><label>{!!trans('home.home1')!!}</label> <span>{!!trans('home.home2')!!}</span>
                    <p><img src="{{asset('img/icons/pausa-icon.png')}}" alt="icon"></p>
					<span>{!!trans('home.home3')!!}</span> <label class="distinto">{!!trans('home.home4')!!}</label>
                </h1>
            </div>
		</div>
	</div>
</section>
<section class="section section-contacto">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-contacto">
					<div class="row">
						<div class="col-md-12">
							<p><img src="{{asset('img/icons/form-icon.png')}}" alt="icon"></p>
							<h2>{!!trans('libro_reclamo.cont1')!!}:</h2>
						</div>
						<form id="enviarreclamo">
							{{  csrf_field() }}
							<div class="col-md-6">
								<div class="row">

									<div class="col-xs-12">
										<div class="form-group">
											<label for="">{!!trans('libro_reclamo.cont2')!!}:</label>
											<input type="text" class="form-control" name="nombre" id="nombre"
												   placeholder="{!!trans('libro_reclamo.cont3')!!}" required>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="">{!!trans('libro_reclamo.cont4')!!}:</label>
											<input type="email" class="form-control" name="email" id="email"
												   placeholder="{!!trans('libro_reclamo.cont5')!!}" required>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="">{!!trans('libro_reclamo.cont6')!!}:</label>
											<input type="text" class="form-control" name="telefono" id="telefono"
												   placeholder="{!!trans('libro_reclamo.cont7')!!}" required>
										</div>
									</div>

								</div>
							</div>
							<div class="col-md-6">
								<div class="row">

									<div class="col-md-12">
										<div class="form-group">
											<label for="">{!!trans('libro_reclamo.cont20')!!}:</label>
											<textarea class="form-control" name="mensaje" id="mensaje"
													  rows="10" placeholder="{!!trans('libro_reclamo.cont20')!!}"></textarea>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12 text-right">
								<input type="hidden" name="pagina" value="Contacto">
								@if(Session('utm_source'))
                                <input type="hidden" name="utm_source" value="{{ Session('utm_source') }}">
                                @endif
								<button type="submit" class="btn btn-naranja">{!!trans('contacto.cont22')!!}</button>
							</div>

							<div class="alerta col-md-12"></div>
						</form>
					</div>
				</div>
				<div class="col-md-12 text-center">
					<div class="alianza">{!!trans('contacto.cont23')!!}: <img height="80" class="contact-img" src="{{asset('img/alianza.png')}}" alt=""></div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script src="{{asset('js/dondeir.js')}}"></script>
@endsection
