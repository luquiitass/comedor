
@extends('layouts.master_admin')

@section('titulo')
	Usuarios
@endsection

@section('content')
	<h2>Usuarios</h2>
	
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<ul class="nav nav-pills nav-stacked" >
				@foreach($estados as $estado)
					<li class="{{($estado->nombre == 'activo')?'active':''}}"><a  data-toggle="tab"  href="#tab_{{$estado->nombre}}">{{ucwords($estado->nombre)}}s</a></li>
				@endforeach
				<li><a href="#tab_todos" data-toggle="tab">Todos</a></li>
				{{--<li><a  data-toggle="tab"  href="#tab_activos"  >Activos</a></li> 
				<li><a  data-toggle="tab"  href="#tab_inactivos"  >Inactivos</a></li>
				<li><a  data-toggle="tab"  href="#tab_solicitudes"  >Solicitudes de incripcion </a></li> --}}
				<li><a  data-toggle="tab" href="#tab_registrar_comensal"  >Registrar Comensal</a></li>
			</ul>
		</div>


		<div class="col-xs-12 col-sm-9">
			<div class="tab-content">

				<!--Panel lista todos los usuarios (Activos e Inactivos)  -->
				<div id="tab_todos" class="tab-pane">
					<h3>Todos los Comensales</h3>
					<table id="datata" class="table" width="100%">
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
				
					<div  class="tab-pane {{($estado->nombre == 'activo')?'fade in active':''}}" id="tab_{{$estado->nombre}}">
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
										<a data-toggle="modal" data-target="#myModal" class = 'btn btn-info display' data-link = "/user/{{$us->id}}" ><i class = 'material-icons'>Ver</i></a>

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

												 <a data-toggle="modal" data-target="#myModal" class = 'btn btn-danger form-control delete' data-link = "/user/{{$us->id}}/deleteMsg" ><i class = 'material-icons'>Eliminar</i></a>
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
					{{Form::open(array('class'=> 'form','method'=>'get'))}}
						@include('forms.form_admin_user_create')
					{{Form::close()}}
				</div>
				</div>

			</div>		
		</div>
	</div>


	<div id="mModal" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="gridSystemModalLabel">Datos personales</h4>
		      </div>
	      <div id="modal-contenido" style=" padding: 20px; ">
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class = 'AjaxisModal'>
        </div>
    </div>
	

@endsection


@section('scripts')
    <script type="text/javascript">
        $(function(){
            
            $('.form').formPostJson();
        });
    </script>
@endsection
