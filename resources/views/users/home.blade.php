@extends('layouts.master_user')

@section('content')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8">
			<h2>Comensal</h2>
			<div style=" float: left; margin-right: 20px; ">
				<img class="img-thumbnail" src="{{asset('img/login2.png')}}" alt="">
			</div>
			<div>
				<ul>
					Comensal
					<li>Larrea Lucas</li>
					Correo
					<li>Liquiitas@gmail.com</li>
					Telefono:
					<li>3754-460270</li>
				</ul>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-4">
			<h5>Datos</h5>
			<hr>
			Anotado a:
			<ul>
				<li>Lunes</li>
				<li>Martes</li>
				<li>Jueves</li>
			</ul>
			<hr>
			Faltas de este mes:
			<ul>
				<li> 1 - 21/10/2016</li>
				<li> 2 - 25/10/2016</li>
				<li> 3 -  29/10/2016</li>
			</ul>
		</div>
	</div>

		<h2>Hola {{$user->nombre}}  {{$user->apellido}}</h2>
		

		<h3>Datos del usuario</h3>
		<div class="alert alert-success">
			@foreach($user->mostrarMisDatos()  as $key => $value)
				<li> {{$key}} : {{$value}}</li>
			@endforeach
		</div>


@endsection
