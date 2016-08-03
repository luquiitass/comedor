@extends('layouts.master_user')

@section('content')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1">
			<div class="well row">
				<div class="col-xs-12 col-sm-4">
					<img class="img-thumbnail center-block" src="{{asset(public_path().'img/login2.png')}}" alt="Foto de perfil">
				</div>

				<div class="col-xs-12 col-sm-8 todo_espacio">
					<ul class="block lista_sin_estilo todo_espacio">
					@foreach($user->mostrarMisDatos() as $key => $value)
						<li><p><span>{{$key}}:</span> {{$value}}</p></li>
					@endforeach
					</ul>
					{{link_to_route('user_edit','Modificar Datos',null,array('class'=>'btn list-group-item'))}}
					<hr>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-4 ">
			<div class="well">
				<ul class="listar_datos">
					Anotado a:
					@forelse($estadosSemanal as $key => $value)
							<li>{{$key}}</li>
					@empty()
						<div class="alert alert-info">No esta anotado...</div>
					@endforelse
					<li>
						{{link_to_route('user_estados','Ver Estados',null,array('class'=>'btn list-group-item'))}}
					</li>
				</ul>
				<hr>
				<ul class="listar_datos">
					Faltas de este mes
					<li> 1 - 21/10/2016</li>
					<li> 2 - 25/10/2016</li>
					<li> 3 - 29/10/2016</li>
					<li>
						{{link_to_route('user_faltas','Ver Faltas',null,array('class'=>'btn list-group-item'))}}
					</li>
				</ul>
			</div>
		</div>
	</div>

@endsection
