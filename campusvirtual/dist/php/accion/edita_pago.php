<?php
include('../conexion.php');

$id = $_POST['id'];

$consulta ="SELECT * FROM catg_pago a 
			
			WHERE id = '$id'";
			 mysqli_set_charset($conexion,"utf8");
			 $datos = mysqli_query($conexion,$consulta);


$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['idAlumno'], 
				1 => $valores2['idOrden'], 
				2 => $valores2['forma_pago'],
				3 => $valores2['fecha'],
				4 => $valores2['pago'],
				
				

				);
echo json_encode($datos);
?>