<?php
$idAlumno=$_GET['idAlumno'];
$id = $_POST['id'];
$fecha = date("Y-m-d H:i:s");

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
    $sql = "INSERT INTO catg_pago (idAlumno, idOrden, tipo_pago, forma_pago, totalidad, fecha, estatus) ".  "VALUES ($idAlumno, '$id', '0', '0', '1', '$fecha', 1)";
    $datos = mysqli_query($conexion,$sql);
?>
       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $idAlumno; ?>

  $('#contenido').load("php/listar_pagosNuevo.php?idAlumno="+idAlumno);


        } );
</script>