/*|
 *| jQuery File Ajaxis Plugin for Bootstrap
 *| https://github.com/amranidev/ajaxis
 *|
 *| Copyright 2015, Amrani Houssain
 *| amranidev@gmail.com
 *|
 *| Licensed under the MIT license:
 *| http://www.opensource.org/licenses/MIT
 *|
 */

$(document).on('click', '.delete', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.edit', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.display', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.create', function() {
    GET($(this).data('link'));
})
$(document).on('click', '.destroy', function() {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + $(this).data('link'),
        success: function(response) {
            window.location = response;
        }
    })
})
$(document).on('click', '.save', function() {
    POST($('#AjaxisForm').serializeArray(), $(this).data('link'));
})

$(document).on('hidden.bs.modal','#myModal', function () {
    $('.AjaxisModal').html('');
})

$(document).on('show.bs.modal','#myModal', function () {
    var modal ='<div class="modal-dialog " style=" width: 200px; "><div class="modal-content"> <div class="modal-body"> <p class="text-center"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></p> <h3 class="text-center">Cargando</h3> </div></div></div>';
    if ($('.AjaxisModal').html() == '') {
        $('.AjaxisModal').html(modal);     
    }
})


$(document).on('click','.saveForm',function(){
    var form= $(this).parent();
    POST($(form).serializeArray(),$(this).data('link'));
});

function GET(dataLink) {
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + dataLink,
        success: function(response) {
            $('.AjaxisModal').html(response);
        }
    })
}

function POST(postData, dataLink) {
    $.ajax({
        async: true,
        type: 'post',
        url: baseURL + dataLink,
        data: postData,
        success: function(response) {
            if (isJson(response)) {
                var json = $.parseJSON(response);
                if (json.mensaje) {
                    var tipoMensaje= json.tipoMensaje || 'info';
                    mensaje_superior(json.mensaje,tipoMensaje,'false');
                    $('.AjaxisModal').toggle();
                }
                if (json.location) {
                    window.location = json.location;
                }
            }else{
                //window.location = response;
            }
        },
        error:function(xhr){
            if (xhr.status == 422 ){
                var html='<ul class="alert alert-danger">';
                $.each(xhr.responseJSON,function(index,value){
                        html=html+"<li>"+value+"</li>";
                });
                html=html+"</ul>";
                mensaje_superior(html,'danger','false');
            }
        }
    });
}