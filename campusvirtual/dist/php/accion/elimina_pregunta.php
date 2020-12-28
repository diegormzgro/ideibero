<?php
session_start();

include('../conexion.php');

 
$id = $_POST['id'];
 $idAsignacion = $_POST['idAsignacion'];
$idExamen = $_POST['idExamen'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_examen_detalle SET Eliminado = 1 WHERE idExamenDetalle = '$id' ";
$registro = mysqli_query($conexion,$sql);

?>

       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idExamen = <?php echo $idExamen; ?>;
                var idAsignacion = <?php echo $idAsignacion; ?>;

  $('#contenido').load("php/listar_examen_detalle.php?idExamen="+idExamen+"&idAsignacion="+idAsignacion);


        } );
</script>

