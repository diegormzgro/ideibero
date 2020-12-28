 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    //$idGrupo = intval($_GET['idGrupo']);
    $idAsignacion = intval($_GET['idAsignacion']);

    //$idGrupo = intval($_GET['idGrupo']);
    require('conexion.php');

    $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE d.id='$idAsignacion' AND s.Eliminado=0 AND d.Eliminado=0
 ";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $NombreSesion = $renglon['NombreSesion'];
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idGrupo = $renglon['idGrupo'];
            $idPosgrado =  $renglon['idPosgrado'];
            $Materia =  $renglon['Materia'];

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
<center> <h2 class="mt-4">Examen Teórico</h2></center>
                        
                        
                             
          
        <div class="card-header">
            <div class="row">
          <div class="col" align="left">
          <i class="fa fa-table"></i> <?php echo $Materia; ?>
          </div> 
          <div class="col">
       <?php echo '<a href="javascript:Nueva_Evaluacion('.$idAsignacion.','.$idPosgrado.');" class="btn btn-success">Nueva Evaluación</a>' ?>
      </div>

           <div class="col" align="right">

          <?php 

        if($_SESSION['Perfil']=='Control Escolar' ){

          echo '<a href="javascript:regresarSesion('.$idAsignacion.','.$idGrupo.');">'; 
        }else{
                    echo '<a href="javascript:regresarSesionDoc('.$idAsignacion.','.$idGrupo.');">'; 
  }

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
                  <th>Nombre de Evaluación</th>
                  <th>Descripción</th>
                  <th>Fecha</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "SELECT d.*,e.idExamen, e.TituloExamen, e.Descripcion, e.Fecha, if(e.Estatus=0,'Activo', 'Inactivo') as Estatus FROM catg_asignacion_docente AS d
INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
 INNER JOIN catg_examen as e ON e.idAsignacion = d.id

WHERE d.id='".$idAsignacion."' AND e.Eliminado=0";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['TituloExamen'].'</td>
            <td>'.$renglon['Descripcion'].'</td>

              <td>'.date("d-m-Y", strtotime($renglon['Fecha'])).'</td>
              <td>'.$renglon['Estatus'].'</td>'

            ;

                     
            echo '<td>';
            if ($renglon['Estatus']=='Activo') {
              echo '<a href="javascript:ActivaExamen('.$renglon['idExamen'].','.$idAsignacion.',0);">
<i class="btn-outline-danger fas fa-stop"></i>
</a>
              ';


            }else{
              echo '<a href="javascript:ActivaExamen('.$renglon['idExamen'].','.$idAsignacion.',1);">
<i class="btn-outline-success fas fa-play"></i>
              </a>
';

            }
            echo '
              <a href="javascript:editarEvaluacion('.$renglon['idExamen'].','.$idAsignacion.');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminarEvaluacion('.$renglon['idExamen'].','.$idAsignacion.');"><img src="opciones/eliminar.png"></a>

              <a href="javascript:VerExamen('.$renglon['idExamen'].','.$idAsignacion.');"><img src="opciones/plan.png"></a>
             
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
                        <?php  include("modal/modal_evaluacion.php"); ?>

    <script type="text/javascript">
         function regresarSesion(id,idGrupo){
      $('#contenido').load("php/listar_calendarioprograma.php?id="+id, "idGrupo="+idGrupo);
      }
      function regresarSesionDoc(id,idGrupo){
      $('#contenido').load("php/listar_evaluacionindex.php?idMateria="+id, "idGrupo="+idGrupo);
      }
    function VerExamen(id,idAsignacion){
      $('#contenido').load("php/listar_examen_detalle.php?idExamen="+id, "idAsignacion="+idAsignacion);
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