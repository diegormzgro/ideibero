<?php
session_start();

include('../conexion.php');
$idAsignacion=$_GET['idAsignacion'];
 
$id = $_POST['id'];
 

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_examen SET Eliminado = 1 WHERE idExamen = '$id' ";
$registro = mysqli_query($conexion,$sql);

?>
       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAsignacion = <?php echo $idAsignacion; ?>;

  $('#contenido').load("php/lista_evaluacion.php?idAsignacion="+idAsignacion);


        } );
</script>
