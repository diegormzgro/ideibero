<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_sesiones WHERE idSesion = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['idMateria'], 
				1 => $valores2['NombreSesion'], 
				2 => $valores2['FechaSesion'],
				3 => $valores2['HoraInicio'],
				4 => $valores2['HoraTermino'],
				5 => $valores2['Link'],
				6 => $valores2['LinkDiferido'],
				7 => $valores2['Pass'],

				);
echo json_encode($datos);
?>