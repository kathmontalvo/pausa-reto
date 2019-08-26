<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5"></head>
<body>
@if( $idioma == "es")
<h2>Web Pausa - Alerta Nueva Reserva</h2>
<p>Nueva solicitud de reserva. El usuario espera nuestra confirmaci車n para que proceda con el pago.</p>
<p>Nombres: {{$nombres}} {{ $apellidos}}</p>
<p>DNI: {{$dni}}</p>
<p>Email: {{$email}}</p>
<p>Celular: {{$celular}}</p>
<p>Comentario: {{$comentario}}</p>
<p>Ruta: {{$ruta}} - {{$departamento}}</p>
<p>Cantidad: {{$personas}} personas</p>
<p>Fecha Inicio: {{$fecha}} </p>
<p>Fecha Fin: {{$fecha_salida}} </p>
<p>Precio: S/ {{$total}} </p>
@else
<h2>Web Pausa - New Reserve Alert</h2>
<p>New reservation request The user waits for our confirmation to proceed with the payment.</p>
<p>Name: {{$nombres}} {{ $apellidos}}</p>
<p>Identification card: {{$dni}}</p>
<p>Email: {{$email}}</p>
<p>Phone: {{$celular}}</p>
<p>Comment: {{$comentario}}</p>
<p>Route: {{$ruta}} - {{$departamento}}</p>
<p>Quantity: {{$personas}} people</p>
<p>Start date: {{$fecha}} </p>
<p>End date: {{$fecha_salida}} </p>
<p>Price: $ {{$total}} </p>
@endif
</body>
</html>
