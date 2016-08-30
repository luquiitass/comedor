<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Anuncio</title>
</head>
<body>
	<h2>Nuevo Anuncio</h2>

	<p>Asunto: <strong>{{$anuncio->titulo}}</strong></p>
	<p>{{$anuncio->cuerpo}}</p>
	<p>por: <strong>{{$anuncio->user->apellido}} {{$anuncio->user->nombre}}</strong></p>
	
</body>
</html>