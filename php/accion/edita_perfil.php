<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM usuario_activo WHERE id = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['nombre'], 
				1 => $valores2['ap_paterno'], 
				2 => $valores2['ap_materno'],
				3 => $valores2['telefono'],
				4 => $valores2['email'], 
				5 => $valores2['sexo'], 
				6 => $valores2['fecha_nac'],
				7 => $valores2['emailInst'],
				8 => $valores2['pass'],
				9 => $valores2['calle'],
				10 => $valores2['num_int'],
				11 => $valores2['num_ext'],
				12 => $valores2['ciudad'],
				13 => $valores2['estado'],
				14 => $valores2['cod_postal'],
				15 => $valores2['periodo'],
				16 => $valores2['nacionalidad'],
				17 => $valores2['doc_acreditacion'],
				18 => $valores2['num_doc'],
				19 => $valores2['universidad'],
				20 => $valores2['pais_estudio'],
				21 => $valores2['estado_estudio'],
				22 => $valores2['tipo_titulo'],
				23 => $valores2['fecha_finalizacion'],
				24 => $valores2['doc_recibo'],
				25 => $valores2['doc_fotografia'],
				26 => $valores2['doc_acta'],
				27 => $valores2['doc_titulo'],
				28 => $valores2['doc_identificacion'],
				29 => $valores2['doc_cv'],
				30 => $valores2['doc_cert'],
				31 => $valores2['doc_cedula'],
				32 => $valores2['id_perfil'],
				33 => $valores2['id_posgrado'],
				34 => $valores2['status'],
				);
echo json_encode($datos);
?>