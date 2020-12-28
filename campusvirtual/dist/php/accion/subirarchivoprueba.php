<?php
include('../conexion.php');
//tomo el valor de un elemento de tipo texto del formulario
$posgrado = $_POST['posgrado'];
$catedra = $_POST['catedra'];
$docente = $_POST['docente'];

//datos del arhivo
$nombre_archivo = $_FILES['file1']['name'];
$tipo_archivo = $_FILES['file1']['type'];
$tamano_archivo = $_FILES['file1']['size'];
	
	// RECORREMOS LOS FICHEROS
for($i=0; $i<count($_FILES['file1']['name']); $i++) {
  //Obtenemos la ruta temporal del fichero
  $fichTemporal = $_FILES['file1']['tmp_name'][$i];
  echo $fichTemporal;
}

   	if (move_uploaded_file($_FILES['file1']['tmp_name'], '../../archivos/ProgramaEstudio/'.$nombre_archivo)){
	$sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, ProgramaEstudio) VALUES($posgrado, $docente, '$catedra','$nombre_archivo')";
	//$datos = mysqli_query($conexion,$sql);

   	}else{

      		echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}


	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["file1"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["file1"]["name"][$key]) {
			$filename = $_FILES["file1"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'docs/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
?>

