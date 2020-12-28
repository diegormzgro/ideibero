<?php 
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );

	$email_from = "contacto@ideiberoamerica.com";
	$usuario = $_POST['usuario'];
	$pass = $_POST['pass'];
    
  $subjet = "Le adjuntamos su usuario y contraseña ";
  $mensaje = "El Instituto Iberoamericano de Derecho Electoral agradece que te hayas registrado con nosotros.
Usuario: $usuario 
Contraseña: $pass

El usuario y contraseña que te proporcionamos te permitirán acceder y completar el formulario de inscripción al programa educativo que elijas.

Si tuvieras alguna duda, te invitamos a que te comuniques con nosotros al teléfono 55 6062 7722 / 55 7913 1372 o ponte en contacto al correo electrónico admisiones@ideiberoamerica.com 

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral
";
  

  //variables para los datos del archivo 
	
   
    

     /*$headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: multipart/mixed;";
      $headers .= "boundary=\"=A=G=R=O=\"\r\n";
      $headers .= "From : ".$email_from."\r\n"; */

    
    
     // Cuerpo del Email
 

    



     //cabecera del email (forma correcta de codificarla)
     $headers = "From:". $email_from;
    
    //archivo adjunto  para email    

    
    
    //enviamos el email
    $response = mail($usuario,$subjet,$mensaje,$headers);
    echo "se envió el mail? $response";
   

	//mail($to,$subjet,$email_message,$headers);

	echo "mensaje enviado exitosamente";
	echo "gracias";

?>
