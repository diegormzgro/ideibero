<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
session_start();

$idAlumno = intval($_GET['idAlumno']);
$idSesion = intval($_GET['idSesion']);
$idEstatus = intval($_GET['idEstatus']);
$emailInst=$_SESSION['emailInst'];


$sql= "SELECT * FROM asistencias WHERE idAlumno='$idAlumno' AND idSesion='$idSesion' AND Eliminado=0 AND idEstatus=1 ";


$datos = mysqli_query($conexion,$sql);
$filas = mysqli_num_rows($datos);
if ($filas==0) {
	
	$sql ="INSERT INTO asistencias (idAlumno, idSesion, idEstatus) ".  "VALUES ('$idAlumno', '$idSesion', '$idEstatus')";
	$datos = mysqli_query($conexion,$sql);
    $from = "pruebas@iide-edu.com";
  $to = "ing.blancoross@gmail.com";

  $subjet = "Asistencia en directo de:";
  $mensaje = $emailInst;
  $headers = "From:". $from;

  mail($to,$subjet,$mensaje,$headers);
	echo "insercipi";
}else{
	echo "string";
}




?>