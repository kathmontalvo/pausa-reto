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
					<div class="col-md-10 section-reserva">
						<div><img src="{{asset('img/icons/map-icon.png')}}" alt=""></div>
						<h3> {!!trans('reservas_u.res1')!!}</h3>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th colspan="2">{!!trans('reservas_u.res2')!!}</th>
										<th>{!!trans('reservas_u.res3')!!}</th>
										<th>{!!trans('reservas_u.res4')!!}</th>
										<th>{!!trans('reservas_u.res5')!!}</th>
										<th>{!!trans('reservas_u.res6')!!}</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($reservas as $reserva)
									<tr>
										<td><img src="{{asset('img/'.$reserva->imagen)}}" alt=""></td>
										<td>{{$reserva->ruta}}</td>
										<td>{{str_replace('-','/',$reserva->fecha_llegada)}}</td>
										<td>{{ $reserva->cantidad }}</td>
										<td>
											@if( $reserva->idioma == 'en')
											$
											@else
											S/
											@endif
											{{$reserva->precio_total}}</td>
										<td>
											@if($reserva->estado == 0)
												{!!trans('reservas_u.res6_1')!!}
											@elseif($reserva->estado == 1)
												{!!trans('reservas_u.res6_2')!!}
											@elseif($reserva->estado == 2)
												{!!trans('reservas_u.res6_3')!!}
											@elseif($reserva->estado == 3)
												{!!trans('reservas_u.res6_4')!!}
											@elseif($reserva->estado == 4)
												{!!trans('reservas_u.res6_5')!!}
											@elseif($reserva->estado == 6)
												{!!trans('reservas_u.res6_6')!!}
											@endif
										</td>
										<td>
											{{-- <a href="{{route('detalle_reserva',$reserva->id)}}" class="btn btn-naranja">{!!trans('reservas_u.res7')!!}</a> --}}
											<a href="{{asset($language . '/user/detalle_reserva/' . $reserva->id)}}" class="btn btn-naranja">{!!trans('reservas_u.res7')!!}</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="text-left alert-responsive" style="padding-bottom: 5px">*{!!trans('reservas_u.res8')!!}</div>
								<nav aria-label="navpagination" class="text-center">
								{{$reservas}}
								  {{-- <ul class="pagination">
								    <li class="active"><a href="#">1</a></li>
								    <li><a href="#">2</a></li>
								    <li><a href="#">3</a></li>
								    <li><a href="#">4</a></li>
								    <li><a href="#">5</a></li>
								  </ul> --}}
								</nav>
							</div>
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