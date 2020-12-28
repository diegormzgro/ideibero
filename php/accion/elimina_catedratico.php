<?php
session_start();

include('../conexion.php');

 
$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_catedratico SET eliminado = 1 WHERE id = '$id' ";
$registro = mysqli_query($conexion,$sql);

?>
  