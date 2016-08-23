@extends('layouts.master_admin')

@section('titulo','Faltas')

@section('menu_faltas','active')


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
	<div class="container">
		<h2 class="Heading--Fancy">
	        <span class="Heading--Fancy__subtitle"></span>
	        <span>Faltas por usuario</span>
	    </h2>
	    <div class="row well fondo_admin">
			<table id="dt_porMes" class="table datatable" data-link="{{route('dt_getFaltasPorMes')}}">
				<thead>
					<tr>
						<th class="col_table" data-name="apellido" data-searchable="true">Apellido</th>
						<th class="col_table" data-name="nombre" data-searchable="true">Nombrbe</th>
						<th class="col_table" data-name="legajo" data-searchable="true">Legajo</th>
						<th class="col_table" data-name="cant por mes" data-searchable="false">cant por mes</th>
						<th class="col_table" data-name="cant_total" data-searchable="false">cant total</th>
						<th class="col_table" data-name="action" data-searchable="false">operaciones</th>
						
					</tr>
				</thead>
			</table>
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
		cargarTablas();
	</script>
@endsection