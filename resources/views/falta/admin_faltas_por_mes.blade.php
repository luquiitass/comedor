@extends('layouts.master_admin')

@section('titulo','Faltas')

@section('menu_faltas','active')

@section('content')
	<ol class="breadcrumb">
	  <li><a href="{{route('admin_faltas')}}">Faltas</a></li>
	  <li class="active">{{$us->apellido}} {{$us->nombre}}</li>
	</ol>

	<h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle">Faltas de</span>
        <span>{{$us->apellido}} {{$us->nombre}}</span>
    </h2>

    <div class="row well fondo_admin">
    	<div class="col-xs-12 col-md-6">
    		<h3>Faltas de este Mes</h3>
    		<hr>
				<?php $faltas= $us->obtenerFaltasMesActual()?>
				<ul class="">
					<li class="lista_sin_estilo">
						@if($faltas->count() > 0)
							<ol class="">
								@foreach($faltas as $falta)
									<li class="">
										{{$falta->getFecha()}}
									</li>
								@endforeach
							</ol>
						@else
						<div class="alert alert-success">
							Sin Faltas
		
						</div>
						@endif

					</li>
				</ul>
    	</div>
    	<div class="col-xs-12 col-md-6">
    		<h3>Faltas de todo el Año</h3>
    		<hr>
	    	<?php $meses= $us->obtenerFaltasPorMes()?>
			@if($meses->count() > 0)
				<ul class="" >
					@foreach($meses as $nombreMes => $mes)
						<h3>{{$nombreMes}}</h3>
						<li class="">
							<ol>
							@foreach($mes as $falta)
								<li>
									{{$falta->getFecha()}}
								</li>
							@endforeach
							</ol>
						</li>
					@endforeach
				</ul>
			@else
			<div class="alert alert-success">
				Sin Faltas
			</div>
			@endif
    	</div>
    </div>
	
	<center>
	</center>

@endsection