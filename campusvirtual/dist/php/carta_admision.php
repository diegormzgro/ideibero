<?php 
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );

	$email_from = "admisiones@ideiberoamerica.com";
	$email = $_POST['email'];
	$carrera = $_POST['carrera'];
    $nombre= $_POST['nombre'];
    $primer_ap= $_POST['primer_ap'];
    $segundo_ap= $_POST['segundo_ap'];
    $fecha_ingreso= $_POST['fecha_ingreso'];
    $monto_mensualidad = $_POST['monto_mensualidad'];
    $monto_inscripcion = $_POST['monto_inscripcion'];

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

El Instituto Iberoamericano de Derecho Electoral se complace en comunicarte que la Comisión Académica en su reunión del día '.date("d-m-Y", strtotime($fecha_ingreso)).', te seleccionó para comenzar tus estudios en '.$nom_carrera.'.

El proceso de selección ha sido muy complejo debido a la gran cantidad de candidaturas. Sin embargo, queremos externarte que aquellas/os que han sido admitidos son poseedores de un buen nivel para la realización de sus estudios, lo cual los obliga a realizar los mayores esfuerzos que estén de su parte para terminar el programa que ahora comienzan para no defraudar las expectativas que han suscitado.

Para concluir el proceso de inscripción solamente te falta cubrir los pagos correspondientes, los cuales puedes realizar mediante transferencia electrónica o depósito bancario para que elijas la modalidad que más te convenga.

     * DEPÓSITO BANCARIO
             Institución Bancaria: Bancomer
             Nombre: Instituto Iberoamericano de Derecho Electoral
             Número de Cuenta 0112312530
     * TRANSFERENCIA ELECTRÓNICA
             Clabe Interbancaria 012180001123125300

En virtud de que se te ha sido otorgada una beca del 75% deberás cubrir la cantidad de $'.$monto_inscripcion.'.00 por concepto de inscripción y de $'.$monto_mensualidad.'.00  por concepto de la primera mensualidad, las cuales deberán ser cubiertas a la mayor brevedad posible para asegurar tu espacio.

Una vez efectuados los pagos correspondientes, te solicitamos que nos lo informes y nos envíes el comprobante a: admisiones@ideiberoamerica.com para los fines educativos y administrativos respectivos.

Si tuvieras alguna duda o quisieras realizar una consulta sobre los pagos correspondientes, te invitamos a que te comuniques a los teléfonos 55-60-62-7722, 55-79-13-1372 o ponte en contacto con nosotros a este correo electrónico.

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral


                    ' ;
    $email_message = "--=A=G=R=O=\r\n";
    $email_message .= "Content-type:text/plain; charset=utf-8\r\n";
    $email_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_message .= $CuerpoMensaje . "\r\n\r\n";

$email_subject =  'Carta de admisión';
    mail('admisiones@ideiberoamerica.com', $email_subject, $email_message, $headers);

	//mail($to,$subjet,$email_message,$headers);

	echo "mensaje enviado exitosamente";
	echo "gracias";

?>
