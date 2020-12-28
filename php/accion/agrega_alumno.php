<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
//$pro = $_POST['pro'];
//$id=$_POST['idPerfil'];

$nombre = $_POST['nombre'];
$primer_ap = $_POST['primer_ap'];
$segundo_ap = $_POST['segundo_ap'];
$posgrado = $_POST['posgrado'];
$email_sis = $_POST['email_sis'];
$pass_sis = $_POST['pass_sis'];
$nacionalidad = $_POST['nacionalidad'];
$fecha_nac = $_POST['fecha_nac'];
$sexo = $_POST['sexo'];
$curp = $_POST['curp'];
$tel_celular = $_POST['tel_celular'];
$tel_fijo = $_POST['tel_fijo'];
$tel_ext = $_POST['tel_ext'];
$email = $_POST['correo'];

$calle = $_POST['calle'];
$numeroi = $_POST['numeroi'];
$numeroe = $_POST['numeroe'];
$colonia = $_POST['colonia'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cod_postal'];
$pais = $_POST['pais'];
$grupo =0;


//$estado = $_POST['estado'];
//$estado = $_POST['estado'];

$lic = $_POST['lic'];
$lic_universidad = $_POST['lic_universidad'];
$lic_pais_e = $_POST['lic_pais_e'];

  if ($_POST['lic_status_e']!="") {
  $lic_status_e = $_POST['lic_status_e'];
  }else{
    $lic_status_e = "";
  }
  if ($_POST['lic_fecha_fin']!="") {
    $lic_fecha_fin = $_POST['lic_fecha_fin'];
  }else{
    $lic_fecha_fin = NULL;
  }

if ($lic_fecha_fin=="") {
$lic_fecha_fin = NULL;
}

$mtr = $_POST['mtr'];
$mtr_universidad = $_POST['mtr_universidad'];
$mtr_pais_e = $_POST['mtr_pais_e'];
  if ($_POST['mtr_status_e']!="") {
  $mtr_status_e = $_POST['mtr_status_e'];
  }else{
    $mtr_status_e = "";
  }
  if ($_POST['mtr_fecha_fin']!="") {
    $mtr_fecha_fin = $_POST['mtr_fecha_fin'];

  }else{
    $mtr_fecha_fin = NULL;
  }

if ($mtr_fecha_fin=="") {
$mtr_fecha_fin = NULL;
}
$doct = $_POST['doct'];
$doct_universidad = $_POST['doct_universidad'];
$doct_pais_e = $_POST['doct_pais_e'];

  if ($_POST['doct_status_e']="") {
  $doct_status_e = $_POST['doct_status_e'];

  }else{
    $doct_status_e = "";

  }

if ($_POST['doct_fecha_fin']!="") {
  $doct_fecha_fin = $_POST['doct_fecha_fin'];

}else{
  $doct_fecha_fin = NULL;
}
if ($doct_fecha_fin =="") {
  $doct_fecha_fin = NULL;
}

//switch($pro){
  //case 'Registro':
    $sql = "INSERT INTO usuario_activo (nombre, ap_paterno, ap_materno, fecha_nac, sexo, nacionalidad, curp, tel_celular, tel_fijo, ext, email_particular, calle, num_int, num_ext, colonia, ciudad, estado, cod_postal, pais, emailInst,
      lic_lic, lic_uni, lic_pais, lic_status, lic_fecha_fin,
      mtr_mtr, mtr_uni, mtr_pais, mtr_status, mtr_fecha_fin,
      doc_doc, doc_uni, doc_pais, doc_status, doc_fecha_fin,
     pass, id_grupo, id_perfil, id_posgrado, status, bloqueado, eliminado) ".  
    "VALUES ('$nombre', '$primer_ap', '$segundo_ap', '$fecha_nac', '$sexo', '$nacionalidad', '$curp', '$tel_celular', '$tel_fijo', '$tel_ext', '$email', '$calle', '$numeroi', '$numeroe', '$colonia', '$ciudad', '$estado', '$cp', '$pais', '$email_sis',
      '$lic', '$lic_universidad', '$lic_pais_e', '$lic_status_e', '$lic_fecha_fin',
      '$mtr', '$mtr_universidad', '$mtr_pais_e', '$mtr_status_e', '$mtr_fecha_fin',
      '$doct', '$doct_universidad', '$doct_pais_e', '$doct_status_e', '$doct_fecha_fin',


    '$pass_sis','$grupo', 1, $posgrado, 1,0,0)";
    $datos = mysqli_query($conexion,$sql);
    echo $sql;

  $email_from = "admisiones@ideiberoamerica.com";

    $headers = "From: Instituto Iberoamericano de Derecho Electoral <" . $email_from . ">\r\n";
    //$header .= "Reply-To: " . $replyto . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"=A=G=R=O=\"\r\n\r\n";
    
    $CuerpoMensaje .= "Hola: " . $nombre . " " .$primer_ap."  " .$segundo_ap."\r\n";
    $CuerpoMensaje .= "\r\n";

