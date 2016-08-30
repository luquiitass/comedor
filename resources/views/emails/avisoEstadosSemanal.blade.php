<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Avisos</title>
</head>
<body>
	<h1>Comedor Apóstoles</h1>

	<p>Hola <strong>{{$user->nombre}}</strong> te recordamos los días a los que te encuentras anotado</p>
	
	<ol>
		Días:

		@forelse($user->estadosSemanal->diasAnotado() as $dia => $estado)
			<li>{{$dia}}</li>
		@empty
			<li>no esta anotado a ningún día</li>
		@endforelse
	</ol>

	<p>Recuerda que puedes modificar los estados desde la pagina </p>
	<a href="comeapos.esy.es/ver_estados">Modificar estados</a>
	
</body>
</html>