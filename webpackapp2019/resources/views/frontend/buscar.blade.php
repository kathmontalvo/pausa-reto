@extends('layout.app')
@section('titulo','Pausa | Viaja distinto')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
<section class="container-fliud slider-home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <form id="buscarruta" action="buscar" action="GET">
                    <div id="search">
                        <input id="search-input" name="rutabuscar" class="form-control input-lg"
                               placeholder="Busca tu destino" autocomplete="off" spellcheck="false"
                               autocorrect="off" tabindex="1">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                <h1 class="titulo-pck"><label>Haz una</label> <span>pausa</span>
                    <p><img src="{{asset('img/icons/pausa-icon.png')}}" alt="icon"></p>
                    <span>viaja</span> <label class="distinto">distinto</label>
                </h1>
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
<section class="section container-fliud section-paquete" id="paquetes-h">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2>Resultados de búsqueda</h2>
                <h4>Usted buscó: <?php echo $_GET["rutabuscar"] ?></h4>
            </div>
            <!-- aqui mostramos las rutas -->
            <?php
            $nn = 0;
            ?>
            @foreach($search as $ruta)
            <div class="col-xs-6 col-md-4 box-ruta-pack">
                <a href="/rutas/{{ $ruta->url }}">
                    <div class="box-paquete">
                        <div class="figure">
                            <img src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                            <div>
                                <?php //$descripcion = substr($ruta->descripcion, 0, 100);?>
                                <p>{{ $ruta->text }}</p>
                            </div>
                        </div>
                        <div class="content-paquete">
                            <h3><i class="fa fa-chevron-right"></i> {{ $ruta->nombre }}</h3>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p><i class="fa fa-map-marker"></i> {{ $ruta->departamento }}</p>
                                </div>
                                <div class="col-xs-6">
                                    <p><i class="fa fa-clock-o"></i> {{ $ruta->tiempo }}</p>
                                </div>
                                <div class="col-xs-6"><p><span>Desde S/ {{ $ruta->precio }}</span></p></div>
                            </div>
                            <?php $n = 0; ?>
                            @if($ruta->idRutas)
                            @foreach($atractivos as $atractivo)
                            @if($atractivo->idRutas == $ruta->idRutas)
                            <span>{{$atractivo->nombre}}</span>
                            <?php $n++; ?>
                            @endif
                            @if($n >= 2)
                            @break
                            @endif
                            @endforeach

                            @else
                            @foreach($ruta->rutas_atractivos as $atractivo)
                            @foreach($atractivos as $atr)
                            @if($n >= 2)
                            @break
                            @endif
                            @if($atr->id == $atractivo->idAtractivos)
                            <span>{{$atr->nombre}}</span>
                            <?php $n++; ?>
                            @endif
                            @endforeach
                            @endforeach
                            @endif

                            <span>Más</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="mas-info masinfo-id" data-toggle="modal" data-id="{{ $ruta->id }}"
                   data-target=".m-mas-info"><i class="fa fa-info-circle"></i></a>
            </div>
            <?php $nn++; ?>
            @endforeach
            <!-- End mostramos las rutas -->
            @if($nn == 0)
            <div class="col-md-12">
                <h5 class="text-danger">No se hallaron resultados de búsqueda. Intente con otras palabras. </h5>
            </div>
            @endif
        </div>
    </div>
</section>
<div class="modal fade m-mas-info" tabindex="-1" role="dialog">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/icons/close.png')}}" alt="close">
    </button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-paquete m-pck">
                            <p>Un paraíso en medio de Bagua Grande, Amazonas. <span>¡Verás a los monos choros de cola amarilla!...</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection