              <?php
                $id = intval($_GET['id']);
                include('../conexion.php');
$sql= "SELECT p.abrev, a.Materia, CONCAT_WS(' ', u.nombre, u.ap_paterno, u.ap_materno) AS Nombre,  a.idPosgrado

FROM catg_asignatura as a
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado

INNER JOIN usuario_activo as u ON u.id_posgrado = a.idPosgrado
WHERE u.id='$id' ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $Nombre= $renglon['Nombre'];
              $idPosgrado = $renglon['idPosgrado'];
             }
                ?>     
             
         <div class="col" align="right">
          <?php echo '<a href="javascript:regresar('.$idPosgrado.');">';?>
           <button type="button" class="btn btn-dark">Regresar</button>
          </a>
          </div>
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $Nombre; ?> 
 

    </div>



        <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> Calificaciones
        </div>
<div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Posgrado</th>
                  <th>Asignatura</th>
                  <th>Docente</th>
                 <th>Calificación</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php
$id = intval($_GET['id']);

                include('../conexion.php');

            $sql= " SELECT u.id,  p.abrev, a.Materia,a.idMateria,
(SELECT c.idCalificacion FROM catg_calificaciones AS c WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura AND c.Eliminado=0) AS idCalificacion,
(SELECT c.Calificacion FROM catg_calificaciones AS c WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura AND c.Eliminado=0) AS Calificacion,
(SELECT CONCAT_WS(' ', ca.ap_paterno, ca.ap_materno, ca.nombre) AS Docente FROM catg_calificaciones AS c INNER JOIN catg_catedratico AS ca ON ca.id = c.idDocente WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura  AND c.Eliminado=0) AS Docente
FROM usuario_activo AS u
INNER JOIN catg_posgrado AS p ON p.id= u.id_posgrado
INNER JOIN catg_asignatura AS a ON a.idPosgrado=p.id
WHERE u.id='$id' 
";

             $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
            $contador = $contador +1;
            echo '<tr>

            <td>'.$contador.'</td>
            <td>'.$renglon['abrev'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>'.$renglon['Docente'].'</td>
             <td>'.$renglon['Calificacion'].'</td>
            
            <td>
              <a href="javascript:form_calificacionescomun('.$renglon['idMateria'].','.$renglon['id'].');" title="Estudiantes">
              <img src="opciones/estudianteicon.png"></a> ';

              if ($renglon['Calificacion']!="") {
               echo ' <a href="javascript:editarCalificacion('.$renglon['idCalificacion'].','.$renglon['idMateria'].');"><i class="btn-outline-primary fas fa-pencil-alt"></i></a>
              <a href="javascript:eliminarCalificacion('.$renglon['idCalificacion'].','.$id.');"><i class="btn-outline-danger fas fa-times"></i></a>'
               ;
              }else{
                echo '<a href="javascript:nueva_calificacion('.$renglon['id'].','.$renglon['idMateria'].');">
              <img src="opciones/editar.png" title="Calificación">
              </a>';
              }

             
             echo '
            </td>

            </tr>';

                    }
            ?>
              </tbody>
          
            </table>
      </div>
        </div>
            </div>

            </div>

  </div>



  <?php  include("../modal/modal_calificacion.php"); ?>









<script type="text/javascript">
function form_calificacionescomun(id, idMateria){
  $('#contenido').load("php/modal/form_calificacionescomun.php?idMateria="+idMateria, "id="+id);

}
           $(document).ready(function() {

        $('#tb_calificacion').DataTable( {

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
     function regresar(id){
      $('#contenido').load("php/listar_grupos.php?id_Posgrado="+id);
      }

</script>