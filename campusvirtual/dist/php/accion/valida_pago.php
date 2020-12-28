<?php
$idAlumno=$_GET['idAlumno'];
$id = $_POST['id'];
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
		$sql= "UPDATE catg_pago SET  estatus=1  WHERE idOrden='$id' AND idAlumno='$idAlumno' AND eliminado=0 ";
		//echo $sql;
		$datos = mysqli_query($conexion,$sql);
?>
       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $idAlumno; ?>

  $('#contenido').load("php/listar_pagosNuevo.php?idAlumno="+idAlumno);


        } );
</script>