@extends('layouts.master_admin')

@section('titulo','Usuario-'.$us->apellido.' '.$us->nombre)

@section('menu_faltas','active')

@section('content')
	<h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Información de Comensal</span>
    </h2>

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1 ">
			<div class="row well fondo">
				<div class="col-xs-12 col-sm-4">
					<a href="{{asset($us->getImagen())}}" data-lightbox="roadtrip">
						<img class="img-thumbnail center-block" src="{{asset($us->getImagen())}}" alt="Foto de perfil">
					</a>
					<hr class="border-bottom">
				</div>
				<div class="col-xs-12 col-sm-8 listar_datos todo_espacio">
					<ul class="block lista_sin_estilo  todo_espacio">
					<div class="titulo">Datos personales:</div>
					@foreach($us->mostrarMisDatos() as $key => $value)
						<li><p><span>{{$key}}:</span> {{$value}}</p></li>
					@endforeach
					</ul>
					<hr>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-4 ">
			<div class="well fondo">
				<ul class="listar_datos">
					<div class="titulo">Anotado a:</div>
					@forelse($us->estadosSemanal()->diasAnotado() as $key => $value)
							<li>{{$key}}</li>
					@empty()
						<div class="alert alert-info">No esta anotado...</div>
					@endforelse
				</ul>
				<br>
				<hr>
				<ul class="listar_datos">
					<div class="titulo">Faltas de este mes:</div>
						@forelse($us->obtenerFaltasMesActual() as $key => $value)
							<li>{{$value->getFecha()}}</li>
						@empty()
							<div class="alert alert-info">No posee faltas...</div>
						@endforelse
				</ul>
				<br>
				<hr>
			</div>
		</div>
	</div>

	<h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Operaciones</span>
    </h2>

	<div class="row">
		 <div class="col-md-4 ">
		 	<h3>Resturar Contraseña</h3>
			<p>Al restaurarla este comensal quedara con la contraseña por defecto que es "1" </p>
			<a data-toggle="modal" data-target="#myModal" class = 'btn btn-primary delete' data-link = "/user/{{$user->id}}/passwordResetMsg" >Restaurar Contraseña</i></a>
		 </div>

		 <div class="col-md-4">
			 <h3>Editar Datos</h3>
			 <p>Como administrador solo puede modificar el apellido, nombre, legajo, tipo de usuario y estado. Los demas datos los debe modificar el comensal</p>

			 <button data-toggle="modal" data-target="#myModal" class = 'edit btn btn-success'  data-link = '/user/{{$us->id}}/edit'>Editar</i></button>
		 	
		 </div>

		 <div class="col-md-4">
		 	<h3>Eliminar Comensal</h3>
		 	<p>Recuerde que al eliminar este comensal, tambien estara borrando todos sus datos(faltas,estados, anuncios,etc)...</p>
		 	<a data-toggle="modal" data-target="#myModal" class = 'btn btn-danger delete' data-link = "/user/{{$user->id}}/deleteMsg" >Eliminar</i></a>
		 </div>
	</div>

@endsection()