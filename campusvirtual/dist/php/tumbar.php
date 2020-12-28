<?php
    require('conexion.php');  

$sql= "DELETE FROM usuario_activo a SET a.bloqueado=0 WHERE  emailInst='eduardocastellanoshernandez@iide-edu.com'";
$datos = mysqli_query($conexion,$consulta);
echo 'si';
?>