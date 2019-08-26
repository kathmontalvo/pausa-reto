@extends('layout.app')
@section('titulo','Pausa | Políticas de viaje')

@section('css')
<link rel="stylesheet" href="{{asset('css/preguntas.css')}}">
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
<div class="hr-slider-arriba">
	<span class="uno"></span>
	<span class="dos"></span>
	<span class="tres"></span>
	<span class="cuatro"></span>
	<span class="cinco"></span>
	<span class="seis"></span>
</div>
<section class="section section-preguntas">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-preguntas">
					<div class="row">
						<div class="col-md-12">
							<h4><i class="icon-24"></i> {!! trans('politica_viaje.term1')!!}</h4>
							<div class="raya"></div>
							{!! trans('politica_viaje.term2')!!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script src="{{asset('js/dondeir.js')}}"></script>
@endsection
