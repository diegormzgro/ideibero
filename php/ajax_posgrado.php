<?php
    require('../campusvirtual/php/conexion.php');

	$cb_titulo = $_POST['cb_titulo'];
	$sql = "select id, UPPER(nombre_posgrado) AS Posgrado from catg_posgrado WHERE fk_posgrado='$cb_titulo'  ORDER BY id ";
    $datos = mysqli_query($conexion,$sql);

    echo "<option value='-1'>Seleccione</option>";
        while ($fila=mysqli_fetch_array($datos)){
            echo "<option value='".$fila[0]."'>".($fila[1])."</option>";
        }
	
?>

