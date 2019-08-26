@extends('layout.app')
@section('titulo','Pausa | Contáctanos')

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
							<h2>{!!trans('contacto.cont1')!!}:</h2>
						</div>
						<form id="enviarcontacto">
							{{  csrf_field() }}
							<div class="col-md-6">
								<div class="row">

									<div class="col-xs-12">
										<div class="form-group">
											<label for="">{!!trans('contacto.cont2')!!}:</label>
											<input type="text" class="form-control" name="nombre" id="nombre"
												   placeholder="{!!trans('contacto.cont3')!!}" required>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="">{!!trans('contacto.cont4')!!}:</label>
											<input type="email" class="form-control" name="email" id="email"
												   placeholder="{!!trans('contacto.cont5')!!}" required>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="">{!!trans('contacto.cont6')!!}:</label>
											<select class="form-control" name="mes" id="mes">
												<option value="" hidden>{!!trans('contacto.cont7')!!}</option>
												<option value="Enero">{!!trans('contacto.cont8')!!}</option>
												<option value="Febrero">{!!trans('contacto.cont9')!!}</option>
												<option value="Marzo">{!!trans('contacto.cont10')!!}</option>
												<option value="Abril">{!!trans('contacto.cont11')!!}</option>
												<option value="Mayo">{!!trans('contacto.cont12')!!}</option>
												<option value="Junio">{!!trans('contacto.cont13')!!}</option>
												<option value="Julio">{!!trans('contacto.cont14')!!}</option>
												<option value="Agosto">{!!trans('contacto.cont15')!!}</option>
												<option value="Septiembre">{!!trans('contacto.cont16')!!}</option>
												<option value="Octubre">{!!trans('contacto.cont17')!!}</option>
												<option value="Noviembre">{!!trans('contacto.cont18')!!}</option>
												<option value="Diciembre">{!!trans('contacto.cont19')!!}</option>
											</select>
										</div>
									</div>

								</div>
							</div>
							<div class="col-md-6">
								<div class="row">

									<div class="col-md-12">
										<div class="form-group">
											<label for="">{!!trans('contacto.cont20')!!}:</label>
											<textarea class="form-control" name="mensaje" id="mensaje"
													  rows="10" placeholder="{!!trans('contacto.cont21')!!}"></textarea>
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

							<div class="alerta"></div>
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