@extends('layouts.master_user')

@section('content')

	<h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Información de Comensal</span>
    </h2>

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1 ">
			<div class="row well fondo">
				<div class="col-xs-12 col-sm-4">
					<img class="img-thumbnail center-block" src="{{asset($user->getImagen())}}" alt="Foto de perfil">
					<hr class="border-bottom">
				</div>
				<div class="col-xs-12 col-sm-8 listar_datos todo_espacio">
					<ul class="block lista_sin_estilo  todo_espacio">
					<div class="titulo">Datos personales:</div>
					@foreach($user->mostrarMisDatos() as $key => $value)
						<li><p><span>{{$key}}:</span> {{$value}}</p></li>
					@endforeach
					</ul>
					{{link_to_route('user_edit','Editar Perfil',null,array('class'=>'btn btn-primary pull-right '))}}
					<hr>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-4 ">
			<div class="well fondo">
				<ul class="listar_datos">
					<div class="titulo">Anotado a:</div>
					@forelse($estadosSemanal as $key => $value)
							<li>{{$key}}</li>
					@empty()
						<div class="alert alert-info">No esta anotado...</div>
					@endforelse
					{{link_to_route('user_estados','Ver Estados',null,array('class'=>'btn btn-primary pull-right'))}}
				</ul>
				<br>
				<hr>
				<ul class="listar_datos">
					<div class="titulo">Faltas de este mes:</div>
						@forelse($faltas as $key => $value)
							<li>{{$value->getFecha()}}</li>
						@empty()
							<div class="alert alert-info">No posee faltas...</div>
						@endforelse
					{{link_to_route('user_faltas','Ver Faltas',null,array('class'=>'btn btn-primary pull-right'))}}
				</ul>
				<br>
				<hr>
			</div>
		</div>
	</div>

@endsection
