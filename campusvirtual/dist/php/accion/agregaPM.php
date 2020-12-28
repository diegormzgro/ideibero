<?php
header("Content-Type: text/html;charset=utf-8");
$idAsignacionPM = $_POST['idAsignacionPM'];

$idExamenPM = $_POST['idExamenPM'];
$PreguntaPM = $_POST['PreguntaPM'];
$pro= $_POST['proPM'];
$id= $_POST['idPM'];

session_start();
  $perfil=$_SESSION['Perfil'];

 $R1 = $_POST['R1'];

 $R2 = $_POST['R2'];

 $R3 = $_POST['R3'];

 $R4 = $_POST['R4'];

 $R5 = $_POST['R5'];

 $Valor = $_POST['ValorPM'];

$fecha = date("Y-m-d H:i:s");

if (isset($_POST['inlineRadioOptions'])) {
  $R_Correcta = $_POST['inlineRadioOptions'];
  }
 

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
switch($pro){
  case 'Registro':

$sql = "INSERT INTO catg_examen_detalle (idExamen, P1, P1_Text, P2, P2_Text,  P3, P3_Text, P4, P4_Text, P5, P5_Text, Texto, Respuesta, Tipo, Valor) ".  "VALUES ($idExamenPM, 0,'$R1', 0, '$R2',0, '$R3', 0, '$R4',0, '$R5','$PreguntaPM', '$R_Correcta', 1, '$Valor')";

        $datos = mysqli_query($conexion,$sql);
break;
  
  case 'Edicion':
  $sql= "UPDATE catg_examen_detalle SET P1_Text='$R1', P2_Text='$R2', P3_Text='$R3', P5_Text='$R5', P4_Text='$R4', Texto='$PreguntaPM',  Respuesta='$R_Correcta', Valor='$Valor'  WHERE idExamenDetalle='$id'";
    $datos = mysqli_query($conexion,$sql);
   break;

}


?>





<?php

  if ($perfil<>'Alumno') {

    ?>

       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idExamen = <?php echo $idExamenPM; ?>;
                var idAsignacion = <?php echo $idAsignacionPM; ?>;

  $('#contenido').load("php/listar_examen_detalle.php?idExamen="+idExamen+"&idAsignacion="+idAsignacion);


        } );
</script>
<?php
}
?>