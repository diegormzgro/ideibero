<?php


header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro = $_POST['pro_dif'];
$id=$_POST['id_dif'];
session_start();
//VERIFICAMOS EL PROCESO
$alumno=$_POST['alumno_dif'];
$tipo_pago = $_POST['tipo_pago_dif'];
$forma_pago = $_POST['forma_pago_dif'];
$fechapago = $_POST['fecha_pago_dif'];
$descripcion = $_POST['descripcion_dif'];
$pago = $_POST['pago_dif'];
$perfil=$_SESSION['Perfil'];

$idOrden = $_POST['idOrden_dif'];
  if ($perfil=='Control Escolar') {
$alumno=$_POST['idAlumno_dif'];

      if ($_POST['num_pago_dif']) {
$orden = $_POST['num_pago_dif'];
}}
$sql ="SELECT u.emailInst, u.email_particular FROM usuario_activo AS u WHERE u.id='$alumno'";
            $datos = mysqli_query($conexion,$sql);
            while ($renglon=mysqli_fetch_array($datos)) {
            	$correo=$renglon['emailInst'];
              $email = $renglon['email_particular'];
            }

$micarpeta = "../../archivos/Pagos/$correo/";
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);

}else{

}
if ($_FILES['file_pago_dif']['name']!="") {
          $archivo = $_FILES['file_pago_dif'];
          $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
          $nombre = $_FILES['file_pago_dif']['name'];
          if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {

          } 
          }



  if ($perfil=='Control Escolar') {

        $sql = "INSERT INTO catg_pago (idAlumno, idOrden, tipo_pago, forma_pago, totalidad, fecha,  archivo, descripcion, pago, estatus, activo, diferencia) ".  "VALUES ($alumno, '$idOrden', '$tipo_pago', '$forma_pago', '1', '$fechapago', '$nombre', '$descripcion', '$pago', 0, 1, 1)";
        $datos = mysqli_query($conexion,$sql);
  }


 switch($pro){
	case 'Registro':

  if ($perfil=='Control Escolar') {
    
  }else{
       // $sql= "UPDATE catg_pago SET eliminado=1  WHERE idOrden='$idOrden' AND idAlumno='$alumno'  ";

        $sql = "INSERT INTO catg_pago (idAlumno, idOrden, tipo_pago, forma_pago, totalidad, fecha,  archivo, descripcion, pago, estatus, activo, diferencia) ".  "VALUES ($alumno, '$idOrden', '$tipo_pago', '$forma_pago', '1', '$fechapago', '$nombre', '$descripcion', '$pago', 0, 1, 1)";
    $datos = mysqli_query($conexion,$sql);

 
  }

		
	break;

	case 'Edicion':
		$sql= "UPDATE catg_pago SET idOrden='$orden', pago='$pago', forma_pago='$forma_pago', descripcion='$descripcion', fecha='$fechapago'   WHERE id='$id'";
		$datos = mysqli_query($conexion,$sql);
		
	break;

}
         ?>
<?php

  if ($perfil=='Control Escolar') {

    ?>


       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAlumno = <?php echo $alumno; ?>

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

<?php
}
?>