<?php
//$correo =$_POST['email_sis'];
$select_documento = $_POST['select_documento2'];
$posgrado =$_POST['posgrado'];
$correo =$_POST['email_sis'];
$nombre = $_FILES['archivoPago']['name'];
$idArchivo = $_POST['select_documento2'];
$arcvhivoguardado = $select_documento.'_'.$nombre;
include('../conexion.php');

if ($posgrado==1) {
	$posgrado = "MDCDH";
}elseif ($posgrado == 2) {
	$posgrado = "MDE";
}elseif($posgrado == 3){
	$posgrado = "DDCDH";
}else{
	$posgrado = "DDE";
}

$micarpeta = "../../archivos/estudiante/$posgrado/$correo";

        $sql = "INSERT INTO documentos (Correo, idArchivo, NombreArchivo) ".  "VALUES ('$correo', '$idArchivo', '$arcvhivoguardado')";
        //echo $sql;
       

            if (!file_exists($micarpeta)) {
                mkdir($micarpeta, 0777, true);

            }else{

            }

            if (isset($_FILES['archivoPago'])) {
                $archivo = $_FILES['archivoPago'];
                $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
                if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$select_documento.'_'.$nombre)) {
                    echo 1;
                     $datos = mysqli_query($conexion,$sql);
                } else {
                    echo 0;
                }
            }
?>
