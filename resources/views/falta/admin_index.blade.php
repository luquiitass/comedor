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
	<h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Faltas por usuario</span>
    </h2>
    <div class="row well fondo_admin">
    	<div class="col-xs-12 col-md-2">
    		<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#tabs_faltas_mes" data-toggle="tab">Mes Actual</a></li>
			  <li ><a href="#tabs_faltas_año" data-toggle="tab">Por año</a></li>
			</ul>
    	</div>
    	<div class="col-xs-12 col-md-10">
    		<div class="tab-content">
				<div id="tabs_faltas_mes" class="tab-pane fade in active">
					<table id="faltas_año" class="table table-hover">
						<tr class="encabezado">
							<th>Apellido</th>
							<th>Nombre</th>
							<th data-el-fila="1">Legajo</th>
							<th data-el-fila="1">Cantidad</th>
							<th>Operaciones</th>
						</tr>
						@foreach($users as $us)
							<tr class="mostrar faltas">
								<td>{{$us->apellido}}</td>
								<td>{{$us->nombre}}</td>
								<td data-el-fila="1">{{$us->legajo}}</td>
								<?php $faltas= $us->obtenerFaltasMesActual()?>
								<td data-el-fila="1">{{$faltas->count()}}</td>
								<td>
									<ul class="list-grop">
										<li class=" list-group-item">
											@if($faltas->count() > 0)
												Ver Faltas 
												<ul class="list-group ul_hidden" hidden="true">
													@foreach($faltas as $falta)
														<li class="list-group-item">
															{{$falta->getFecha()}}
														</li>
													@endforeach
												</ul>
											@else
												Sin Faltas
											@endif

										</li>
									</ul>
								</td>	
							</tr>
						@endforeach
					</table>
					
				</div>
				<div id="tabs_faltas_año" class="tab-pane">
					<table id="faltas_año" class="table table-hover">
						<tr>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Legajo</th>
							<th>Cantidad</th>
							<th>Operaciones</th>
						</tr>
						@foreach($users as $us)
							<tr class="mostrar faltas">
								<td>{{$us->apellido}}</td>
								<td>{{$us->nombre}}</td>
								<td>{{$us->legajo}}</td>
								<td>{{$us->cantFaltas}}</td>
								<td>
									<ul class=" list-grop">
										<li class=" list-group-item">
											<?php $meses= $us->obtenerFaltasPorMes()?>
											@if($meses->count() > 0)
												Ver Faltas por mes
												<ul class="list-group ul_hidden" hidden="true">
													@foreach($meses as $nombreMes => $mes)
														<li class="list-group-item">
															<span class="badge">{{$mes->count()}}</span>
															{{$nombreMes}}
															<ul>
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
												Sin Faltas
											@endif

										</li>
									</ul>
								</td>	
							</tr>
						@endforeach
					</table>
				</div>
			</div>
	   	</div>
	</div>

@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
		$(function(){
		$('.faltas').click(function() {
		    $(this).find('.ul_hidden').slideToggle();
		});

	});
	</script>
@endsection