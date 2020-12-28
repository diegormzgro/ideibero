<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_grupo WHERE idGrupo = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['idPosgrado'], 
				1 => $valores2['NombreGrupo'], 
				2 => $valores2['Periodo'],
				//4 => $valores2['idPosgrado'],

				);
echo json_encode($datos);
?>