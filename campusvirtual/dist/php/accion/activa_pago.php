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

            $cons="SELECT * FROM catg_pago WHERE idOrden='1' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{
                $sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 1,1)";
            $datos = mysqli_query($conexion,$sql);
            }
    		


            $cons="SELECT * FROM catg_pago WHERE idOrden='2' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{
                $sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 2,1)";
            $datos = mysqli_query($conexion,$sql);
            }
    		


            $cons="SELECT * FROM catg_pago WHERE idOrden='3' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 3,1)";
            $datos = mysqli_query($conexion,$sql);
            }


            $cons="SELECT * FROM catg_pago WHERE idOrden='4' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{
            $sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 4,1)";
            $datos = mysqli_query($conexion,$sql);
            }


            $cons="SELECT * FROM catg_pago WHERE idOrden='5' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{            
            $sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 5,1)";
            $datos = mysqli_query($conexion,$sql);
            } 
    		
    		}elseif($id>=6 and $id <=10){

            $cons="SELECT * FROM catg_pago WHERE idOrden='6' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{                      
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 6,1)";
            $datos = mysqli_query($conexion,$sql);
            }


            $cons="SELECT * FROM catg_pago WHERE idOrden='7' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{   
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 7,1)";
            $datos = mysqli_query($conexion,$sql);
            }


            $cons="SELECT * FROM catg_pago WHERE idOrden='8' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{   
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 8,1)";
    		$datos = mysqli_query($conexion,$sql);
            }
            


            $cons="SELECT * FROM catg_pago WHERE idOrden='9' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{   
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 9,1)";
            $datos = mysqli_query($conexion,$sql);
            }
    		

            $cons="SELECT * FROM catg_pago WHERE idOrden='10' AND idAlumno='$idAlumno' AND eliminado=0 AND activo =1";
            $datosd = mysqli_query($conexion,$cons);
            $filasGeneral = mysqli_num_rows($datosd);
            if ($filasGeneral>0) {
            }else{            
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 10,1)";
            $datos = mysqli_query($conexion,$sql);
            }


    		}elseif($id>=11 and $id <=15){
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 11,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 12,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 13,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 14,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 15,1)";
    		$datos = mysqli_query($conexion,$sql);
    		}elseif($id>=16 and $id <=20){
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 16,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 17,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 18,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 19,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 20,1)";
    		$datos = mysqli_query($conexion,$sql);
    		}elseif($id>=21 and $id <=25){
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 21,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 22,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 23,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 24,1)";
    		$datos = mysqli_query($conexion,$sql);
    		$sql = "INSERT INTO catg_pago (idAlumno, idOrden, activo) ".  "VALUES ($idAlumno, 25,1)";
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