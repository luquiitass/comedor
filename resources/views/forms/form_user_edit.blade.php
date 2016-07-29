<div class="form-group">
	{{Form::label('nombre')}}
	{{Form::text('nombre',$user->nombre,array('class' => 'form-control limpiar', 'disabled'))}}
</div>

<div class="form-group">
	{{Form::label('apellido')}}
	{{Form::text('apellido',$user->apellido,array('class' => 'form-control limpiar','disabled'))}}
</div>

<div class="form-group">
	{{Form::label('legajo')}}
	{{Form::text('legajo',$user->legajo,array('class' => 'form-control limpiar','disabled'))}}
</div>

<div class="form-group">
	{{Form::label('email')}}
	{{Form::text('email',$user->email,array('class' => 'form-control limpiar'))}}
</div>

<div class="form-group">
	{{Form::label('telefono')}}
	{{Form::text('telefono',$user->telefono,array('class' => 'form-control limpiar'))}}
</div>

<div class="form-group">
	{{Form::label('dni')}}
	{{Form::text('dni',$user->dni,array('class' => 'form-control limpiar'))}}
</div>
