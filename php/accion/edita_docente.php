<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include('../conexion.php');
//$pro = $_POST['pro'];
if ($_SESSION['Perfil']=='Control Escolar') {
  # code...
}else{
 $id=$_SESSION['id']; 
}


$nombre = $_POST['nombre'];
$primer_ap = $_POST['primer_ap'];
$segundo_ap = $_POST['segundo_ap'];
$email_sis = $_POST['email_sis'];
$pass_sis = $_POST['pass_sis'];
$nacionalidad = $_POST['nacionalidad'];
$fecha_nac = $_POST['fecha_nac'];
$sexo = $_POST['sexo'];
$curp = $_POST['curp'];
$tel_ext = $_POST['tel_ext'];
$email = $_POST['correo'];

$calle = $_POST['calle'];
$numeroi = $_POST['numeroi'];
$numeroe = $_POST['numeroe'];
$colonia = $_POST['colonia'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$pais = $_POST['pais'];
$titulo = $_POST['titulo'];

$tel_celular = $_POST['tel_celular'];
$tel_fijo = $_POST['tel_fijo'];

              $lic =  $_POST['lic'];
              $lic_uni =  $_POST['lic_uni'];
              $lic_pais =  $_POST['lic_pais'];
              $lic_estatus =  $_POST['lic_estatus'];
 
  if ($_POST['lic_fecha']!="") {
    $lic_fecha = $_POST['lic_fecha'];

    $sql= "UPDATE catg_catedratico SET lic_fecha='$lic_fecha' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $lic_fecha = NULL;
  }

  if ($_POST['mtria_fecha_fin']!="") {
    $mtria_fecha = $_POST['mtria_fecha_fin'];

    $sql= "UPDATE catg_catedratico SET mtria_fecha='$mtria_fecha' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $mtria_fecha = NULL;
  }

  if ($_POST['doc_fecha_fin']!="") {
    $doc_fecha = $_POST['doc_fecha_fin'];

    $sql= "UPDATE catg_catedratico SET doc_fecha='$doc_fecha' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $doc_fecha = NULL;
  }

              $mtria =  $_POST['mtria'];
              $mtria_uni =  $_POST['mtria_uni'];
              $mtria_pais =  $_POST['mtria_pais'];
              $mtria_estatus =  $_POST['mtria_status_e'];

              $doc =  $_POST['doc'];
              $doc_uni =  $_POST['doc_universidad'];
              $doc_pais =  $_POST['doc_pais_e'];
              $doc_estatus =  $_POST['doc_status_e'];

//switch($pro){
    $sql= "UPDATE catg_catedratico SET titulo='$titulo', email='$email',  nombre='$nombre', ap_paterno='$primer_ap', ap_materno='$segundo_ap', fecha_nac='$fecha_nac', sexo='$sexo', nacionalidad='$nacionalidad', curp='$curp', telefono='$tel_celular', telefono_fijo='$tel_fijo', ext='$tel_ext', titulo='$titulo', calle='$calle', num_ext='$numeroe', 
    num_int='$numeroi', colonia='$colonia', municipio='$ciudad', estado='$estado', cod_postal='$cp', pais='$pais',
    lic='$lic', lic_uni='$lic_uni',
    lic_pais='$lic_pais', lic_estatus='$lic_estatus',
    mtria ='$mtria', mtria_uni='$mtria_uni', mtria_pais='$mtria_pais',mtria_estatus='$mtria_estatus' ,
    doc='$doc' , doc_uni ='$doc_uni' , doc_pais ='$doc_pais' , doc_estatus ='$doc_estatus' 

     WHERE id='$id'";
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