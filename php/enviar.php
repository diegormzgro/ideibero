 <?php
 
session_start();

header('Content-Type: text/html; charset=UTF-8');
$nombre = strtoupper($_POST["form_first_name"]);
$ap_paterno = strtoupper($_POST["ap_paterno"]);
$ap_materno = strtoupper($_POST["ap_materno"]);
$fecha = $_POST["form_nac"];
$form_sex = $_POST["form_sex"];
$form_email = $_POST["form_email"];
$form_tel = $_POST["form_tel"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

    require('../campusvirtual/dist/php/conexion.php');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
//require 'vendor/autoload.php';
$cadena =str_replace(' ', '', $nombre);
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
            $sql1= "SELECT * FROM correo WHERE correo='$form_email' ";
            $datos = mysqli_query($conexion,$sql1);
            $row_cnt = mysqli_num_rows($datos);

    
if ($row_cnt ==0) {

    try {
    //Server settings
    // Activa la condificacción utf-8
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ing.blancoross@gmail.com';                     // SMTP username
    $mail->Password   = 'tolucaforever3545';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('ing.blancoross@gmail.com', 'Instituto Iberoamericano de Derecho Electoral');
    $mail->addAddress($form_email, $nombre);     // Add a recipient




    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Usuario y Contraseña';
    $mail->Body    = 'Hola <b>'.$nombre. '</b>:<br>
                    <section font-size:"20px;"><p>El <font color="#54266b">Instituto Iberoamericano de Derecho Electoral </font>agradece que te hayas registrado con nosotros.</p> 
                    <p>Te enviamos los datos de acceso que te permitirán completar el formulario de inscripción al posgrado que elijas.</p>
                    <br>
                    Usuario: ' .$form_email.'
                    <br>
                    Contraseña: '.$cadena . '
                    <br>
                    <p>Si tuvieras alguna duda o comentario, te invitamos a que te comuniques a los teléfonos            55-7913-1372 o 55-6062-7722 o ponte en contacto con nosotros al correo electrónico: admisiones@ideiberoamerica.com </p>
                
                    <p>Estamos para servirte. Será un placer atenderte.</p>
                
                    <center>Atentamente<br>
                        Instituto Iberoamericano de Derecho Electoral</center>

    ';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->SMTPDebug = 0;
    //$mail->send();

    $sql = "INSERT INTO correo (nombre, ap_paterno, ap_materno, sexo, correo, fecha_nacimiento, telefono, pass) ". 
            "VALUES ('$nombre', '$ap_paterno','$ap_materno', '$form_sex','$form_email' ,'$fecha', '$form_tel', '$cadena')";
    //$result = mysqli_query($conexion,$sql);
    echo ' 


    ';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}else{
echo "Esta cuenta ya tiene correo";

}

?>
 


 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="en" version="XHTML+RDFa 1.0" dir="ltr">

<head profile="http://www.w3.org/1999/xhtml/vocab">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="../img/logo-100.png" type="image/vnd.microsoft.icon" />
<title>Instituto Iberoamericano de Derecho lectoral</title>
 

  <!-- Google Tag Manager -->

<!-- End Google Tag Manager --> 
<link type="text/css" rel="stylesheet" href="../css/1.css" media="all">
<link type="text/css" rel="stylesheet" href="../css/2.css" media="screen">
<link type="text/css" rel="stylesheet" href="../css/3.css" media="all">
<link type="text/css" rel="stylesheet" href="../css/4.css" media="all">
<link type="text/css" rel="stylesheet" href="../css/5.css" media="all">
<link type="text/css" rel="stylesheet" href="../css/5.css" media="all">
<link type="text/css" rel="stylesheet" href="../css/general12.min.css" media="all">
<link href="../css/print.css" rel="stylesheet" type="text/css" media="print" />


 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>


   <style type="text/css">
        #headerImage {
          background-image: url(../img/conferencia.jpg); }
      </style>

 

<script type="text/javascript" src="../js/1.js"></script>
<script type="text/javascript" src="../js/2.js"></script>
<script type="text/javascript" src="../js/3.js"></script>

<script type="text/javascript">
<!--//--><![CDATA[//><!--
(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create", "UA-18451608-1", {"cookieDomain":"auto"});ga("send", "pageview");
//--><!]]>
</script>

<script type="text/javascript" src="../js/4.js"></script>

 
  <meta name="google-translate-customization" content="43d43cf734dca152-8dcbd00c5f432650-ga475b10be01c754c-f" />
 


<script type="text/javascript" src="../js/prod.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



<script type="text/javascript">
$(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
  });
  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });
  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }
});

 
</script>



