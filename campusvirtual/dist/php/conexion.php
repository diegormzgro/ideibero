<?php

$localServer = "localhost";
$localusername = "root";
$localpassword = "";
$localdbname = "ibero";

date_default_timezone_set('America/Mexico_City');
$conexion= mysqli_connect("localhost",$localusername, $localpassword,"ibero");


mysqli_query ($conexion, "SET NAMES 'utf8'");
if(!$conexion){
die("Fallo la conexión a la Base de Datos" . mysqli_error($conexion));
}

echo "conection success";
echo 'Current PHP version: ' . phpversion();
//Seleecionando la bd
//$db_select = mysqli_select_db($conexion,"ibero");
//if(!$db_select){
//die("Lo Sentimos no Existe la Base de Datos" . mysqli_error($conexion));
//}
mysqli_set_charset($conexion,"utf8");
date_default_timezone_set('America/Mexico_City');

?>
