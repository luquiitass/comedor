
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
					<table id="datata_todos" class="table table-hover datatable" data-link="{{route('dt_getUsers')}}" width="100%">
						<thead>
							<tr>
								<th class="col_table" data-name="apellido" data-searchable="true">Apellido</th>
								<th class="col_table" data-name="nombre" data-searchable="true">Nombre</th>
								<th class="col_table" data-name="legajo" data-searchable="true">Legajo</th>
								<th class="col_table" data-name="estado" data-searchable="false">Estado</th>
								<th class="col_table" data-name="operaciones" data-searchable="false" style="text-align: center;" >Operaciones</th>
							</tr>
						</thead>
					</table>
				</div>


				<!-- Panel para Listar a los usuarios Activos  con la posibilidad de verlos y desactivarlos-->
				@foreach($estados as $estado)
				
					<div  class="tab-pane {{($estado->nombre == 'activoa')?'fade in active':''}}" id="tab_{{$estado->nombre}}">
					<h3>Comensales {{$estado->nombre}}s</h3>
					<table  id="datatable_{{$estado->nombre}}" class="table datatable" width="100%" data-link="{{route('dt_getUsers_'.$estado->nombre)}}">
						<thead>
							<tr>
								<th class="col_table" data-name="apellido" data-searchable="true">Apellido</th>
								<th class="col_table" data-name="nombre" data-searchable="true">Nombre</th>
								<th class="col_table" data-name="legajo" data-searchable="true">Legajo</th>
								<th class="col_table" data-name="operaciones" data-searchable="false" style="text-align: center;" >Operaciones</th>
							</tr>
						</thead>
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
	cargarTablas();
    </script>
@endsection
