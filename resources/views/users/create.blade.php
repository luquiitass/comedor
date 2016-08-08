@extends('layouts.master_default')

@section('content')

<div class="row">
	<div class="col-xs-12 col-md-6 col-md-offset-3">
		<h2>Solicitud de inscripción </h2>
		
		@include('mensajes.error')

		{{Form::open(array('route' => 'storeSolicitud','class' => 'form'))}}

			<div class="form-group">
				{{Form::label('legajo')}}
				{{Form::text('legajo' ,null , array('class' =>  'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('email')}}
				{{Form::text('email' ,null , array('class' =>  'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('nombre' )}}
				{{Form::text('nombre',null, array('class' =>'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('apellido')}}
				{{Form::text('apellido',null, array('class' => 'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('dni')}}
				{{Form::text('dni',null, array('class' => 'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('telefono')}}
				{{Form::text('telefono',null, array('class' => 'form-control'))}}
			</div>
			{{Form::token()}}
			{{Form::submit('Enviar Solicitud',array('class' => 'btn btn-primary pull-right'))}}
		{{Form::close()}}		
	</div>
</div>



@endsection