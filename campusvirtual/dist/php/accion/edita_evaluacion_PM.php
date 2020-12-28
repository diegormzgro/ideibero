<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_examen_detalle WHERE idExamenDetalle = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['Texto'], 
				1 => $valores2['Valor'],
				2 => $valores2['P1_Text'], 
				3 => $valores2['P2_Text'], 
				4 => $valores2['P3_Text'], 
				5 => $valores2['P4_Text'], 
				6 => $valores2['P5_Text'], 
				7 => $valores2['Respuesta'], 
				8 => $valores2['idExamen'], 

				//2 => $valores2['Fecha'],
				//3 => $valores2['idAsignacion'],
				//4 => $valores2['idPosgrado'],

				);
echo json_encode($datos);
?>