              <?php
              session_start();
              if($_SESSION['Perfil']=='Control Escolar' ){
                $idMateria = intval($_GET['id']);
              $id = intval($_GET['idMateria']);

              }elseif ($_SESSION['Perfil']=='Alumno') {
                $id = $_SESSION['id'];
                $idMateria = intval($_GET['idMateria']);              }
              else{
              $id = intval($_GET['id']);
              $idMateria = intval($_GET['idMateria']);
              }
                include('../conexion.php');
$sql= "  SELECT  p.abrev, a.Materia, CONCAT_WS(' ', u.nombre, u.ap_paterno, u.ap_materno) AS Nombre,  a.idMateria, u.emailInst

FROM usuario_activo as u
INNER JOIN catg_asignatura as a ON a.idPosgrado= u.id_posgrado
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
WHERE u.id='$id' AND a.idMateria='$idMateria' ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $Nombre= $renglon['Nombre'];
              $Materia= $renglon['Materia'];
              $posgrado= $renglon['abrev'];
              $email =  $renglon['emailInst'];
             }
                ?>     
                   <h2 class="mt-4"><?php echo $Materia; ?></h2>
                    <br>
                   <center>  
              
              </center>
  <div class="col" align="right">
    <?php if($_SESSION['Perfil']=='Alumno' ){
         echo '<a href="javascript:regresarSesion2('.$idMateria.');"><button type="button" class="btn btn-dark" >Regresar</button></a>'; 
          }elseif ($_SESSION['Perfil']=='Control Escolar') {
          echo '<a href="javascript:regresaradmin('.$id.');"><button type="button" class="btn btn-dark" >Regresar</button></a>';            }
          else{
          echo '<a href="javascript:regresarSesion('.$idMateria.');"><button type="button" class="btn btn-dark" >Regresar</button></a>';            
          }  
    ?>
  </div>





        <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $Nombre; ?> 
          <center>Trabajos Parciales</center>
    </div>
 
