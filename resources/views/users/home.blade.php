@extends('layouts.master_user')

@section('content')

	<h2>Hola {{$user->nombre}}  {{$user->apellido}}</h2>
	

	<h3>Datos del usuario</h3>
	<div class="alert alert-success">
		@foreach($user->mostrarMisDatos()  as $key => $value)
			<li> {{$key}} : {{$value}}</li>
		@endforeach
	</div>
	
@endsection