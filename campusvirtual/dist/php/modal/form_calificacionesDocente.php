   <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> Mis cátedras
 
 <center>
  <div align="right">
     <a href="general.php"><button type="button" class="btn btn-dark" id="Docente">Regresar</button></a>
  </div>

    </div>






            <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Posgrado</th>
                  <th>Asignatura</th>
                  <th>Inicio</th>
                  <th>Finalización</th>
                </tr>
              </thead>
            <tbody>
              <?php
$id = intval($_GET['id']);

                include('../conexion.php');

            $sql= " SELECT c.idCalificacion, p.abrev, a.Materia, CONCAT_WS(' ', u.ap_paterno, u.ap_materno, u.nombre) AS Alumno, c.Calificacion, c.fecha_cierre, a.idMateria

FROM catg_calificaciones as c
INNER JOIN catg_asignatura as a ON a.idMateria= c.idAsignatura
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
INNER JOIN usuario_activo as u ON u.id= c.idAlumno
INNER JOIN catg_catedratico AS ca ON ca.id = c.idDocente
WHERE c.idDocente='$id' AND c.Eliminado=0  AND u.emailInst<>''

GROUP BY a.idMateria ";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
            $contador = $contador +1;
            echo '<tr>

            <td>'.$contador.'</td>
            <td>'.$renglon['abrev'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td></td>
            <td></td>
          
            
           

            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>



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


           buttons: [
               {
                   extend: 'colvis',
                   collectionLayout: 'fixed two-column'
               },

           ],




          
             } );
        } );
 

</script>