<div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0" >
              <thead>
               <?php if($_SESSION['Perfil']=='Alumno' ){
                echo '
                  <tr style="white-space:nowrap;">
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">ID</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;" style="min-width:100px">Sesión</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;" style="width:400px">Título</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th COLSPAN=3 >Trabajos</th>
                  <th colspan="3" style="vertical-align : middle;text-align:center;">Evaluación</th>
                  
                  </tr>
                  
                  <tr style="white-space:nowrap;">     
                <th>Archivo</th>
                <th>Comentarios</th>
                <th>Envio</th>


                <th>Archivo</th>
      
                <th>Comentarios</th>
                <th>Calificación</th>
             
                </tr>
                ';
                }else{
                  echo '
                  <tr style="white-space:nowrap;">
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">ID</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;" style="min-width:100px">Sesión</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Título</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th COLSPAN=3 >Trabajos</th>
                  <th COLSPAN=5 >Evaluación</th>
                  
                  </tr>
                  
                  <tr >     
                <th>Archivo</th>
                <th>Comentarios</th>
                <th>Envio</th>


                <th>Subir</th>
                <th>Archivo</th>
                <th>Comentarios</th>
                <th>Calificación</th>
                <th>Acción</th>
                </tr>
                  ';
                }?>      


          </thead>
            <tbody>
              <?php



            $sql= "SELECT t.*, s.NombreSesion, u.id, a.idPosgrado, s.idSesion
          FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND u.id='$id'  AND t.Tarea_tipo=0 AND t.Eliminado=0
          ORDER BY s.idSesion, t.idTarea";


            mysqli_set_charset($conexion,"utf8");

            $datos = mysqli_query($conexion,$sql);
           
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $idTarea = $renglon['idTarea'];
              $idSesion = $renglon['idSesion'];
              $idAlumno1 = $renglon['id'];
            $sqlDetalle="SELECT td.Archivo as ArchivoAlumno, td.Comentarios as ComentariosAlumno, td.FechaAgrega as FechaEntregaAlumno, ArchivoDocente, td.idTareaDetalle, td.ArchivoDocente, td.ComentarioDocente, td.Calificacion FROM catg_tareas_detalle AS td WHERE td.Eliminado=0 AND td.idTarea='$idTarea' AND td.idAlumno='$id'";


            $datosDetalle = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle2 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle3 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle4 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle5 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle6 = mysqli_query($conexion,$sqlDetalle);

            $datosDetalle7 = mysqli_query($conexion,$sqlDetalle);

            mysqli_set_charset($conexion,"utf8");
            echo '<tr>';
            $contador=$contador+1;
            echo '
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreSesion'].'</td>
            <td style="width:400px">'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['FechaEntrega'].'</td>';

            $fila1 = mysqli_num_rows($datosDetalle);
            if ($fila1>0) {
              
          while ($renglon2=mysqli_fetch_array($datosDetalle)) {
             $idTareaDetalle = $renglon2['idTareaDetalle'];
             $Calificacionr = $renglon2['Calificacion'];
            if ($renglon2['ArchivoAlumno']!='') {

            echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$email.'/'.$renglon2['ArchivoAlumno'].'" target="_blank" ><img src="opciones/reportar.png"></a></td>';
                  }else{
                    echo "<td></td>";
                  }
                }
              }else{
                echo "<td></td>";
            }

          $fila1 = mysqli_num_rows($datosDetalle2);
          if ($fila1>0) {
          while ($renglon3=mysqli_fetch_array($datosDetalle2)) {     
            if ($renglon3['ComentariosAlumno']!='') {
              echo '<td><a href="javascript:comentario('.$renglon3['idTareaDetalle'].');"><img src="opciones/comentario.png"></a></td>';
            }else{
              echo "<td></td>";
            }
          }
            }else{
              echo "<td></td>";
            }


          $fila1 = mysqli_num_rows($datosDetalle3);
          if ($fila1>0) {            
          while ($renglon4=mysqli_fetch_array($datosDetalle3)) {
            if ($renglon4['FechaEntregaAlumno']!='') {
              echo  '<td>'.$renglon4['FechaEntregaAlumno'].'</td>';
            }else{
              echo "<td></td>";
            }
          }
        }else{
          echo "<td></td>";
        }

          $fila1 = mysqli_num_rows($datosDetalle4);
          if ($fila1>0) { 
            
          while ($renglon5=mysqli_fetch_array($datosDetalle4)) {
            if($_SESSION['Perfil']!='Alumno' ){
              echo '<td>';

            if ($renglon5['Calificacion']=='') {
            echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon5['idTareaDetalle'].','.$renglon['idPosgrado'].','.$renglon['idSesion'].','.$idMateria.','.$renglon['id'].');"><img src="opciones/cargar.png"></a>';
          }else{
            $mesa = '"Ya tiene trabajo"';
             echo '<a onClick="alert(\'Ya tiene calificación\')"><img src="opciones/cargar.png"></a>';
          }

             echo '</td>';
          }
           
        }
            }else{
              echo "<td></td>";
          //echo '<td><a href="javascript:nuevo_TrabajoDocente('.$renglon['idTarea'].','.$renglon['idPosgrado'].','.$renglon['idSesion'].','.$idMateria.','.$renglon['id'].');"><img src="opciones/cargar.png"></a></td>';
        }


          $fila1 = mysqli_num_rows($datosDetalle6);
          if ($fila1>0) { 
          while ($renglon7=mysqli_fetch_array($datosDetalle6)) {
            if ($renglon7['ArchivoDocente']!='') {
              echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$email.'/'.$renglon7['ArchivoDocente'].'" target="_blank" >
              <img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo '<td></td>';
            }
          }
        }else{
          echo "<td></td>";
        }


          $fila1 = mysqli_num_rows($datosDetalle5);
          if ($fila1>0) { 
          while ($renglon6=mysqli_fetch_array($datosDetalle5)) {
            if ($renglon6['ComentarioDocente']!='') {
            echo '<td>
            <a href="javascript:comentarioDoc('.$renglon6['idTareaDetalle'].');"><img  src="opciones/comentario.png"></a>
                      </td>';
            }

            else{
              echo "<td></td>";
            }
            if ($renglon6['Calificacion']!='') {
            echo '<td>'.$renglon6['Calificacion'].'</td>';
            }else{
              echo "<td></td>";
            }
          }
        }else{
          if ($_SESSION['Perfil']=='Alumno' ) {
            echo "<td></td>";
          }else{
             echo "<td></td><td></td>";
          }
         
        }
      



      
            if($_SESSION['Perfil']=='Alumno' ){

            }else{
             $fila12 = mysqli_num_rows($datosDetalle7);
              if ($fila12>0) { 
              while ($renglon51=mysqli_fetch_array($datosDetalle7)) {
              
              echo '<td><a href="javascript:nuevo_TrabajoDocente('.$renglon51['idTareaDetalle'].','.$renglon['idPosgrado'].','.$renglon['idSesion'].','.$idMateria.','.$renglon['id'].');">
              <img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_trabajo_docente('.$renglon51['idTareaDetalle'].','.$idMateria.','.$idSesion.','.$idAlumno1.');"><img src="opciones/eliminar.png"></a>
              </td>
              ';
               
                 }
               }
                 else{
                 echo '<td></td>';
                 }
            }
            echo '
            </tr>
            ';
          }
            ?>
              </tbody>
          
            </table>
      </div>
        </div>


