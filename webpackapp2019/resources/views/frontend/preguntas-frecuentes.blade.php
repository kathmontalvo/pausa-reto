@extends('layout.app')
@section('titulo','Pausa | Preguntas frecuentes')

@section('css')
    <link rel="stylesheet" href="{{asset('css/preguntas.css')}}">
@endsection

@section('content')
    <section class="container-fliud slider-home">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="titulo-pck"><label>{!!trans('preguntas.pre1')!!}</label> <span>{!!trans('preguntas.pre2')!!}</span>
                        <p><img src="{{asset('img/icons/pausa-icon.png')}}" alt="icon"></p>
                        <span>{!!trans('preguntas.pre3')!!}</span> <label class="distinto">{!!trans('preguntas.pre4')!!}</label>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-preguntas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-preguntas">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $n = 1;$id = 0?>
                                @foreach($preguntas as $pregunta)
                                    @if($id != $pregunta->idcat)
                                            <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                                            <h4> {{ $pregunta->nombre}}</h4>
                                        <span class="raya"></span>
                                        <?php $id = $pregunta->idcat; $n = 1?>
                                    @endif
                                    <div class="lista-preguntas">
                                        <span>{{ $n }}</span>
                                        <div class="item-pregunta">
                                            <h4>{!! $pregunta->titulo !!}</h4>
                                            {!! $pregunta->descripcion !!}
                                        </div>
                                    </div>
                                    <?php $n++;?>
                                @endforeach
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