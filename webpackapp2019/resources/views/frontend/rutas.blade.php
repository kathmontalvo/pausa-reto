@extends('layout.app')
@section('titulo','Pausa | Rutas')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
<!-- <meta name="_token" content="{!! csrf_token() !!}"/> -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<section class="container-fliud slider-home">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="titulo-pck"><label>{!!trans('front.ruta1')!!}</label> <span>{!!trans('front.ruta2')!!}</span>
                    <p><img src="{{asset('img/icons/pausa-icon.png')}}" alt="icon"></p>
                    <span>{!!trans('front.ruta3')!!}</span> <label class="distinto">{!!trans('front.ruta4')!!}</label>
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="section container-fliud section-paquete">
    <div class="container">
        <div class="row">
            <!-- aqui mostramos las rutas -->
            <div id="new">
                {{-- {{$rutas}} --}}
                @foreach($rutasall as $ruta)
                <div class="col-xs-6 col-md-4 col-sm-6 box-ruta-pack">
                    {{-- <a href="/rutas/{{ $ruta->url }}"> --}}
                    <a href="{{asset($language . '/rutas/' . $ruta->url)}}">
                        <div class="box-paquete">
                            <div class="figure">
                                <div class="paquete-price">
                                    <span>{!!trans('front.ruta5')!!} <strong>@if($language == 'es')S/ @else $ @endif {{ $ruta->precio }}</strong></span>
                                </div>
                                <img src="{{asset('img/'.$ruta->avatar)}}" alt="img">
                                <div class="paquete-information">
                                    <p>{{ $ruta->text }}</p>
                                </div>
                            </div>
                            <div class="content-paquete">
                                <h3>{{ $ruta->nombre }}</h3>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p><img height="20" class="paquete-icon"
                                                src="{{asset('img/icons/location-icon.png')}}" alt="location">
                                            <span class="paquete-location"
                                                  data-name="{{ $ruta->departamento }}">{{ $ruta->departamento }}</span>
                                        </p>
                                    </div>
                                    <div class="col-xs-12">
                                        <p><img height="18" class="paquete-icon"
                                                src="{{asset('img/icons/clock-icon.png')}}"
                                                alt="clock"> {{ $ruta->tiempo }}</p>
                                    </div>
                                </div>
                                <?php $n = 0; ?>
                                @foreach($ruta->rutas_atractivos as $atractivo)

                                  @foreach($atractivos as $atr)
                                  @if($n >= 2)
                                    @break
                                  @endif
                                  @if($atr->id == $atractivo->idAtractivos)
                                  <span class="paquete-keyword">{{$atr->nombre}}</span>
                                  <?php $n++; ?>
                                  @endif
                                  @endforeach
                                @endforeach
                                <span class="paquete-more-keyword">{!!trans('front.ruta6')!!}...</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="mas-info masinfo-id" data-toggle="modal" data-id="{{ $ruta->id }}"
                       data-target=".m-mas-info"><i class="fa fa-info-circle"></i></a>
                </div>
                @endforeach
            </div>
            <!-- End mostramos las rutas -->

        </div>
        <!-- <div class="row">
            <div class="col-md-12 text-center">
                <a href="javascript:void(0)" id="load" class="btn btn-verde">Ver más</a>
            </div>
        </div> -->
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
                            <p class="m-pckdescripcion">
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

<script type="text/javascript">
    $(document).ready( function(){
      $(".masinfo-id").click(function (e) {
          e.preventDefault();
          var id = $(this).attr("data-id");
          let idioma = $("input[name='data_idioma']").val();

          $.post('../homedeta', {id: id , idioma: idioma}, function (data) {
              $(".m-pckdescripcion").html(data);
              //$("#data_ruta_pots").html(data);
          });
      });
    })
</script>
@endsection