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
    $email_message="";
    $CuerpoMensaje="";
	$email_to = $email;
	$subjet = "Titulo";
	$mensaje = "Mensaje de texto";

  //variables para los datos del archivo 
	if ($carrera==2) {
    $nombrearchivo = "MDC.pdf";
    $archivo = "MDC.pdf";	
    $nom_carrera = "Maestría en Derecho Constitucional y Derechos Humanos.";
    $email_subject =  'Maestría en Derecho Constitucional y Derechos Humanos - Instituto Iberoamericano de Derecho Electoral';
    $primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestra ".$nom_carrera;
	}elseif($carrera==1){
    $nombrearchivo = "MDE.pdf";
    $archivo = "MDE.pdf";
    $nom_carrera = "Maestría en Derecho Electoral.";
    $email_subject = 'Maestría en Derecho Electoral - Instituto Iberoamericano de Derecho Electoral';
    $primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestra ".$nom_carrera;
	}
	elseif($carrera==4){
	$nombrearchivo = "DDCH.pdf";
    $archivo = "DDCH.pdf";
    $nom_carrera = "Doctorado en Derecho Constitucional y Derechos Humanos.";
    $email_subject = 'Doctorado en Derecho Constitucional y Derechos Humanos - Instituto Iberoamericano de Derecho Electoral';
    $primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
	}elseif($carrera==3){
	$nombrearchivo = "DDE.pdf";
    $archivo = "DDE.pdf";
    $nom_carrera = "Doctorado en Derecho Electoral.";
    $email_subject ='Doctorado en Derecho Electoral - Instituto Iberoamericano de Derecho Electoral';
    $primerparrafo = "El Instituto Iberoamericano de Derecho Electoral agradece tu interés en nuestro ".$nom_carrera;
	}elseif ($carrera==9){
    $nombrearchivo = "Diplomado.pdf";
    $archivo = "Diplomado.pdf";
    $nom_carrera = "Diplomado de Derecho Electoral.";
    $email_subject ='Diplomado de Derecho Electoral - Instituto Iberoamericano de Derecho Electoral';
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
    $CuerpoMensaje .= "Apreciable: " . $nombre . " " .$apellido."\r\n";
    $CuerpoMensaje .= "\r\n".$primerparrafo;
    $CuerpoMensaje .= "\r\n
En atención a tu solicitud de información, te enviamos un archivo en formato PDF que contienen toda la información relacionada con ";

    if ($carrera==2) {
    $CuerpoMensaje .= "nuestra Maestría en Derecho Constitucional y Derechos Humanos en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración de la Maestría, los costos y los mecanismos de titulación.

Todos nuestros posgrados cuentan con Reconocimiento de Validez Oficial de Estudios (RVOE).

Te ofrecemos una Beca del 70% + 5% en inscripción, re-inscripción y mensualidades si te inscribes antes del 15 de agosto de 2020.

Nuestra oferta académica consta de los siguientes posgrados:

    •   Maestría en Derecho Electoral con RVOE 1804644
    •   Maestría en Derecho Constitucional y Derechos Humanos con RVOE 1804645
    •   Doctorado en Derecho Electoral con RVOE 1805646
    •   Doctorado en Derecho Constitucional y Derechos Humanos con RVOE 1805647

RESERVA EL 70% + 5% DE BECA VÍA WHATSAPP 

INICIAMOS EL 4 DE SEPTIEMBRE

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros al correo electrónico admisiones@ideiberoamerica.com.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del Instituto Iberoamericano de Derecho Electoral.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==1){
    $CuerpoMensaje .= "nuestra Maestría en Derecho Electoral en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración de la Maestría, los costos y los mecanismos de titulación.

Te ofrecemos una Beca del 70% + 5% en inscripción, re-inscripción y mensualidades si te inscribes antes del 15 de agosto de 2020.

Nuestra oferta académica consta de los siguientes posgrados:

    •   Maestría en Derecho Electoral con RVOE 1804644
    •   Maestría en Derecho Constitucional y Derechos Humanos con RVOE 1804645
    •   Doctorado en Derecho Electoral con RVOE 1805646
    •   Doctorado en Derecho Constitucional y Derechos Humanos con RVOE 1805647

RESERVA EL 70% + 5% DE BECA VÍA WHATSAPP 

INICIAMOS EL 4 DE SEPTIEMBRE

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros al correo electrónico admisiones@ideiberoamerica.com.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del Instituto Iberoamericano de Derecho Electoral.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==4){
    $CuerpoMensaje .= "nuestro Doctorado en Derecho Constitucional y Derechos Humanos en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del Doctorado, los costos y los mecanismos de titulación.

Te ofrecemos una Beca del 70% + 5% en inscripción, re-inscripción y mensualidades si te inscribes antes del 15 de agosto de 2020.

Nuestra oferta académica consta de los siguientes posgrados:

    •   Maestría en Derecho Electoral con RVOE 1804644
    •   Maestría en Derecho Constitucional y Derechos Humanos con RVOE 1804645
    •   Doctorado en Derecho Electoral con RVOE 1805646
    •   Doctorado en Derecho Constitucional y Derechos Humanos con RVOE 1805647

RESERVA EL 70% + 5% DE BECA VÍA WHATSAPP 

INICIAMOS EL 4 DE SEPTIEMBRE

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros al correo electrónico admisiones@ideiberoamerica.com.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del Instituto Iberoamericano de Derecho Electoral.

Visítanos en nuestro sitio web: www.ideiberoamerica.com

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral";
}elseif($carrera==3){
    $CuerpoMensaje .= "nuestro Doctorado en Derecho Electoral en el que podrás encontrar los requisitos de acceso, los planes de estudios, la metodología educativa, la fecha de inicio, la duración del Doctorado y los costos y los mecanismos de titulación.

Te ofrecemos una Beca del 70% + 5% en inscripción, re-inscripción y mensualidades si te inscribes antes del 15 de agosto de 2020.

Nuestra oferta académica consta de los siguientes posgrados:

    •   Maestría en Derecho Electoral con RVOE 1804644
    •   Maestría en Derecho Constitucional y Derechos Humanos con RVOE 1804645
    •   Doctorado en Derecho Electoral con RVOE 1805646
    •   Doctorado en Derecho Constitucional y Derechos Humanos con RVOE 1805647

RESERVA EL 70% + 5% DE BECA VÍA WHATSAPP 

INICIAMOS EL 4 DE SEPTIEMBRE

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos 55-79-13-1372 o 55-60-62-7722 ponte en contacto con nosotros al correo electrónico admisiones@ideiberoamerica.com.

También, si lo deseas, uno de nuestros asesores puede ponerse en contacto contigo para brindarte una atención personalizada, por lo que te agradeceremos que nos proporciones tu número telefónico para tal efecto.

No dejes pasar esta gran oportunidad y forma parte del Instituto Iberoamericano de Derecho Electoral.

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

    $email_subject = 'Solicitud de información';




    $headers = "From: Instituto Iberoamericano de Derecho Electoral <" . $email_from . ">\r\n";
    //$header .= "Reply-To: " . $replyto . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"=A=G=R=O=\"\r\n\r\n";
$CuerpoMensaje = 'Nuevo interesado
Nombre: '.$nombre.'
Apellidos: '.$apellido.'
Programa de interés: '.$nom_carrera.'
Teléfono: '.$phone3.'
Correo: '.$email.'
Sexo: '.$sexo.' 
Pais: '.$pais.'
Estado: '.$estado.'
Asesor: '.$asesor.'

                    ' ;
    $email_message = "--=A=G=R=O=\r\n";
    $email_message .= "Content-type:text/plain; charset=utf-8\r\n";
    $email_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_message .= $CuerpoMensaje . "\r\n\r\n";


    mail('admisiones@ideiberoamerica.com', $email_subject, $email_message, $headers);

	//mail($to,$subjet,$email_message,$headers);

	echo "mensaje enviado exitosamente";
	echo "gracias";

?>
