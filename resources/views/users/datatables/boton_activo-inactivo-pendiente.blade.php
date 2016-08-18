<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Operaciones <span class="caret"></span>
</button>
<ul class="dropdown-menu">
	@foreach($estados as $unEst)
	<li>
	@if($unEst->nombre != $estado)
		{{Form::open(array('url'=>'/user/modificarEstadoUsuario'))}}
			{{Form::hidden('estado',$unEst->id)}}
			{{Form::hidden('id',$user->id)}}
			{{Form::token()}}
			{{Form::submit('cambiar a '.$unEst->nombre,array('class'=> 'btn btn-primary form-control'))}}
		{{Form::close()}}
	@endif
	</li>
	<li role="separator" class="divider"></li>
@endforeach
	<li>
		{{Form::open(array('clas'=>''))}}
			{{Form::hidden('estado',$unEst->id)}}
			{{Form::hidden('id',$user->id)}}
			{{Form::token()}}
			{{Form::button('Restaurar contraseña',array('class'=> 'btn btn-primary form-control saveForm','data-link'=>'/user/resetPasword'))}}
		{{Form::close()}}
		
	</li>
</ul>
</div>