@extends('layouts.master_admin')

@section('content')
    <h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Anuncios</span>
    </h2>
 	<div class="">
		<div class="row well fondo_admin">
			<div class="col-xs-12 col-sm-3">
				<ul class="nav nav-pills nav-stacked" >
					<li class="active" ><a href="#tab_todos" data-toggle="tab">Anuncios Visibles</a></li>
					<li><a  data-toggle="tab"  href="#tab_nuevo_anuncio"  >Nuevo Anuncio</a></li>
					<li><a  data-toggle="tab"  href="#tab_mis_anuncios"  >Mis Anuncios</a></li>
				</ul>
			</div>


			<div class="col-xs-12 col-sm-9">
				<div class="tab-content">

					<!--Panel lista todos los usuarios (Activos e Inactivos)  -->
					<div id="tab_todos" class="tab-pane fade in active">
						<h3>Anuncios Visibles</h3>
						<hr>
						@each('anuncio.unAnuncio',$anuncios,'anuncio')
					</div>


					<!-- Panel para Listar a los usuarios Activos  con la posibilidad de verlos y desactivarlos-->
					<div  class="tab-pane" id="tab_nuevo_anuncio">
						<h3>Nuevo Anuncio</h3>
						<div style="width: 50%; margin: 10px;">
							{{Form::open(array('url' => '/anuncio'))}}
								<div class="form-group">
									{{Form::label('titulo')}}
									{{Form::text('titulo',null,array('class' => 'form-control'))}}
								</div>
								<div class="form-group">
									{{Form::label('cuerpo')}}
									{{Form::textarea('cuerpo',null,array('class'=>'form-control'))}}
								</div>
								<div class="form-group">
									{{Form::label('mostar hasta')}}
									{{Form::text('hasta',null,array('class' =>'form-control datepicker'))}}
								</div>
								{{Form::submit('Guardar',array('class' => 'btn btn-primary'))}}
								{{Form::token()}}
							{{Form::close()}}
						</div>
					</div>

					<!--panel que mostrara todos los anuncios de el usuario que esta logueado-->
					<div id="tab_mis_anuncios" class="tab-pane ">
						<h3>Todos los Anuncios</h3>
						<table class="table" width="100%">
							<tr>
								<th>Anuncios</th>
								<th style="text-align: center;" >Operaciones</th>
							</tr>
							@foreach($misAnuncios as $anuncio)
							<tr>
								<td> 
									@include('anuncio.unAnuncio')
								</td>
								<td align="center">
									<a data-toggle="modal" data-target="#myModal" class = 'btn btn-danger btn-xs delete' data-link = "/anuncio/{{$anuncio->id}}/deleteMsg" ><i class = 'material-icons'>Eliminar</i></a>

									<button data-toggle="modal" data-target="#myModal" class = 'edit btn btn-success btn-xs'  data-link = '/anuncio/{{$anuncio->id}}/edit'><i class = 'material-icons'>Editar</i></button>
								</td>
							</tr>
							@endforeach
						</table>
					</div>

				</div>		
			</div>
		</div>
	</div>

	@endsection