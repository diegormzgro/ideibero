
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
     $idSesion = intval($_GET['idSesion']);

    require('conexion.php');

    $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE s.idSesion='$idSesion' AND s.Eliminado=0 AND d.Eliminado=0
 ";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $NombreSesion = $renglon['NombreSesion'];
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idGrupo = $renglon['idGrupo'];
            $idPosgrado = $renglon['idPosgrado'];

            $posgrado=$idPosgrado;
            if ($posgrado==1) {
            $posgrado = "MDCDH";
            }elseif ($posgrado == 2) {
              $posgrado = "MDE";
            }elseif($posgrado == 3){
              $posgrado = "DDCDH";
            }else{
              $posgrado = "DDE";
            }
                }
?>
 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Lecturas</h1></center>
                        
                        
                             
         

        <div class="card-header" align="left">
          <i class="fa fa-table"></i> Lecturas 
 
 <center>
 <div class="row">
   <!-- <div class="col">
     <button type="button" class="btn btn-primary" id="nueva_clase">Nueva Clase</button>
    </div>-->
        <div class="col">
    <?php echo' <a href="javascript:nueva_LecturaID('.$idSesion.','.$idPosgrado.');">     <button type="button" class="btn btn-success">Nueva Lectura </button></a>'; ?>
    </div>
               <div class="col" align="right">
          <?php echo '<a href="javascript:regresarSesion('.$idAsignacion.','.$idGrupo.');">'; 
          ?>
     <button type="button" class="btn btn-dark">Regresar</button>
   </a>
    </div>
  </div>
</center>

        </div>
         <div id="agrega-registros">
        <div class="card-body">
          <div class="table-responsive" id="table">
<?php if($_SESSION['Perfil']=='Control Escolar' ){
  echo '
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo Lectura</th>
                  <th>Descripción</th>
                  <th>Enlace</th>
                  <th>Archivo</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>';

            require('conexion.php');

            $sql= " SELECT cm.*, s.NombreSesion 
                    FROM catg_lecturas as cm 
                    INNER JOIN catg_sesiones AS s ON s.idMateria AND cm.idMateria
                    WHERE cm.Eliminado=0 AND cm.idMateria='$idSesion' AND s.idSesion='$idSesion' 
                    ORDER BY s.idSesion, cm.idLectura
                   ";

                   $datos = mysqli_query($conexion,$sql);
             $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador + 1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td style=" text-align:justify;">'.$renglon['TituloLectura'].'</td>
            <td style=" text-align:justify;">'.$renglon['Descripcion'].'</td>';

            if ($renglon['Link']!='') {
              echo '<td><a href="'.$renglon['Link'].'" target="_blank" >
              <img src="opciones/link.png" >
            </a></td>';
            }else{
              echo '<td></td>';
            }
            if ($renglon['Archivo']!='') {
              echo '<td><a href="archivos/Lecturas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a></td>';
            }else{
             echo '<td></td>';
            }


echo '<td>
              <a href="javascript:editarLectura('.$renglon['idLectura'].','.$idPosgrado.');">
              <img src="opciones/editar.png">
              </a>
              <a href="javascript:eliminar_lectura('.$renglon['idLectura'].');">
              <img src="opciones/eliminar.png">
              </a>
            </td>

            </tr>';

                    }








                  }else{
       echo' <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo Lectura</th>
                  <th>Descripción</th>
                  <th>Archivo</th>
                 
                </tr>
              </thead>
            <tbody>';

                require('conexion.php');

            $sql= " SELECT *
                    FROM catg_lecturas as cm WHERE cm.Eliminado=0 AND cm.idMateria='$idSesion'
                   ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
            echo '<tr>
            <td>'.$renglon['idMateria'].'</td>
            <td>'.$renglon['TituloLectura'].'</td>
            <td>'.$renglon['Descripcion'].'</td>';
            if ($renglon['Archivo']!='') {
              echo '<td><a href="archivos/Lecturas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo "<td></td>";
            }


            echo '</tr>';

                    }       
            }
            ?>
              </tbody>
             </div>
            </table>

 
      </div>
 
</div></div>
                        </div>
        <?php include("modal/modal_lectura.php");?>
    <script type="text/javascript">
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