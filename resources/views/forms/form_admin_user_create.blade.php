{{Form::hidden('url',route('user.store'))}}
					
<div class="form-group">
	{{Form::label('legajo')}}
	{{Form::text('legajo' ,null , array('class' =>  'form-control limpiar'))}}
</div>
<div class="form-group">
	{{Form::label('email')}}
	{{Form::text('email' ,null , array('class' =>  'form-control limpiar'))}}
</div>
<div class="form-group">
	{{Form::label('nombre' )}}
	{{Form::text('nombre',null, array('class' =>'form-control limpiar'))}}
</div>
<div class="form-group">
	{{Form::label('apellido')}}
	{{Form::text('apellido',null, array('class' => 'form-control limpiar'))}}
</div>
<div class="form-group">
	{{Form::label('dni')}}
	{{Form::text('dni',null, array('class' => 'form-control limpiar'))}}
</div>
<div class="form-group">
	{{Form::label('telefono')}}
	{{Form::text('telefono',null, array('class' => 'form-control limpiar'))}}
</div>
<div class="form-group">
	{{Form::label('tipo')}}
	{{Form::select('tipo',array('admin'=>'admin','comensal'=>'comensal','ambos'=>'ambos'))}}
</div>
<div class="form-group">
	{{Form::label('Estado')}}
	{{Form::select('estado',array('2'=>'activo','3' => 'inactivo','4' => 'pendiente'))}}
</div>

{{Form::token()}}
{{Form::submit('Registrar',array('class' => 'btn btn-primary pull-left'))}}