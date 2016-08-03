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
									<kbd class="center">Dia Actual</kbd>
								@endif
								<span class="badge pull-right">{{$users->where($dia,'1')->count()}}</span>
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
					
					<?php $faltas = $faltas->keyBy('user_id')->toArray();?>
					@foreach($dias as $dia)
						<div id="tab_{{$dia}}" class="tab-pane {{($diaActual==$dia)?'fade in active':''}}">
							<h3>Anotados a  {{ucwords($dia)}}</h3>
							<hr>
							<table class="table table-striped">
								<tr>
									<th>Apellido</th>
									<th>Nombre</th>
									<th>Legajo</th>
									@if($sePuedePonerFaltas && $dia == $diaActual)
									<th>Estado</th>
									@endif
									<th>Operaciones</th>
								</tr>
								{{Form::open(array('url'=>'/falta/setFaltas','class'=>'form','id'=> 'form_faltas'))}}
								@foreach($users as $us)
									@if($us->isAnotado($dia))
										<tr>
											<td>{{$us->apellido}}</td>
											<td>{{$us->nombre}}</td>
											<td>{{$us->legajo}}</td>
											
												@if($sePuedePonerFaltas && $dia == $diaActual)
													
													{{Form::hidden("users[$us->user_id]",$us->user_id)}}
													<?php 
														$falta = array_get($faltas,$us->user_id);
														$ausente= array_has($faltas,$us->user_id);
													?>
													<td><p class="label label-{{$ausente?'danger':'success'}}">{{$ausente?'Ausente':'Precente'}}</p></td>																
													<td>{{Form::checkbox("user_id",$us->user_id, !$ausente)}}</td

												@else
													<td>sin operaciones</td>
												@endif
											</td>
										</tr>
									@endif
								@endforeach
								<tr>
									<td colspan="9">
										{{Form::token()}}
										{{Form::close()}}
										<button class="btn btn-primary colocarFaltas pull-right" data-link="{{ csrf_token() }}" >Modificar Asistencias</button>
									</td>
								</tr>				
							</table>
						</div>
					@endforeach
				</div>		
			</div>
		</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(function()
		{
			$(document).on('click','.colocarFaltas',function(){
				colocarFaltas($(this).data('link'));
			})
			
		});

		function colocarFaltas(token){
				var users=new Array();
				users.push({'name':'_token','value':token});

				$('input[type=checkbox]').each(function () {

					users.push({'name':$(this).val(),'value':this.checked});  				
				});

				$.ajax({
					type:'POST',
					url:'/falta/setFaltas',
					data:users,
					success:function(response){
						if (isJson(response)){
							var json = $.parseJSON(response);
							if (json.mensaje){
								alert(json.mensaje);
							}
							if (json.location) 
							{
								window.location=json.location;
							}
						}
					}
				});

				console.log(users);
				return false;
		}

	</script>

@endsection