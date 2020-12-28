<?php 
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );

	$email_from = "admisiones@ideiberoamerica.com";
	$email = $_POST['email'];
	$carrera = $_POST['carrera'];
    $nombre= $_POST['nombre'];
    $primer_ap= $_POST['primer_ap'];
    $segundo_ap= $_POST['segundo_ap'];

    $email_sis= $_POST['email_sis'];
    $pass_sis = $_POST['pass_sis'];

    $email_Inst= $_POST['email_Inst'];
    $pass_inst = $_POST['pass_inst'];

    if ($posgrado==1) {
       $nom_carrera = 'la Maestría en Derecho Constitucional y Derechos Humanos';
    }elseif ($posgrado==2) {
        $nom_carrera = 'la Maestría en Derecho Electoral';
    }elseif ($posgrado==3) {
        $nom_carrera = 'el Doctorado en Derecho Constitucional y Derechos Humanos';
    }else{
        $nom_carrera = 'el Doctorado en Derecho Electoral';
    }



    $headers = "From: Instituto Iberoamericano de Derecho Electoral <" . $email_from . ">\r\n";
    //$header .= "Reply-To: " . $replyto . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"=A=G=R=O=\"\r\n\r\n";
$CuerpoMensaje = 'Apreciable '.$nombre.' '.$primer_ap.' '.$segundo_ap.'

El Instituto Iberoamericano de Derecho Electoral se complace en informarte que has completado el proceso de inscripción con éxito y es hora de iniciar un nuevo proceso académico. Se han gestionado de manera exitosa tus datos de identidad digital —usuario y contraseña— con los que podrás acceder al Campus Virtual, a la Biblioteca Digital y al correo electrónico institucional:

Datos de identidad digital
➢ Correo Electrónico: '.$email_sis.'
➢ Contraseña: '.$pass_sis.'

Para poder acceder sigue estos sencillos pasos:
1. Ingresa a nuestra página web: www.ideiberoamerica.com
2. Dirígete a la opción CAMPUS VIRTUAL
3. Ingresa tu usuario y contraseña

Si tuvieras alguna duda o quisieras realizar una consulta sobre el proceso de acceso al Campus Virtual, te invitamos a que te comuniques al teléfono 55-60-62-7722, 55-79-13-1372 o ponte en contacto con nosotros al correo electrónico admisiones@ideiberoamerica.com.

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral

                    ' ;
    $email_message = "--=A=G=R=O=\r\n";
    $email_message .= "Content-type:text/plain; charset=utf-8\r\n";
    $email_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_message .= $CuerpoMensaje . "\r\n\r\n";

$email_subject =  'Datos de identidad institucional / Instituto Iberoamericano de Derecho Electoral';
    mail('admisiones@ideiberoamerica.com', $email_subject, $email_message, $headers);

	//mail($to,$subjet,$email_message,$headers);

	echo "mensaje enviado exitosamente";
	echo "gracias";

?>
    