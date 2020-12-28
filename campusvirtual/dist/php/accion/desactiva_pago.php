<?php
$idAlumno=$_GET['idAlumno'];
$id = $_POST['id'];
$fecha = date("Y-m-d H:i:s");

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$Consultaalumno="SELECT id_posgrado FROM usuario_activo WHERE id='$idAlumno'";
$respu = mysqli_query($conexion,$Consultaalumno);

        while ($renglon=mysqli_fetch_array($respu)) {
            $posgrado = $renglon['id_posgrado'];
        }
        if ($posgrado==1 or $posgrado==2) {
        	if ($id==1 or $id==2 or $id==3 or $id==4 or $id==5) {
    		$sql = "UPDATE catg_pago SET activo=0 WHERE $idAlumno=$idAlumno AND idOrden IN (1,2,3,4,5) ";
    		$datos = mysqli_query($conexion,$sql);
    		}elseif($id>=6 and $id <=10){
            $sql = "UPDATE catg_pago SET activo=0 WHERE $idAlumno=$idAlumno AND idOrden IN (6,7,8,9,10) ";
            $datos = mysqli_query($conexion,$sql);
    		}elseif($id>=11 and $id <=15){
            $sql = "UPDATE catg_pago SET activo=0 WHERE $idAlumno=$idAlumno AND idOrden IN (11,12,13,14,15) ";
            $datos = mysqli_query($conexion,$sql);
    		}elseif($id>=16 and $id <=20){
            $sql = "UPDATE catg_pago SET activo=0 WHERE $idAlumno=$idAlumno AND idOrden IN (16,17,18,19,20) ";
            $datos = mysqli_query($conexion,$sql);
    		}elseif($id>=21 and $id <=25){
            $sql = "UPDATE catg_pago SET activo=0 WHERE $idAlumno=$idAlumno AND idOrden IN (21,22,23,24,25) ";
            $datos = mysqli_query($conexion,$sql);
    		}


        }else{

        }

?>
       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $idAlumno; ?>

  $('#contenido').load("php/listar_pagosNuevo.php?idAlumno="+idAlumno);


        } );
</script>