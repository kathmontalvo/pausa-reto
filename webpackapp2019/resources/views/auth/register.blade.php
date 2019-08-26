@extends('layout.app')
@section('titulo')Pausa | Registro
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/user/login.css')}}">
@endsection

@section('content')
<section class="container-fliud header-interno">
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
<section class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="box-linkregistrar">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <h3>{!!trans('registro.regis1')!!}</h3>

                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="idioma" value="{{$language}}">
                                @if(isset($_GET["idrutac"]) && $_GET["idrutac"] != "")
                                  <input type="hidden" value="{{$_GET["idrutac"]}}" name="idrutac">
              									@endif
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class=" control-label">{!!trans('registro.regis2')!!}</label>

                                    <input id="name" type="text" placeholder="{!!trans('registro.regis2')!!}" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">{!!trans('registro.regis3')!!}</label>
                                    <input id="email" type="email" class="form-control" placeholder="{!!trans('registro.regis3')!!}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">{!!trans('registro.regis4')!!}</label>
                                        <input id="password" type="password" class="form-control" placeholder="{!!trans('registro.regis4')!!}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class=" control-label">{!!trans('registro.regis5')!!}</label>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="{!!trans('registro.regis5')!!}" name="password_confirmation" required>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                          <input type="checkbox" required>{!! trans('registro.regis8') !!} <a href="{{asset($language . '/terminos-condiciones')}}" target="_blank" class="sinestilo">{!!trans('registro.regis6')!!} </a> {!! trans('registro.regis9') !!} <a href="{{asset($language . '/politica-privacidad')}}" target="_blank" class="sinestilo">{!! trans('registro.regis10') !!}</a> {!! trans('registro.regis11') !!}.
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="submit" class="btn btn-naranja">
                                                {!!trans('registro.regis7')!!}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/user/login.js')}}"></script>
@endsection