if ($posgrado==1) {
        $CuerpoMensaje .= "El Instituto Iberoamericano de Derecho Electoral agradece tu interés por nuestra Maestría en Derecho Constitucional y Derechos Humanos.

Dentro de los próximos 3 días hábiles, la Comisión Académica analizará la información y la documentación que amablemente nos proporcionaste, a efecto de verificar si se cumplen con todos y cada uno los requisitos académicos que autorizan el ingreso al posgrado de tu interés, lo cual se te notificará inmediatamente.

Si tuvieras alguna duda, te invitamos a que te comuniques con nosotros a los teléfonos 55-6062-7722 y 55-79-13-1372 o escríbenos al correo electrónico: admisiones@ideiberoamerica.com 

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral

";
}elseif ($posgrado==2) {
        $CuerpoMensaje .= "El Instituto Iberoamericano de Derecho Electoral agradece tu interés por nuestra Maestría en Derecho Electoral.

Dentro de los próximos 3 días hábiles, la Comisión Académica analizará la información y la documentación que amablemente nos proporcionaste, a efecto de verificar si se cumplen con todos y cada uno los requisitos académicos que autorizan el ingreso al posgrado de tu interés, lo cual se te notificará inmediatamente.

Si tuvieras alguna duda, te invitamos a que te comuniques con nosotros a los teléfonos 55-6062-7722 y 55-79-13-1372 o escríbenos al correo electrónico: admisiones@ideiberoamerica.com 

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral
";
}elseif ($posgrado==3) {
        $CuerpoMensaje .= "El Instituto Iberoamericano de Derecho Electoral agradece tu interés por nuestro Doctorado en Derecho Constitucional y Derechos Humanos.

Dentro de los próximos 3 días hábiles, la Comisión Académica analizará la información y la documentación que amablemente nos proporcionaste, a efecto de verificar si se cumplen con todos y cada uno los requisitos académicos que autorizan el ingreso al posgrado de tu interés, lo cual se te notificará inmediatamente.

Si tuvieras alguna duda, te invitamos a que te comuniques con nosotros a los teléfonos 55-6062-7722 y 55-79-13-1372 o escríbenos al correo electrónico: admisiones@ideiberoamerica.com 

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral
";
}elseif ($posgrado==4) {
        $CuerpoMensaje .= "El Instituto Iberoamericano de Derecho Electoral agradece tu interés por nuestro Doctorado en Derecho Electoral.

Dentro de los próximos 3 días hábiles, la Comisión Académica analizará la información y la documentación que amablemente nos proporcionaste, a efecto de verificar si se cumplen con todos y cada uno los requisitos académicos que autorizan el ingreso al posgrado de tu interés, lo cual se te notificará inmediatamente.

Si tuvieras alguna duda, te invitamos a que te comuniques con nosotros a los teléfonos 55-6062-7722 y 55-79-13-1372 o escríbenos al correo electrónico: admisiones@ideiberoamerica.com 

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral
";
}elseif ($posgrado==9) {
        $CuerpoMensaje .= "El Instituto Iberoamericano de Derecho Electoral agradece tu interés por nuestro Diplomado en Derecho Electoral.

Dentro de los próximos 3 días hábiles, la Comisión Académica analizará la información y la documentación que amablemente nos proporcionaste, a efecto de verificar si se cumplen con todos y cada uno los requisitos académicos que autorizan el ingreso al posgrado de tu interés, lo cual se te notificará inmediatamente.

Si tuvieras alguna duda, te invitamos a que te comuniques con nosotros a los teléfonos 55-6062-7722 y 55-79-13-1372 o escríbenos al correo electrónico: admisiones@ideiberoamerica.com 

Estamos para servirte. Será un placer atenderte.

Atentamente
Instituto Iberoamericano de Derecho Electoral
";
}



    
    //armando mensaje del email
    $email_message = "--=A=G=R=O=\r\n";
    $email_message .= "Content-type:text/plain; charset=utf-8\r\n";
    $email_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_message .= $CuerpoMensaje . "\r\n\r\n";
    
    //archivo adjunto  para email    

    
      $email_subject = "Constancia de Registro / Instituto Iberoamericano de Derecho Electoral";

    if ($nombre) {
    //enviamos el email
      mail($email, $email_subject, $email_message, $headers);

      mail('admisiones@ideiberoamerica.com', $email_subject, $email_message, $headers);

      mail('oswaldlaraborges@yahoo.com.mx', $email_subject, $email_message, $headers);
    }

  //header("location:../listar_admision.php");

            ?>
 

    <script type="text/javascript">
 
 
      $(document).ready(function() {

        $('#dataTable').DataTable( {

          "language": {
          "lengthMenu": "Mostrar _MENU_ por pagina   ",
          "zeroRecords": "Sin registros ",
          "info": " Pagina _PAGE_ de _PAGES_   Total: _TOTAL_ registros",
          "infoEmpty": "Ningún registro",

          "search": "Buscar:",
          "paginate": {
          "first":      "Primer",
          "previous":   "Anterior",
          "next":       "Siguiente",
          "last":       "Ultimo",
          "loadingRecords": "Espere un momento - Cargando datos..."
      },
      buttons: {
                  colvis: 'Habilitar columnas'
              }
      },
      "bDestroy": true,
      "scrollY": "500px",
      "scrollX":        true,
      "scrollCollapse": true,
      "paging":         false,
      "autoWidth": false,
      //"scrollX": true,
      dom: 'Bfrtip' ,
      //"info":     false,

           buttons: [
               {
                   extend: 'colvis',
                   collectionLayout: 'fixed two-column'
               },

           ],




          
             } );
        } );
</script>