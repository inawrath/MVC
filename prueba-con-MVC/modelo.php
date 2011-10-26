<?php
$db = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $contrasenia);
$consulta = $db->prepare('SELECT * FROM items');
$consulta->execute();
$items = $consulta->fetchAll();
?>