<br><br>


<div class="card-header">
          <i class="fa fa-table"></i> <?php echo $Nombre; ?>

          <center> Trabajo Final</center>
 <center>
    </div>
 
<div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0"  style="width:100%">
              <thead>

                <?php if($_SESSION['Perfil']=='Alumno' ){
                echo '
                  <tr>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">ID</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Materia</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Título</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th COLSPAN=3 >Trabajos</th>
                  <th colspan="3" style="vertical-align : middle;text-align:center;">Evaluación</th>
                  
                  </tr>
                  
                  <tr>     
                <th>Archivo</th>
                <th>Comentarios</th>
                <th>Envio</th>


                <th>Archivo</th>
      
                <th>Comentarios</th>
                <th>Calificación</th>
             
                </tr>
                ';
                }else{
                  echo '
                  <tr>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">ID</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Materia</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Título</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th COLSPAN=3 >Trabajos</th>
                  <th COLSPAN=5 >Evaluación</th>
                  
                  </tr>
                  
                  <tr>     
                <th>Archivo</th>
                <th>Comentarios</th>
                <th>Envio</th>


                <th>Subir</th>
                <th>Archivo</th>
                <th>Comentarios</th>
                <th>Calificación</th>
                <th>Acción</th>
                </tr>
                  ';
                }?>

              </thead>
 <tbody>
               <?php

    $perfil=$_SESSION['Perfil'];

if ($perfil=='Alumno') {
   $id=$_SESSION['id'];
            $sql= "SELECT t.*, u.id, a.Materia, u.id_posgrado as idPosgrado
          FROM catg_tareas AS t
          INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND u.id='$id'  AND t.Tarea_tipo=1 AND t.Eliminado=0
          ORDER BY  t.idTarea";
}elseif ($perfil=='Docente') {
   $id = intval($_GET['id']);
              $idMateria = intval($_GET['idMateria']);
$sql= "SELECT t.*, u.id, a.Materia, u.id_posgrado as idPosgrado
          FROM catg_tareas AS t
          INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND u.id='$id'  AND t.Tarea_tipo=1 AND t.Eliminado=0
          GROUP BY t.idTarea          ORDER BY  t.idTarea";
        }

