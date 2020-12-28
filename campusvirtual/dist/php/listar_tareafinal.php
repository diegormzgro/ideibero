 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $id=$_SESSION['id'];
    $idMateria = intval($_GET['idMateria']);
    
    if($_SESSION['Perfil']=='Control Escolar' ){
    }else{
      $idSesion = intval($_GET['idSesion']);
    }
    
    
    require('conexion.php');

  $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE m.idMateria='$idMateria' AND s.Eliminado=0 AND d.Eliminado=0
 ";

    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $NombreSesion = $renglon['NombreSesion'];
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idGrupo = $renglon['idGrupo'];
            $idPosgrado =  $renglon['idPosgrado'];
$Materia = $renglon['Materia'];
            $Docente =  $renglon['NombreCompleto'];
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
<center> <h2 class="mt-4"><?php  echo $Materia.'/'.$Docente;  ?></h2></center>
                        
                        
                             
          
        <div class="card-header">
        <div class="row">
          <div class="col" align="left">
          <i class="fa fa-table"></i> Trabajo Final
          </div> 
          <div class="col">
       <?php if($_SESSION['Perfil']=='Alumno' ){
       }else{
       echo '<a href="javascript:nuevo_TrabajoFinalID('.$idMateria.','.$idPosgrado.');" class="btn btn-success">Trabajo Final</a>'; 
       }
        ?>
      </div>

           <div class="col" align="right">

          <?php 
          if($_SESSION['Perfil']=='Control Escolar' ){
            echo '<a href="javascript:regresarSesionCE('.$idAsignacion.','.$idGrupo.');">'; 
          }else{
            echo '<a href="javascript:regresarSesion('.$idSesion.','.$idMateria.');">'; 
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
            <?php if($_SESSION['Perfil']=='Alumno' ){


              
                echo '
        <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0" >
              <thead>
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
                </tr>
                ';
              ?>      


          </thead>
            <tbody>
              <?php



            $sql= "SELECT t.*, u.id, a.Materia
          FROM catg_tareas AS t
          INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND u.id='$id'  AND t.Tarea_tipo=1 AND t.Eliminado=0
          ORDER BY  t.idTarea";
 
    $datos = mysqli_query($conexion,$sql);


if($_SESSION['Perfil']=='Docente' ){



while ($renglon=mysqli_fetch_array($datos)) {
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
              echo "<td></td>";
            }

            echo '</td>';
           if($_SESSION['Perfil']=='Docente' ){
              echo '<td><a href="javascript:editarTareaComun('.$renglon['idTarea'].','.$idPosgrado.');">
              <img src="opciones/editar.png">
              <a href="javascript:eliminar_tarea('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a>
     
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
              echo '<td><a href="javascript:eliminar_trabajo_estudiante('.$renglon['idTarea'].', '.$idMateria.','.$idSesion.');"><img src="opciones/eliminar.png"></a></td>';
              echo '</tr>';
          }
        }


 }else{
          $contador=0;
          while ($renglon=mysqli_fetch_array($datos)) {
          $idTarea = $renglon['idTarea'];
              if ($idTarea) {
              $consulta= "SELECT t.*,td.Archivo AS ArchivoAlumno, td.TituloTarea AS TituloAlumno, td.Descripcion AS DescripcionAlumno, td.Comentarios AS ComentariosAlumnos, td.FechaAgrega as FechaAlumno, td.idTareaDetalle, td.Calificacion AS Cali
          FROM catg_tareas AS t
          INNER JOIN catg_tareas_detalle AS td ON td.idTarea= t.idTarea
          INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id = td.idAlumno

          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND td.idAlumno='$id' AND t.idTarea='$idTarea' AND t.Tarea_tipo=1 AND t.Eliminado=0 AND td.Eliminado=0
          ORDER BY  t.idTarea";              

          $detalle = mysqli_query($conexion,$consulta);
          $detalle2 = mysqli_query($conexion,$consulta);
          $detalle32 = mysqli_query($conexion,$consulta);
          $detalle312 = mysqli_query($conexion,$consulta);
}
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
              while ($renglon2=mysqli_fetch_array($detalle)) {
                if ($renglon2['Cali']=='') {
              echo '<td>
              <a href="javascript:nuevo_TrabajoIDEstudiante('.$renglon['idTarea'].','.$idPosgrado.','.$idSesion.','.$idMateria.');"><img src="opciones/cargar.png"></a>
              </td>';
            }else{
              echo '<td><a onClick="alert(\'Ya tiene calificación\')">
              <img src="opciones/cargar.png"></a>
              </td>';
            }

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
              echo '<td><a href="javascript:nuevo_TrabajoIDEstudiante('.$renglon['idTarea'].','.$idPosgrado.','.$idSesion.','.$idMateria.');"><img src="opciones/cargar.png"></a>
              </td><td></td><td></td>';
            }

              
            $filas2 =mysqli_num_rows($detalle2);
              
              if ($filas2>0) {
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
                  echo '<a href="javascript:eliminar_trabajo_estudiante_final('.$renglon4['idTareaDetalle'].', '.$idMateria.', '.$idSesion.');"><img src="opciones/eliminar.png"></a>';
                  } 
              }
       
              echo '</td></tr>'; 
            }else{
              echo "<td></td><td></td></tr>";
            }

          }

        }
    
            ?>
      </tbody>    
            </table>
      </div>
        </div>







           <?php }else{?>
          <div id="agrega-registros">
            <table class="table table-striped table-bordered" id="dataTable"  >
              <thead>
                <tr>


                  <th style="vertical-align : middle;text-align:center;">ID</th>
                  <th  style="vertical-align : middle;text-align:center;">Título</th>
                  <th style="vertical-align : middle;text-align:center;">Descripción</th>
                  <th style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th style="vertical-align : middle;text-align:center;">Enlace</th>
                  <th style="vertical-align : middle;text-align:center;">Archivo</th>
                  <?php
                  if($_SESSION['Perfil']=='Alumno' ){
                  }else{
                    echo '<th>Acción</th>';
                  }
                  ?>
                  
                </tr>

              </thead>
            <tbody>
              <?php

            $sqlFinal= "SELECT t.* FROM catg_tareas AS t
                        
                        INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
                        INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                        INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                        WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND t.Tarea_tipo=1 AND t.Eliminado=0
                        ORDER BY t.idTarea 
                         ";
                      



            $datos = mysqli_query($conexion,$sql);
            $datosFinal = mysqli_query($conexion,$sqlFinal);

            mysqli_set_charset($conexion,"utf8");
            $contador=0;

            while ($renglon=mysqli_fetch_array($datosFinal)) {
              $contador=$contador+1;
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
              echo 
              '
            <td>
              
            </td>

              ';
            }
            if($_SESSION['Perfil']=='Alumno' ){
            }else{
            echo '
            <td>
<a href="javascript:editarTareaFinal('.$renglon['idTarea'].','.$idPosgrado.');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_tarea_final('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a>
              



            </td>
            
            ';
}
              echo '
            
            </tr>';
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
      <?php  include("modal/modal_tareafinal.php"); ?>

        <?php  include("modal/modal_tarea_estudiante.php"); ?>

    <script type="text/javascript">
         function regresarSesion(idSesion,idMateria){
      $('#contenido').load("php/listar_tareacomun.php?idSesion="+idSesion, "idMateria="+idMateria);
      }
      function regresarSesionCE(idAsignacion,idGrupo){
      $('#contenido').load("php/listar_calendarioprograma.php?id="+idAsignacion, "idGrupo="+idGrupo);
      }
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
      dom: 'Bfrtip' ,

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