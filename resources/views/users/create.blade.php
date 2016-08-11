@extends('layouts.master_default')

@section('content')

<div class="row">
	<div class="col-xs-12 col-md-6 col-md-offset-3">
		<h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Solicitud de inscripción </span>
    </h2>

		{{Form::open(array('route' => 'storeSolicitud','class' => 'form'))}}

			<div class="form-group">
				{{Form::label('legajo')}}
				{{Form::text('legajo' ,null , array('class' =>  'form-control'))}}
				@include('mensajes.error_input',['name'=>'legajo'])
			</div>
			<div class="form-group">
				{{Form::label('email')}}
				{{Form::text('email' ,null , array('class' =>  'form-control'))}}
				@include('mensajes.error_input',['name'=>'email'])
			</div>
			<div class="form-group">
				{{Form::label('nombre' )}}
				{{Form::text('nombre',null, array('class' =>'form-control'))}}
				@include('mensajes.error_input',['name'=>'nombre'])
			</div>
			<div class="form-group">
				{{Form::label('apellido')}}
				{{Form::text('apellido',null, array('class' => 'form-control'))}}
				@include('mensajes.error_input',['name'=>'apellido'])
			</div>
			<div class="form-group">
				{{Form::label('dni')}}
				{{Form::text('dni',null, array('class' => 'form-control'))}}
				@include('mensajes.error_input',['name'=>'dni'])
			</div>
			<div class="form-group">
				{{Form::label('telefono')}}
				{{Form::text('telefono',null, array('class' => 'form-control'))}}
				@include('mensajes.error_input',['name'=>'telefono'])
			</div>
			{{Form::token()}}
			{{Form::submit('Enviar Solicitud',array('class' => 'btn btn-primary pull-right'))}}
		{{Form::close()}}		
	</div>
</div>



@endsection