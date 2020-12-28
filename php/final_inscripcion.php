<?php 
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );

	$email_from = "contacto@ideiberoamerica.com";
	$email = $_POST['email'];
	$carrera = $_POST['carrera'];
    $nombre= $_POST['name'];
    $apellido= $_POST['lastname'];
    $sexo= $_POST['sexo'];
    $pais= $_POST['pais'];
    $estado= $_POST['estado'];
    $phone= $_POST['phone'];
    $phone3= $_POST['phone3'];
    $type_phone= $_POST['type_phone'];
    $asesor= $_POST['asesor'];
    $privacidad= $_POST['privacidad'];

    $nom_carrera ="";

	$email_to = $email;
 	$email_subject = "Información solicitada";
	$subjet = "Titulo";
	$mensaje = "Mensaje de texto";


  //variables para los datos del archivo 
	if ($carrera==1) {
    $nombrearchivo = "MDC.pdf";
    $archivo = "MDC.pdf";	
    $nom_carrera = "Maestría en Derecho Constitucional y Derechos Humanos.";
    $primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestra ".$nom_carrera;
	}elseif($carrera==2){
    $nombrearchivo = "MDE.pdf";
    $archivo = "MDE.pdf";
    $nom_carrera = "Maestría en Derecho Electoral.";
    $primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestra ".$nom_carrera;
	}
	elseif($carrera==3){
	$nombrearchivo = "DDE.pdf";
    $archivo = "DDE.pdf";
    $nom_carrera = "Doctorado en Derecho Electoral.";
    $primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
	}elseif($carrera==4){
	$nombrearchivo = "DDCH.pdf";
    $archivo = "DDCH.pdf";
    $nom_carrera = "Doctorado en Derecho Constitucional y Derechos Humanos.";
$primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
	}elseif($carrera==5){
    $nombrearchivo = "SFFV.docx";
    $archivo = "SFFV.docx";
    $nom_carrera = "Seminario de Financiamiento y fiscalización Electorales.";
$primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
    }elseif($carrera==6){
    $nombrearchivo = "SMDI.docx";
    $archivo = "SMDI.docx";
    $nom_carrera = "Seminario de Medios de Impugnación en Materia Electoral.";
$primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
    }elseif($carrera==7){
    $nombrearchivo = "SQA.docx";
    $archivo = "SQA.docx";
    $nom_carrera = "Seminario de Quejas Administrativas.";
$primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
    }elseif($carrera==8){
    $nombrearchivo = "SDE.docx";
    $archivo = "SDE.docx";
    $nom_carrera = "Seminario de Delitos Electorales.";
$primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
    }elseif($carrera==9){
    $nombrearchivo = "DiplomadoDerechoElectoral.pdf";
    $archivo = "DiplomadoDerechoElectoral.pdf";
    $nom_carrera = "Diplomado de Derecho Electoral.";
$primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
    }


    $archivo = file_get_contents($archivo);
    $archivo = chunk_split(base64_encode($archivo));
    //archivo adjunto  para email    
    $email_message .= "--=A=G=R=O=\r\n";
    $email_message .= "Content-Type: application/octet-stream; name=\"" . $nombrearchivo . "\"\r\n";
    $email_message .= "Content-Transfer-Encoding: base64\r\n";
    $email_message .= "Content-Disposition: attachment; filename=\"" . $nombrearchivo . "\"\r\n\r\n";
    $email_message .= $archivo . "\r\n\r\n";
    $email_message .= "--=A=G=R=O=--";
    // Leemos el archivo a adjuntar

     /*$headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: multipart/mixed;";
      $headers .= "boundary=\"=A=G=R=O=\"\r\n";
      $headers .= "From : ".$email_from."\r\n"; */
     

        function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
    
     // Cuerpo del Email
    $CuerpoMensaje .= "Estimado: " . $nombre . " " .$apellido."\r\n";
    $CuerpoMensaje .= "\r\n".$primerparrafo;
    $CuerpoMensaje .= "\r\n
