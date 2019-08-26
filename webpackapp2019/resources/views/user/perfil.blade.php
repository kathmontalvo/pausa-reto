@extends('user.layout.app')
@section('titulo','Pausa | Mi Cuenta')

@section('css')
<link rel="stylesheet" href="{{asset('css/user/login.css')}}">
@endsection
@section('content')
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						@include('user.layout.menu')
					</div>
					<div class="col-md-10 section-perfil">
						<div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
						<h3> {{trans('perfil_u.perfil1')}}</h3>
						<div class="row">

							@if (session('status'))
							    <div class="alert alert-success">
							        {{ session('status') }}
							    </div>
							@endif
							<form action="{{route('update_perfil')}}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="col-md-8">
									<div class="row">
											<div class="col-md-6">
												<label>{{trans('perfil_u.perfil2')}}:</label>
												<input type="text" class="" name="name" placeholder="{{trans('perfil_u.perfil3')}}" value="{{\Auth::user()->name}}" required>
											</div>
											<div class="col-md-6">
												<label>{{trans('perfil_u.perfil4')}}:</label>
												<input type="text" class="" name="lastname" placeholder="{{trans('perfil_u.perfil5')}}" value="{{\Auth::user()->lastname}}" required>
											</div>
											<div class="col-md-6">
												<?php 
												$email =  (filter_var( \Auth::user()->email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;

												if($email == 0){
													$email = "";
												}
												else{
													$email = \Auth::user()->email;
												}
											   	?>
												<label>Email:</label>
												<input type="email" class="" name="email" placeholder="{{trans('perfil_u.perfil6')}}" value="{{ $email }}" required>
											</div>
											<div class="col-md-6">
												<label>{{trans('perfil_u.perfil7')}}:</label>
												<input type="text" class="" name="phone" value="{{\Auth::user()->phone}}" placeholder="{{trans('perfil_u.perfil8')}}" required>
											</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="avatar-perfil">
										@if(substr(\Auth::user()->photo, 0, 3) == 'htt')
											<img src="{{\Auth::user()->photo}}" alt="avatar" class="img-circle">
										@else
											<img src="{{asset('img/user/'.\Auth::user()->photo)}}" alt="avatar" class="img-circle">
										@endif
										
										<div class="imput-file">
											<p>{{trans('perfil_u.perfil9')}}</p>
											<input type="file" class="file-avatar" name="photo">
										</div>
									</div>
								</div>
								<div class="col-md-8 text-center">
									<button type="submit" class="btn">{{trans('perfil_u.perfil10')}}</button>
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
<script src="{{asset('js/user/login.js')}}"></script>
@endsection