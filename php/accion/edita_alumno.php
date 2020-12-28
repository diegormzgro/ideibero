<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
//$pro = $_POST['pro'];
//$id=$_POST['idPerfil'];
if ($_SESSION['Perfil']=='Control Escolar') {
  $id = $_POST['idPerfil'];
}else{
  $id = $_SESSION['id'];
}

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
$emailInst  = $_POST['email_sis'];
$pass = $_POST['pass_sis'];
$calle = $_POST['calle'];
$numeroi = $_POST['numeroi'];
$numeroe = $_POST['numeroe'];
$colonia = $_POST['colonia'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cod_postal = $_POST['cod_postal'];
$pais = $_POST['pais'];

$lic = $_POST['lic'];
$lic_universidad = $_POST['lic_universidad'];
$lic_pais_e = $_POST['lic_pais_e'];

  if ($_POST['lic_status_e']) {
  $lic_status_e = $_POST['lic_status_e'];
  }else{
    $lic_status_e = "";
  }
  if ($_POST['lic_fecha_fin']!="") {
    $lic_fecha_fin = $_POST['lic_fecha_fin'];

    $sql= "UPDATE usuario_activo SET lic_fecha_fin='$lic_fecha_fin' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $lic_fecha_fin = NULL;
  }


$mtr = $_POST['mtr'];
$mtr_universidad = $_POST['mtr_universidad'];
$mtr_pais_e = $_POST['mtr_pais_e'];
  if ($_POST['mtr_status_e']) {
  $mtr_status_e = $_POST['mtr_status_e'];
  }else{
    $mtr_status_e = "";
  }
  if ($_POST['mtr_fecha_fin']!="") {
    $mtr_fecha_fin = $_POST['mtr_fecha_fin'];
    $sql= "UPDATE usuario_activo SET mtr_fecha_fin='$mtr_fecha_fin' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $mtr_fecha_fin = NULL;
  }


$doct = $_POST['doct'];
$doct_universidad = $_POST['doct_universidad'];
$doct_pais_e = $_POST['doct_pais_e'];
  if ($_POST['doct_status_e']) {
  $doct_status_e = $_POST['doct_status_e'];

  }else{
    $doct_status_e = "";

  }

if ($_POST['doct_fecha_fin']!="") {
  $doct_fecha_fin = $_POST['doct_fecha_fin'];
    $sql= "UPDATE usuario_activo SET doc_fecha_fin='$doct_fecha_fin' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);

}else{
  $doct_fecha_fin = NULL;
}

$monto_inscripcion = $_POST['monto_inscripcion'];
$beca_inscripcion = $_POST['beca_inscripcion'];
$monto_mensualidad = $_POST['monto_mensualidad'];
$beca_mensualidad = $_POST['beca_mensualidad'];

$fecha_ingreso = $_POST['fecha_ingreso'];
$ultimoPago = $_POST['ultimoPago'];

$monto_pagar_inscripcion = $_POST['monto_pagar_inscripcion'];
$monto_pagado_inscripcion = $_POST['monto_pagado_inscripcion'];
$fecha_pago_inscripcion = $_POST['fecha_pago_inscripcion'];
$monto_pagar_mensualidad = $_POST['monto_pagar_mensualidad'];
$monto_pagado_mensualidad = $_POST['monto_pagado_mensualidad'];
$fecha_pago_mensualidad = $_POST['fecha_pago_mensualidad'];
$doc_cv = $_POST['doc_cv'];

    $sql= "UPDATE usuario_activo SET nombre='$nombre', ap_paterno='$primer_ap', ap_materno='$segundo_ap', fecha_nac='$fecha_nac', sexo='$sexo', nacionalidad='$nacionalidad', curp='$curp', tel_celular='$tel_celular', tel_fijo ='$tel_fijo', email_particular='$email', calle='$calle', num_int='$numeroi', num_ext='$numeroe', colonia='$colonia', ciudad='$ciudad', estado='$estado', cod_postal='$cod_postal', pais='$pais',

    lic_lic ='$lic', lic_uni ='$lic_universidad', lic_pais ='$lic_pais_e', lic_status ='$lic_status_e',

    mtr_mtr ='$mtr', mtr_uni ='$mtr_universidad', mtr_pais ='$mtr_pais_e', mtr_status ='$mtr_status_e',

    doc_doc ='$doct', doc_uni ='$doct_universidad', doc_pais ='$doct_pais_e', doc_status ='$doct_status_e',

    pago_convocatoria ='$fecha_ingreso' , pago_ultimo ='$ultimoPago', pago_total ='$monto_mensualidad', pago_beca = '$beca_mensualidad', pago_inscripcion ='$monto_inscripcion', pago_inscripcion_beca ='$beca_inscripcion',

    inscripcion_pago='$monto_pagar_inscripcion', inscripcion_pagado='$monto_pagado_inscripcion', inscripcion_fecha='$fecha_pago_inscripcion',
    mensualidad_pago='$monto_pagar_mensualidad', mensualidad_pagado='$monto_pagado_mensualidad', mensualidad_fecha='$fecha_pago_mensualidad', doc_cv='$doc_cv',emailInst='$emailInst', pass='$pass'

    WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
    echo $sql;
  //break;

//}



 
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