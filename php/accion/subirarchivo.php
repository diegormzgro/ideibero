
	<html>
	    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link rel="shortcut icon" href="../../../../img/logo-100.png" type="image/vnd.microsoft.icon" />
        <title>Campus virtual</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

        
        
    </head>
	<body style="background-image: url(../../opciones/fondo.png) ; background-repeat: no-repeat;   -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
		<center>
			<br>
		<h3>
			<p style="color:#FFFFFF";>

<?php
define('CHARSET','UTF-8');
header("Content-Type: text/html;charset=utf-8");

include('../conexion.php');

//datos del arhivo
$posgrado = $_POST['posgrado'];
$catedra = $_POST['catedra'];
$docente = $_POST['docente'];
	$error = "";


$num = count($_FILES['file1']['name']);
if ($num>1 and ($posgrado==3)) {

//foreach($_FILES['file1']['tmp_name'] as $key => $tmp_name)
//{
    $file_name1 = $_FILES['file1']['name'][0];  
    $tem1 = $_FILES['file1']['tmp_name'][0];
    
    $file_name2 = $_FILES['file1']['name'][1];  
    $tem2 = $_FILES['file1']['tmp_name'][1];

	header("Content-Type: text/html;charset=utf-8");
  

   	if (move_uploaded_file($tem1, '../../archivos/ProgramaEstudio/'.utf8_decode($file_name1))){
	$sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(1, $docente, '$catedra','$file_name1')";
	$datos = mysqli_query($conexion,$sql);
	echo "Archivo: ".$file_name1. " subido corrrectamente<br>";

   	}else{

    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}

   	if (move_uploaded_file($tem2, '../../archivos/ProgramaEstudio/'.utf8_decode($file_name2))){
	$sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(2, $docente, '$catedra','$file_name2')";
	$datos = mysqli_query($conexion,$sql);
	echo "Archivo: ".$file_name2. " subido corrrectamente<br>";

   	}else{

      		echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}
//}

}elseif ( $posgrado==6) {
    $file_name1 = $_FILES['file1']['name'][0];  
    $tem1 = $_FILES['file1']['tmp_name'][0];
    
    $file_name2 = $_FILES['file1']['name'][1];  
    $tem2 = $_FILES['file1']['tmp_name'][1];

  header("Content-Type: text/html;charset=utf-8");
  

    if (move_uploaded_file($tem1, '../../archivos/ProgramaEstudio/'.utf8_decode($file_name1))){
  $sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(2, $docente, '$catedra','$file_name1')";
  $datos = mysqli_query($conexion,$sql);
  echo "Archivo: ".$file_name1. " subido corrrectamente<br>";

    }else{

    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
    }

    if (move_uploaded_file($tem2, '../../archivos/ProgramaEstudio/'.utf8_decode($file_name2))){
  $sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(3, $docente, '$catedra','$file_name2')";
  $datos = mysqli_query($conexion,$sql);
  echo "Archivo: ".$file_name2. " subido corrrectamente<br>";

    }else{

          echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
    }
}
elseif ($posgrado==7) {
    $file_name = $_FILES['file1']['name'][0];
    $file_size =$_FILES['file1']['size'][0];
    $file_tmp =$_FILES['file1']['tmp_name'][0];
    $file_type=$_FILES['file1']['type'][0];  
    $tem = $_FILES['file1']['tmp_name'][0];

   	if (move_uploaded_file($tem, '../../archivos/ProgramaEstudio/'.utf8_decode($file_name))){
	$sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(1, $docente, '$catedra','$file_name')";
		$sql1 = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(2, $docente, '$catedra','$file_name')";
			$sql2 = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(3, $docente, '$catedra','$file_name')";
				$sql3 = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES(4, $docente, '$catedra','$file_name')";
	$datos = mysqli_query($conexion,$sql);
	$datos = mysqli_query($conexion,$sql1);
	$datos = mysqli_query($conexion,$sql2);
	$datos = mysqli_query($conexion,$sql3);
	echo "Archivo: ".$file_name. " subido corrrectamente<br>";

   	}else{

      		echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}
}


else{
    $file_name = $_FILES['file1']['name'][0];
    $file_size =$_FILES['file1']['size'][0];
    $file_tmp =$_FILES['file1']['tmp_name'][0];
    $file_type=$_FILES['file1']['type'][0];  
    $tem = $_FILES['file1']['tmp_name'][0];

   	if (move_uploaded_file($tem, '../../archivos/ProgramaEstudio/'.utf8_decode($file_name))){
	$sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio)". " VALUES($posgrado, $docente, '$catedra','$file_name')";
	$datos = mysqli_query($conexion,$sql);
	echo "Archivo: ".$file_name. " subido corrrectamente<br>";

   	}else{

      		echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}
}



?>

</p>
<br>
  <input type="button" value="Regresar" class="btn btn-success" onClick="history.back()">

		</h3>

		</center>
		</body>

		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
		</html>