<?php
//$correo =$_POST['email_sis'];
$select_documento = $_POST['select_documento'];
$titulo =$_POST['titulo'];
$correo =$_POST['correo'];
$nombre = $_FILES['archivo']['name'];
$idArchivo = $_POST['select_documento'];
$arcvhivoguardado = $select_documento.'_'.$nombre;
include('../conexion.php');

$micarpeta = "../../archivos/docente/$correo";

    $sql = "INSERT INTO documentos (Correo, idArchivo, NombreArchivo) ".  "VALUES ('$correo', '$idArchivo', '$arcvhivoguardado')";

            if (!file_exists($micarpeta)) {
                mkdir($micarpeta, 0777, true);

            }else{

            }

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
