@extends('layout.app')
@section('titulo','Pausa | Recuperar contraseña')

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
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="text-center">{!!trans('reset.res1')!!}</h3>
                    @if (session('status'))
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="alert alert-success">
                                    {!!trans('reset.res2')!!}
                            </div>
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{!!trans('reset.res3')!!}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{!!trans('reset.res4')!!}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">{!!trans('reset.res5')!!}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                        {!!trans('reset.res1')!!}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection