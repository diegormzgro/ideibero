<?php
session_start();

include('../conexion.php');
$idAlumno=$_GET['idAlumno'];
 
$id = $_POST['id'];
 

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_pago SET eliminado = 1 WHERE id = '$id' ";
$registro = mysqli_query($conexion,$sql);

  $perfil=$_SESSION['Perfil'];

?>

       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $idAlumno; ?>

  $('#contenido').load("php/listar_pagosNuevo.php?idAlumno="+idAlumno);


        } );
</script>