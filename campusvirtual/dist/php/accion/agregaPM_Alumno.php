<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');

session_start();
  $perfil=$_SESSION['Perfil'];
  $id=$_SESSION['id'];
$idAsignacionPM = $_POST['Asignacion'];
$idExamen =  $_POST['idExamen'];

$sql ="SELECT * FROM catg_examen_detalle WHERE idExamen='$idExamen' AND Eliminado=0";
$datos = mysqli_query($conexion,$sql);
while ($renglon=mysqli_fetch_array($datos)) {
	$idExamenDetalle = $renglon['idExamenDetalle'];
	$Tipo = $renglon['Tipo'];

	if ($Tipo==2) {
    $R1 = 'RV'.$idExamenDetalle;
		$R1 = $_POST[$R1];
    $sqli = "INSERT INTO catg_examen_detalle_alumno (idExamen, idAlumno, P1, P1_Text, Respuesta, Tipo) ".  "VALUES ($idExamenDetalle, $id, 0,'$R1', '$R1', 2)";
    $datosi = mysqli_query($conexion,$sqli);

	}
  if ($Tipo==1) {
    $R2 = 'RM'.$idExamenDetalle;
    $R2 = 'RM'.$idExamenDetalle;
    $R2 = $_POST[$R2];
    $sql2 = "INSERT INTO catg_examen_detalle_alumno (idExamen, idAlumno, P1, P1_Text, Respuesta, Tipo) ".  "VALUES ($idExamenDetalle, $id, 0,'$R2', '$R2', 1)";
    $datos2 = mysqli_query($conexion,$sql2);
  }
    if ($Tipo==3) {
    $RA = 'RA'.$idExamenDetalle;
    $RA = 'RA'.$idExamenDetalle;
    $RA = $_POST[$RA];
    $sql3 = "INSERT INTO catg_examen_detalle_alumno (idExamen, idAlumno, P1, P1_Text, Respuesta, Tipo) ".  "VALUES ($idExamenDetalle, $id, 0,'$RA', '$RA', 3)";
    $datos3 = mysqli_query($conexion,$sql3);
  }

}


$fecha = date("Y-m-d H:i:s");


//$sql = "INSERT INTO catg_examen_detalle_alumno (idExamen, idAlumno, P1, P1_Text, P2, P2_Text,  P3, P3_Text, P4, P4_Text, P5, P5_Text, Texto, Respuesta, Tipo) ".  "VALUES ($idExamenPM, $id, 0,'$R1', 0, '$R2',0, '$R3', 0, '$R4',0, '$R5','$PreguntaPM', '$R_Correcta', 1)";
//echo $sql;
       // $datos = mysqli_query($conexion,$sql);
?>
<?php

  if ($perfil=='Control Escolar') {


}
?>