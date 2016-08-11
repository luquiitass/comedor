{{Form::hidden('url',route('user.store'))}}
					
<div class="form-group">
	{{Form::label('legajo')}}
	{{Form::text('legajo' ,null , array('class' =>  'form-control limpiar'))}}
	@include('mensajes.error_input',['name'=>'legajo'])
</div>

<div class="form-group">
	{{Form::label('email')}}
	{{Form::text('email' ,null , array('class' =>  'form-control limpiar'))}}
	@include('mensajes.error_input',['name'=>'email'])
</div>

<div class="form-group">
	{{Form::label('nombre' )}}
	{{Form::text('nombre',null, array('class' =>'form-control limpiar'))}}
	@include('mensajes.error_input',['name'=>'nombre'])
</div>

<div class="form-group">
	{{Form::label('apellido')}}
	{{Form::text('apellido',null, array('class' => 'form-control limpiar'))}}
	@include('mensajes.error_input',['name'=>'apellido'])
</div>

<div class="form-group">
	{{Form::label('dni')}}
	{{Form::text('dni',null, array('class' => 'form-control limpiar'))}}
	@include('mensajes.error_input',['name'=>'dni'])
</div>

<div class="form-group">
	{{Form::label('telefono')}}
	{{Form::text('telefono',null, array('class' => 'form-control limpiar'))}}
	@include('mensajes.error_input',['name'=>'telefono'])
</div>

<div class="form-group">
	{{Form::label('tipo')}}
	{{Form::select('tipo',array('comensal'=>'comensal','admin'=>'admin','ambos'=>'ambos'))}}
	@include('mensajes.error_input',['name'=>'tipo'])
</div>

<div class="form-group">
	{{Form::label('Estado')}}
	{{Form::select('estado_id',array('2'=>'activo','3' => 'inactivo','4' => 'pendiente'))}}
	@include('mensajes.error_input',['name'=>'estado'])
</div>

{{Form::token()}}
{{Form::submit('Registrar',array('class' => 'btn btn-primary pull-left'))}}