En atención a tu solicitud de información, te enviamos un archivo en formato PDF que contienen toda la información relacionada con";

    if ($carrera==1) {
    $CuerpoMensaje .= "nuestra Maestría en Derecho Constitucional y Derechos Humanos en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración de la Maestría, los costos y los mecanismos de titulación.

Te ofrecemos una Beca del 75% en inscripción, re-inscripción y mensualidades si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas. Nuestras Maestrías inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==2){
    $CuerpoMensaje .= "nuestra Maestría en Derecho Electoral en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración de la Maestría, los costos y los mecanismos de titulación.

Te ofrecemos una Beca del 75% en inscripción, re-inscripción y mensualidades si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas. Nuestras Maestrías inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==3){
    $CuerpoMensaje .= "nuestro Doctorado en Derecho Constitucional y Derechos Humanos en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del Doctorado, los costos y los mecanismos de titulación.

Te ofrecemos una Beca del 75% en inscripción, re-inscripción y mensualidades si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas.Nuestros Doctorados inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==4){
    $CuerpoMensaje .= "nuestro Doctorado en Derecho Electoral en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del Doctorado y los costos y los mecanismos de titulación.

Te ofrecemos una Beca del 75% en inscripción, re-inscripción y mensualidades si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas.Nuestros Doctorados inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==5){
    $CuerpoMensaje .= "nuestro Seminario de Financiamiento y fiscalización Electorales en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del seminario y los costos.

Te ofrecemos una Beca del 75% en inscripción si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas.Nuestros Seminarios inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==6){
    $CuerpoMensaje .= "nuestro Seminario de Medios de Impugnación en Materia Electoral en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del seminario y los costos.

Te ofrecemos una Beca del 75% en inscripción si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas.Nuestros Seminarios inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==7){
    $CuerpoMensaje .= "nuestro Seminario de Quejas Administrativas en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del seminario y los costos.

Te ofrecemos una Beca del 75% en inscripción si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas.Nuestros Seminarios inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==8){
    $CuerpoMensaje .= "nuestro Seminario de Delitos Electorales en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del seminario y los costos.

Te ofrecemos una Beca del 75% en inscripción si te inscribes antes del 1º de julio de 2020.

Las inscripciones están abiertas.Nuestros Seminarios inician el próximo 04 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==9){
    $CuerpoMensaje .= "nuestro Diplomado de Derecho Electoral en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del seminario y los costos.

Las inscripciones están abiertas.Nuestros Diplomados inician el próximo 08 de septiembre de 2020.

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros mediante esta vía.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del INSTITUTO IBEROAMERICANO DE DERECHO ELECTORAL.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}


     //cabecera del email (forma correcta de codificarla)

    $headers = "From: Instituto Iberoamericano de Derecho Electoral <" . $email_from . ">\r\n";
    //$header .= "Reply-To: " . $replyto . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"=A=G=R=O=\"\r\n\r\n";
    
    
    //armando mensaje del email
    $email_message = "--=A=G=R=O=\r\n";
    $email_message .= "Content-type:text/plain; charset=utf-8\r\n";
    $email_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_message .= $CuerpoMensaje . "\r\n\r\n";
    
    //archivo adjunto  para email    
    $email_message .= "--=A=G=R=O=\r\n";
    $email_message .= "Content-Type: application/octet-stream; name=\"" . $nombrearchivo . "\"\r\n";
    $email_message .= "Content-Transfer-Encoding: base64\r\n";
    $email_message .= "Content-Disposition: attachment; filename=\"" . $nombrearchivo . "\"\r\n\r\n";
    $email_message .= $archivo . "\r\n\r\n";
    $email_message .= "--=A=G=R=O=--";
    
    
    
    //enviamos el email
    mail($email_to, $email_subject, $email_message, $headers);


	//mail($to,$subjet,$email_message,$headers);

	echo "mensaje enviado exitosamente";
	echo "gracias";

?>
