@foreach($menurutas as $menuruta)
	{{-- <a href="{{$language}}/rutas/{{ $menuruta->url }}"> --}}
	<a href="{{asset($language . '/rutas/' . $menuruta->url)}}">
  	<p>
		<img height="20" class="paquete-icon" src="{{asset('img/icons/location-icon.png')}}" alt="location">
		<label>{{ $menuruta->nombre }}</label>
	</p>
  	<p>{{ $menuruta->subtitulo}}</p>
  	<p>{{ $menuruta->departamento }}</p>
	</a>
@endforeach