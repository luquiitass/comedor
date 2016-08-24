@extends('layouts.master_admin')

@section('titulo','Usuario-'.$us->apellido.' '.$us->nombre)


@section('content')
	<div class="container">
		@include('botones.atras')
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
				</div>
			</div>
		</div>

		<h2 class="Heading--Fancy">
	        <span class="Heading--Fancy__subtitle"></span>
	        <span>Faltas</span>
	    </h2>

		<div class="row well fondo_admin">
	    	<div class="col-xs-12 col-md-6">
	    		<h3>Faltas de este Mes</h3>
	    		<hr>
					<?php $faltas= $us->obtenerFaltasMesActual()?>
					<ul class="">
						<li class="lista_sin_estilo">
							@if($faltas->count() > 0)
								<ol class="">
									@foreach($faltas as $falta)
										<li class="">
											{{$falta->getFecha()}}
										</li>
									@endforeach
								</ol>
							@else
							<div class="alert alert-success">
								No posee este mes
							</div>
							@endif

						</li>
					</ul>
	    	</div>
	    	<div class="col-xs-12 col-md-6">
	    		<h3>Faltas de todo el Año</h3>
	    		<hr>
		    	<?php $meses= $us->obtenerFaltasPorMes()?>
				@if($meses->count() > 0)
					<ul class="" >
						@foreach($meses as $nombreMes => $mes)
							<h3>@choice('mensajes.mes',$nombreMes)</h3>
							<li class="">
								<ol>
								@foreach($mes as $falta)
									<li>
										 {{ $falta->getFecha()}}
									</li>
								@endforeach
								</ol>
							</li>
							<hr>
						@endforeach
					</ul>
				@else
				<div class="alert alert-success">
					No posee faltas en todo el año
				</div>
				@endif
	    	</div>
	    </div>
	</div>

	<div class="container">
		
		<h2 class="Heading--Fancy">
	        <span class="Heading--Fancy__subtitle"></span>
	        <span>Operaciones</span>
	    </h2>

		<div class="row">
			 <div class="col-md-4 ">
			 	<h3>Resturar Contraseña</h3>
				<a data-toggle="modal" data-target="#myModal" class = 'btn btn-primary delete btn-block' data-link = "/user/{{$us->id}}/passwordResetMsg" >Restaurar Contraseña</i></a>
				<p>Al restaurarla este comensal quedara con la contraseña por defecto que es "1" </p>
			 </div>

			 <div class="col-md-4" style=" border-left: 1px solid #BFBFBF; border-right: 1px solid #BFBFBF; ">
				 <h3>Editar Datos</h3>
				 <button data-toggle="modal" data-target="#myModal" class = 'edit btn btn-success btn-block'  data-link = '/user/{{$us->id}}/edit'>Editar</i></button>
				 <p>Como administrador solo puede modificar el apellido, nombre, legajo, tipo de usuario y estado. Los demas datos los debe modificar el comensal</p>

			 	
			 </div>

			 <div class="col-md-4">
			 	<h3>Eliminar Comensal</h3>
			 	<a data-toggle="modal" data-target="#myModal" class = 'btn btn-danger delete btn-block' data-link = "/user/{{$us->id}}/deleteMsg" >Eliminar</i></a>
			 	<p>Recuerde que al eliminar este comensal, tambien estara borrando todos sus datos(faltas,estados, anuncios,etc)...</p>
			 </div>
		</div>
		<br>
	</div>

@endsection()