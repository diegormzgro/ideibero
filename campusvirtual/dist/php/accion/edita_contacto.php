<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM directorio WHERE NO = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['NO'], 
				1 => $valores2['INSTITUCION'], 
				2 => $valores2['NOMBRE'],
				3 => $valores2['CARGO'],
				4 => $valores2['CORREO'],
				5 => $valores2['ENVIO'],

				//4 => $valores2['idPosgrado'],

				);
echo json_encode($datos);
?>