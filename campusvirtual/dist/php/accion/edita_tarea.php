<?php
include('../conexion.php');

$id = $_POST['id'];
$Posgrado = intval($_GET['idPosgrado']);
$idPosgrado =$Posgrado;
if ($Posgrado==1) {
  $Posgrado = "MDCDH";
}elseif ($Posgrado == 2) {
  $Posgrado = "MDE";
}elseif($Posgrado == 3){
  $Posgrado = "DDCDH";
}else{
  $Posgrado = "DDE";
}
$idSesion="";
$consulta ="SELECT a.idMateria, a.idSesion 
			FROM catg_sesiones a 
			INNER JOIN  catg_tareas as l ON l.idMateria= a.idSesion
			WHERE l.idTarea = '$id'  AND a.Eliminado=0";
			 mysqli_set_charset($conexion,"utf8");
			 $datos = mysqli_query($conexion,$consulta);
            while ($renglon=mysqli_fetch_array($datos)) {
			$idAsignacion=$renglon['idMateria'];
			$idSesion=$renglon['idSesion'];
			}
 
//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_tareas WHERE idTarea = '$id' ";

$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['idMateria'], 
				1 => $valores2['TituloTarea'], 
				2 => $valores2['Descripcion'],
				3 => $valores2['Link'],
				4 => $valores2['Archivo'],
				5 => $valores2['FechaEntrega'],
				6 => $idSesion,

				);
echo json_encode($datos);
?>