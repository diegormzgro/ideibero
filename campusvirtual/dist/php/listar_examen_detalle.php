 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $idExamen = intval($_GET['idExamen']);
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
<center> <h2 class="mt-4">Preguntas</h2></center>
                        
                        
                             
          
        <div class="card-header">
            <div class="row">
          <div class="col" align="left">
           </div> 
          <div class="col">
       <?php echo '<a href="javascript:Nueva_PM('.$idExamen.','.$idAsignacion.');" class="btn btn-success">Nueva Pregunta Opción Múltiple</a>' ?>
      </div>
          <div class="col">
       <?php echo '<a href="javascript:Nueva_PVF('.$idExamen.','.$idAsignacion.');" class="btn btn-primary">Nueva Pregunta V/F</a>' ?>
      </div>
          <div class="col">
       <?php echo '<a href="javascript:Nueva_PA('.$idExamen.','.$idAsignacion.');" class="btn btn-danger">Nueva Pregunta Abierta</a>' ?>
      </div>
           <div class="col" align="right">
          <?php echo '<a href="javascript:regresarSesion('.$idAsignacion.');">'; 
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
                  <th>Tipo</th>
                  <th>Pregunta</th>
                  <th>Valor</th>
                  <th>Respuesta</th>
                   <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "SELECT e.*,e.idExamen, ed.Respuesta, e.Descripcion, e.Fecha, t.Tipo AS TipoRespu, ed.*
             FROM catg_examen_detalle AS ed  
 INNER JOIN catg_examen as e ON e.idExamen = ed.idExamen
 INNER JOIN catg_examen_tipo as t ON t.idExamen= ed.Tipo
WHERE  e.Eliminado=0 AND e.idExamen ='".$idExamen."'  AND ed.Eliminado=0";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
              if ($renglon['Tipo']==1) {
              if ($renglon['Respuesta']=='Opción 1') {
                $Respuesta = $renglon['P1_Text'];
              }elseif ($renglon['Respuesta']=='Opción 2') {
                $Respuesta = $renglon['P2_Text'];
              }elseif ($renglon['Respuesta']=='Opción 3') {
                $Respuesta = $renglon['P3_Text'];
              }elseif ($renglon['Respuesta']=='Opción 4') {
                $Respuesta = $renglon['P4_Text'];
              }elseif ($renglon['Respuesta']=='Opción 5') {
                $Respuesta = $renglon['P5_Text'];
              }
              }elseif ($renglon['Tipo']==2) {
                $Respuesta = $renglon['Respuesta'];
              }else{
                $Respuesta = $renglon['Respuesta'];
              }

            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['TipoRespu'].'</td>
            <td>'.$renglon['Texto'].'</td>
            <td>'.$renglon['Valor'].'</td>

            <td>'.$Respuesta.'</td>'

            ;

                     
            echo '<td>';
            if ($renglon['Tipo']==1) {
                echo '<a href="javascript:editarPreguntaPM('.$renglon['idExamenDetalle'].','.$idAsignacion.');"><img src="opciones/editar.png"></a>';
            }elseif($renglon['Tipo']==2) {
                echo '<a href="javascript:editarPreguntaPV('.$renglon['idExamenDetalle'].','.$idAsignacion.');"><img src="opciones/editar.png"></a>';
            }else{
                echo '<a href="javascript:editarPreguntaPA('.$renglon['idExamenDetalle'].','.$idAsignacion.');"><img src="opciones/editar.png"></a>';

            }

         echo '

              <a href="javascript:eliminarPregunta('.$renglon['idExamenDetalle'].','.$idExamen.','.$idAsignacion.');"><img src="opciones/eliminar.png"></a>
              
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
                        <?php  include("modal/modal_evaluacion_PM.php"); 
                               include("modal/modal_evaluacion_PV.php");
                               include("modal/modal_evaluacion_PA.php");
                        ?>

    <script type="text/javascript">
         function regresarSesion(idAsignacion){
      $('#contenido').load("php/lista_evaluacion.php?idAsignacion="+idAsignacion);
      }
    function VerExamen(id,idGrupo){
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