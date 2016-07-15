@extends('layouts.master_admin')

@section('content')

@include('mensajes.error')

<h2>Registrar usuario</h2>
{{Form::open(array('route' => 'user.store','class' => 'form'))}}

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
	{{Form::submit(null,array('class' => 'btn btn-success'))}}
{{Form::close()}}


@endsection