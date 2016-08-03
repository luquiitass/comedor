@extends('layouts.master_user')

@section('content')
<div class="card card-container">
	<div class="Absolute-Center is-Responsive">
		<img id="profile-img" class="profile-img-card" src="{{asset(public_path().'img/app_unam.png')}}" />
		<p id="profile-name" class="profile-name-card">Comedor Apóstoles</p>

				
				{{Form::open(array('route' => 'handleLogin','class'=>'form-signin'))}}
					@include('mensajes.error')
					<div class="form-group">
						{{Form::text('email' ,null , array('class' =>  'form-control','placeholder'=> 'Email'))}}
					</div>

					<div class="form-group">
						{{Form::text('password' ,null , array('class' =>  'form-control','placeholder'=> 'Contraseña'))}}
					</div>
					

					<div class="form-group">
						{{Form::token()}}
						{{Form::submit('Entrar' , array('class' =>  'btn btn-primary btn-block btn-signin'))}}
					</div>
				{{Form::close()}}
				<hr>
				<p class="solicitud_registro">¿No estas registrado?</p>
				<p>
					{{link_to_route('user_home','Click aqui',null,array('class'=>''))}}
					 para completar la  solicitud de registro
				</p>
			</div>
		</div>
	</div>
</div>
@endsection