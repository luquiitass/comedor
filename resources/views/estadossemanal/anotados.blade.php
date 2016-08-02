@extends('layouts.master_admin')

@section('content')
    <h2>Anotadso</h2>
 	<div class="">
		<div class="row">
			<div class="col-xs-12 col-sm-3">
				<ul class="nav nav-pills nav-stacked" >
					<li class="{{(($diaActual=='sabado')||($diaActual=='domingo'))?'active':''}}" ><a href="#tab_anotados_por_dia" data-toggle="tab">Anotados Por Dia</a></li>
					@foreach($dias as $dia)
						<li class="{{($diaActual==$dia)?'active ':''}}" >
							<a  data-toggle="tab"  href="#tab_{{$dia}}">{{ucwords($dia)}}
								@if($diaActual==$dia)
									<kbd class="pull-right">Dia Actual</kbd>
								@endif
							</a>
						</li>
					@endforeach
				</ul>
			</div>


			<div class="col-xs-12 col-sm-9">
				<div class="tab-content">

					<div id="tab_anotados_por_dia" class="tab-pane {{(($diaActual=='sabado')||($diaActual=='domingo'))?'fade in active':''}}">
						<h3>Anuncios Visibles</h3>
						<hr>
					</div>

					@foreach($dias as $dia)
						<div id="tab_{{$dia}}" class="tab-pane {{($diaActual==$dia)?'fade in active':''}}">
							<h3>Anotados a  {{ucwords($dia)}}</h3>
							<hr>
							<table class="table table-striped">
								<tr>
									<th>Apellido</th>
									<th>Nombre</th>
									<th>Legajo</th>
									<th>Operaciones</th>
								</tr>
								@foreach($users as $us)
									@if($us->isAnotado($dia))
										<tr>
											<td>{{$us->apellido}}</td>
											<td>{{$us->nombre}}</td>
											<td>{{$us->legajo}}</td>
											<td>
												@if($sePuedePonerFaltas)
													{{Form::open(array('class'=>'form'))}}
														{{Form::hidden('user_id',$us->user_id)}}
														<?php $falta = $faltas->where('user_id',$us->user_id)->first(); ?>

													@if($falta->count()>0)
														<label>Ausente</label>
														{{Form::hidden('falta_id',$falta->falta_id)}}
													@else
														<label>Precente</label>
														{{Form::hidden('user_id',$falta->user_id)}}
													@endif
														{{Form::token()}}
														{{Form::submit('Cambiar',array('class'=>'btn btn-primary'))}}
													{{Form::close()}}
												@else
													sin operaciones
												@endif
											</td>
										</tr>
									@endif
								@endforeach
							</table>
						</div>
					@endforeach
				</div>		
			</div>
		</div>
	</div>

@endsection