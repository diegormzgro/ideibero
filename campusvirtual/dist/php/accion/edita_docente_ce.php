<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include('../conexion.php');
//$pro = $_POST['pro'];
if ($_SESSION['Perfil']=='Control Escolar') {
 $id=$_POST['idPerfilCat']; 
}else{
 $id=$_SESSION['id']; 
}


$nombre = $_POST['mtro_nombre'];
$primer_ap = $_POST['mtro_primer_ap'];
$segundo_ap = $_POST['mtro_segundo_ap'];
$email_sis = $_POST['email_sis'];
$pass_sis = $_POST['pass_sis'];
$nacionalidad = $_POST['mtro_nacionalidad'];
$fecha_nac = $_POST['mtro_fecha_nac'];
$sexo = $_POST['mtro_sexo'];
$curp = $_POST['mtro_curp'];
$tel_ext = $_POST['mtro_tel_ext'];
$email = $_POST['mtro_correo'];

$calle = $_POST['mtro_calle'];
$numeroi = $_POST['mtro_numeroi'];
$numeroe = $_POST['mtro_numeroe'];
$colonia = $_POST['mtro_colonia'];
$ciudad = $_POST['mtro_ciudad'];
$estado = $_POST['mtro_estado'];
$cp = $_POST['mtro_cp'];
$pais = $_POST['mtro_pais'];
$titulo = $_POST['mtro_titulo_doc'];

$tel_celular = $_POST['mtro_tel_celular'];
$tel_fijo = $_POST['mtro_tel_fijo'];

              $lic =  $_POST['mtro_lic'];
              $lic_uni =  $_POST['mtro_lic_universidad'];
              $lic_pais =  $_POST['mtro_lic_pais_e'];

  if ($_POST['mtro_mtria_status_e']!="") {
  $mtr_status_e = $_POST['mtro_mtria_status_e'];
  }else{
    $mtr_status_e = "";
  }


  if ($_POST['mtro_status_e']!="") {
  $mtro_status_e = $_POST['mtro_status_e'];
  }else{
    $mtro_status_e = "";
  }


  if ($_POST['mtro_doctorado_status_e']!="") {
  $mtro_doctorado_status_e = $_POST['mtro_doctorado_status_e'];
  }else{
    $mtro_doctorado_status_e = "";
  }

  if ($_POST['mtro_lic_fecha_fin']!="") {
    $mtro_lic_fecha_fin = $_POST['mtro_lic_fecha_fin'];

    $sql= "UPDATE catg_catedratico SET lic_fecha_fin='$mtro_lic_fecha_fin' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $mtro_lic_fecha_fin = NULL;
  }


              $mtria =  $_POST['mtro_mtria'];
              $mtria_uni =  $_POST['mtro_mtria_universidad'];
              $mtria_pais =  $_POST['mtro_mtria_pais'];
             

  if ($_POST['mtro_mtria_fecha_fin']!="") {
    $mtria_fecha = $_POST['mtro_mtria_fecha_fin'];
    $sql= "UPDATE catg_catedratico SET mtria_fecha='$mtria_fecha' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $mtria_fecha = NULL;
  }
              $doc =  $_POST['mtro_doctorado'];
              $doc_uni =  $_POST['mtro_doctorado_uni'];
              $doc_pais =  $_POST['mtro_doctorado_pais_e'];

              if ($_POST['mtro_doctorado_fecha_fin']!="") {
  $doc_fecha = $_POST['mtro_doctorado_fecha_fin'];
    $sql= "UPDATE usuario_activo SET doc_fecha_fin='$doc_fecha' WHERE id='$id'";
    $datos = mysqli_query($conexion,$sql);

}else{
  $doc_fecha = NULL;
}



//switch($pro){
    $sql= "UPDATE catg_catedratico SET titulo='$titulo', email='$email',  nombre='$nombre', ap_paterno='$primer_ap', ap_materno='$segundo_ap', fecha_nac='$fecha_nac', sexo='$sexo', nacionalidad='$nacionalidad', curp='$curp', telefono='$tel_celular', telefono_fijo='$tel_fijo', ext='$tel_ext', titulo='$titulo', calle='$calle', num_ext='$numeroe', 
    num_int='$numeroi', colonia='$colonia', municipio='$ciudad', estado='$estado', cod_postal='$cp', pais='$pais',
    lic='$lic', lic_uni='$lic_uni',
    lic_pais='$lic_pais', lic_estatus='$mtro_status_e',
    mtria ='$mtria', mtria_uni='$mtria_uni', mtria_pais='$mtria_pais',mtria_estatus='$mtr_status_e' , mtria_fecha='$mtria_fecha',
    doc='$doc' , doc_uni ='$doc_uni' , doc_pais ='$doc_pais' , doc_estatus ='$mtro_doctorado_status_e' 

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