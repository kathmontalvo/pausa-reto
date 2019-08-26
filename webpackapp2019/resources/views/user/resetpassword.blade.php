@extends('layout.app')
@section('titulo','Pausa | Recuperar contraseña')

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
			<div class="col-sm-8 col-sm-offset-2">
                <h3 class="text-center">{!!trans('reset.rsp1')!!}:</h3>
                 @if (session('status'))
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="alert alert-success">
                                {!!trans('reset.rsp1_1')!!}
                        </div>
                    </div>
                @endif
			    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{!!trans('reset.rsp2')!!}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-naranja">
                                    {!!trans('reset.rsp3')!!}
                            </button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/user/login.js')}}"></script>
@endsection