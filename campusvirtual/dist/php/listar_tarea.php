 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $idSesion = intval($_GET['idSesion']);
    //$idGrupo = intval($_GET['idGrupo']);
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
            $idPosgrado =  $renglon['idPosgrado'];

            $posgrado= $idPosgrado;


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
<center> <h2 class="mt-4"><?php echo $NombreSesion.' / '.$FechaSesion; ?></h2></center>
                        
                        
                             
          
        <div class="card-header">
            <div class="row">
          <div class="col" align="left">
          <i class="fa fa-table"></i> Trabajos  
          </div> 
          <div class="col">
       <?php echo '<a href="javascript:nuevo_TrabajoID('.$idSesion.','.$idPosgrado.');" class="btn btn-success">Nuevo Trabajo</a>' ?>
      </div>

           <div class="col" align="right">
          <?php echo '<a href="javascript:regresarSesion('.$idAsignacion.','.$idGrupo.');">'; 
          ?>
     <button type="button" class="btn btn-dark">Regresar</button>
   </a>
    </div>
        </div>
      </div>
      <div id="agrega-registros">
        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable"  >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Sesión</th>
                  <th>Título</th>
                  <th>Descripcion</th>
                  <th>Entrega</th>
                  <th>Enlace</th>
                  <th>Archivo</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "SELECT t.* FROM catg_tareas AS t
INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
INNER JOIN catg_asignacion_docente AS d ON s.idMateria=d.id
INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
WHERE t.idMateria='".$idSesion."' AND t.Eliminado=0 AND t.Tarea_tipo=0";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$NombreSesion.'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>
              <td>'.date("d-m-Y", strtotime($renglon['FechaEntrega'])).'</td>'
            ;

                     
            if ($renglon['Link']!='') {
            echo '<td><a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png"></a></td>';
            }else{
              echo "<td></td>";
            }
            if ($renglon['Archivo']!='') {
              echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo "<td></td>";
            }
            echo '<td>
              <a href="javascript:editarTarea('.$renglon['idTarea'].','.$idPosgrado.');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_tarea('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a>
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>

 
      </div>
 
</div></div>
                        </div>
                        <?php  include("modal/modal_tarea.php"); ?>

    <script type="text/javascript">
         function regresarSesion(id,idGrupo){
      $('#contenido').load("php/listar_calendarioprograma.php?id="+id, "idGrupo="+idGrupo);
      }
         $('#nueva_tareaform').click(function(){
            $('#contenido').load("php/form_tarea.php");
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
 
  <?php

}
else{
    header("location:index.html");
}
?>