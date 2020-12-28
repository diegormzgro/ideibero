
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];

    require('conexion.php');

    $sql= "SELECT * FROM directorio ";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");

?>
 <script src="js/myjava.js"></script>
                        
                        
                             
         

        <div class="card-header" align="left">
 
 <center>
 <div class="row">
   <!-- <div class="col">
     <button type="button" class="btn btn-primary" id="nueva_clase">Nueva Clase</button>
    </div>-->
    <div class="col">
     <button type="button" class="btn btn-success" id="resetear_contacto">Resetear CRM</button>
</div>
    <div class="col">
     <button type="button" class="btn btn-primary" id="nuevo_contacto">Nuevo Contacto</button>
</div>
  </div>
</center>

        </div>
<?php


?>

        <br><br>
         <div id="agrega-registros">
        <div class="card-body">
          <div class="table-responsive" id="table">
<?php if($_SESSION['Perfil']=='Control Escolar' ){
  echo '
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Correo</th>
                  <th>ENVIADO</th>

                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>';

            require('conexion.php');

    $sql= "SELECT *, IF(ENVIO=1,'SI','NO') AS ENVIO2 FROM directorio WHERE NOMBRE<>'' AND CORREO<>'' AND CORREO<>'---' AND ELIMINADO=0 GROUP BY correo";


                   $datos = mysqli_query($conexion,$sql);
             $contador=0;
             $contador_si =0;
              $contador_no =0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador + 1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td style=" text-align:justify;">'.$renglon['NOMBRE'].'</td>
            <td style=" text-align:justify;">'.$renglon['CARGO'].'</td>
            <td style=" text-align:justify;">'.$renglon['CORREO'].'</td>
            <td style=" text-align:justify;">'.$renglon['ENVIO2'].'</td>

            ';
            if ($renglon['ENVIO2']=='SI') {
              $contador_si = $contador_si + 1;
            }else{
              $contador_no = $contador_no + 1;

            }
 

          echo '<td>
            <a href="javascript:editarContacto('.$renglon['NO'].');" >
              <img src="opciones/editar.png">
              </a>
              <a href="javascript:eliminarContacto('.$renglon['NO'].');" >
              <img src="opciones/eliminar.png">
              </a>
            </td>

            </tr>';

                    }


                  }
            ?>
              </tbody>
             </div>
            </table>

        <?php
          echo '<br><br>Correos enviado: '.$contador_si.'<br>';
          echo 'Correos faltantes: '.$contador_no.'<br>';
        ?>
      </div>
 
</div></div>
<center><a class="btn btn-primary" href="php/accion/enviar_crm.php">Enviar correos masivo</a></center>
                        </div>
                        <?php  include("modal/modal_directorio.php"); ?>

    <script type="text/javascript">     
      $('#enviar').on('click',function(){
    $.ajax({
    type:'POST',
    url:"php/accion/enviar_crm.php",
    success: function(registro){
alert("Este proceso puede tardar varios minutos por favor espere");
alert("Correos enviados");
      return false;
    }
  });


});  
         function regresarSesion(id,idGrupo){
      $('#contenido').load("php/listar_calendarioprograma.php?id="+id, "idGrupo="+idGrupo);
      }
          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
        });      

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
            "bDestroy": true,
      "scrollY": "500px",
      "scrollX":        true,
      "scrollCollapse": true,
      "paging":         false,
      "autoWidth": false,
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
 
  <?php

}
else{
    header("location:index.html");
}
?>