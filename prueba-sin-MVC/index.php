<?php
    require 'conexion.php';
    $db = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $contrasenia);
    $consulta = $db->prepare('SELECT * FROM items WHERE id_item = ? OR id_item = ?');
    $consulta->execute(array(2, 4));
    $items = $consulta->fetchAll();
    $db = null;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="ES">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>
    <table>
	<tr>
            <th>ID</th>
            <th>Item</th>
        </tr>
	<?php
	foreach($items as $item)
	{
	?>
	<tr>
            <td><?php echo $item['id_item']?></td>
            <td><?php echo $item['item']?></td>
	</tr>
	<?php
	}
	?>
    </table>
</body>
</html>