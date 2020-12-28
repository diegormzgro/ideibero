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
$grupo =$_POST ['grupo'];


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