<header>
	<div class="container">
		<div class="navbar yamm">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a href="{{route('inicio')}}" class="navbar-brand"><img src="{{asset('img/logo.png')}}" alt="logo"></a>
          </div>
          <div class="aliado"><img src="{{asset('img/aliado.png')}}" alt="logo"></div>
          <div id="navbar-collapse-grid" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <!-- Grid 12 Menu -->
              <!-- <li><a href="{{route('inicio')}}">Inicio</a></li>
              <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Dónde ir</a>
              </li>
              <li><a href="{{route('preguntas-frecuentes')}}">Preguntas frecuentes</a></li>
              <li><a href="https://packappdotcomtest.blog" target="_blank">blog</a></li>
              <li><a href="{{route('contacto')}}">Contáctanos</a></li> -->
              <li><span><i class="fa fa-user"></i> {!!trans('usuario.usu1')!!}, {{\Auth::user()->name}}</span></li>
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="btn btn-naranja">
                      {!!trans('usuario.usu2')!!}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </div>
        </div>
	</div>
</header>