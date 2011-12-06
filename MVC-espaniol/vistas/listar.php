<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Language" content="Spanish" />
	<meta http-equiv="content-type" content="text/HTML; charset=UTF-8" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta http-equiv="content-style-type" content="text/javascript" />
        <meta name="author" content="Jonathan Andrés Fierro Sandoval - Ivan Edgardo Nawrath Castillo" />
        <link rel="icon" type="imagenes/ico" href="img/favicon.ico" />
	<title>Items listar - MVC</title>
</head>
<body>
<table>
	<tr>
		<th>ID</th>
                <th>Nombre Item</th>
                <th>Color</th>
        </tr>
	<?php
	// $listado es una variable asignada desde el controlador ItemsController.
	while($item = $listado->fetch())
	{
	?>
	<tr>
		<td><?php echo $item['id']?></td>
		<td><?php echo $item['nombre']?></td>
		<td><?php echo $item['color']?></td>
	</tr>
	<?php
	}
	?>
        
</table>
    </br>
    </br>
    </br>
    <a href="index.php?controlador=Index&accion=index">inicio</a>
</body>
</html>