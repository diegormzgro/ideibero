<?php 
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );

	$from = "pruebas@iide-edu.com";
	$to = "oswaldlaraborges@iide-edu.com";

	$subjet = "Titulo";
	$mensaje = "Mensaje de texto";
	$headers = "From:". $from;

	mail($to,$subjet,$mensaje,$headers);

	echo "mensaje enviado exitosamente";
	echo "gracias";

?>