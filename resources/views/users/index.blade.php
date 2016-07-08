@extends('layouts.master')

@section('titulo')
	Usuarios
@endsection

@section('content')
	<h2>Usuarios</h2>
	
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<ul class="nav nav-pills nav-stacked" >
				<li class="active" ><a href="#tab_todos" data-toggle="tab">Todos</a></li>
				@foreach($estados as $estado)
					<li><a  data-toggle="tab"  href="#tab_{{$estado->nombre}}">{{ucwords($estado->nombre)}}s</a></li>
				@endforeach
				{{--<li><a  data-toggle="tab"  href="#tab_activos"  >Activos</a></li> 
				<li><a  data-toggle="tab"  href="#tab_inactivos"  >Inactivos</a></li>
				<li><a  data-toggle="tab"  href="#tab_solicitudes"  >Solicitudes de incripcion </a></li> --}}
				<li><a  data-toggle="tab" href="#tab_registrar_comensal"  >Registrar Comensal</a></li>
			</ul>
		</div>


		<div class="col-xs-12 col-sm-9">
			<div class="tab-content">

				<!--Panel lista todos los usuarios (Activos e Inactivos)  -->
				<div id="tab_todos" class="tab-pane fade in active">
					<h3>Todos los Comensales</h3>
					<table class="table" width="100%">
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
								<button class="btn btn-info" onclick='verUsuario({{json_encode($us)}})'>Ver</button>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>


				<!-- Panel para Listar a los usuarios Activos  con la posibilidad de verlos y desactivarlos-->
				@foreach($estados as $estado)
				
					<div  class="tab-pane" id="tab_{{$estado->nombre}}">
					<h3>Comensales {{$estado->nombre}}s</h3>
					<table class="table" width="100%">
						<tr>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Legajo</th>
							<th style="text-align: center;" >Operaciones</th>
						</tr>
						@foreach($users as $us)
							@if($us->estado == $estado->nombre)
								<tr>
									<td> {{ $us->apellido }}</td>
									<td> {{ $us->nombre }}</td>
									<td> {{ $us->legajo }}</td>
									<td align="center">
										<button class="btn btn-info" onclick='verUsuario({{json_encode($us)}})'>Ver</button>
										
										<div class="btn-group">
										  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   Action <span class="caret"></span>
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
										  </ul>
										  </div>
										
								</tr>
							@endif
						@endforeach
					</table>
					</div>

				@endforeach

				
				<!--Panel pare registrar a un usuario  -->
				<div class="tab-pane" id="tab_registrar_comensal" >
					<h3>Registrar Comensal</h3>
					<br>
					<div style="width: 80%;">
					<form id="form_registarComensal" onsubmit="return false">
						<div class="row">
							<div class="col-xs-6">
							  <!--<div class="form-group">
							    <label for="nombre_usuario">Nombre de usuario*</label>
							    <input type="text" class="form-control" id="nombre_de_usuario" name="nombre_de_usuario" placeholder="Nombre de usuario">
							  </div>-->
							  <div class="form-group">
							    <label for="nombre">Nombre*</label>
							    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
							  </div>
							  <div class="form-group">
							    <label for="apellido">Apellido*</label>
							    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
							  </div>
							  <!--<div class="form-group">
								    <label for="password">Contraseña*</label>
								    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
								  </div>
								  <div class="form-group">
								    <label for="confirm_password">Confirmar Contraseña</label>
								    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contraseña">
								  </div>-->	
							</div>
							<div class="col-xs-6">
								  <div class="form-group">
								    <label for="dni">DNI*</label>
								    <input type="text" class="form-control" id="dni" name="dni" placeholder="00.000.000">
								  </div>
								  <div class="form-group">
								    <label for="telefono">Telefono</label>
								    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="(3754) 460270">
								  </div>
								  <div class="form-group">
								    <label for="legajo">Legajo*</label>
								    <input type="text" class="form-control" id="legajo" name="legajo" placeholder="LS00XXX">
								  </div>
								  <div class="form-group">
							    <label for="email">Correo Electronico*</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Ejemplo@gmail.co">
							  </div>
								  							
							</div>
						</div>
						  <button id="btn_registrarComensal" class="btn btn-primary pull-right"  class="btn btn-default">Registrar</button>

						  <div id="mensaje"></div>
					</form>
				</div>
				</div>

			</div>		
		</div>
	</div>


	<div id="myModal" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="gridSystemModalLabel">Datos de Usuario</h4>
		      </div>
	      <div id="modal-contenido" style=" padding: 20px; ">
	      </div>
	    </div>
	  </div>
	</div>
	

@endsection