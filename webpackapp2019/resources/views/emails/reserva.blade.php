<html>
<head></head>
<body>
@if( $idioma == "es")
<h2>Web Pausa - Reserva</h2>
<p>Se ha realizado el pago de la siguiente reserva:</p>
<p>Nombres: {{$nombres}} {{ $apellidos}}</p>
<p>DNI: {{$dni}}</p>
<p>Email: {{$email}}</p>
<p>Ruta: {{$ruta}} - {{$depa}}</p>
<p>Cantidad: {{$personas}} personas</p>
<p>Fecha: {{$fecha}} </p>
<p>Precio: S/ {{$precio}} </p>
@else
<h2>Web Pausa - Reserve</h2>
<p>Payment of the next reservation has been made.</p>
<p>Name: {{$nombres}} {{ $apellidos}}</p>
<p>Identification card: {{$dni}}</p>
<p>Email: {{$email}}</p>
<p>Route: {{$ruta}} - {{$depa}}</p>
<p>Quantity: {{$personas}} people</p>
<p>Start date: {{$fecha}} </p>
<p>End date: {{$fecha_salida}} </p>
<p>Price: $ {{$total}} </p>
@endif
</body>
</html>
