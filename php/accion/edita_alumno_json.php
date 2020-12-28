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
				3 => $valores2['id_posgrado'], 
				4 => $valores2['emailInst'], 
				5 => $valores2['pass'], 
				6 => $valores2['fecha_nac'], 
				7 => $valores2['sexo'], 
				8 => $valores2['curp'], 
				9 => $valores2['tel_celular'], 
				10 => $valores2['tel_fijo'], 
				11 => $valores2['ext'], 
				12 => $valores2['email_particular'], 
				13 => $valores2['calle'], 
				14 => $valores2['num_int'], 
				15 => $valores2['num_ext'], 
				16 => $valores2['colonia'], 
				17 => $valores2['ciudad'], 
				18 => $valores2['estado'], 
				19 => $valores2['ext'], 
				20 => $valores2['cod_postal'], 
				21 => $valores2['pais'], 
				22 => $valores2['nacionalidad'], 

				23 => $valores2['lic_lic'], 
				24 => $valores2['lic_uni'], 
				25 => $valores2['lic_pais'], 
				26 => $valores2['lic_status'], 
				27 => $valores2['lic_fecha_fin'], 


				28 => $valores2['mtr_mtr'], 
				29 => $valores2['mtr_uni'], 
				30 => $valores2['mtr_pais'], 
				31 => $valores2['mtr_status'], 
				32 => $valores2['mtr_fecha_fin'], 

				33 => $valores2['doc_doc'], 
				34 => $valores2['doc_uni'], 
				35 => $valores2['doc_pais'], 
				36 => $valores2['doc_status'], 
				37 => $valores2['doc_fecha_fin'],
				 
				38 => $valores2['id_grupo'],

				39 => $valores2['pago_convocatoria'], 
				40 => $valores2['pago_ultimo'], 
				41 => $valores2['pago_total'], 
				42 => $valores2['pago_beca'], 
				43 => $valores2['pago_inscripcion'],
				44 => $valores2['pago_inscripcion_beca'],

				45 => $valores2['inscripcion_pago'], 
				46 => $valores2['inscripcion_pagado'], 
				47 => $valores2['inscripcion_fecha'], 
				48 => $valores2['mensualidad_pago'], 
				49 => $valores2['mensualidad_pagado'],
				50 => $valores2['mensualidad_fecha'],

				51 => $valores2['doc_cv'],
				);
echo json_encode($datos);
?>