@extends('layouts.master_user')

@section('titulo','Anuncios')

@section('menu_anuncios','active')

@section('content')
	<div class="container">
		<h2 class="Heading--Fancy">
	        <span class="Heading--Fancy__subtitle"></span>
	        <span>Anuncios</span>
	    </h2>
	    <div class="row">
			<div class="col-md-9 col-md-offset-2">
		    	@if($anuncios->count() == 0)
		    		<div class="alert alert-info">
		    			Sin Anuncios
		    		</div>
		    	@else
		    		@each('anuncio.unAnuncio',$anuncios,'anuncio')
		    	@endif
			</div>
		</div>
	</div>

@endsection