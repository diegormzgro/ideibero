 <script src="js/myjava.js"></script>
<?php
session_start();

include('../conexion.php');

 
$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO
$sql = "UPDATE directorio SET ELIMINADO=1 WHERE NO='$id'";
$datos = mysqli_query($conexion,$sql);



            ?>
 