<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');

session_start();
  $perfil=$_SESSION['Perfil'];
  $id=$_SESSION['id'];
$idAsignacionPM = $_POST['Asignacion'];
$idExamen =  $_POST['idExamen'];
$alumno =  $_POST['alumno'];

$sql ="SELECT * FROM catg_examen_detalle WHERE idExamen='$idExamen' AND Eliminado=0";
$datos = mysqli_query($conexion,$sql);
while ($renglon=mysqli_fetch_array($datos)) {
	$idExamenDetalle = $renglon['idExamenDetalle'];
	$Tipo = $renglon['Tipo'];
  $Respuesta = $renglon['Respuesta'];

  $sql_alumno ="SELECT * FROM catg_examen_detalle_alumno WHERE idExamen='$idExamenDetalle' AND Eliminado=0 AND idAlumno='$alumno' ";
  $datos_alum = mysqli_query($conexion,$sql_alumno);

  while ($renglonD=mysqli_fetch_array($datos_alum)) {
  $Respuesta_alumno = $renglonD['Respuesta'];
	if ($Tipo==2) {
    $R1 = 'RV'.$idExamenDetalle;
		$R1 = $_POST[$R1];
    if ($Respuesta_alumno=$Respuesta) {
        $sqli = "UPDATE  catg_examen_detalle_alumno SET Estatus=1 WHERE idExamen='$idExamenDetalle' AND Eliminado=0 AND idAlumno='$alumno'";
        $datosi = mysqli_query($conexion,$sqli);
    }else{

    }


	}
  if ($Tipo==1) {
    $R2 = 'RM'.$idExamenDetalle;
    $R2 = 'RM'.$idExamenDetalle;
    $R2 = $_POST[$R2];
    if ($Respuesta_alumno=$Respuesta) {
        $sqli = "UPDATE  catg_examen_detalle_alumno SET Estatus=1 WHERE idExamen='$idExamenDetalle' AND Eliminado=0 AND idAlumno='$alumno'";
        $datosi = mysqli_query($conexion,$sqli);
    }else{

    }
  }
    if ($Tipo==3) {
    $RA = 'RAC'.$idExamenDetalle;
    $RA = $_POST[$RA];

    echo  $RA;
    if ($RA=='Correcta') {
        $sqli = "UPDATE  catg_examen_detalle_alumno SET Estatus=1 WHERE idExamen='$idExamenDetalle' AND Eliminado=0  AND idAlumno='$alumno'";
        $datosi = mysqli_query($conexion,$sqli);    
    }
  }

}
}


$fecha = date("Y-m-d H:i:s");

?>
<?php

  if ($perfil=='Control Escolar') {


}
?>