<!-- <input type="hidden" id="pgrut" value="<?php echo $rutas->lastPage();?>">  -->
@foreach($rutas as $ruta)
	<div class="col-xs-12 col-md-4 col-sm-6">
		<a href="/rutas/{{ $ruta->url }}">
			<div class="box-paquete">
				<div class="figure">
					<img src="{{asset('img/'.$ruta->avatar)}}" alt="img">
					<div>
						<?php $descripcion = substr($ruta->descripcion, 0, 100);?>
						<p>{{ $descripcion }}...</p>
					</div>
				</div>
				<div class="content-paquete">
					<h3><i class="fa fa-chevron-right"></i> {{ $ruta->nombre }}</h3>
					<div class="row">
						<div class="col-xs-8">
							<p><i class="fa fa-clock-o"></i> {{ $ruta->tiempo }}</p>
							<p><i class="fa fa-map-marker"></i> {{ $ruta->departamento }}</p>
						</div>
						<div class="col-xs-4"><p><span>S/{{ $ruta->precio }}</span></p></div>
					</div>
					<?php $n=0;?>
					@foreach($ruta->rutas_atractivos as $atractivo)						
						@foreach($atractivos as $atr)
							@if($n >= 2)
								@break
							@endif
							@if($atr->id == $atractivo->idAtractivos)
								<span>{{$atr->nombre}}</span>
								<?php $n++;?>
							@endif
						@endforeach
					@endforeach
					<span>Más</span>
				</div>
			</div>
		</a>
	</div>
@endforeach