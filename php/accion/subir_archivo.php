<?php
//$correo =$_POST['email_sis'];
$select_documento = $_POST['select_documento'];
$posgrado =$_POST['posgrado'];
$email_sis =$_POST['email_sis'];
$nombre = $_FILES['archivo']['name'];
$idArchivo = $_POST['select_documento'];
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

$micarpeta = "../../archivos/estudiante/$posgrado/$email_sis";

        
       

            if (!file_exists($micarpeta)) {
                mkdir($micarpeta, 0777, true);

            }else{

            }
            $sql = "INSERT INTO documentos (Correo, idArchivo, NombreArchivo) ".  "VALUES ('$email_sis', '$idArchivo', '$arcvhivoguardado')";
        //echo $sql;

            if (isset($_FILES['archivo'])) {
                $archivo = $_FILES['archivo'];
                $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
                if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$select_documento.'_'.$nombre)) {
                    echo 1;
                     $datos = mysqli_query($conexion,$sql);
                } else {
                    echo 0;
                }
            }
?>
