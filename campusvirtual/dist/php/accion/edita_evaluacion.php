<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_examen WHERE idExamen = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['TituloExamen'], 
				1 => $valores2['Descripcion'], 
				2 => $valores2['Fecha'],
				3 => $valores2['idAsignacion'],
				//4 => $valores2['idPosgrado'],

				);
echo json_encode($datos);
?>