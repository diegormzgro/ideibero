 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $id = $_SESSION['id'];
    $idSesion = intval($_GET['idSesion']);
    $idMateria = intval($_GET['idMateria']);
   require('conexion.php');

    $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
 INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
 WHERE  s.Eliminado=0 AND m.idMateria='$idMateria' AND d.Eliminado=0
 ";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
 
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idPosgrado = $renglon['idPosgrado'];
            $posgrado = $renglon['abrev'];
            $idGrupo = $renglon['idGrupo'];
            $idMateria = $renglon['idMateria'];
                }
?>
 <script src="js/myjava.js"></script>
<center> <h2 class="mt-4">Trabajos</h2></center>
                        
                        
                             

        <div class="card-header">
            <div class="row">
          <div class="col" align="left">
          <i class="fa fa-table"></i> Trabajos Parcial
          </div> 
          <!--
      <div class="col">
     <button type="button" class="btn btn-success" id="nueva_tarea">Trabajo Final</button>
      </div>-->


          <?php if ($perfil=='Alumno') {
            # code...
          }else{
            echo '<div class="col" align="left"> <a href="javascript:nuevo_TrabajoID('.$idSesion.','.$idPosgrado.');" class="btn btn-success">Nuevo Trabajo</a> 
                   </div>   ';
          } ?>
     

    <div class="col" align="right">
        <?php echo '<a href="javascript:regresarSesion('.$idMateria.');">'; ?>
     <button type="button" class="btn btn-dark" >Regresar</button></a>
    </div>
        </div>
      </div>
    </div>
