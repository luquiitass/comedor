@extends('layouts.master')

@section('content')

<h2>Login</h2>

@include('mensajes.error')

{{Form::open(array('route' => 'handleLogin'))}}
	<div class="form-group">
		{{Form::label('email')}}
		{{Form::text('email' ,null , array('class' =>  'form-control'))}}
	</div>

	<div class="form-group">
		{{Form::label('password')}}
		{{Form::text('password' ,null , array('class' =>  'form-control'))}}
	</div>

	<div class="form-group">
		{{Form::token()}}
		{{Form::submit('Entrar' , array('class' =>  'btn btn-success'))}}
	</div>
{{Form::close()}}

@endsection