</head>

<body class="html front not-logged-in no-sidebars page-node page-node- page-node-8808 node-type-home-page" >
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TF6T87" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->  <div id="skip-link">
    <a href="#" class="element-invisible element-focusable">Skip to main content</a>
  </div>
    <div id="headerBar" role="banner">
  <div id="headerContainer">
    <div id="logoContainer">
      <a href="../index.html">
        <span class="element-invisible">Instituto Iberoamericano del Derecho Electoral</span>
         <div class="logo">
         <img src="../img/logo-100.png"  />
        </div>
      </a>
    </div>
    <div id="headerFluid">
      <div id="navContainer">
        <div
  class="menu-toggle"
  id="utilityMenuToggle"
  tabindex="0"
  aria-haspopup="true"
  role="button"
  aria-pressed="false"
  aria-label="Toggle utility menu">
  <i class="fa fa-bars"></i>
</div>
<div
  class="menu-toggle"
  id="primaryMenuToggle"
  tabindex="0"
  aria-haspopup="true"
  role="button"
  aria-pressed="false"
  aria-label="Toggle primary menu">
  <i class="fa fa-bars"></i>
</div>
<nav id="utilityNav" aria-label="Utility navigation">
  <ul>
    <li class="who-are-you-menu">
      


    </li>
    
  </ul>
</nav>
<nav id="primaryNav" aria-label="Primary navigation">
  

  <div id="primaryNavShadow"></div>

  <ul>

<li class="primary-nav-menu-item primary-nav-Admissions">
  <a title="Admisión" href="../admision.html">Admisión</a>
   <div class="subnav">
      </div>
</li>



<li class="">
        <a title="Admissions" href="#">Oferta Educativa</a>
        <div class="subnav-caret"></div>
        <div class="subnav"><div class="subnav-container">
          <div class="subnav-col-2">  
            <div class="region region-admissions-subnav-col2">
    <div id="block-menu-block-13" class="block block-menu-block">
  
  <div class="content">
    <div class="menu-block-wrapper menu-block-13 menu-name-menu-admissions-subnav-menu-col- parent-mlid-0 menu-level-1">
  <ul class="menu"><li class="first leaf menu-mlid-2961"><a href="conferencias.html" title="">Conferencias</a></li>
<li class="leaf menu-mlid-2962"><a href="maestrias.html" title="">Maestrias</a></li>
<li class="leaf menu-mlid-2963"><a href="doctorado.html" title="">Doctorados</a></li>
</ul>
</div>
  </div>
</div>
  </div>
</div>  
</div></div>
</li>





<li class="primary-nav-menu-item primary-nav-About">
  <a title="Aula" href="../campusvirtual/index.html">Campus Virtual</a>
   
        <div class="subnav">
      </div>
</li>
 

<li class="primary-nav-menu-item primary-nav-Admissions">
  <a title="Catedráticos" href="catedraticos.html">Catedráticos</a>
   <div class="subnav">
      </div>
</li>
<li class="primary-nav-menu-item primary-nav-Admissions">
  <a title="Revista" href="revista.html">Revista</a>
   <div class="subnav">
      </div>
</li>
<li class="primary-nav-menu-item primary-nav-Admissions">
  <a title="Blog" href="blog.html">Blog</a>
   <div class="subnav">
      </div>
</li>
<li class="primary-nav-menu-item primary-nav-Admissions">
  <a title="Directorio" href="directorio.html">Directorio</a>
   <div class="subnav">
      </div>
</li>
<li class="primary-nav-menu-item primary-nav-Admissions">
  <a title="Solicitar información" href="solicitarinfo.html">Información</a>
   <div class="subnav">
      </div>
</li>

</ul>

</nav>      </div>

    </div>
  </div>
</div>




 
 <div id="headerImageContainer">
  <div id="headerImage" style="transform: translateY(-55px);"></div>
</div>
<div id="headerSpacer"></div>

 
 


<div class="container">
        <div class="row">
           <!-- Image and text -->