<div id="agrega-registros">
 <div class="table-responsive" id="table">
          
            <table class="table table-striped table-bordered" id="dataTable"  >
              <thead>
                <tr>
                  <?php if($_SESSION['Perfil']=='Alumno' ){
                  echo '
                  <tr>
                  <th ROWSPAN=3 style="vertical-align : middle;text-align:center;">ID</th>
                  <th ROWSPAN=3 style="vertical-align : middle;text-align:center;">Título</th>
                  <th ROWSPAN=3 style="vertical-align : middle;text-align:center;">Descripción</th>
                  <th ROWSPAN=3 style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th COLSPAN=2 ROWSPAN=2> Material de Apoyo</th>
                  <th COLSPAN=5 >Trabajos</th>

                  </th>
                  </tr>
                  <tr>
                  
                  <th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Subir</th>
                  <th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Comentarios</th>
                </tr>
                <tr>

                <th>Enlace</th>
                <th>Archivo</th>
                <th>Envio</th>
                <th>Archivo</th>
                <th>Limpiar</th>
                </tr>';
              }else{

                  echo '<th style="vertical-align : middle;text-align:center;">ID</th>
                  <th  style="vertical-align : middle;text-align:center;">Título</th>
                  <th style="vertical-align : middle;text-align:center;">Descripción</th>
                  <th style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th style="vertical-align : middle;text-align:center;">Enlace</th>
                  <th style="vertical-align : middle;text-align:center;">Archivo</th>
                  <th style="vertical-align : middle;text-align:center;">Acción</th>
                </tr>
                  ';                
              }
              ?>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

 if($_SESSION['Perfil']=='Alumno' ){
            
            $sql= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
           INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND s.idSesion='$idSesion' AND t.Tarea_tipo=0 AND t.Eliminado=0 AND s.Eliminado=0
          ORDER BY s.idSesion, t.idTarea ";

            $sqlFinal= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
                        INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
                        INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
                        INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                        INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                        WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND t.Tarea_tipo=1 AND s.idSesion='$idSesion' AND t.Eliminado=0 AND s.Eliminado=0
                        ORDER BY s.idSesion, t.idTarea 
                         ";
            $datos = mysqli_query($conexion,$sql);
            $datosFinal = mysqli_query($conexion,$sqlFinal);

                      }


        else{


                  $sql= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
                  INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
                  INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
                  INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                  INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                  WHERE d.Eliminado=0 AND d.idDocente='$id' AND t.Tarea_tipo=0 AND s.idSesion='$idSesion' AND t.Eliminado=0 AND s.Eliminado=0
                  ORDER BY s.idSesion, t.idTarea  ";

                        $sqlFinal= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
                        INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
                        INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
                        INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                        INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                        WHERE d.Eliminado=0 AND d.idDocente='$id' AND t.Tarea_tipo=1 AND s.idSesion='$idSesion' AND t.Eliminado=0
                        AND s.Eliminado=0
                        ORDER BY s.idSesion, t.idTarea";

            $datos = mysqli_query($conexion,$sql);
            $datosFinal = mysqli_query($conexion,$sqlFinal);
                      }


            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            $idTarea =0;

 if($_SESSION['Perfil']=='Docente' ){



while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
              $idTarea = $renglon['idTarea'];
          $consulta="SELECT t.*, s.NombreSesion,td.Archivo AS ArchivoAlumno, td.TituloTarea AS TituloAlumno, td.Descripcion AS DescripcionAlumno, td.Comentarios AS ComentariosAlumnos, td.FechaAgrega as FechaAlumno, td.idTareaDetalle, td.Calificacion as Cali FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN catg_tareas_detalle AS td ON td.idTarea= t.idTarea
          WHERE d.Eliminado=0  AND td.idTarea='$idTarea' AND t.Tarea_tipo=0 AND t.Eliminado=0 AND td.Eliminado=0 AND s.Eliminado=0
          ORDER BY s.idSesion, t.idTarea";
          $detalle = mysqli_query($conexion,$consulta); 
          $filas =mysqli_num_rows($detalle);
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>'
            ;
           echo ' <td>'.date("d-m-Y", strtotime($renglon['FechaEntrega'])).'</td>';

            if ($renglon['Link']!='') {
              echo '<td><a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png" >
            </a></td>';
            }else{
              echo "<td></td>";
            }
            if ($renglon['Archivo']!='') {
              echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" >
              <img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo "<td></td>";
            }

            echo '</td>';
           if($_SESSION['Perfil']=='Docente' ){
              echo '<td><a href="javascript:editarTareaComun('.$renglon['idTarea'].','.$idPosgrado.');">
              <img src="opciones/editar.png">';
          if ($filas==0) {
          echo '<a onClick="alert(\'Ya tiene trabajo de alumnos no puede eliminar\')"><img src="opciones/eliminar.png"></a>';   
          }else{
            echo '<a href="javascript:eliminar_tarea('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a>';
          }
          echo '</td>';

            }else{

              echo '<td>
              <a href="javascript:nuevo_TrabajoIDEstudiante('.$renglon['idTarea'].','.$idPosgrado.','.$idSesion.','.$idMateria.');"><img src="opciones/cargar.png"></a>
              </td>';

              echo "<td>";
              while ($renglon2=mysqli_fetch_array($detalle)) {
              echo '<p title="'.$renglon2['Comentarios'].'">'.$renglon2['FechaAgrega'].'</p><br>';}
              echo "</td>";
 
              echo '<td>';     
              while ($renglon3=mysqli_fetch_array($detalle2)) {
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$correo.'/'.$renglon3['Archivo'].'" target="_blank"><img src="opciones/reportar.png"></a>';
              } 
              echo '</td>';
              

              
              echo '</tr>';
          }
        }


 }else{

          while ($renglon=mysqli_fetch_array($datos)) {
          
          $idTarea = $renglon['idTarea'];
          $consulta="SELECT t.*, s.NombreSesion,td.Archivo AS ArchivoAlumno, td.TituloTarea AS TituloAlumno, td.Descripcion AS DescripcionAlumno, td.Comentarios AS ComentariosAlumnos, td.FechaAgrega as FechaAlumno, td.idTareaDetalle, td.Calificacion as Cali FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN catg_tareas_detalle AS td ON td.idTarea= t.idTarea
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND td.idTarea='$idTarea' AND s.idSesion='$idSesion' AND td.idAlumno='$id' AND t.Tarea_tipo=0 AND t.Eliminado=0 AND td.Eliminado=0 AND s.Eliminado=0
          ORDER BY s.idSesion, t.idTarea";

          $detalle = mysqli_query($conexion,$consulta);
          $detalle2 = mysqli_query($conexion,$consulta);
          $detalle32 = mysqli_query($conexion,$consulta);
          $detalle312 = mysqli_query($conexion,$consulta);

          $contador=$contador+1;
          $idTarea = $renglon['idTarea'];

            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>'
            ;
           echo ' <td>'.date("d-m-Y", strtotime($renglon['FechaEntrega'])).'</td>';
            if ($renglon['Link']!='') {
              echo '<td><a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png" >
            </a></td>';
            }else{
              echo "<td></td>";
            }
            if ($renglon['Archivo']!='') {
              echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" >
              <img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo '<td></td>';
            }
            $filas =mysqli_num_rows($detalle);
              if ($filas>0) {
              echo '<td>
              <a onClick="alert(\'Ya tiene un trabajo enviado\')">
              <img src="opciones/cargar.png">
              </a>
              </td>';
              
              
              
              while ($renglon2=mysqli_fetch_array($detalle)) {
              if ($renglon2['ComentariosAlumnos']!='') {
                echo '<td>
            <a href="javascript:comentario('.$renglon2['idTareaDetalle'].');"><img  src="opciones/comentario.png"></a>
                      </td>';
              }else{
                echo '<td></td>';
              }
              echo "<td>";
              echo '<p>'.$renglon2['FechaAlumno'].'</p><br>';
              echo "</td>";
              }
            }else{
              echo '<td>
              <a href="javascript:nuevo_TrabajoIDEstudiante('.$renglon['idTarea'].','.$idPosgrado.','.$idSesion.','.$idMateria.');"><img src="opciones/cargar.png"></a>
              </td>
              <td></td><td></td>';
            }

              
 
              echo '<td>';     
              while ($renglon3=mysqli_fetch_array($detalle2)) {
              $Calificacion = $renglon3['Cali'];
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$correo.'/'.$renglon3['ArchivoAlumno'].'" target="_blank"><img src="opciones/reportar.png"></a>';
              }           
              echo '</td>';

              echo '<td>';
              if ($Calificacion<>'') {
              }else{
                 while ($renglon4=mysqli_fetch_array($detalle312)) {
                  echo '<a href="javascript:eliminar_trabajo_estudiante('.$renglon4['idTareaDetalle'].', '.$idMateria.', '.$idSesion.');"><img src="opciones/eliminar.png"></a>';
                  } 
              }
       
              echo '</td></tr>'; 
            }
        }
    
            ?>
      </tbody>    

       </table>


        </div>
          </div>









            </div>
              </div>
            </div>
      </div>





























