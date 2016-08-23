@extends('layouts.master_admin')

@section('titulo','Admin')

@section('menu_admin','active')

@section('content')
	
	<div class="container">
		<div class="panel panel-primary" >
			<div class="panel-heading">
				<h1 class="panel-title">Anotados por día</h2>
			</div>
			<div class="panel-body color-claro">
				@foreach($cantAnotadosPorDia as $dia => $cant)
					<div id="pan_cant_{{$dia}}" class="cantAnotados panel
					 {{$hoy== $dia?'panel-success':''}}
					 {{$mañana==$dia?'panel-danger':'panel-primary'}}">
				        <div class="panel-heading">
				            <div class="row center">
				                <div class="col-xs-9 center">
				                    <div class="cantDia">{{$dia}}</div>
				                    <div class="huge">{{$cant}}</div>
				                </div>
				            </div>
				        </div>
				        <a href="#">
				            <div class="panel-footer">
				                <span class="pull-left">Ver Anotados</span>
				                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				                <div class="clearfix"></div>
				            </div>
				        </a>
				    </div>
				@endforeach	
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Comensales con mas de 5 faltas</div>
			</div>
			<div class="panel-body color-claro">
				@if(empty($comensalesConMasDe5Faltas))
					<div class="alert alert-danger">
						No existen comensales con mas de 5 faltas
					</div>
				@endif
			</div>
		</div-panel>
	</div>

@endsection

<style type="text/css">
	.cantAnotados{
		margin: 5px;
		width: 200px;
		float: left !important;
	}
	.cantAnotados .huge{
		font-size: 40px;
	}
	.cantAnotados .cantDia{
		font-size: 25px;
	}
	.center{
		align-items: center;
		text-align: center;
	}

	.color-claro{
		background: rgba(0, 0, 0, 0.09);
	}
</style>

@section('scripts')
	@parent
	<script type="text/javascript">
		$( document ).ready(function() {
			//$('#pan_cant_martes').addClass('panel-success');
			//$('#pan_cant_miercoles').addClass('panel-verde !important');
			//$('#pan_cant_martes').addClass('panel-success');
		});
	</script>
@endsection
