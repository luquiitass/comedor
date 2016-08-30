<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Faltas</title>
</head>
<body>
	<h1>Coemdor Apostoles</h1>
	<p>mensaje q tiene falta</p>
	<ol>
		Fltas este mes
		@foreach($user->obtenerFaltasMesActual() as $falta)
			<li>{{$falta->getFecha()}}</li>
		@endforeach
	</ol>
	<hr>
	<h3>Le recordamos que se encuentra anotado a los siguientes dias:</h3>
	<ul>
		@foreach($user->estadosSemanal->diasAnotado() as $dia => $estado)
			<li>{{$dia}}</li>
		@endforeach
	</ul>
	<a href="comeapos.esy.es/ver_estados" class="btn btn-primary"> Modificarlos</a>
	<hr>
	<strong>Buenas tarders</strong>

	
</body>
</html>