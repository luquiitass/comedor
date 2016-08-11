@extends('layouts.master_default')

@section('content')
	<div class="row div col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 " ">
		<div class="text-center">
			<h4 class="text-center">Formulario enviado...</h4>
			<p>Apellido Nombre su cuenta...</p>
			<p>wara wara...</p>
			{{link_to_route('login','Atras',null,array('class'=>'btn btn-primary'))}}	
		</div>
	</div>
@endsection