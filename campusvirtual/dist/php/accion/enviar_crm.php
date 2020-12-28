<?php 
	//ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );

	$email_from = "admisiones@ideiberoamerica.com";
	$email = "admisiones@ideiberoamerica.com";
  require('../conexion.php');

	$email_to = $email;
    
    $email_subject = "¿Quieres tener éxito profesional? 70% de BECA + 5% ADICIONAL + BONO ESPECIAL. Aniquilamos los pretextos. Si no triunfas es porque no quieres";
 
  $sql= "SELECT * FROM directorio WHERE  ELIMINADO=0 AND ENVIO=0 AND  NOMBRE<>'' AND CORREO<>'' AND CORREO<>'---' GROUP BY CORREO  ORDER BY CORREO ASC LIMIT 50";
  $datos = mysqli_query($conexion,$sql);
  while ($renglon=mysqli_fetch_array($datos)) {
$email_to =$renglon['CORREO'];
//$email_to ='oswaldlaraborges@yahoo.com.mx ';
//$email_to ='ing.blancoross@gmail.com ';
$id = $renglon['NO'];
$con ="UPDATE directorio SET ENVIO=1 WHERE NO=$id";
$datos2 = mysqli_query($conexion,$con);




$CuerpoMensajeN =  '
<html>
<head>
</head>
<b>Apreciable '.$renglon['NOMBRE'].',</b>
<br><br>
<br>
<b>¿Quieres tener éxito profesional?</b> El<b> Instituto Iberoamericano de Derecho Electoral</b> te ofrece: 
<b>
<br><br>

<center><b>70% DE BECA + 5% ADICIONAL</b></h1><br>
+<br>
<b>BONO ESPECIAL</b> solamente a los primeros 20 inscritos<br>



<b>
<a href="https://api.whatsapp.com/send?phone=+52 1 55 5107 2003&text=Hola,%20quiero%20reservar%20el%2070%%20+5%20de%20Beca">
<b>SOLICÍTALA LA BECA AQUÍ </b><a href="https://api.whatsapp.com/send?phone=+52 1 55 5107 2003&text=Hola,%20quiero%20reservar%20el%2075%%20de%20Beca">
  <img src="https://ideiberoamerica.com/campusvirtual/dist/opciones/whatsapp.png"></a>
 <a href="https://api.whatsapp.com/send?phone=+52 1 55 5107 2003&text=Hola,%20quiero%20reservar%20el%2075%%20de%20Beca"></a>
</a>
</b>
<br>
¡Te sorprenderás!<br>
<br>
✅Iniciamos el 04 de septiembre<br><br>
Aniquilamos los pretextos. Si no triunfas es porque no quieres.<br>


</center><br>
<br>


<center><b><h3>¿Qué futuro profesional te gustaría tener?</h3></b></center>
<br>
<br>
✅Ser Juez o Magistrado constitucional <br>
✅Ser Consejero Electoral: Local o Nacional<br>
✅Ejercer cargos públicos de alto rango<br>
✅Ser investigador académico<br>
✅Ser consultor especializado<br>
✅Ser defensor de derechos humanos<br>
<br>
<br>

<center><b><h3>¿Qué posgrado te gustaría estudiar?</h3></b></center><br>

✅Maestría en Derecho Electoral<br>
✅Maestría en Derecho Constitucional y Derechos Humanos<br>
✅Doctorado en Derecho Electoral<br>
✅Doctorado en Derecho Constitucional y Derechos Humanos<br>
<br><br>


<center><b><h3>En el Instituto Iberoamericano de Derecho Electoral nos dedicamos a la:</h3></b></center>
<br><br>
✅Investigación científica especializada<br>
✅El mejor modelo de enseñanza-aprendizaje<br>
✅Catedráticos de alto prestigio<br>
✅Temas de actualidad y relevancia social<br>
✅Formación académica con altos estándares<br><br>


<br>
<center><br>
<b>¡INSCRÍBETE YA!</b> Esta es tu gran oportunidad<br><br>

No esperes más. Comunícate con nosotros<br>
Si lo prefieres nos comunicamos contigo. Indícanos tu número telefónico<br>
<br>
🌐 www.ideiberoamerica.com<br>
☎ 55 6062 7722 / 55 7913 1372<br>
✉ contacto@ideiberoamerica.com<br><br>

Atentamente<br>
<b>Instituto Iberoamericano de Derecho Electoral</b>
</center>

  
</body>
</html>
';





$CuerpoMensaje =  '
<html>
<head>
</head>
<center><b><h1>¡INSCRIPCIONES ABIERTAS! / OBTÉN EL 70% +  5% DE BECA / ÚLTIMOS LUGARES</b></h1></center><br>
<b>Apreciable '.$renglon['NOMBRE'].',</b>

<p style="text-align:justify">
El Instituto Iberoamericano de Derecho Electoral es un espacio institucional de investigación científica de alta especialización que tiene como propósito promover y fomentar el conocimiento, la investigación, la difusión y la capacitación sobre temas electorales y de buen gobierno, la administración pública, los derechos humanos, el cambio político, la calidad democrática, la transparencia, la corrupción, la gobernanza, el parlamentarismo, la nueva ingeniería político-tecnológica, el financiamiento y la fiscalización electoral, la comunicación política, el marketing político, los medios de control constitucional y legal y una serie de temas vinculados a la modernización de la democracia en nuestros sistemas políticos contemporáneos.
</p>
<p style="text-align:justify">
<b>
Todos nuestros posgrados cuentan con Reconocimiento de Validez Oficial de Estudios (RVOE).</b>
</p>

<p style="text-align:justify">
Te ofrecemos una Beca del 70% + 5% en inscripción, re-inscripción y mensualidades si te inscribes antes del 31 de julio de 2020.
</p>  
    <ul>
    <li><a href="http://www.ideiberoamerica.com/melectoral.html">Maestría en Derecho Electoral con RVOE 1804644.</a>
    <li><a href="http://www.ideiberoamerica.com/mderecho.html">Maestría en Derecho Constitucional y Derechos Humanos con RVOE 1804645.</a>
    <li><a href="http://www.ideiberoamerica.com/doctoradoDE.html">Doctorado en Derecho Electoral con RVOE 1805646.</a>
    <li><a href="http://www.ideiberoamerica.com/doctoradoDC.html">Doctorado en Derecho Constitucional y Derechos Humanos con RVOE 1805647.</a>
    </ul>

<p style="text-align:justify">
<center>
<b>
<a href="https://api.whatsapp.com/send?phone=+52 1 55 5107 2003&text=Hola,%20quiero%20reservar%20el%2075%%20de%20Beca">
<h2>
RESERVA AQUÍ EL 70% + 5% DE BECA VÍA WHATSAPP<a href="https://api.whatsapp.com/send?phone=+52 1 55 5107 2003&text=Hola,%20quiero%20reservar%20el%2075%%20de%20Beca">
  <img src="https://iide-edu.com/dist/opciones/whatsapp.png"></a>
  / <a href="https://api.whatsapp.com/send?phone=+52 1 55 5107 2003&text=Hola,%20quiero%20reservar%20el%2075%%20de%20Beca">INICIAMOS EL 4 DE SEPTIEMBRE</h2></a>
</a>
</b>
</center>

</p>

<p style="text-align:justify">
Nuestra metodología educativa es flexible, personalizada y eficaz, basada en clases online en directo y tutor personal para ofrecerte la mejor formación educativa.</p>   
<ul>
<li><b>Clases online en directo</b>: Hay clases regulares programadas con catedráticos de nivel nacional e internacional.
<li><b>Clases online en diferido</b>: Si no pudieras asistir a una clase o te quedaste con dudas, podrás acceder a las clases de la asignatura correspondiente tus clases en diferido.

<li><b>Campus Virtual</b>: El Instituto Iberoamericano de Derecho Electoral incorpora los mayores avances tecnológicos en una inigualable plataforma educativa en la que podrás tener acceso a clases, biblioteca digital, horarios, foros y mucho más, lo cual resulta indispensable en la formación educativa de la nueva élite académica de nuestro país.
<li><b>Recursos didácticos</b>: Dispondrás de una variedad de lecturas complementarias y recursos didácticos que favorecerán tu proceso de formación académica.
</ul>
<p style="text-align:justify">
Nuestro modelo de educación en línea permite seguirte profesionalizando, sin perder contacto directo con catedráticos de prestigio nacional e internacional, sin tener que desplazarte de tu ciudad, sin tener que pagar largos y costosos viajes y los más importante que puedes ocupar tu valioso tiempo en lo que más desees.
</p>
<p style="text-align:justify">

Para mayor información sobre nuestros programas educativos, te invitamos a que te comuniques a los teléfonos <b>55-60-62-7722, 55-79-13-1372</b> o ponte en contacto con nosotros al correo electrónico admisiones@ideiberoamerica.com
</p>

<p style="text-align:justify">
Somos la mejor institución educativa porque tenemos para ti la mejor oferta académica. Representamos una nueva era en la educación acorde a las exigencias de los nuevos retos de la sociedad de información y las nuevas tecnologías. Empleamos las mejores técnicas de enseñanza-aprendizaje, de la mano de las últimas investigaciones internacionales en las diversas materias.
</p>

<p style="text-align:justify">
No dejes pasar esta gran oportunidad y forma parte del Instituto Iberoamericano de Derecho Electoral.
</p>
<p style="text-align:justify">

Estamos para servirte. Será un placer atenderte.
</p>

<p>
Atentamente</p>
<b>Instituto Iberoamericano de Derecho Electoral</b>

</body>
</html>
';

     //cabecera del email (forma correcta de codificarla)

    $headers = "From: Instituto Iberoamericano de Derecho Electoral <" . $email_from . ">\r\n";
    $headers .= "Bcc: pruebas@iide-edu.com \r\n";
    
    //$header .= "Reply-To: " . $replyto . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n"; 

    
    //armando mensaje del email

    $email_message .= $CuerpoMensaje . "\r\n\r\n";
    
    
    
    
    //enviamos el email
    mail($email_to, $email_subject, $CuerpoMensajeN, $headers);


	//mail($to,$subjet,$email_message,$headers);
echo $renglon['CORREO'];
echo "<br>";
}
?>
