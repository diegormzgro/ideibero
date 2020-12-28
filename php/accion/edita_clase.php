<?php
include('../conexion.php');

$id = $_POST['id'];
$idGrupo = intval($_GET['idGrupo']);
//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT a.idMateria, p.id AS idPosgrado, p.abrev, a.Materia, (SELECT m.ProgramaEstudio FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$idGrupo') AS ProgramaEstudio, 
(SELECT m.idDocente FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$idGrupo') AS Docente,
      (SELECT st.id FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$idGrupo') AS Estatus
      fROM catg_asignatura AS a
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE  a.Eliminado=0 AND a.idMateria = '$id'
 ";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['idPosgrado'], 
				//1 => $valores2['idDocente'], 
				1 => $valores2['idMateria'],
				2 => $valores2['Docente'],
				3 => $idGrupo,
				4 => $valores2['Estatus'], 
				5 => $valores2['ProgramaEstudio'], 
				6 => 'http://localhost/iberoactualizado/campusvirtual/dist/archivos/ProgramaEstudio/'.$valores2['abrev'].'/'.$valores2['ProgramaEstudio'],
				);
echo json_encode($datos);
?>