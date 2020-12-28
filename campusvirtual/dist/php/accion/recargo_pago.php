<?php
$idAlumno=$_GET['idAlumno'];
$id = $_POST['id'];
$fecha = date("Y-m-d H:i:s");

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
            $cons="SELECT * FROM catg_pago WHERE idOrden='$did' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
    $sql = "UPDATE catg_pago SET recargo='1', fecha='$fecha'  WHERE idOrden='$id' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
}else{
    $sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo, recargo) ".  "VALUES ($idAlumno, '$id',1,1)";

}
    $datos = mysqli_query($conexion,$sql);

?>
       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $idAlumno; ?>

  $('#contenido').load("php/listar_pagosNuevo.php?idAlumno="+idAlumno);


        } );
</script>