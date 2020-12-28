<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro = $_POST['pro'];
$id=$_POST['id'];

$INSTITUCION = $_POST['INSTITUCION'];
$NOMBRE = $_POST['NOMBRE'];
$CARGO=$_POST['CARGO'];
$CORREO=$_POST['CORREO'];

session_start();
//VERIFICAMOS EL PROCESO
$perfil=$_SESSION['emailInst'];
switch($pro){
  case 'Registro':
    $sql = "INSERT INTO directorio (INSTITUCION, NOMBRE, CARGO, CORREO) ".  "VALUES ('$INSTITUCION', '$NOMBRE', '$CARGO', '$CORREO')";
 
    $datos = mysqli_query($conexion,$sql);
    
  break;
  
  case 'Edicion':
    $sql= "UPDATE directorio SET INSTITUCION='$INSTITUCION', NOMBRE='$NOMBRE', CARGO='$CARGO', CORREO='$CORREO' WHERE NO='$id'";
    $datos = mysqli_query($conexion,$sql);
    
  break;

}




            ?>
 
