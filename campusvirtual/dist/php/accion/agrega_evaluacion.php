<?php
header("Content-Type: text/html;charset=utf-8");
$idAsignacionPM = $_POST['idAsignacion'];

$Titulo = $_POST['Titulo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$pro= $_POST['pro2'];
$id= $_POST['id2'];

session_start();
 

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
switch($pro){
	case 'Registro':
$sql = "INSERT INTO catg_examen (idAsignacion, TituloExamen, Descripcion, Fecha) ".  "VALUES ($idAsignacionPM, '$Titulo', '$descripcion', '$fecha')";
        $datos = mysqli_query($conexion,$sql);
break;
	
	case 'Edicion':
	$sql= "UPDATE catg_examen SET Descripcion='$descripcion', TituloExamen='$Titulo', Fecha='$fecha' WHERE idExamen='$id'";
		$datos = mysqli_query($conexion,$sql);
    break;

}
?>
       <script type="text/javascript">
 
 
      $(document).ready(function() {
                var idAsignacion = <?php echo $idAsignacionPM; ?>;

  $('#contenido').load("php/lista_evaluacion.php?idAsignacion="+idAsignacion);


        } );
</script>
