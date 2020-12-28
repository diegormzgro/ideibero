<?php
$idAlumno=$_GET['idAlumno'];
$id = $_POST['id'];
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
		$sql= "UPDATE catg_pago SET  estatus=1  WHERE id='$id'";
		$datos = mysqli_query($conexion,$sql);
?>
       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $idAlumno; ?>

  $('#contenido').load("php/listar_pagosNuevo.php?idAlumno="+idAlumno);


        } );
</script>