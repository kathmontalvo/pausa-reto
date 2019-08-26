@extends('layout.app')
@section('titulo', $ruta->nombre)

@section('css')
<meta name="description" content="{{ $ruta->text }}" />
<link rel="stylesheet" href="{{asset('css/icons.css')}}">
<link rel="stylesheet" href="{{asset('css/donde-ir.css')}}">
@endsection

@section('content')
<?php
  if( $ruta->banner != ""){
    $custom_banner = 'background: url('.URL::to('/').'/img/'.$ruta->banner.');background-size: cover';
  }
  else{
    $custom_banner = '';
  }
?>
<section class="container-fliud header-interno" style="{{ $custom_banner }}">
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
            <!-- <div class="col-md-4 text-center">
				<a href="{{route('registro')}}" class="btn btn-naranja">Reservar</a>
			</div> -->
        </div>
    </div>
</section>
<section class="container-fliud contenedor-contenido">
    <div class="container">
        <div class="slider-page">
            <div class="row">
                <div class="col-md-8 col-md-push-4">
                    <div class="slider-imagenes">
                        <div class="c-images owl-carousel">
                            @foreach($fotos as $foto)
                            <div class="item">
                                <img src="{{asset('img/fotos_ruta/'.$foto->url)}}" alt="{{ $foto->alt }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-videos">
                        <div class="c-videos owl-carousel">
                            @foreach($videos as $video)
                            <div class="item-video">
                                <a class="owl-video" href="{{ $video->url }}"></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="botones">
                        <span data-s="slider-videos">{!!trans('rutas.rut1')!!}</span>
                        <span class="active" data-s="slider-imagenes">{!!trans('rutas.rut2')!!}</span>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8">
                    <ul>
                        <li><i class="icon-4"></i>
                            <p><strong>{!!trans('rutas.rut3')!!}: </strong><span>{{ $ruta->tiempo }}</span></p></li>
                        <li><i class="icon-5"></i>
                            <p><strong>{!!trans('rutas.rut4')!!}: </strong><span>{{ $ruta->dificultad }}</span></p></li>
                        <li><i class="icon-3"></i>
                            <p><strong>{!!trans('rutas.rut5')!!}: </strong><span>{{ $ruta->clima }}</span></p></li>
                        <li><i class="icon-6"></i>
                            <p><strong>{!!trans('rutas.rut6')!!}: </strong><span>{{ $ruta->relieve }}</span></p></li>
                        <li><i class="icon-1"></i>
                            <p><strong>{!!trans('rutas.rut7')!!}: </strong><span>{{ $ruta->altura }}</span></p></li>
                        <li><i class="icon-2"></i>
                            <p><strong>{!!trans('rutas.rut8')!!}: </strong><span>{{ $ruta->alojamiento}}</span></p></li>
                    </ul>
                </div>
            </div>
            <div class="row flex-packapp">
                <div class="col-sm-4 col-md-4">
                    <div class="incluye row">
                        <h4>{!!trans('rutas.rut9')!!}:</h4>
                        <p>
                            @foreach($incluyes as $incluye)
                            <span>{{ $incluye->nombre }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <div class="price-container">

                        <div class="row">
                            <div class="col-xs-12 col-sm-7 col-md-6">
                                <div class="precio">
                                    <span class="text-muted">{!!trans('rutas.rut10')!!}:</span>
                                    <p><span>{!!trans('rutas.rut11')!!}</span> @if($language == 'es') S/@else $ @endif {{ $ruta->precio }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-6 text-right">
                                <a href="{{asset($language . '/registro/'.$ruta->id)}}" class="btn btn-naranja">{!!trans('rutas.rut12')!!}</a>
                            </div>
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
            <div class="col-md-8">
                <div class="como-llegar">
                    <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                    <h3>{!!trans('rutas.rut13')!!}</h3>
                    <p>{!! $ruta->descripcion !!}</p>
                </div>
                <div class="como-llegar itinerario">
                    <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                    <h3>{!!trans('rutas.rut14')!!}</h3>
                    <div class="c-itinerario owl-carousel">
                        @foreach($itinerarios as $itinerario)
                        <div class="item">
                            <h3>{{ $itinerario->title }}</h3>
                            {!! $itinerario->descripcion !!}
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{asset('img/pdf/'.$ruta->id.'_'.$language.'.pdf')}}" target="_blank">{!!trans('rutas.rut15')!!} <img src="{{asset('img/icons/arrow-right-icon-orange.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="como-llegar">
                    <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                    <h3>{!!trans('rutas.rut16')!!}</h3>
                    <p>{!! $ruta->llegar !!}</p>
                </div>
                <div class="como-llegar comentarios">
                    <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                    <h3>{!!trans('rutas.rut17')!!}</h3>
                    <div class="row">
                        @foreach($testimonios as $testimonio)
                        <div class="col-xs-12 col-sm-2 text-center box-photo"><img
                                    src="{{asset('img/testimonio/'.$testimonio->foto)}}" alt=""></div>
                        <div class="col-xs-12 col-sm-10 testimonio-text">
                            <div class="box-coment">
                                <h4>{{ $testimonio->nombre }}</h4>
                                <p>{{ $testimonio->descripcion}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="como-llegar atractivos">
                    <div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
                    <h3>{!!trans('rutas.rut18')!!}:</h3>
                    <p>
                        @foreach($atractivos as $atractivo)
                        <span>{{ $atractivo->nombre }}</span>
                        @endforeach
                    </p>
                </div>
                <div class="como-llegar emprendedor">
                    <div class="bg-verde"></div>
                    <img class="emprendedor-img" src="{{asset('img/imgemprendedor/'.$emprendedor->foto)}}" alt="">
                    <h3>{!!trans('rutas.rut19')!!}</h3>
                    <?php //$descripcion = substr($emprendedor->descripcion, 0, 100);?>
                    <p>{!! $emprendedor->intro !!}</p>
                {{-- <a href="/emprendedor/{{ $emprendedor->url }}">{!!trans('rutas.rut20')!!}  --}}
                <a href="{{asset($language . '/emprendedor/' . $emprendedor->url)}}">{!!trans('rutas.rut20')!!}
                    <img src="{{asset('img/icons/arrow-right-icon-orange.png')}}" alt="">
                </a>
                </div>
                <div class="como-llegar mapamin">
                    <div class="map-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="{{asset('img/icons/map-icon.png')}}" alt="">
                                <h3>{!!trans('rutas.rut21')!!}</h3>
                            </div>
                            <div class="col-xs-2">
                                <img src="{{asset('img/icons/location-icon-white.png')}}" alt="">
                            </div>
                            <div class="col-xs-10 map-text">
                                <h4>{{ $ubicacion->direccion }}</h4>
                                <!-- <a href="{{ $ubicacion->url_maps }}" target="_blank">Ver mapa</a> -->
                                <a href="#" data-toggle="modal" data-target=".m-mas-mapa" target="_blank">{!!trans('rutas.rut22')!!}</a>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target=".m-mas-mapa">
                        <img class="mapa-img" src="{{asset('img/'.$ubicacion->foto)}}" alt="mapa">
                    </a>
                    <div class="lista-item-u">
                        <ul>
                            <li><i class="icon-5"></i>
                                <p>{!!trans('rutas.rut23')!!}: <span>{{ $ruta->dificultad }}</span></p></li>
                            <li><i class="icon-3"></i>
                                <p>{!!trans('rutas.rut24')!!}: <span>{{ $ruta->clima }}</span></p></li>
                            <li><i class="icon-6"></i>
                                <p>{!!trans('rutas.rut25')!!}: <span>{{ $ruta->relieve }}</span></p></li>
                            <li><i class="icon-1"></i>
                                <p>{!!trans('rutas.rut26')!!}: <span>{{ $ruta->altura }}</span></p></li>
                            <li><i class="icon-2"></i>
                                <p>{!!trans('rutas.rut27')!!}: <span>{{ $ruta->alojamiento }}</span></p></li>
                        </ul>
                    </div>
                </div>
                <div class="como-llegar contacto-min">
                    <img src="{{asset('img/icons/map-icon.png')}}" alt="">
                    <h3>{!!trans('rutas.rut28')!!}</h3>
                    <form id="enviarcontacto">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>{!!trans('rutas.rut29')!!}</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                   placeholder="{!!trans('rutas.rut30')!!}" required>
                        </div>

                        <div class="form-group">
                            <label >{!!trans('rutas.rut31')!!}</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="{!!trans('rutas.rut32')!!}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label >{!!trans('rutas.rut33')!!}</label>
                            <select class="form-control" name="mes" id="mes">
                                <option value="" hidden>{!!trans('rutas.rut34')!!}</option>
                                <option value="Enero">{!!trans('rutas.rut35')!!}</option>
                                <option value="Febrero">{!!trans('rutas.rut36')!!}</option>
                                <option value="Marzo">{!!trans('rutas.rut37')!!}</option>
                                <option value="Abril">{!!trans('rutas.rut38')!!}</option>
                                <option value="Mayo">{!!trans('rutas.rut39')!!}</option>
                                <option value="Junio">{!!trans('rutas.rut40')!!}</option>
                                <option value="Julio">{!!trans('rutas.rut41')!!}</option>
                                <option value="Agosto">{!!trans('rutas.rut42')!!}</option>
                                <option value="Septiembre">{!!trans('rutas.rut43')!!}</option>
                                <option value="Octubre">{!!trans('rutas.rut44')!!}</option>
                                <option value="Noviembre">{!!trans('rutas.rut45')!!}</option>
                                <option value="Diciembre">{!!trans('rutas.rut46')!!}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{!!trans('rutas.rut47')!!}</label>
                            <textarea class="form-control" name="mensaje" id="mensaje" rows="5"
                                      placeholder="Mensaje"></textarea>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="pagina" value="{{ $ruta->nombre }}">
                            @if(Session('utm_source'))
                            <input type="hidden" name="utm_source" value="{{ Session('utm_source') }}">
                            @endif
                            <button type="submit" class="btn btn-naranja">{!!trans('rutas.rut48')!!}</button>
                        </div>
                        <div class="alerta"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<a href="#navbar-collapse-grid" id="arriba" class="arriba" data-ancla="arriba"><i class="fa fa-angle-up"></i></a>

<div class="modal fade m-mas-mapa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="{{asset('img/icons/close.png')}}" alt="close">
        </button>
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('img/'.$ubicacion->foto)}}" alt="mapa">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('js/dondeir.js')}}"></script>
@endsection
