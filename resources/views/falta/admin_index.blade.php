@extends('layouts.master_admin')

@section('styles')
<style type="text/css">
	@parent
	.tab-content{
		padding: 7px;
		background: #fff;
	}
	.list-group-item{
		background: #DFF0D8;
	}
</style>
@endsection

@section('content')
	<h2>Cantidad de faltas por usuario</h2>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#tabs_faltas_mes" data-toggle="tab">Faltas del mes Actual</a></li>
	  <li ><a href="#tabs_faltas_año" data-toggle="tab">Faltas del año</a></li>
	</ul>

	<div class="tab-content">
		<div id="tabs_faltas_mes" class="tab-pane fade in active">
		<table id="faltas_año" class="table table-bordered table-hover">
			<tr>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Legajo</th>
				<th>Cantidad</th>
				<th>Operaciones</th>
			</tr>
			@foreach($users as $us)
				<tr class="mostrar">
					<td>{{$us->apellido}}</td>
					<td>{{$us->nombre}}</td>
					<td>{{$us->legajo}}</td>
					<?php $faltas= $us->obtenerFaltasMesActual()?>
					<td>{{$faltas->count()}}</td>
					<td>
						<ul class="faltas list-grop">
							<li class=" list-group-item">
								Ver Faltas 
								<ul class="list-group" hidden="true">
								@if($faltas->count() > 0)
									@foreach($faltas as $falta)
										<li class="list-group-item">
											{{$falta->getFecha()}}
										</li>
									@endforeach
									</ul>
								@else
									<li class="alert alert-danger">Sin Faltas</li>
								@endif

							</li>
						</ul>
					</td>	
				</tr>
			@endforeach
		</table>
			
		</div>
		<div id="tabs_faltas_año" class="tab-pane">
			<table id="faltas_año" class="table table-bordered table-hover">
				<tr>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Legajo</th>
					<th>Cantidad</th>
					<th>Operaciones</th>
				</tr>
				@foreach($users as $us)
					<tr class="mostrar">
						<td>{{$us->apellido}}</td>
						<td>{{$us->nombre}}</td>
						<td>{{$us->legajo}}</td>
						<td>{{$us->cantFaltas}}</td>
						<td>
							<ul class="faltas list-grop">
								<li class=" list-group-item">
									Ver Faltas por mes
									<?php $meses= $us->obtenerFaltasPorMes()?>
									<ul class="list-group" hidden="true">
									@if($meses->count() > 0)
										@foreach($meses as $nombreMes => $mes)
											<li class="list-group-item">
												<span class="badge">{{$mes->count()}}</span>
												{{$nombreMes}}
												<ul hidden="{{$nombreMes==$mesActual?'true':'falce'}}">
												@foreach($mes as $falta)
													<li>
														{{$falta->getFecha()}}
													</li>
												@endforeach
												</ul>
											</li>
										@endforeach
										</ul>
									@else
										<li class="alert alert-danger">Sin Faltas</li>
									@endif

								</li>
							</ul>
						</td>	
					</tr>
				@endforeach
			</table>
		</div>
	</div>

@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
		$(function(){
		$('.faltas').click(function() {
		    $(this).find('ul').slideToggle();
		});

	});
	</script>
@endsection