
@extends('layouts.master_admin')

@section('titulo')
	Usuarios
@endsection

@section('content')
	<h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Usuarios</span>
    </h2>
	
	<div class="row well fondo_admin">
		<div class="col-xs-12 col-sm-3">
		<div id="tabs">
			<ul class="nav nav-pills nav-stacked" >
				@foreach($estados as $estado)
					<li class="{{($estado->nombre == 'activoa')?'active':''}}"><a  data-toggle="tab"  href="#tab_{{$estado->nombre}}">{{ucwords($estado->nombre)}}s</a></li>
				@endforeach
				<li><a href="#tab_todos" data-toggle="tab">Todos</a></li>
				{{--<li><a  data-toggle="tab"  href="#tab_activos"  >Activos</a></li> 
				<li><a  data-toggle="tab"  href="#tab_inactivos"  >Inactivos</a></li>
				<li><a  data-toggle="tab"  href="#tab_solicitudes"  >Solicitudes de incripcion </a></li> --}}
				<li><a  data-toggle="tab" href="#tab_registrar_comensal"  >Registrar Comensal</a></li>
			</ul>
		</div>
		</div>


		<div class="col-xs-12 col-sm-9">
			<div class="tab-content">

				<!--Panel lista todos los usuarios (Activos e Inactivos)  -->
				<div id="tab_todos" class="tab-pane">
					<h3>Todos los Comensales</h3>
					<table id="datata" class="table table-hover" width="100%">
						<tr>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Legajo</th>
							<td>Estado</td>
							<th style="text-align: center;" >Operaciones</th>
						</tr>
						<?php foreach ($users as $key =>$us):?>
						<tr>

							<td> {{ $us->apellido }}</td>
							<td> {{ $us->nombre }}</td>
							<td> {{ $us->legajo }}</td>
							<td>{{$us->estado}}</td>
							<td align="center">

								<a data-toggle="modal" data-target="#myModal" class = 'btn btn-info display' data-link = "/user/{{$us->id}}" ><i class = 'material-icons'>Ver</i></a>
								
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>


				<!-- Panel para Listar a los usuarios Activos  con la posibilidad de verlos y desactivarlos-->
				@foreach($estados as $estado)
				
					<div  class="tab-pane {{($estado->nombre == 'activoa')?'fade in active':''}}" id="tab_{{$estado->nombre}}">
					<h3>Comensales {{$estado->nombre}}s</h3>
					<table class="table" width="100%">
						<tr>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Legajo</th>
							<th style="text-align: center;" >Operaciones</th>
						</tr>
						@forelse($users as $us)
							@if($us->estado == $estado->nombre)
								<tr>
									<td> {{ $us->apellido }}</td>
									<td> {{ $us->nombre }}</td>
									<td> {{ $us->legajo }}</td>
									<td align="center">
										<a data-toggle="modal" data-target="#myModal" class = 'btn btn-info display btn-xs' data-link = "/user/{{$us->id}}" ><i class = 'material-icons'>Ver</i></a>

										<a data-toggle="modal" data-target="#myModal" class = 'btn btn-danger btn-xs delete' data-link = "/user/{{$us->id}}/deleteMsg" ><i class = 'material-icons'>Eliminar</i></a>

										<button data-toggle="modal" data-target="#myModal" class = 'edit btn btn-success btn-xs'  data-link = '/user/{{$us->id}}/edit'><i class = 'material-icons'>Editar</i></button>

										<div class="btn-group">
										  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Operaciones <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu">
												@foreach($estados as $unEst)
												<li>
												@if($unEst->nombre != $us->estado)
													{{Form::open(array('url'=>'/user/modificarEstadoUsuario'))}}
														{{Form::hidden('estado',$unEst->id)}}
														{{Form::hidden('id',$us->id)}}
														{{Form::token()}}
														{{Form::submit('cambiar a '.$unEst->nombre,array('class'=> 'btn btn-primary form-control'))}}
													{{Form::close()}}
												@endif
												</li>
												<li role="separator" class="divider"></li>
											@endforeach
												<li>
													{{Form::open(array('clas'=>''))}}
														{{Form::hidden('estado',$unEst->id)}}
														{{Form::hidden('id',$us->id)}}
														{{Form::token()}}
														{{Form::button('Restaurar contraseña',array('class'=> 'btn btn-primary form-control saveForm','data-link'=>'/user/resetPasword'))}}
													{{Form::close()}}
													
												</li>
										  </ul>
										  </div>
										
								</tr>
							@endif
						@empty
							<div class="info">Sin usuarios {{$estado->nombre}}</div>
						@endforelse
					</table>
					</div>

				@endforeach

				
				<!--Panel pare registrar a un usuario  -->
				<div class="tab-pane" id="tab_registrar_comensal" >
					<h3>Registrar Comensal</h3>
					<br>
					<div style="width: 80%;">
						{{Form::open(array('url'=> 'user/store'))}}
							@include('forms.form_admin_user_create')
						{{Form::close()}}
					</div>
				</div>
			</div>		
		</div>
	</div>

@endsection


@section('scripts')
    <script type="text/javascript">
    @if($errors->count()>0)
    	$('a[href="#tab_registrar_comensal"]').parent('li').addClass('active');
		$('#tab_registrar_comensal').addClass('fade in active');
	@else
		$('a[href="#tab_activo"]').parent('li').addClass('active');
		$('#tab_activo').addClass('fade in active');
	@endif
    </script>
@endsection
