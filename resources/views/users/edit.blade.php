
	@extends(str_contains(URL::previous(),'ver')?'layouts.master_user':'layouts.master_admin')


@section('content')
	
	<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">Usuario</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<ul class="nav nav-pills nav-stacked">
								<li class="">
									<div class="foto_perfil">
										<img class="thumbnail" id="fotoPerfil" src="{{asset(public_path().'img/login2.png')}}" alt="foto perfil">
										<p class="text-center">{{$user->legajo}}</p>
									</div>
										
								</li>
								<li class="active"><a href="#pane_info" data-toggle="tab" >Información de perfil</a></li>
								<li><a href="#pane_edit" data-toggle="tab" >Editar Perfil</a></li>
								<li><a href="#pane_editarContraseña" data-toggle="tab" >Modificar contraseña</a></li>
								<li><a href="#pane_editarFoto" data-toggle="tab" >Modificar foto de Perfil</a></li>
								<!--
								<li><a href="#pane_eliminarCuenta" data-toggle="tab" >Eliminar Cuenta</a></li>
								-->
							</ul>
						</div>
						<div class="col-xs-12 col-md-9">
							<div class="tab-content">

								<div class="tab-pane fade in active" id="pane_info">
									<h2>Información de perfil</h2>
									<hr/>
									<ul class="lista_sin_estilo">
										@foreach($user->mostrarMisDatos() as $key => $value)
											<li><p><span>{{$key}}: </span>{{$value}}</p></li>
										@endforeach
									</ul>
								</div>




								<div class="tab-pane" id="pane_edit">
									<h2>Editar Perfil</h2>
									<hr/>
									<div >
										{{Form::open(array('class' => 'form','method'=>'get'))}}
											{{Form::hidden('url',route('userUpdate'))}}
											
											@include('forms.form_user_edit',array('user',$user))

											{{Form::token()}}
											{{Form::submit('Modificar',array('class' => 'btn btn-primary pull-right'))}}	
										{{Form::close()}}

									</div>	
								</div>





								<div class="tab-pane" id="pane_editarContraseña">
									<h2>Modificar contraseña</h2>
									<hr/>
									<div >
										{{Form::open(array('class' => 'form','id'=>'form_mod_cont','method'=>'get'))}}
											{{Form::hidden('url',route('modificarPassword'))}}
											
											@include('forms.form_user_edit_password',array('nada' => 'nada'))

											{{Form::token()}}
											{{Form::submit('Guardar',array('class' => 'btn btn-primary pull-right'))}}	
										{{Form::close()}}
									</div>
								</div>

								<div class="tab-pane" id="pane_editarFoto">
									<h2>Cambiar foto de Perfil</h2>
									<hr/>
									<div class="foto_perfil">
											<img class="thumbnail" id="fot" src="{{asset(public_path().'img/login2.png')}}" alt="foto perfil">
									</div>
									<p class="text-center">nombreImg.png</p>
									<div id="btn_buscatImagen" class="fileUpload btn btn-primary pull-right">
									    <span>seleccionar foto</span>
									    <input type="text" hidden="true" value="lucas" name="usuario"  id="usuario">
									    <input id="imp_file_foto" name="imagen" type="file" class="upload" onchange="readURL(this,'fot')" accept="image/*" >
									</div>

									<div id="btns_cargar_cancelar">
										<button class="btn btn-danger" onclick="cancelarCargaDeFoto('','fot')">Cancelar</button>
										<button class="btn btn-success pull-right" onclick="subirImagen('','fot')"> Modificar</button>
									</div>	
								</div>

								<div class="tab-pane" id="pane_eliminarCuenta">
									<div>
										<div>
											<h2>¿Estas seguro de eliminar esta cuenta?</h2>
											<button class="btn btn-success pull-right">Si, eliminar</button>
										</div>
									</div>
								</div>
							</div>					
						</div>
					</div>
				</div>
			</div>	

@endsection


@section('scripts')
    <script type="text/javascript">
        $(function(){
            $("#btns_cargar_cancelar").hide();
            $('.form').formPostJson();
        });
    </script>
@endsection
