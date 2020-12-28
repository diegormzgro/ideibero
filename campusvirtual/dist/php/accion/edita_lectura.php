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
$consulta ="SELECT a.idMateria FROM catg_sesiones a 
			INNER JOIN  catg_lecturas as l ON l.idMateria= a.idMateria
			WHERE l.idLectura = '$id'";
			 mysqli_set_charset($conexion,"utf8");
			 $datos = mysqli_query($conexion,$consulta);
            while ($renglon=mysqli_fetch_array($datos)) {
			$idAsignacion=$renglon['idMateria'];
			}
//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_lecturas WHERE idLectura = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['TituloLectura'], 
				1 => $valores2['Descripcion'], 
				2 => $valores2['Archivo'],
				3 => 'http://localhost/iberoactualizado/campusvirtual/dist/archivos/Lecturas/'.$Posgrado.'/'.$valores2['Archivo'],
				4 => $idPosgrado,
				5 => $valores2['idMateria'],
				6 => $valores2['Link'],
				);
echo json_encode($datos);
?>