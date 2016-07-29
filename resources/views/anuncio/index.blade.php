@extends('layouts.master_user')

@section('content')
    <div class="row">
		<div class="col-md-9 col-md-offset-2">
    	<h2>Anuncios activos</h2>
	    	@if(empty($anuncios))
	    		<div class="alert alert-info">
	    			Sin Anuncios
	    		</div>
	    	@else
	    		@each('anuncio.unAnuncio',$anuncios,'anuncio')
	    	@endif
		</div>
	</div>
@endsection