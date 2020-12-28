<?php
header("Content-Type: text/html;charset=utf-8");
$idAsignacionPM = $_POST['idAsignacionPV'];

$idExamenPM = $_POST['idExamenPV'];
$PreguntaPM = $_POST['PreguntaPV'];
session_start();
  $perfil=$_SESSION['Perfil'];

 $R1 = $_POST['R1V'];

 $R2 = $_POST['R2V'];
$pro= $_POST['proPV'];
$id= $_POST['idPV'];
$Valor= $_POST['ValorPV'];

$fecha = date("Y-m-d H:i:s");

if (isset($_POST['radioPV'])) {
  $R_Correcta = $_POST['radioPV'];
  }
 

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
switch($pro){
  case 'Registro':
$sql = "INSERT INTO catg_examen_detalle (idExamen, P1, P1_Text, P2, P2_Text,  Texto, Respuesta, Tipo, Valor) ".  "VALUES ($idExamenPM, 0,'$R1', 0, '$R2','$PreguntaPM', '$R_Correcta', 2, '$Valor')";
        $datos = mysqli_query($conexion,$sql);
break;
  
  case 'Edicion':
  $sql= "UPDATE catg_examen_detalle SET P1_Text='$R1', P2_Text='$R2', Texto='$PreguntaPM',  Respuesta='$R_Correcta', Valor='$Valor'  WHERE idExamenDetalle='$id'";
    $datos = mysqli_query($conexion,$sql);
     break;

}
?>
<?php

  if ($perfil<>'Alumno') {

    ?>

       <script type="text/javascript">
 
                var idExamen = <?php echo $idExamenPM; ?>;
                var idAsignacion = <?php echo $idAsignacionPM; ?>;

  $('#contenido').load("php/listar_examen_detalle.php?idExamen="+idExamen+"&idAsignacion="+idAsignacion);


</script>
<?php
}
?>