<!--


 <div class="table-responsive" id="table">
          
            <table class="table table-striped table-bordered" id="dataTable"  >
              <thead>
                <tr>
                  <?php if($_SESSION['Perfil']=='Alumno' ){
                  echo '<th ROWSPAN=2 style="vertical-align : middle;text-align:center;">ID</th>
                  <th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Título</th>
                  <th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Descripción</th>
                  <th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Material de apoyo</th>
                  <th COLSPAN=4>Trabajos</th>
                </tr>
                <tr>

                <td>Subir</td>
                <td>Envio</td>
                <td>Archivo</td>
                <td>Limpiar</td>
                </tr>';
              }else{

                  echo '<th style="vertical-align : middle;text-align:center;">ID</th>
                  <th  style="vertical-align : middle;text-align:center;">Título</th>
                  <th style="vertical-align : middle;text-align:center;">Descripción</th>
                  <th style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th style="vertical-align : middle;text-align:center;">Material de apoyo</th>
            
                </tr>
                  ';                
              }
              ?>
              </thead>
            <tbody>
<?php

            $datos = mysqli_query($conexion,$sql);
            $datosFinal = mysqli_query($conexion,$sqlFinal);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            $idTarea=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $idTarea = $renglon['idTarea'];
            }
            $consulta = "SELECT td.idTarea,td.Archivo, td.Comentarios, td.Calificacion, td.FechaAgrega FROM catg_tareas_detalle AS td WHERE td.Eliminado=0 AND td.idTarea='$idTarea' AND td.idAlumno='$id' ";
            
            $detalle = mysqli_query($conexion,$consulta);
            $detalle2 = mysqli_query($conexion,$consulta);
            $filas = mysqli_num_rows($detalle);
            if ($filas>1) {
          
          $consulta="SELECT t.*, s.NombreSesion,td.* FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN catg_tareas_detalle AS td ON td.idTarea= t.idTarea
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND td.idTarea='$idTarea' AND s.idSesion='$idSesion' AND t.Tarea_tipo=1
          ORDER BY s.idSesion, t.idTarea";
          $detalle = mysqli_query($conexion,$consulta);

      while ($renglon=mysqli_fetch_array($datos)) {
        $contador=$contador+1;
        $idTarea = $renglon['idTarea'];
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>'
            ;
           echo ' <td>'.date("d-m-Y", strtotime($renglon['FechaEntrega'])).'</td>';
           echo "<td>";

            if ($renglon['Link']!='') {
              echo '<a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png" >
            </a>';
            }else{
              echo "";
            }
            if ($renglon['Archivo']!='') {
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" >
              <img src="opciones/reportar.png">
            </a>';
            }else{
              echo "";
            }

            echo '</td>';
           if($_SESSION['Perfil']=='Docente' ){
              echo '<td><a href="javascript:editarTareaComun('.$renglon['idTarea'].','.$idPosgrado.');">
              <img src="opciones/editar.png">
              </a></td>';
            }else{
              echo '<td>
              <a href="javascript:nuevo_TrabajoIDEstudiante('.$renglon['idTarea'].','.$idPosgrado.','.$idSesion.','.$idMateria.');"><img src="opciones/cargar.png"></a>
              </td>';
              echo "<td>";
              echo '<p title="'.$renglon2['Comentarios'].'">'.$renglon2['FechaAgrega'].'</p><br>';
              echo "</td>";
              echo '<td>';     
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$correo.'/'.$renglon3['Archivo'].'" target="_blank"><img src="opciones/reportar.png"></a>';          
              echo '</td>';
              echo '<td><a href="javascript:eliminar_trabajo_estudiante('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a></td>';
              echo '</tr>';

      }    }

            }else{

              while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
              $idTarea = $renglon['idTarea'];

            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>'
            ;
           echo ' <td>'.date("d-m-Y", strtotime($renglon['FechaEntrega'])).'</td>';
           echo "<td>";

            if ($renglon['Link']!='') {
              echo '<a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png" >
            </a>';
            }else{
              echo "";
            }
            if ($renglon['Archivo']!='') {
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" >
              <img src="opciones/reportar.png">
            </a>';
            }else{
              echo "";
            }

            echo '</td>';
           if($_SESSION['Perfil']=='Docente' ){
              echo '<td><a href="javascript:editarTareaComun('.$renglon['idTarea'].','.$idPosgrado.');">
              <img src="opciones/editar.png">
              </a></td>';
            }else{

              
              echo '<td>
              <a href="javascript:nuevo_TrabajoIDEstudiante('.$renglon['idTarea'].','.$idPosgrado.','.$idSesion.','.$idMateria.');"><img src="opciones/cargar.png"></a>
              </td>';

              echo "<td>";
              while ($renglon2=mysqli_fetch_array($detalle)) {
              echo '<p title="'.$renglon2['Comentarios'].'">'.$renglon2['FechaAgrega'].'</p><br>';}
              echo "</td>";
 
              echo '<td>';     
              while ($renglon3=mysqli_fetch_array($detalle2)) {
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$correo.'/'.$renglon3['Archivo'].'" target="_blank"><img src="opciones/reportar.png"></a>';
              }           
              echo '</td>';
              echo '<td><a href="javascript:eliminar_trabajo_estudiante('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a></td>';
              echo '</tr>';
          }
        }
            }


            ?>
      </tbody>    
       </table>
        </div>
          -->

          <?php  include("modal/modal_tarea.php"); ?>

        <?php  include("modal/modal_tarea_estudiante.php"); ?>

    <script type="text/javascript">

        function regresarSesion(id){
      $('#contenido').load("php/listar_tareacomun.php?idMateria="+id);
      }
         $('#nueva_tareaform').click(function(){
            $('#contenido').load("php/form_tarea.php");
        });
        $('#nueva_tareaform').click(function(){
            $('#contenido').load("php/form_tarea.php");
        });
      $(document).ready(function() {

        $('.table').DataTable( {

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