$(document).ready(function () {
    
    /**para mantener el menu fijo**/
    var msie6 = $.browser == 'msie' && $.browser.version < 7;
    //verifico que exita el div menu-usuario y que el explorar distinto de ie6
    if (!msie6 && $("#panelMenuFijo").length) {
        var top = $('#panelMenuFijo').offset().top - parseFloat($('#panelMenuFijo').css('margin-top').replace(0, 0));
        $(window).scroll(function (event) {
            // obtengo la posicion del scroll
            var y = $(this).scrollTop();

            // si es mayor que la posición del boton_ingresar le agrego la clase fixed 
            if (y >= top) {
                $('#panelMenuFijo').addClass('fixed');
            } else {
                // sino removimos la clase
                $('#panelMenuFijo').removeClass('fixed');
            
            }
        });
    }
    
    
    jQuery.fn.obtenerVariable = function(nombre){
        switch (nombre) {
            case 'url':
                    return 'http://localhost/MVC/';
                break;
            default:
                break;
        }

    };
    
});