@extends('layouts.master_user')

@section('content')
    <div class="row">
		<div class="col-md-9 col-md-offset-2">
    	<h2>Anuncios activos</h2>
			@each('anuncio.unAnuncio',$anuncios,'anuncio')
		</div>
	</div>
@endsection