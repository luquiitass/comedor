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

	$(document).on("focus",".datepicker",function(){
		$(this).datepicker({
	    format: "dd-mm-yyyy",
	    language: "es",
	    autoclose: true
	});

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
	return false;
}

function subirImagen(id_form){
	var form_data = $(id_form).serialize();
	form_data.push({name: 'image',value: $( '#imp_file_foto' ).files[0]});
	POST($(id_form).serializeArray(),'/image/save');
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


function mayPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function mensaje_superior(mensaje,alert,hide){

	var div_ini = '<div class="alert alert-'+alert+' alert-dismissible toast" role="alert" style="text-align:left display:none;">';
	var div_fin ='</div>';
	var boton = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

	var msj = div_ini+boton+mensaje+div_fin;
	$('#mensaje_superior').html(msj);
	
	if (hide == 'true') {
		$('.toast').fadeIn(400).delay(3000).fadeOut(400);
	}else{
		$('.toast').fadeIn(400).delay(3000);
	}
}

$.fn.extend({
	btnProceso:function(text){
		if (!text) {
			$(this).html('<i class="fa fa-spinner fa-spin"></i>').addClass('disabled');
		}else{
			$(this).html(text).removeClass('disabled');
		}
	}
});

function btnProceso(text){
	if (!text) {
		$(this).html('<i class="fa fa-spinner fa-spin fa-4x"></i>').addClass('disabled');
	}else{
		$(this).val(text).removeClass('disabled');
	}
}

/*::::::::::::::::::::::::Funciones para modificar estado de un dia ::::::::::::*/
$.fn.extend({
        modEstado:function(){
            $('.formAjax').submit(function(event){
            	var form = this;
                event.preventDefault();
                var a = $(this).serializeArray();
                var id = a[0]['value'];
                $(form).find('.btn').html('Modificando <i class="fa fa-spinner fa-spin"></i>').addClass('btn-info disabled');
                $.ajax({
                  type: "POST",
                  url: "/estado/"+id+"/update",
                  data: a,
                  success: function(data){
                  	if (isJson(data)) 
                  	{
                  		var json = $.parseJSON(data);
                  		if (json.mensaje) {
                  			mensaje_superior(json.mensaje,'info','true');
                  		}
                  		if (json.resultado == 'true' && json.html){
							$('#content').html(json.html);
							$('#content').modEstado();
                  		}

                  	}
                  	$(form).find('.btn').html('Modificar').removeClass('btn-info disabled').addClass('btn-primary');
                  },error:function(xhr){
                    $(form).find('.btn').html('Modificar').addClass('btn-primary');
                    mensaje_superior('Error al cambiar de estado, intente nuevamente','danger','false');
                  }
                });
                return false;
        });
        }
    });
/*:::::::::::::::::::Fin :::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

/*:::::::::::::::::::::::::Metodos Post para modificar datos Que Devulve un Json*/

// $.fn.extend({
// 	formPostJson:function(){
// 		$(document).on('submit','.form',function(event){
// 			event.preventDefault();

// 			var form = this;
// 			var datos = $(form).serialize();
// 			var url= $(form).find("input[name=url]").attr('value');

// 			$.ajax({
// 				type:"POST",
// 				url:url,
// 				data:datos,
// 				success:function(data){
// 					var json = $.parseJSON(data);
// 					if (json.resultado == 'true') {
// 						if (json.html){
// 							$(json.id_elemento).html(json.html);
// 						}
// 						if (json.mensaje) {
// 							mensaje_superior(json.mensaje,'success','true');
// 						}

// 					}else if(json.resultado == 'false'){
// 						if (json.mensaje) {
// 							mensaje_superior(json.mensaje,'danger','false');
// 						}
// 					}

// 					if (json.funcion) {
// 						window[json.funcion]();		
// 					}
// 					if (json.limpiar){
// 						$(form).limpiar();
// 					}

// 				},
// 				error:function(xhr){
// 					if (xhr.status == 422 ){
// 						var html='<ul>';
// 						$.each(xhr.responseJSON,function(index,value){
// 								html=html+"<li>"+value+"</li>";
// 						});
// 						html=html+"</ul>";
// 						mensaje_superior(html,'danger','false');
// 					}
// 				}
// 			});
// 			return true;
// 		});
// 	},
// 	limpiar:function(){
// 		$(this).find('.limpiar').val('');
// 		return false;
// 	}
// });



/*___________________________Fin____________________________________________________*/
function reload(){
	location.reload();
}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function cargarTablas(){
		var sum=0;
		$('.datatable').each(function(){
			sum=sum+1;
			var table_id =$(this).attr('id');
			var link = $(this).data('link');
			var columnas= new Array();

			$(this).find('.col_table').each(function(){
				var name = $(this).data('name');
				if (name == 'operaciones') {
					columnas.push({data: 'action'/*, name: 'action',*/, orderable: false, searchable: $(this).data('searchable') || false, orderable:$(this).data('searchable') || false });
				}else{
					var unaColumna={ data: $(this).data('name')/*, name: $(this).text(),*/,searchable: $(this).data('searchable') ||false, orderable:$(this).data('searchable')|| false };
					columnas.push(unaColumna);
				}
			});

			$('#'+table_id).DataTable({
				//paging: false,
    			//searching: false,
    			language:{ url: public_path +'css/datatable/dt_es.json'},
    			responsive: true,
    			processing: true,
	        	serverSide: true,
		        ajax:link,
		        columns: columnas
		        //columnas
	    	});
		});
	}
/*::::::::::::::::::::::::::::::::::Funciones para las vistas del usuario:::::::::::*/
