<div class="form-group">
	{{Form::label('Contraseña actual')}}
	{{Form::text('cont_actual',null,array('class' => 'form-control limpiar'))}}
</div>

<div class="form-group">
	{{Form::label('Contraseña nueva')}}
	{{Form::text('cont_nueva',null,array('class' => 'form-control limpiar'))}}
</div>

<div class="form-group">
	{{Form::label('Repetir contraseña')}}
	{{Form::text('cont_repet',null,array('class' => 'form-control limpiar'))}}
</div>