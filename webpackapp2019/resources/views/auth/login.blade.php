@extends('layout.app')
@section('titulo','Pausa | Inicio de sesión')

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
                <div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2">
                    <div class="box-linkregistrar">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 box-social">
                                <h3>{!!trans('login.log1')!!}:</h3>
                                <a href="{{asset('login/facebook?idioma=' . $language)}}" class="btn-face"><i class="fa fa-facebook"></i>
                                    Facebook</a>
                                <a href="{{asset('login/google?idioma=' . $language)}}" class="btn-google"><i class="fa fa-google-plus"></i>
                                    Google +</a>
                            </div>
                            <div class="col-xs-12 col-sm-6 hr-spacio">
                                <hr>
                            </div>
                            <div class="col-sm-6">
                                <h3>{!!trans('login.log2')!!}</h3>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idioma" value="{{$language}}">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">{!!trans('login.log3')!!}</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required autofocus placeholder="{!!trans('login.log3_2')!!}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">{!!trans('login.log4')!!}:</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                               placeholder="{!!trans('login.log4')!!}" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group text-center">
                                        <p><a href="/resetpassword"
                                              style="max-width: 100%; padding: 0px !important;    font-size: 13px; display: block;text-align: left !important;">{!!trans('login.log5')!!}</a></p>
                                        <button type="submit" class="btn btn-naranja">{!!trans('login.log6')!!}</button>
                                        <p>{!!trans('login.log7')!!} <a class="register" href="{{asset($language . '/register')}}">{!!trans('login.log8')!!}</a></p>
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