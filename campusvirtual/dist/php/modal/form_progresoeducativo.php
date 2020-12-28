<?php
                $id = intval($_GET['id']);
    include("../modal/form_calificacionesalta.php");
                include('../conexion.php');
$sql= " SELECT c.idCalificacion, p.abrev, a.Materia, CONCAT_WS(' ', u.nombre, u.ap_paterno, u.ap_materno) AS Nombre, c.Calificacion, c.fecha_cierre

FROM catg_calificaciones as c
INNER JOIN catg_asignatura as a ON a.idMateria= c.idAsignatura
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
INNER JOIN usuario_activo as u ON u.id= c.idAlumno
INNER JOIN catg_catedratico AS ca ON ca.id = c.idDocente
WHERE c.idAlumno='$id' AND c.Eliminado=0";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $Nombre= $renglon['Nombre'];
             }
                ?>     
             

        <div class="card-header">
          <i class="fa fa-table"></i> Progreso Educativo
 
 <center>
           <div class="col" align="right">
                    <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
                </div>
   

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
                  <th>Ver</th>

                </tr>
              </thead>
            <tbody>
              <?php
$id = intval($_GET['id']);

                include('../conexion.php');

            $sql= " SELECT u.id,  p.abrev, a.Materia,a.idMateria,
                    (SELECT c.idCalificacion FROM catg_calificaciones AS c WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura AND c.Eliminado=0 GROUP BY c.idAlumno, c.idAsignatura) AS idCalificacion,
                    (SELECT c.Calificacion FROM catg_calificaciones AS c WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura AND c.Eliminado=0 GROUP BY c.idAlumno, c.idAsignatura) AS Calificacion,
                    (SELECT CONCAT_WS(' ', ca.ap_paterno, ca.ap_materno, ca.nombre) AS Docente FROM catg_calificaciones AS c INNER JOIN catg_catedratico AS ca ON ca.id = c.idDocente WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura  AND c.Eliminado=0 GROUP BY c.idAlumno, c.idAsignatura) AS Docente
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
            <td><a href="javascript:listar_aulaVirtal('.$renglon['idMateria'].');">'.$renglon['Materia'].'</a></td>
            <td>'.$renglon['Docente'].'</td>
             <td>'.$renglon['Calificacion'].'</td>
<td><a href="javascript:listar_aulaVirtal('.$renglon['idMateria'].');">
<i class="btn-outline-primary fas fa-eye "></i>
</a></td>
            </tr>';

                    }
            ?>
              </tbody>
          
            </table>
      </div>
        </div>









<script type="text/javascript">

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
        $('#Estudiante').click(function(){
            $('#contenido').load("general.php");
        });

function listar_aulaVirtal(id){
  $('#contenido').load("php/listar_aulavirtualregularizacion.php?idMateria="+id);
 
}
</script>