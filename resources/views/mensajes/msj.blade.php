@if($mensajes)
<div class="alert alert-{{$tipoAalert}}">
	@foreach($mensajes->mensaje as $mensaje)
		<p>{{$mensaje}}</p>
	@endforeach
</div>
@endif