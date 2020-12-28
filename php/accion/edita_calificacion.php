<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_calificaciones WHERE idCalificacion = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['idCalificacion'], 
				1 => $valores2['idAsignatura'], 
				2 => $valores2['idAlumno'], 
				3 => $valores2['idDocente'], 
				4 => $valores2['Calificacion'], 

				);
echo json_encode($datos);
?>