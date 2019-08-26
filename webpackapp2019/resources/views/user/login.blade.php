@extends('layout.app')
@section('titulo','Pausa | Inicio de sesión')

@section('css')
<link rel="stylesheet" href="{{asset('css/user/login.css')}}">
@endsection

@section('content')
<section class="container-fliud header-interno">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="title-btn">
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-login">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box-linkregistrar">
					<div class="row">
						<div class="col-md-6">
							<h3>{!!trans('usuario.log1')!!}</h3>
							<a href="{{asset('login/facebook')}}" class="btn-face"><i class="fa fa-facebook"></i> Facebook</a>
							<a href="{{asset('login/google')}}" class="btn-google"><i class="fa fa-google-plus"></i> Google +</a>
						</div>
						<div class="col-md-6 hr-spacio"><hr></div>
						<div class="col-md-6">
							<h3>{!!trans('usuario.log2')!!}</h3>
							{{-- <form class="form-horizontal" method="POST" action="{{ route('login') }}"> --}}
							<form class="form-horizontal" method="POST" action="{{ asset($language . '/login') }}">
		                        {{ csrf_field() }}
		                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                            <label for="email">{!!trans('usuario.log3')!!}</label>
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
		                        </div>

		                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                            <label for="password">{!!trans('usuario.log4')!!}:</label>
	                                <input id="password" type="password" class="form-control" name="password" placeholder="{!!trans('usuario.log4')!!}" required>

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
		                        </div>
								<div class="text-center">
									<button type="submit" class="btn btn-naranja">{!!trans('usuario.log5')!!}</button>
									<p>{!!trans('usuario.log6')!!}, <a href="#">{!!trans('usuario.log7')!!}</a></p>
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