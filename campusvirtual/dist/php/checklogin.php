 <?php
include("conexion.php");

$username = $_POST['Correo'];
$password = $_POST['Pass'];

$sql = "


SELECT u.id, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno)AS Nombre, u.emailInst, u.pass, p.abrev AS Posgrado, pe.NombrePerfil AS Perfil, CURDATE() AS FechaActual, p.id as idPosgrado
FROM usuario_activo as u
INNER JOIN catg_posgrado as p ON p.id= u.id_posgrado
INNER JOIN catg_perfil as pe On pe.idPerfil= u.id_perfil
WHERE u.bloqueado=0 AND u.emailInst = '".$username."' 
AND u.pass = '".$password."' 
UNION 
SELECT d.id, CONCAT_WS(' ',d.nombre,d.ap_paterno, d.ap_materno) AS Nombre, d.emailInst, d.pass, '' as posgrado, 'Docente' As Perfil, CURRENT_DATE() AS FechaActual, 0 as idPosgrado
FROM catg_catedratico as d
WHERE d.Eliminado=0 AND d.emailInst = '".$username."' 
AND d.pass = '".$password."' 




" ;

$result = mysqli_query($conexion,$sql)or die($result);

$filas = mysqli_num_rows($result);
echo $filas;
if ($filas>0) {
	header("location:../general.php");
	session_start();
	$_SESSION['emailInst']= $_POST['emailInst'];
	$nombreU = $_SESSION['emailInst'];
while ($renglon=mysqli_fetch_array($result)) {
		$_SESSION['Perfil']= $renglon['Perfil'];
		$_SESSION['Posgrado']= $renglon['Posgrado'];
		$_SESSION['FechaActual']= $renglon['FechaActual'];
		$_SESSION['Nombre']= $renglon['Nombre'];
		$_SESSION['emailInst']= $renglon['emailInst'];
		$_SESSION['id']= $renglon['id'];
		$_SESSION['idPosgrado']= $renglon['idPosgrado'];
}

}
else{
	header("location:../indexi.html");
}
mysqli_free_result($result);

mysqli_close($conexion);

?>
