<?php

echo 'error 404';

if (isset($_GET['error']))
    switch ($_GET['error']) {
        case 'id':
            echo '<br />Debes ingresar el ID de un curso';
            break;
        case 'curso':
            echo '<br />Curso no existe';
            break;
        default:
            echo '<br />Acceso no Permitido';
            break;
    }
?>
