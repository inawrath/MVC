prueba
<br/>
listado de usuarios:

<?php
// $listado es una variable asignada desde pruebaControlador $data['listado'] 
// la cual se le pasa a base vistas la cual hace la conversion a $listado
for ($index = 0; $index < 20; $index++) {
 echo '<br/>';   
}
while ($item = $listado->fetch()) {
    ?>
    <br/>
    <span>
        <?php echo $item['usu_id'] ?>
        <?php echo $item['usu_usuario'] ?>
    </span>
    <?php
}
?>