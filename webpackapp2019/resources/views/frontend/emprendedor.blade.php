@extends('layout.app')

@section('titulo','Pausa | ' . $emprendedor->nombre)

@section('css')
    <link rel="stylesheet" href="{{asset('css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/emprendedor.css')}}">
@endsection

@section('content')
    <section class="container-fliud slider-home">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                    <h2>{{ $emprendedor->nombre }}</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fliud">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-emprendedor">
                        <div class="row descripcion-container">
                            <div class="col-xs-4 col-md-4 text-center"><img
                                        src="{{asset('img/imgemprendedor/'.$emprendedor->foto)}}" alt=""></div>
                            <div class="col-xs-12  col-md-8">
                            <!-- <h3>{{ $emprendedor->nombre }}</h3> -->
                                <p class="emprendedor-description">{!! $emprendedor->descripcion !!}</p>
                                <ul class="emprendedor-social">
                                    @if($emprendedor->facebook)
                                        <li><a href="{{ $emprendedor->facebook}}" target="_blank"><i
                                                        class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if($emprendedor->twitter)
                                        <li><a href="{{ $emprendedor->twitter }}" target="_blank"><i
                                                        class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if($emprendedor->instagram)
                                        <li><a href="{{ $emprendedor->instagram }}" target="_blank"><i
                                                        class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if($emprendedor->web)
                                        <li><a href="{{ $emprendedor->web }}"
                                               target="_blank">{{ $emprendedor->web }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fliud" id="contenedor-dondeir">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="box-emprendedor itinerario">
                        <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                        <h3 class="itinerario-title"> {!!trans('emprendedor.emp1')!!}</h3>
                        <?php
                        $resultado = count($rutase);
                        ?>
                        @if($resultado > 1)
                            <div class="c-itinerario owl-carousel">
                                @foreach($rutase as $ruta)
                                    {{-- <a href="/rutas/{{ $ruta->url }}"> --}}
                                    <a href="{{asset($language . '/rutas/' . $ruta->url)}}">
                                        <div class="box-paquete">
                                            <div class="figure">
                                                <img src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                                            </div>
                                            <div class="content-paquete">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <h3>{{ $ruta->nombre }}</h3>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <p><img height="20" class="paquete-icon"
                                                                src="{{asset('img/icons/location-icon.png')}}"
                                                                alt="location">
                                                            <span class="paquete-location"
                                                                  data-name="{{ $ruta->departamento }}">{{ $ruta->departamento }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <p><img height="18" class="paquete-icon"
                                                                src="{{asset('img/icons/clock-icon.png')}}"
                                                                alt="clock"> {{ $ruta->tiempo }}</p>
                                                    </div>
                                                    <div class="col-xs-12 text-right">
                                                        <span class="paquete-more-keyword">{!!trans('emprendedor.emp2')!!}...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @elseif($resultado == 1)
                            <div class="mitaduno">
                                @foreach($rutase as $ruta)
                                    <div class="item">
                                        <!--<a href="/rutas/{{ $ruta->url }}">-->
                                        <a href="{{asset($language . '/rutas/' . $ruta->url)}}">
                                            <div class="box-paquete">
                                                <div class="figure">
                                                    <img src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                                                </div>
                                                <div class="content-paquete">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3>{{ $ruta->nombre }}</h3>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <p><img height="20" class="paquete-icon"
                                                                    src="{{asset('img/icons/location-icon.png')}}"
                                                                    alt="location">
                                                                <span class="paquete-location"
                                                                      data-name="{{ $ruta->departamento }}">{{ $ruta->departamento }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <p><img height="18" class="paquete-icon"
                                                                    src="{{asset('img/icons/clock-icon.png')}}"
                                                                    alt="clock"> {{ $ruta->tiempo }}</p>
                                                        </div>
                                                        <div class="col-xs-12 text-right">
                                                            <span class="paquete-more-keyword">{!!trans('emprendedor.emp2')!!}...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                        @endif
                    </div>
                    <div class="box-emprendedor comentarios">
                        <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                        <h3>{!!trans('emprendedor.emp3')!!}</h3>
                        <div class="row">
                            @foreach($testimonios as $testimonio)
                                <div class="col-xs-12 col-sm-2 text-center box-photo"><img
                                            src="{{asset('img/testimonio/'.$testimonio->foto)}}" alt=""></div>
                                <div class="col-xs-12 col-sm-10">
                                    <div class="box-coment">
                                        <h4>{{ $testimonio->nombre }}</h4>
                                        <h5><i>"{{ $testimonio->ruta }}"</i></h5>
                                        <p>{{ $testimonio->descripcion}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box-content-vi">
                        <div class="slider-imagenes">
                            <div class="c-images owl-carousel">
                                @foreach($fotos as $foto)
                                    <div class="item">
                                        <img src="{{asset('img/imgemprendedor/'.$foto->url)}}" alt="{{ $foto->alt }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="slider-videos">
                            <div class="c-videos owl-carousel">
                                @foreach($videos as $video)
                                    <div class="item-video">
                                        <a class="owl-video" href="{{ $video->url_video }}"></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="botones">
                            <span data-s="slider-videos">Videos</span>
                            <span class="active" data-s="slider-imagenes">{!!trans('emprendedor.emp4')!!}</span>
                        </div>
                    </div>
                    <div class="box-emprendedor atractivos">
                        <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                        <h3>{!!trans('emprendedor.emp5')!!}:</h3>
                        <div>
                            <table>
                                @foreach($alianzas as $alianza)
                                    <tr>
                                        <td style="width: 54px">
                                            <img class="alianza-img" src="{{ asset('img/imgemprendedor/'.$alianza->icono) }}"/>
                                        </td>
                                        <td>{{ $alianza->nombre }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="#navbar-collapse-grid" id="arriba" class="arriba" data-ancla="arriba"><i class="fa fa-angle-up"></i></a>

    <div class="modal fade m-mas-mapa" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset('img/mapa.jpg')}}" alt="mapa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/emprendedor.js')}}"></script>
@endsection