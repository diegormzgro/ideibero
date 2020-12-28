<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
session_start();

  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL );

$idAlumno = intval($_GET['idAlumno']);
$idSesion = intval($_GET['idSesion']);
$idEstatus = intval($_GET['idEstatus']);
$emailInst=$_SESSION['emailInst'];


$sql= "SELECT * FROM asistencias WHERE idAlumno='$idAlumno' AND idSesion='$idSesion' AND Eliminado=0 ";


$datos = mysqli_query($conexion,$sql);
$filas = mysqli_num_rows($datos);
if ($filas==0) {
	
	$sql ="INSERT INTO asistencias (idAlumno, idSesion, idEstatus) ".  "VALUES ('$idAlumno', '$idSesion', '2')";
	$datos = mysqli_query($conexion,$sql);
    $from = "pruebas@iide-edu.com";
  $to = "ing.blancoross@gmail.com";

  $subjet = "Asistencia diferida de:";
  $mensaje = $emailInst;
  $headers = "From:". $from;

  mail($to,$subjet,$mensaje,$headers);

	echo "insercipi";
}else{
	echo "string";
}




?>