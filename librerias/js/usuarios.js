$(document).ready(function(){
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    var msie6 = $.browser == 'msie' && $.browser.version < 7;
    //verifico que exita el div con el botonIngresar - botonRegistro y que el explorar sea distinto de ie6
    if (!msie6 && $("#botonIngresar").length && $("#botonRegistro").length) {
        var top = $('#menuUsuario').offset().top - parseFloat($('#menuUsuario').css('margin-top').replace(0, 0));
        $(window).scroll(function (event) {
            // obtengo la posicion del scroll
            var y = $(this).scrollTop();

            // si es mayor que la posición del botonIngresar le agrego la clase fixed 
            if (y >= top) {
                $('#botonIngresar').addClass('fixed');
                $('#botonRegistro').addClass('fixed');
            } else {
                // sino removimos la clase
                $('#botonIngresar').removeClass('fixed');
                $('#botonRegistro').removeClass('fixed'); 
            }
        });
    }
    //verifico que exita el div menuUsuario y que el explorar distinto de ie6
    if (!msie6 && $("#sesionIniciada").length) {
        var top = $('#menuUsuario').offset().top - parseFloat($('#menuUsuario').css('margin-top').replace(0, 0));
        $(window).scroll(function (event) {
            // obtengo la posicion del scroll
            var y = $(this).scrollTop();

            // si es mayor que la posición del botonIngresar le agrego la clase fixed 
            if (y >= top) {
                $('#sesionIniciada').addClass('fixed');
            //$('#botonRegistro').addClass('fixed');
            } else {
                // sino removimos la clase
                $('#sesionIniciada').removeClass('fixed');
            //$('#botonRegistro').removeClass('fixed'); 
            }
        });
    }
    
    
    //abrir ingresoModal
    $('#botonIngresar').click(function (e) {
        $('#ingresoModal').modal({
            /*funcion para animar abrir ingreso modal*/
            onOpen: function (dialog) {
                dialog.overlay.fadeIn('fast', function () {
                    dialog.container.fadeIn('fast', function () {
                        dialog.data.slideDown('fast');
                    });
                });
            },
            /*funcion para animar el cerrar ingresoModal*/
            onClose: function (dialog) {
                dialog.container.hide('fast', function () {
                    $.modal.close();
                });
            }
        });
        return false;
    });
        
    var timeSlide = 1000;
    $('#cargando').hide(0);
    $('#cargando').css('display','none');
    $('#botonIngresoModal').click(function(){
        $('#usuarioIngresoModal').focus();
        $('#cargando').fadeIn(300);
        $('.cajaInformacion, .cajaCorrecta, .cajaAlertas, .cajaError').slideUp(timeSlide);
        setTimeout(function(){
            if ( $('#usuarioIngresoModal').val() != "" && $('#contrasenaIngresoModal').val() != "" ){
				
                $.ajax({
                    type: 'POST',
                    url: url+'usuario/ingresar',
                    data: 'usuario=' + $('#usuarioIngresoModal').val() + '&contrasena=' + $('#contrasenaIngresoModal').val(),
                    success:function(msj){
                        //probar resultado que devuelve
                        //alert(msj);
                        if ( msj == 1 ){
                            $('#alertas').html('<div class="cajaCorrecta"></div>');
                            $('.cajaCorrecta').hide(0).html('Espera un momento&#133;');
                            $('.cajaCorrecta').slideDown(timeSlide);
                            setTimeout(function(){
                                //document.URL me toma la direccion en la que estoy, asi no pierdo la posicion en la WEB
                                window.location.href = document.URL;
                            },(timeSlide + 500));
                        }
                        else{
                            $('#alertas').html('<div class="cajaError"></div>');
                            $('.cajaError').hide(0).html('Lo sentimos, pero los datos son incorrectos');
                            $('.cajaError').slideDown(timeSlide);
                        }
                        $('#cargando').fadeOut(300);
                    },
                    error:function(){
                        $('#cargando').fadeOut(300);
                        $('#alertas').html('<div class="cajaError"></div>');
                        $('.cajaError').hide(0).html('Ha ocurrido un error durante la ejecución');
                        $('.cajaError').slideDown(timeSlide);
                    }
                });
				
            }
            else{
                $('#alertas').html('<div class="cajaError"></div>');
                $('.cajaError').hide(0).html('Los campos estan vacios');
                $('.cajaError').slideDown(timeSlide);
                $('#cargando').fadeOut(300);
            }
        },timeSlide);
		
        return false;
		
    });
	
	
	
    $('#salirSession').click(function(){
        $('#cargando').fadeIn(200);
        $('.sesionIniciada #alertas').html('<div class="cajaCorrecta"></div>');
        $('.cajaCorrecta').hide(0).html('<img src="'+url+'img/cargando.gif"/> Espera un momento&#133;');
        //$('.cajaCorrecta').slideDown(timeSlide);
        //muestro la cajaCorrecta de salida al estilo modal
        $('.cajaCorrecta').modal({
            /*nombre para el container*/
            containerId:'modal-tiempo',
            /*funcion de animacion al abrir la cajaCorrecta*/
            onOpen: function (dialog) {
                dialog.overlay.fadeIn('fast', function () {
                    dialog.container.fadeIn('fast', function () {
                        dialog.data.slideDown('fast');
                    });
                });
            }
        });
        setTimeout(function(){
            window.location.href = url+"usuario/salir?pagina="+document.URL;
        },2500);
    });	
    
});