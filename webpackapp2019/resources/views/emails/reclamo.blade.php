<html>
<head></head>
<body>
@if($idioma == 'es')
<h2>Web Pausa - Libro de reclamo</h2>
<p>Nombres: {{$nombres}}</p>
<p>Email: {{$email}}</p>
<p>Mensaje: {{$mensaje}}</p>
<p>Teléfono: {{$telefono}}</p>
@else
<h2>Web Pausa - Claim Book</h2>
<p>Name: {{$nombres}}</p>
<p>Email: {{$email}}</p>
<p>Message: {{$mensaje}}</p>
<p>Telephone: {{$telefono}}</p>
@endif
</body>
</html>