else{
            $sql= "SELECT t.*, u.id, a.Materia, u.id_posgrado as idPosgrado
          FROM catg_tareas AS t
          INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria'  AND t.Tarea_tipo=1 AND t.Eliminado=0
          GROUP BY t.idTarea          ORDER BY  t.idTarea";
}

            


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
           
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $idTarea = $renglon['idTarea'];
              $idAlumno1 = $renglon['id'];
            $sqlDetalle="SELECT td.Archivo as ArchivoAlumno, td.Comentarios as ComentariosAlumno, td.FechaAgrega as FechaEntregaAlumno, ArchivoDocente, td.idTareaDetalle, td.ArchivoDocente, td.ComentarioDocente, td.Calificacion FROM catg_tareas_detalle AS td WHERE td.Eliminado=0 AND td.idTarea='$idTarea' AND td.idAlumno='$id'";
            $datosDetalle = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle2 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle3 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle4 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle5 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle6 = mysqli_query($conexion,$sqlDetalle);

            $datosDetalle7 = mysqli_query($conexion,$sqlDetalle);

            mysqli_set_charset($conexion,"utf8");
            echo '<tr>';
            $contador=$contador+1;
            echo '
            <td>'.$contador.'</td>
            <td>'.$renglon['Materia'].'</td>
            <td style="width:100px">'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['FechaEntrega'].'</td>';
            $fila1 = mysqli_num_rows($datosDetalle);
            if ($fila1>0) {
          while ($renglon2=mysqli_fetch_array($datosDetalle)) {
             $idTareaDetalle = $renglon2['idTareaDetalle'];
             $Calificacionr = $renglon2['Calificacion'];
            if ($renglon2['ArchivoAlumno']!='') {

            echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$email.'/'.$renglon2['ArchivoAlumno'].'" target="_blank" ><img src="opciones/reportar.png"></a></td>';
                  }else{
                    echo "<td></td>";
                  }
                }
              }else{
                echo "<td></td>";
            }

          $fila1 = mysqli_num_rows($datosDetalle2);
          if ($fila1>0) {
          while ($renglon3=mysqli_fetch_array($datosDetalle2)) {     
            if ($renglon3['ComentariosAlumno']!='') {
              echo '<td><a href="javascript:comentario('.$renglon3['idTareaDetalle'].');"><img src="opciones/comentario.png"></a></td>';
            }else{
              echo "<td></td>";
            }
          }
            }else{
              echo "<td></td>";
            }


          $fila1 = mysqli_num_rows($datosDetalle3);
          if ($fila1>0) {            
          while ($renglon4=mysqli_fetch_array($datosDetalle3)) {
            if ($renglon4['FechaEntregaAlumno']!='') {
              echo  '<td>'.$renglon4['FechaEntregaAlumno'].'</td>';
            }else{
              echo "<td></td>";
            }
          }
        }else{
          echo "<td></td>";
        }

          $fila1 = mysqli_num_rows($datosDetalle4);
          if ($fila1>0) { 
            
          while ($renglon5=mysqli_fetch_array($datosDetalle4)) {
            if($_SESSION['Perfil']!='Alumno' ){
              echo '<td>';

if ($renglon5['ArchivoDocente']=='') {
            echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon5['idTareaDetalle'].','.$renglon['idPosgrado'].',0,'.$idMateria.','.$renglon['id'].');"><img src="opciones/cargar.png"></a>';
          }else{
            $mesa = '"Ya tiene trabajo"';
             echo '<a onClick="alert(\'Ya tiene trabajo\')"><img src="opciones/cargar.png"></a>';
          }

             echo '</td>';
          }
           
        }
            }elseif ($_SESSION['Perfil']=='Alumno') {

            }
            else{
          echo '<td><a href="javascript:nuevo_TrabajoDocente('.$renglon['idTarea'].','.$renglon['idPosgrado'].',0,'.$idMateria.','.$renglon['id'].');"><img src="opciones/cargar.png"></a></td>';
        }


          $fila1 = mysqli_num_rows($datosDetalle6);
          if ($fila1>0) { 
          while ($renglon7=mysqli_fetch_array($datosDetalle6)) {
            if ($renglon7['ArchivoDocente']!='') {
              echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$email.'/'.$renglon7['ArchivoDocente'].'" target="_blank" >
              <img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo '<td></td>';
            }
          }
        }else{
          echo "<td></td>";
        }


          $fila1 = mysqli_num_rows($datosDetalle5);
          if ($fila1>0) { 
          while ($renglon6=mysqli_fetch_array($datosDetalle5)) {
            if ($renglon6['ComentarioDocente']!='') {
            echo '<td>
            <a href="javascript:comentarioDoc('.$renglon6['idTareaDetalle'].');"><img  src="opciones/comentario.png"></a>
                      </td>';
            }

            else{
              echo "<td></td>";
            }
            if ($renglon6['Calificacion']!='') {
            echo '<td>'.$renglon6['Calificacion'].'</td>';
            }else{
              echo "<td></td>";
            }
          }
        }else{
          echo "<td></td><td></td>";
        }
      



      
            if($_SESSION['Perfil']=='Alumno' ){

            }else{
              echo "
              <td>";
              while ($renglon51=mysqli_fetch_array($datosDetalle7)) {
              
              echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon51['idTareaDetalle'].','.$renglon['idPosgrado'].',0,'.$idMateria.','.$renglon['id'].');">
              <img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_trabajo_docente('.$renglon51['idTareaDetalle'].','.$idMateria.',0,'.$idAlumno1.');"><img src="opciones/eliminar.png"></a>
              ';
               
                 }
              echo "</td>";
            }
            echo '
            </tr>
            ';
          }
            ?>
              </tbody>
          
            </table>
      </div>
        </div>     
  </div>

         

                        
  <?php  //include("../modal/modal_calificacion_trabajos.php"); ?>                       
  <?php  include("../modal/modal_observacion.php"); ?>
  <?php  include("../modal/modal_tarea_docente.php"); ?>

<script type="text/javascript">
        function regresarSesion(id){
      $('#contenido').load("php/listar_perfilcomun2.php?idMateria="+id);
      $("body").toggleClass("sb-sidenav-toggled");
      }
      function regresaradmin(id){
      $('#contenido').load("php/modal/form_calificaciones.php?id="+id);
      }
      function regresarSesion2(id){
      $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);
      }
           $(document).ready(function() {



        } );
        $('#Estudiante').click(function(){
            $('#contenido').load("php/listar_grupos.php");
        });

</script>