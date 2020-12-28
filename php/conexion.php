<?php

date_default_timezone_set('America/Mexico_City');
$conexion= mysqli_connect("localhost","ibero","ibero");


mysqli_query ($conexion, "SET NAMES 'utf8'");
if(!$conexion){
die("Fallo la conexión a la Base de Datos" . mysqli_error($conexion));
}

//Seleecionando la bd
$db_select = mysqli_select_db($conexion,"ibero");
if(!$db_select){
die("Lo Sentimos no Existe la Base de Datos" . mysqli_error($conexion));
}
mysqli_set_charset($conexion,"utf8");

?>
