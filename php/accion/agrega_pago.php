<?php


header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro = $_POST['pro'];
$id=$_POST['id'];
session_start();
//VERIFICAMOS EL PROCESO
$alumno=$_POST['alumno'];
$tipo_pago = $_POST['tipo_pago'];
$forma_pago = $_POST['forma_pago'];
$fechapago = $_POST['fecha_pago'];
$descripcion = $_POST['descripcion'];
$pago = $_POST['pago'];
$pago = $_POST['pago'];
  $perfil=$_SESSION['Perfil'];

$idOrden = $_POST['idOrden'];
  if ($perfil=='Control Escolar') {

      if ($_POST['num_pago']) {
$orden = $_POST['num_pago'];
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
if ($_FILES['file_pago']['name']!="") {
          $archivo = $_FILES['file_pago'];
          $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
          $nombre = $_FILES['file_pago']['name'];
          if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {

          } 
          }

 switch($pro){
	case 'Registro':

  if ($perfil=='Control Escolar') {

    $sql = "INSERT INTO catg_pago (idAlumno, idOrden, tipo_pago, forma_pago, totalidad, fecha,  archivo, descripcion, pago, estatus) ".  "VALUES ($alumno, '$idOrden', '$tipo_pago', '$forma_pago', '1', '$fechapago', '$nombre', '$descripcion', '$pago', 0)";
  }else{
        $sql= "UPDATE catg_pago SET eliminado=1  WHERE idOrden='$idOrden' AND idAlumno='$alumno'  ";
    $datos = mysqli_query($conexion,$sql);

        $sql = "INSERT INTO catg_pago (idAlumno, idOrden, tipo_pago, forma_pago, totalidad, fecha,  archivo, descripcion, pago, estatus, activo) ".  "VALUES ($alumno, '$idOrden', '$tipo_pago', '$forma_pago', '1', '$fechapago', '$nombre', '$descripcion', '$pago', 0, 1)";

  $nuevo_msj ='El Instituto Iberoamericano de Derecho Electoral le informa que ha recibido su comprobante de pago.

Si tiene alguna duda o sugerencia con motivo de este correo electrónico comuníquese a los números telefónicos 55 6062 7722 / 55 79131372 o al correo electrónico posgrados@iide-edu.com

Le enviamos un cordial saludo.

Atentamente
Instituto Iberoamericano de Derecho Electoral
';


  $from = "notificaciones@iide-edu.com";
  $to = $email;

  $subjet = "Notificación/ Pagos";
  $mensaje =  $nuevo_msj;
  $headers = "From:". $from;
if ($email!="") {
  //mail($to,$subjet,$mensaje,$headers);
}
  }

		$datos = mysqli_query($conexion,$sql);
		
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