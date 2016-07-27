$(function(){
	$("#btn_ini").on("click",function (){
        iniciarSesion($('#formulario'))
    });
	$('#btn_mod_datos_usuario').on("click",function(){
		modificarDatosUsuario($('#form_mod_perfil'));
	});
	$('#btn_mod_contra_usuario').on("click",function(){
		modificarContra($('#form_mod_cont'));
	});
	$('#btn_registrarComensal').on("click",function(){
		registrarComensal($('#form_registarComensal'));
	});

	$('#datata').DataTable();

	$('.datepicker').datepicker({
	    format: "dd-mm-yyyy",
	    language: "es",
	    autoclose: true
	});

	/*$('.mostrar').click(function(){
		$(this).closest('tr').next().slideToggle();

	});

	$('.mostrar').hover(function() {
		if ($(this).next().is(':hidden')) {
			$(this).find('span').html('Ver faltas');
		}else{
    		$(this).find('span').html('Ocultar faltas');
    	}
	}, function() {
    	$(this).find('span').html('');
	});
*/

	

	
});

function readURL(input,id_img){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#'+id_img).attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
    	$('#btn_buscatImagen').hide();
    	$('#btns_cargar_cancelar').show();
	}
}

function cancelarCargaDeFoto(fotoVieja,id_img){
	$('#'+id_img).attr('src',fotoVieja);
	$('#btn_buscatImagen').show();
	$('#btns_cargar_cancelar').hide();
}


/*------------------Funciones de Usuario--------------------*/
/*Iniciar sesion desde un formulario*/
function iniciarSesion(formulario){
	var datos = formulario.serialize();
	$.ajax({
			type:'POST',
			url:'../php/funcionesWeb.php',
			data: datos+'&funcion=w_iniciarSesion',
			success: function(retorno){
				if(retorno == 2){
					window.location.replace('../Estados/');
				}else if(retorno == 1){
					window.location.replace('../AdminComensales/');
				}else{
					window.alert("Usuario o Contraseña Inválida");
				}
			}
		});
}

function subirImagen(legajo,id_img){
		var fotix=$('#'+id_img).attr('src');
		var legajo=legajo;

		$.ajax({
			type:'POST',
			url:'../php/subirImagen.php',
			data:'imagen='+fotix+'&legajo='+legajo,
			success: function(datos){
				$('#fotoPerfil').attr("src",$('#fot').attr("src"));
				$('#btn_buscatImagen').show();
	       		$('#btns_cargar_cancelar').hide();
			}
		});
}

function modificarContra(formSerializable){
	//var dato=$('#form_mod_cont').serialize();
	var dato = formSerializable.serialize();
	xhr = $.ajax({
		type:"POST",
		url:"../php/funcionesWeb.php",
		data:dato+"&funcion=w_modificarContra",
		beforeSend: function(xhr){
			if($('#contraNueva').val() != $('#confirmarContra').val()){
				window.alert("Las contraseñas nuevas no coinciden.");			
				xhr.abort();
			}
		},
		error: function (jqXHR, status, error){
			window.alert(error, status);
		},
		success: function (datos){
			window.alert(datos);
			window.location.reload();
		}
	})
}

function modificarDatosUsuario(formSerializable){
	//var datos=$('#form_mod_perfil').serialize();
	var datos=formSerializable.serialize();
	$.ajax({
		type:"POST",
		url:"../php/funcionesWeb.php",
		data:datos+"&funcion=w_modificarEmail",
		success:function(html){
			if (html=='true') {
				$('#mensaje').addClass('alert alert-success').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			}else{
				//$('#mensaje').addClass('alert alert-danger').html(html).show();
			}
			window.location.reload();
		}
	});
	return false;
}
			
function modificarEstado(dia,estado){
	//var legajo=$('#legajo').val();
	//var legajo=$_SESSION['legajo'];
	$.ajax({
		type:"post",
		url:"../php/funcionesWeb.php",
		data:"dia="+dia+"&estado="+estado+"&funcion=w_modificarEstado",
		success:function(datos){
			if (datos=='true') {
				window.location.reload();
			}else{
				$('#mensaje_error').addClass('alert alert-danger').html('Error al modificar el estado').show(200).delay(2500).hide(200);			
			}
		}
	});
}

function registrarComensal(formSerializable){
	var datos=formSerializable.serialize();
	$.ajax({
		type:"POST",
		url:"../php/funcionesWeb.php",
		data:datos+"&funcion=w_registrarComensal",
		success:function(html){
			if (html=='true') {
				alert("Comensal Registrado");
				location.reload();
				//$('#mensaje').addClass('alert alert-success').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			}else{
				alert(html);
				$('#mensaje').addClass('alert alert-danger').html(html).show();
			}		
		}
	});
	return false;
}

function colocarFaltas(){
	var faltas_legajo=new Array();

	$(".checkfalta").each(function(){  //todos los que sean de la clase row1
	    if($(this).is(':checked')){
	      faltas_legajo.push($(this).val());
	    }
	});

    var datos={comensales : JSON.stringify(faltas_legajo) ,
    			funcion: "w_colocarFaltas"
    };

    $.ajax({
		type:"POST",
		url:"../php/funcionesWeb.php",
		data:datos,
		success:function(html){

			if (html=='true') {
				alert(html);
				location.reload();
				//$('#mensaje').addClass('alert alert-success').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			}else{
				alert(html);
			}		
		}
	});
	return false;
	
}

function verUsuario(usuario){
	var us=usuario;

	$.getJSON("/user/"+us['id'], function(data, status){
		var html='<ul class="alert alert-success">';

        $.each(data,function(index,value)
		{
			html=html+"<li>"+index+": "+value+"</li>";
		});
		html=html+"</ul>";
		$('#modal-contenido').html(html);
		$('#myModal').modal('show');
	});
}

function mayPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function mensaje_superior(mensaje,alert,hide){
	var boton = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	var clases = 'alert alert-'+alert+' alert-dismissible';
	if (hide == 'true') {
		$('#mensaje_superior').html(boton+mensaje).addClass(clases).show(200).delay(2500).hide(100);
	}else{
		$('#mensaje_superior').html(boton+mensaje).addClass(clases).show(200).delay(2500);
	}
}



/*::::::::::::::::::::::::Funciones para modificar estado de un dia ::::::::::::*/
$.fn.extend({
        modEstado:function(){
            $('.formAjax').submit(function(event){
                event.preventDefault();
                var a = $(this).serialize();
                var id = $('#id_estado').attr('value');
                $(this).find('.btn').val('Modificando...').addClass('btn-info');
                $.ajax({
                  type: "POST",
                  url: "/estado/"+id+"/update",
                  data: a,
                  success: function(data){
                    $('#content').html(data);
                    $('#content').modEstado();
                  },error:function(){
                    $(this).find('.btn').val('Modificar').addClass('btn-primary');
                    mensaje_superior('Error al cambiar de estado, intente nuevamente','danger','false');
                  }
                });
                return false;
        });
        }
    });
/*:::::::::::::::::::Fin :::::::::::::::::::::::::::::::::::::::::::::::::::::::*/