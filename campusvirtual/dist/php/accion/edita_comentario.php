<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_tareas_detalle WHERE idTareaDetalle = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['Comentarios'], 
				1 => $valores2['ComentarioDocente'], 

				);
echo json_encode($datos);
?>