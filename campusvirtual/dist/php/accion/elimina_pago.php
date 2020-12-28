<?php
session_start();

include('../conexion.php');
$perfil=$_SESSION['Perfil'];
if ($perfil=='Control Escolar') {

$idAlumno=$_GET['idAlumno'];
$id = $_POST['id'];
$sql = "UPDATE catg_pago SET eliminado=1  WHERE id = '$id' ";
echo $sql;
}else{
$idAlumno=$_GET['idAlumno'];
$id = $_POST['id'];
$sql = "UPDATE catg_pago SET pago = null, archivo=NULL, descripcion= NULL WHERE idOrden = '$id'";
} 

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$registro = mysqli_query($conexion,$sql);

  
if ($perfil=='Control Escolar') {

?>

 <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $idAlumno; ?>

  $('#contenido').load("php/listar_pagosNuevo.php?idAlumno="+idAlumno);


        } );
</script>
<?php
}else{
?>
 <script type="text/javascript">
 
 
      $(document).ready(function() {

  $('#contenido').load("php/listar_pagosE.php");


        } );
</script>

<?php } ?>