<nav class="navbar navbar-light bg-light" style="text-align: right;">
    <i class="fas fa-address-card"></i> <?php echo $nombre; ?>
  
</nav>
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <form id="regiration_form" novalidate action="action.php"  method="post">
  <fieldset>
    <h2>Etapa 1: Inicio</h2>
 <div class="form-group">
    <label for="lb_programa">Programa de Estudio:</label>
    <select class="form-control" name="cb_programa" id="cb_programa" required>
      <option value="0">Seleccione datos</option>
      <option value="1">Maestría en Derecho Constitucional y Derechos Humanos</option>
    <option value="2">Maestría en Derecho Electoral</option>
    <option value="3">Doctorado en Derecho Constitucional y Derechos Humanos</option>
    <option value="4">Doctorado en Derecho Electoral</option>
  </select>
</div>
    <input type="button" name="password" class="next btn btn-info" value="Siguiente" id="i1" disabled/>
  </fieldset>

  <fieldset>
    <h2> Etapa 2: Datos Personales</h2>
    <div class="form-group">


<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class="title1-plan">
                                <h3>Datos personales</h3>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Nombre(s)</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="text" class="form-control" id="inputid" name="name" value="<?php echo $nombre  ?>" placeholder="Nombre " data-fv-field="name"><i class="form-control-feedback" data-fv-icon-for="name" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="name" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Primer Apellido</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="text" class="form-control" id="inputid" name="lastname" value="<?php echo $ap_paterno  ?>" placeholder="Apellido Paterno / Apellido Materno" data-fv-field="lastname"><i class="form-control-feedback" data-fv-icon-for="lastname" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="lastname" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Segundo Apellido</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="text" class="form-control" id="inputid" name="lastname" value="<?php echo $ap_materno  ?>" placeholder="Apellido Paterno / Apellido Materno" data-fv-field="lastname"><i class="form-control-feedback" data-fv-icon-for="lastname" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="lastname" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Correo electrónico</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="email" name="email" class="form-control" value="<?php echo $form_email  ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo electrónico" readonly="" data-fv-field="email"><i class="form-control-feedback" data-fv-icon-for="email" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="email" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small><small class="help-block" data-fv-validator="emailAddress" data-fv-for="email" data-fv-result="NOT_VALIDATED" style="display: none;">Please enter a valid email address</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Sexo</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <input type="radio" id="customRadio1" name="sex" value="F" class="" data-fv-field="sex">
                                            <label class="" for="customRadio1">Mujer</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <input type="radio"  id="customRadio1" name="sex" value="M" class="" data-fv-field="sex"><i class="form-control-feedback" data-fv-icon-for="sex" style="display: none;"></i>
                                            <label class="" for="customRadio1">Hombre</label>
                                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="sex" data-fv-result="NOT_VALIDATED" style="display: none;">Seleccionar una opcion</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback has-success">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Fecha de nacimiento</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="date" class="form-control" name="fecha_nacimiento" id="datehappy" value="<?php echo $fecha  ?>" placeholder="DD/MM/AAAA" data-fv-field="fecha_nacimiento"><i class="form-control-feedback glyphicon glyphicon-ok" data-fv-icon-for="fecha_nacimiento" style="display: block;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="fecha_nacimiento" data-fv-result="VALID" style="display: none;">Rellenar fecha</small></div>
                                </div>
                            </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                            <div class="form-group has-feedback">
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <label for="inputid">País</label>
                                </div>
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <select id="inputState" name="pais_nacimiento" class="form-control" data-fv-field="pais_nacimiento">
                                                                            <option value="mx">México</option>
                                                                            <option value="br">Brasil</option>
                                                                            <option value="gt">Guatemala</option>
                                                                            <option value="bz">Belice</option>
                                                                            <option value="ar">Argentina</option>
                                                                            <option value="bo">Bolivia</option>
                                                                            <option value="cl">Chile</option>
                                                                            <option value="co">Colombia</option>
                                                                            <option value="cr">Costa Rica</option>
                                                                            <option value="cu">Cuba</option>
                                                                            <option value="ec">Ecuador</option>
                                                                            <option value="es">España</option>
                                                                            <option value="hn">Honduras</option>
                                                                            <option value="ni">Nicaragua</option>
                                                                            <option value="pa">Panamá</option>
                                                                            <option value="pe">Perú</option>
                                                                            <option value="pt">Portugal</option>
                                                                            <option value="sv">El Salvador</option>
                                                                            <option value="tt">Trinidad y Tobago</option>
                                                                            <option value="uy">Uruguay</option>
                                                                            <option value="ve">Venezuela</option>
                                                                            <option value="do">República Dominicana</option>
                                                                            <option value="py">Paraguay</option>
                                                                        </select><i class="form-control-feedback" data-fv-icon-for="pais_nacimiento" style="display: none;"></i>
                                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="pais_nacimiento" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                            <div class="form-group has-feedback">
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <label for="inputid">Nacionalidad</label>
                                </div>
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <input type="text" class="form-control" value="" name="nacionalidad" id="nacionalidad" placeholder="Mexicana" data-fv-field="nacionalidad"><i class="form-control-feedback" data-fv-icon-for="nacionalidad" style="display: none;"></i>
                                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="nacionalidad" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                            <div class="form-group has-feedback">
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <label for="inputid">Estado / Provincia</label>
                                </div>
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <input type="text" name="estado_nacimiento" class="form-control" value="" id="inputid" placeholder="" data-fv-field="estado_nacimiento"><i class="form-control-feedback" data-fv-icon-for="estado_nacimiento" style="display: none;"></i>
                                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="estado_nacimiento" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                            <div class="form-group has-feedback">
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <label for="inputid">Municipio / Ciudad </label>
                                </div>
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <input type="text" name="ciudad_nacimiento" class="form-control" value="" id="inputid" placeholder="" data-fv-field="ciudad_nacimiento"><i class="form-control-feedback" data-fv-icon-for="ciudad_nacimiento" style="display: none;"></i>
                                <small class="help-block" data-fv-validator="notEmpty" data-fv-for="ciudad_nacimiento" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                            </div>
                        </div>
 
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Identificación oficial</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <select id="inputState" name="documento_acreditacion" class="form-control" data-fv-field="documento_acreditacion">
                                            <option value="">Elegir</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="CURP">CURP</option>
                                            <option value="cedulaprofesional">Cédula Profesional</option>
                                            <option value="Credencial">Identificación Oficial</option>
                                        </select><i class="form-control-feedback" data-fv-icon-for="documento_acreditacion" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="documento_acreditacion" data-fv-result="NOT_VALIDATED" style="display: none;">Seleccionar una opcion</small></div>
                                </div>
                            </div>
                            <!--    Nuevo campoa --->
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Número de identificación oficial</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="text" class="form-control" value="" name="numero_documento_acreditacion" id="inputid" placeholder="Número de identificación oficial" data-fv-field="numero_documento_acreditacion"><i class="form-control-feedback" data-fv-icon-for="numero_documento_acreditacion" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="numero_documento_acreditacion" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>
 
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Teléfono</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                                            <input id="form_user_name2" name="extension" value="+52" class="form-control" placeholder="+52" data-error="User Name." type="text" data-fv-field="extension"><i class="form-control-feedback" data-fv-icon-for="extension" style="display: none;"></i>
                                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="extension" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                        <div class="col-md-9 col-sm-9 col-lg-9 col-xs-9">
                                            <input id="form_user_name2" name="numero" value="" class="form-control" placeholder="Teléfono*" data-error="User Name." type="text" data-fv-field="numero"><i class="form-control-feedback" data-fv-icon-for="numero" style="display: none;"></i>
                                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="numero" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 container-form1">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                        <input style="line-height: 9px;" id="form_user_name2" name="lada" value="" class="form-control" placeholder="Ext." data-error="User Name." type="tel">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 container-form1">
                                <div class="form-group has-feedback">
                                    <!--div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                                        <label for="inputid">Es:</label>
                                    </div-->
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="text-align: center;">
                                        <label style="color: #9e9999; font-weight: 100;" for="sexo"><input type="radio" id="type_cel" name="type_cel" value="SI" required="required" data-fv-field="type_cel"> Fijo  </label>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                        <label style="color: #9e9999; font-weight: 100;" for="sexo"><input type="radio" id="type_cel" name="type_cel" value="NO" required="required" data-fv-field="type_cel"><i class="form-control-feedback" data-fv-icon-for="type_cel" style="display: none;"></i> Celular  </label>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="type_cel" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>

                        </div>



                  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class="title1-plan">
                                <h3>Domicilio de Residencia</h3>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">País</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">




                                        <select id="inputState" name="pais_residencia" class="form-control" data-fv-field="pais_residencia">
                                        <option value="" selected="">Elegir</option>
                                                                                    <option value="mx">México</option>
                                                                                    <option value="br">Brasil</option>
                                                                                    <option value="gt">Guatemala</option>
                                                                                    <option value="bz">Belice</option>
                                                                                    <option value="ar">Argentina</option>
                                                                                    <option value="bo">Bolivia</option>
                                                                                    <option value="cl">Chile</option>
                                                                                    <option value="co">Colombia</option>
                                                                                    <option value="cr">Costa Rica</option>
                                                                                    <option value="cu">Cuba</option>
                                                                                    <option value="ec">Ecuador</option>
                                                                                    <option value="es">España</option>
                                                                                    <option value="hn">Honduras</option>
                                                                                    <option value="ni">Nicaragua</option>
                                                                                    <option value="pa">Panamá</option>
                                                                                    <option value="pe">Perú</option>
                                                                                    <option value="pt">Portugal</option>
                                                                                    <option value="sv">El Salvador</option>
                                                                                    <option value="tt">Trinidad y Tobago</option>
                                                                                    <option value="uy">Uruguay</option>
                                                                                    <option value="ve">Venezuela</option>
                                                                                    <option value="do">República Dominicana</option>
                                                                                    <option value="py">Paraguay</option>
                                                                                </select><i class="form-control-feedback" data-fv-icon-for="pais_residencia" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="pais_residencia" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Estado / Provincia </label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="text" name="estado_residencia" class="form-control" value="" id="inputid" placeholder="" data-fv-field="estado_residencia"><i class="form-control-feedback" data-fv-icon-for="estado_residencia" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="estado_residencia" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group has-feedback">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Municipio / Ciudad </label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                        <input type="text" name="ciudad_residencia" class="form-control" value="" id="inputid" placeholder="" data-fv-field="ciudad_residencia"><i class="form-control-feedback" data-fv-icon-for="ciudad_residencia" style="display: none;"></i>
                                    <small class="help-block" data-fv-validator="notEmpty" data-fv-for="ciudad_residencia" data-fv-result="NOT_VALIDATED" style="display: none;">Rellenar campo</small></div>
                                </div>
                            </div>
 
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                            <div class="form-group">
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <label for="inputid">Código postal</label>
                                </div>
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <input type="text" name="cp_nacimiento" class="form-control" id="inputid" value="" placeholder="Código Postal">
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 container-form1">
                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-lg-2 col-xs-4">
                                        <label for="inputid">Dirección </label>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-lg-10 col-xs-8">
                                        <input type="text" name="direccion_residencia" class="form-control" value="" id="inputid" placeholder="">
                                    </div>
                                </div>
                            </div>
 
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                        <label for="inputid">Teléfono 2 (Opcional)</label>
                                    </div>
                                                                        <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                                <input id="form_user_name2" name="lada2" value="+52" class="form-control" placeholder="Lada" data-error="User Name." type="text">
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-lg-9 col-xs-9">  
                                                <input id="form_user_name2" name="numero2" value="" class="form-control" placeholder="Teléfono*" data-error="User Name." type="text">
                                            </div> 
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 container-form1">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                        <input id="form_user_name2" name="extension2" value="" class="form-control" placeholder="Ext." data-error="User Name." type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 container-form1">
                                <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12 container-form1">
                                    <div class="form-group">
                                   
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label style="color: #9e9999; font-weight: 100;"><input type="radio" id="type_number2" name="fijo_residencia" value="SI"> Fijo  </label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label style="color: #9e9999; font-weight: 100;"><input type="radio" id="type_number2" name="fijo_residencia" checked="" value="NO"> Celular  </label>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                          
    </div>  </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
    <input type="button" name="password" class="next btn btn-info" value="Siguiente" />

  </fieldset>



  <fieldset>
    <h2>Paso 3: Estudios</h2>
    <div class="form-group">
 


