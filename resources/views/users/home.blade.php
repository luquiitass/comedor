@extends('layouts.master_user')

@section('content')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1">
			<div class="well row">
				<div class="col-xs-4">
					<img class="img-thumbnail center-block" src="{{asset('img/login2.png')}}" alt="Foto de perfil">
					<a class="btn btn-primary center-block text-center" href="#">Modificar Foto</a>
				</div>

				<div class="col-xs-8 todo_espacio">
					<ul class="block listar_datos todo_espacio">
						Comensal:
						<li>Larrea Lucas</li>
						Email:
						<li>Liquiitas@gmail.com</li>
						Legajo:
						<li>Ls00548</li>
						Teléfono:
						<li>3754-460270</li>
						Dni:
						<li>36893090</li>
					</ul>
					<a class="btn list-group-item" href="#">Modificar Datos</a>
					<hr>
					<a class="btn list-group-item" href="#">Modificar Contraseña</a>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-4 ">
			<div class="well">
				<ul class="listar_datos">
					Anotado a:
					<li>Lunes</li>
					<li>Martes</li>
					<li>Jueves</li>
					<li><a class="btn list-group-item" href="#">Ver o modificar asistencia</a></li>
				</ul>
				<hr>
				<ul class="listar_datos">
					Faltas de este mes
					<li> 1 - 21/10/2016</li>
					<li> 2 - 25/10/2016</li>
					<li> 3 - 29/10/2016</li>
					<li><a class="btn list-group-item" href="#">Ver faltas</a></li>
				</ul>
			</div>
		</div>
	</div>

@endsection
