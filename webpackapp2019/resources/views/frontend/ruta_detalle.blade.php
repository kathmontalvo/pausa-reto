<style type="text/css" media="screen">
    .carousel-control.right {
        right: -63px;
        background-image: none;
        background-repeat: none;
        filter: none;
    }

    .carousel-control.left {
        left: -63px;
        background-image: none;
        background-repeat: none;
        filter: none;
    }

    a.left.carousel-control, a.right.carousel-control {
        bottom: auto;
        top: 37%;
        opacity: 1;
    }

    .carrusel-mapa a {
        display: block;
        text-decoration: none;
        color: #222;
    }

    .carousel-control {
        font-size: 30px;
        color: #fff !important;
    }

    .carrusel-mapa .modal-mas-info {
        position: absolute;
        top: 250px;
        right: 2px;
        font-size: 26px;
        color: #dd4617;
        z-index: 99;
    }

    @media (max-width: 768px) {
        .carousel-control.left {
            left: -56px;
            font-size: 30px;
        }

        .carousel-control.right {
            right: -56px;
            font-size: 30px;
        }

        .carrusel-mapa .modal-mas-info {
            top: 191px;
        }
    }

    @media (max-width: 736px) {
        .carrusel-mapa .modal-mas-info {
            top: 193px;
        }
    }
</style>
<div id="myCarousel" class="carousel slide carrusel-mapa" data-ride="carousel">
    <div class="carousel-inner">
        <?php $cont = 1;?>
        @foreach($rutasdet as $ruta)
            <div class="item @if($cont == 1) active @endif">
                {{-- <a href="/rutas/{{ $ruta->url }}"> --}}
                <a href="{{asset($language . '/rutas/'. $ruta->url)}}">
                    <figure>
                        <div class="paquete-price">
                            <span>{!!trans('rutas.rut11')!!} <strong>@if($language == 'es')S/ @else $ @endif {{ $ruta->precio }}</strong></span>
                        </div>
                        <img src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                    </figure>
                    <div class="mapa-title-container">
                        <h3><strong>{{ $ruta->nombre }}</strong></h3>
                    </div>
                    <div class="descr-ruta-modal">
                        <?php //$descripcion = substr($ruta->descripcion, 0, 100);?>
                        {!! $ruta->text !!}
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p><img height="20" class="paquete-icon" src="{{asset('img/icons/location-icon.png')}}" alt="location"> <span class="paquete-location" data-name="{{ $ruta->departamento }}">{{ $ruta->departamento }}</span>
                            </p>
                        </div>
                        <div class="col-xs-12">
                            <p><img height="18" class="paquete-icon" src="{{asset('img/icons/clock-icon.png')}}"
                                    alt="clock"> {{ $ruta->tiempo }}</p>
                        </div>
                    </div>
                    <div class="modal-paquete-keywords">
                        <?php $n = 0;?>
                        @foreach($ruta->rutas_atractivos_real as $atractivos)
                            @if($n >= 2)
                                @break
                            @endif
                        @if($language == 'es')
                            <span class="paquete-keyword">{{ $atractivos->nombre }}</span>
                        @else
                            <span class="paquete-keyword">{{ $atractivos->nombre_en }}</span>
                        @endif
                            <?php $n++;?>
                        @endforeach
                        <span class="paquete-more-keyword">{!!trans('rutas.rut50')!!}...</span>
                    </div>
                </a>
                <!-- <a href="#" class="modal-mas-info"><i class="fa fa-info-circle"></i></a> -->
            </div>
            <?php $cont++;?>
        @endforeach
    </div>
    @if(count($rutasdet) > 1)
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <!-- <img src="../img/nav-left.png" alt="nav"> -->
            <img height="40" src="{{asset('img/icons/arrow-circle-back-map.png')}}" alt="">
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <!-- <img src="../img/nav-r.png" alt="nav"> -->
            <img height="40" src="{{asset('img/icons/arrow-circle-next-map.png')}}" alt="">
        </a>
    @endif
</div>