<div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 container-form1">
                                <div class="col-md-12 lineagris">
                                    <div class="cuadro-datos">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Nombre(s):</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                    <label for="inputid">Jesus Alberto    Blanco R </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Título a obtener:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                            <label for="inputid">Maestría</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Fecha nacimiento:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                            <label for="inputid" class="getNacimiento">1990-11-06</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Programa de estudio:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                                                                                                                                                        <label for="inputid" class="getprograma">Maestría en Derecho Electoral</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Nacionalidad:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                            <label for="inputid" class="getNacionalidad">mx</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Ciclo escolar:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">

                                                                                                        <label for="inputid" class="getCiclo">2019-2020</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Teléfono:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                    <label for="inputid">9931207046</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Correo Electrónico:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                    <label for="inputid">ing.blancoross@gmail.com</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <div class="title1-plan">
                                    <h3>Estudios previos</h3>
                                </div>
                                <div class="col-md-12 container-form1">
                                    <div class="form-group has-feedback has-success">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label for="inputid">Universidad de Origen</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <input type="text" name="universidad" class="form-control" id="inputid" value="iup" placeholder="" data-fv-field="universidad"><i class="form-control-feedback glyphicon glyphicon-ok" data-fv-icon-for="universidad" style="display: block;"></i>
                                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="universidad" data-fv-result="VALID" style="display: none;">Rellenar campo</small></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 container-form1">
                                    <div class="form-group has-feedback has-success">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label for="inputid">País de la Universidad de Origen</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">


                                            <select id="inputState" name="pais_estudios" class="form-control" data-fv-field="pais_estudios">
                                                <option value="" selected="">Elegir</option>
                                                                                                    <option selected="" value="mx">México</option>
                                                                                                    <option value="br">Brasil</option>
                                                                                                    <option value="gt">Guatemala</option>
                                                                                                    <option value="bz">Belice</option>
                                                                                                    <option value="ar">Argentina</option>
                                                                                                    <option value="bo">Bolivia</option>
                                                                                                    <option value="cl">Chile</option>
                                                                                                    <option value="co">Colombia</option>
                                                                                                    <option value="cr">Costa Rica</option>
                                                                                                    <option value="cu">Cuba</option>
                                                                                                    <option value="ec">Ecuador</option>
                                                                                                    <option value="es">España</option>
                                                                                                    <option value="hn">Honduras</option>
                                                                                                    <option value="ni">Nicaragua</option>
                                                                                                    <option value="pa">Panamá</option>
                                                                                                    <option value="pe">Perú</option>
                                                                                                    <option value="pt">Portugal</option>
                                                                                                    <option value="sv">El Salvador</option>
                                                                                                    <option value="tt">Trinidad y Tobago</option>
                                                                                                    <option value="uy">Uruguay</option>
                                                                                                    <option value="ve">Venezuela</option>
                                                                                                    <option value="do">República Dominicana</option>
                                                                                                    <option value="py">Paraguay</option>
                                                                                            </select><i class="form-control-feedback glyphicon glyphicon-ok" data-fv-icon-for="pais_estudios" style="display: block;"></i>
                                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="pais_estudios" data-fv-result="VALID" style="display: none;">Rellenar campos</small></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 container-form1">
                                    <div class="form-group has-feedback has-success">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label for="inputid">Tipo de título obtenido</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <select id="inputState" name="tipo_titulo" class="form-control" data-fv-field="tipo_titulo">
                                                <option value="" selected="">Elegir</option>
                                                <option value="Licenciatura">Licenciatura</option>
                                                <option value="Ingenieria">Ingeniería</option>
                                                <option value="Maestria" selected="">Maestría</option>
                                                <option value="Doctorado">Doctorado</option>
                                            </select><i class="form-control-feedback glyphicon glyphicon-ok" data-fv-icon-for="tipo_titulo" style="display: block;"></i>
                                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="tipo_titulo" data-fv-result="VALID" style="display: none;">Rellenar campo</small></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 container-form1">
                                    <div class="form-group has-feedback has-success">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label for="inputid">Nombre del título obtenido</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <input type="text" name="nombre_titulo" class="form-control" value="mate" id="inputid" placeholder="" data-fv-field="nombre_titulo"><i class="form-control-feedback glyphicon glyphicon-ok" data-fv-icon-for="nombre_titulo" style="display: block;"></i>
                                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="nombre_titulo" data-fv-result="VALID" style="display: none;">Rellenar campo</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
 

 


  </div>
     <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
  <input type="button" name="password" class="next btn btn-info" value="Siguiente" />


  </fieldset>


    <fieldset>
    <h2>Paso 4: Adjuntar documentos</h2>
    <div class="form-group">
 <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 container-form1">
                                <div class="col-md-12 lineagris">
                                    <div class="cuadro-datos">


                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Nombre(s):</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                <label for="inputid">Jesus Alberto    Blanco R </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Título a obtener:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                    <label for="inputid">Maestría</label>
                                                                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Fecha nacimiento:</label>
                                            </div>
                                            
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                            <label for="inputid" class="getNacimiento">1990-11-06</label>
                                                                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Programa de estudio:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                                                                                                                                        <label for="inputid" class="getprograma">Maestría en Derecho Electoral</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Nacionalidad:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                        <label for="inputid" class="getNacionalidad">mx</label>
                                                                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Ciclo escolar:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                
                                                                                                        <label for="inputid" class="getCiclo">2019-2020</label>
                                                                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Teléfono:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                <label for="inputid">9931207046</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                <label for="inputid">Correo Electrónico:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                <label for="inputid">ing.blancoross@gmail.com</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="padding-right: 0!important;padding-left: 0!important;">
                                <div class="title1-plan">
                                    <h3>Adjuntar documentos</h3>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 container-form1 text-center pfer">
                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                                        <label for="inputid">Selecciona documento</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-center pfer">
                                        <select id="inputState" name="documentload" class="form-control">
                                            <option value="CERTIFICADO">Certificado de estudios</option><option value="CEDULA">Cedula</option>                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 text-center pfer">
                                        <button id="addDocument" type="button" class="btn btn-primary dz-clickable">Adjuntar Archivo</button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 container-form1">
                                    <div class="reglas-archivo">
                                        <div style="margin: 10px 14%;text-align: center;color: black;border: 1px solid black;background-color: #60acec;font-weight: 700;">Se aceptan los siguientes formatos de documentos: pdf, doc, docx, jpg, gif, txt, r , odt, png, jpeg</div>
                                        <div style="margin: 10px 14%;text-align: center;color: black;border: 1px solid black;background-color: #60acec;font-weight: 700;">El tamaño máximo de los archivos es de 15 megabytes</div>

                                    </div>
                                </div>
                                <div class="row documentpre">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="padding-left: 0;padding-right: 0;margin-top: 2em;">
                                    <table class="table">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Documentos</th>
                                            <th scope="col">Cargado</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Opciones</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr class="ACTA  ">
                      <th scope="row">1</th>
                        <td>Acta de Nacimiento</td>
                        <td>Si</td>
                        <td>2020-02-02</td>
                        <td><a class="deleteDocument" data-text"acta="" de="" nacimiento"="" data-docid="1084" style="cursor:pointer">Eliminar</a></td>
                      </tr><tr class="CURRICULUM  ">
                      <th scope="row">2</th>
                        <td>Curriculum Vitae</td>
                        <td>Si</td>
                        <td>2020-02-02</td>
                        <td><a class="deleteDocument" data-text"curriculum="" vitae"="" data-docid="1085" style="cursor:pointer">Eliminar</a></td>
                      </tr><tr class="CERTIFICADO hidden ">
                      <th scope="row">3</th>
                        <td>Certificado de estudios</td>
                        <td>No</td>
                        <td>2020-02-02</td>
                        <td><a class="deleteDocument" data-text"certificado="" de="" estudios"="" style="cursor:pointer">Eliminar</a></td>
                      </tr><tr class="IDENTIFICACION  ">
                      <th scope="row">4</th>
                        <td>Identificacion oficial</td>
                        <td>Si</td>
                        <td>2020-02-02</td>
                        <td><a class="deleteDocument" data-text"identificacion="" oficial"="" data-docid="1087" style="cursor:pointer">Eliminar</a></td>
                      </tr><tr class="TITULO  ">
                      <th scope="row">5</th>
                        <td>Titulo</td>
                        <td>Si</td>
                        <td>2020-02-02</td>
                        <td><a class="deleteDocument" data-text"titulo"="" data-docid="1088" style="cursor:pointer">Eliminar</a></td>
                      </tr><tr class="CEDULA hidden ">
                      <th scope="row">6</th>
                        <td>Cedula</td>
                        <td>No</td>
                        <td>2020-02-02</td>
                        <td><a class="deleteDocument" data-text"cedula"="" style="cursor:pointer">Eliminar</a></td>
                      </tr><tr class="FOTOGRAFIA  ">
                      <th scope="row">7</th>
                        <td>Fotografia</td>
                        <td>Si</td>
                        <td>2020-02-02</td>
                        <td><a class="deleteDocument" data-text"fotografia"="" data-docid="1086" style="cursor:pointer">Eliminar</a></td>
                      </tr>                                        </tbody>
                                      </table>
                                    <input type="checkbox" name="document-complete-check" class="customRadio1" id="document-complete-check">
                                    <label  style="max-width: 98%;font-size: 11px;">Asumo el compromiso de enviar la documentación requerida  en un plazo no mayor a 30 días hábiles,  en el entendido que de incumplir con tal compromiso quedará sin efecto la inscripción correspondiente.</label>
                                </div>
 
                            </div>
                            </div>
    </div>
 
    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
    <input type="button" name="password" class="next btn btn-info" value="Siguiente" />
  </fieldset>
    <fieldset>
    <h2>Paso 5: Confirmar solicitud</h2>
    <div class="form-group">
     <div id="menu4" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 container-form1">
                                <div class="col-md-12 lineagris">
                                    <div class="cuadro-datos">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Nombre(s):</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                    <label for="inputid">Jesus Alberto    Blanco R </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Título a obtener:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                            <label for="inputid">Maestría</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Fecha nacimiento:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                            <label for="inputid" class="getNacimiento">1990-11-06</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Programa de estudio:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                                                                                                                                                        <label for="inputid" class="getprograma">Maestría en Derecho Electoral</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Nacionalidad:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                                                                            <label for="inputid" class="getNacionalidad">mx</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Ciclo escolar:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                    
                                                                                                        <label for="inputid" class="getCiclo">2019-2020</label>
                                                                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Teléfono:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                    <label for="inputid">9931207046</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 container-form1">
                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                                    <label for="inputid">Correo Electrónico:</label>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                                    <label for="inputid">ing.blancoross@gmail.com</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                    <div class="title1-plan">
                                        <h3>Finalizar proceso de inscripción</h3>
                                    </div>
                                    <div class="col-md-12 text-center mt-5 mb-5" style="padding-left: 0;padding-right: 0;text-align: justify;margin-bottom: 2em;/* color: black; */background: #d9d9d9;border: solid 2px #522a6a;">
                                        <p style="padding: 1em;">Declaro la veracidad de la información consignada y que los documentos que se envían son copia fiel del original. En caso de no ser cierta la manifestación antes señalada, el postulante deberá asumir las consecuencias legales que pudieran derivarse de su actuación y el Instituto Iberoamericano de Derecho Electoral conforme a la normativa vigente no reconocerá validez alguna de la documentación adjunta para los efectos que ha sido presentada. Asimismo, el Instituto iberoamericano de Derecho Electoral podrá solicitar en cualquier momento la presentación de los originales para comprobar la veracidad de los mismos.</p>
                                    </div>
                                    <div class="col-md-12 text-center mt-5 mb-5">
                                        <button type="button" id="bFinalizar" class="btn btn-primary">Finalizar</button>
                                    </div>
                                </div>
                            </div>

                            <!--div class="row col-md-12 text-center">
                                <div class="title2-plan">
                                    <h3>LA SOLICITUD DE INSCRIPCIÓN HA SIDO REGISTRADA</h3>
                                </div>
                                <div class="text-center mt-5 mb-5" style="padding-left: 0;padding-right: 0;text-align: justify;margin-bottom: 2em;/* color: black; */background: #d9d9d9;border: solid 2px #522a6a;width: 50%;display: inline-block;">
                                    <p style="padding: 1em;">El Instituto Iberoamericano de Derecho Electoral remitirá al correo electrónico proporcionado el comprobante de su solicitud de inscripción para los fines académicos correspondientes</p>
                                </div>
                            </div-->
                        </div>
                    </div>
    </div>
    
    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Guardar" />
  </fieldset>

  </form> 
   
<style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }
  </style>






</div>


 

<script type="text/javascript">

$("#cb_programa").change(function(){
  if($("#cb_programa").val() == 0){
    $( "#i1" ).prop( "disabled", true );
   }else{
    $( "#i1" ).prop( "disabled", false );
   }
 
});
</script>

  
</body>
</html>