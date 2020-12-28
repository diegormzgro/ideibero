<?php
session_start();

include('../conexion.php');

 
 $idAsignacion = $_POST['idAsignacion'];
$idExamen = $_POST['idExamen'];
$Estatus = $_POST['Estatus'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
if ($Estatus==0) {
$sql = "UPDATE catg_examen  SET Estatus = 1 WHERE idExamen = '$idExamen' ";
}else{
	$sql = "UPDATE catg_examen  SET Estatus = 0 WHERE idExamen = '$idExamen' ";

}
$registro = mysqli_query($conexion,$sql);

?>

       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idExamen = <?php echo $idExamen; ?>;
                var idAsignacion = <?php echo $idAsignacion; ?>;

  $('#contenido').load("php/lista_evaluacion.php?idExamen="+idExamen+"&idAsignacion="+idAsignacion);


        } );
</script>

