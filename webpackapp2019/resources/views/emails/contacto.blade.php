<html>
<head></head>
<body>
@if($idioma == 'es')
<h2>Web Pausa - Contacto</h2>
<p>Nombres: {{$nombres}}</p>
<p>Email: {{$email}}</p>
<p>Mes aproximado de viaje: {{$mes}}</p>
<p>Mensaje: {{$mensaje}}</p>
<p>Pagina: {{$pagina}}</p>
@else
<h2>Web Pausa - Contact</h2>
<p>Name: {{$nombres}}</p>
<p>Email: {{$email}}</p>
<p>Approximate month of travel: {{$mes}}</p>
<p>Message: {{$mensaje}}</p>
<p>Page: {{$pagina}}</p>
@endif
</body>
</html>
