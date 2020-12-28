<?php
include('../conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO
$sql = "SELECT * FROM catg_catedratico WHERE id = '$id'";
$datos = mysqli_query($conexion,$sql);
$valores2 = mysqli_fetch_array($datos);
$datos = array(
				0 => $valores2['id'], 
				1 => $valores2['titulo'], 
				2 => $valores2['nombre'],
				3 => $valores2['ap_paterno'],
				4 => $valores2['ap_materno'], 
				5 => $valores2['nacionalidad'], 
				6 => $valores2['curp'],
				7 => $valores2['fecha_nac'],
				8 => $valores2['telefono'], 
				9 => $valores2['telefono_fijo'],
				10 => $valores2['ext'],
				11 => $valores2['email'], 
				12 => $valores2['calle'],
				13 => $valores2['num_ext'],
				14 => $valores2['num_int'], 
				15 => $valores2['colonia'],
				16 => $valores2['municipio'],
				17 => $valores2['estado'], 
				18 => $valores2['cod_postal'],
				19 => $valores2['pais'],

				20 => $valores2['lic'], 
				21 => $valores2['lic_uni'],
				22 => $valores2['lic_pais'],
				23 => $valores2['lic_estatus'], 
				24 => $valores2['lic_fecha'],

				25 => $valores2['mtria'],
				26 => $valores2['mtria_uni'],
				27 => $valores2['mtria_pais'],
				28 => $valores2['mtria_estatus'], 
				29 => $valores2['mtria_fecha'],

				30 => $valores2['doc'],
				31 => $valores2['doc_uni'], 
				32 => $valores2['doc_pais'],
				33 => $valores2['doc_estatus'],
				34 => $valores2['doc_fecha'], 

				35 => $valores2['emailInst'],
				36 => $valores2['sexo'],
				37 => $valores2['municipio'],
				38 => $valores2['pass'],

  				);
echo json_encode($datos);
?>