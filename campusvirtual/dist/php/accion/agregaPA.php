<?php
header("Content-Type: text/html;charset=utf-8");
$idAsignacionPM = $_POST['idAsignacionPA'];

$idExamenPM = $_POST['idExamenPA'];
$PreguntaPM = $_POST['PreguntaPA'];
session_start();
$Valor = $_POST['ValorPA'];

$perfil=$_SESSION['Perfil'];
$pro= $_POST['proPA'];
$id= $_POST['idPA'];

$R_Correcta = $_POST['RespuestaPA'];

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
switch($pro){
  case 'Registro':

$sql = "INSERT INTO catg_examen_detalle (idExamen, Texto, Respuesta, Tipo, Valor) ".  "VALUES ($idExamenPM, '$PreguntaPM', '$R_Correcta', 3, '$Valor')";

        $datos = mysqli_query($conexion,$sql);
break;
  
  
  case 'Edicion':
  $sql= "UPDATE catg_examen_detalle SET Texto='$PreguntaPM',  Respuesta='$R_Correcta', Valor='$Valor'  WHERE idExamenDetalle='$id'";
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