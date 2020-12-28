<script src="js/myjava.js"></script>

<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$correo=$_SESSION['emailInst'];

$pro2 = $_POST['pro'];
$ComentariosDocente = $_POST['ComentariosDocente'];

$idMateria= $_POST['idMateriaTrabajo'];
$idTarea2= $_POST['idTrabajoDetalle'];
$id2=$_POST['id'];
$idAlumno=  $_POST['idAlumnoTrabajo'];
$fecha = date("Y-m-d H:i:s");
$calificacion_trabajo = $_POST['calificacion_trabajo'];

 
$sql= "  SELECT  p.abrev, a.Materia, CONCAT_WS(' ', u.nombre, u.ap_paterno, u.ap_materno) AS Nombre,  a.idMateria, u.emailInst

FROM usuario_activo as u
INNER JOIN catg_asignatura as a ON a.idPosgrado= u.id_posgrado
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
WHERE u.id='$idAlumno' ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $Nombre= $renglon['Nombre'];

              $posgrado= $renglon['abrev'];
              $emailInst =  $renglon['emailInst'];
             }
$micarpeta = "../../archivos/Tareas/$posgrado/$emailInst/";

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}else{
}

      if ($_FILES['ArchivoDocente2']['name']!="") {

          $archivo = $_FILES['ArchivoDocente2'];
          $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
          $nombre = $_FILES['ArchivoDocente2']['name'];

          if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {
            if ($ComentariosDocente AND $calificacion_trabajo) {
          $sql= "UPDATE catg_tareas_detalle SET Archivo='$nombre', ComentarioDocente='$ComentariosDocente', FechaAgregaDocente='$fecha', Calificacion='$calificacion_trabajo'WHERE idTareaDetalle='$idTarea2' AND Eliminado=0 ";
          $datos = mysqli_query($conexion,$sql);              # code...
            }
            if ($calificacion_trabajo=='') {
            $sql= "UPDATE catg_tareas_detalle SET Archivo='$nombre', FechaAgregaDocente='$fecha' WHERE idTareaDetalle='$idTarea2' AND Eliminado=0 ";
          $datos = mysqli_query($conexion,$sql);               
        }

          } 

          }else{

            if ($ComentariosDocente AND $calificacion_trabajo ) {
          $sql= "UPDATE catg_tareas_detalle SET  ComentarioDocente='$ComentariosDocente', FechaAgregaDocente='$fecha', Calificacion='$calificacion_trabajo'WHERE idTareaDetalle='$idTarea2' AND Eliminado=0 ";
          $datos = mysqli_query($conexion,$sql);              # code...
            }
            if ($calificacion_trabajo =='' ) {
            $sql= "UPDATE catg_tareas_detalle SET FechaAgregaDocente='$fecha' WHERE idTareaDetalle='$idTarea2' AND Eliminado=0 ";
          $datos = mysqli_query($conexion,$sql);               
        }

          }
 ?>





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
                  <tr>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">ID</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Sesión</th>
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
                  <th rowspan="2" style="vertical-align : middle;text-align:center;">Sesión</th>
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



            $sql= "SELECT t.*, s.NombreSesion, u.id, a.idPosgrado, s.idSesion
          FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND u.id='$idAlumno'  AND t.Tarea_tipo=0 AND t.Eliminado=0
          ORDER BY s.idSesion, t.idTarea";



            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
           
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $idTarea = $renglon['idTarea'];

            $sqlDetalle="SELECT td.Archivo as ArchivoAlumno, td.Comentarios as ComentariosAlumno, td.FechaAgrega as FechaEntregaAlumno, ArchivoDocente, ComentarioDocente, ArchivoDocente, FechaAgregaDocente, td.idTareaDetalle, td.Calificacion  FROM catg_tareas_detalle AS td WHERE td.Eliminado=0 AND td.idTarea='$idTarea' AND td.idAlumno='$idAlumno'";
            $datosDetalle = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle2 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle3 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle4 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle5 = mysqli_query($conexion,$sqlDetalle);
            $datosDetalle6 = mysqli_query($conexion,$sqlDetalle);

            mysqli_set_charset($conexion,"utf8");
            echo '<tr>';
            $contador=$contador+1;
            echo '
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreSesion'].'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['FechaEntrega'].'</td>';
    
            $fila1 = mysqli_num_rows($datosDetalle);
        if ($fila1>0) {
          while ($renglon2=mysqli_fetch_array($datosDetalle)) {
             $idTareaDetalle = $renglon2['idTareaDetalle'];
            if ($renglon2['ArchivoAlumno']!='') {

            echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$emailInst.'/'.$renglon2['ArchivoAlumno'].'" target="_blank" ><img src="opciones/reportar.png"></a></td>';
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
            if ($renglon5['ArchivoDocente']!='') {
                echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon['idTarea'].','.$renglon['idPosgrado'].','.$renglon['idSesion'].','.$idMateria.','.$renglon['id'].');"><img src="opciones/cargar.png"></a>';
            }else{
            echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon['idTarea'].','.$renglon['idPosgrado'].','.$renglon['idSesion'].','.$idMateria.','.$renglon['id'].');"><img src="opciones/cargar.png"></a>';
            }
             echo '</td>';
          }
           
        }
            }else{
          echo "<td></td>";
        }


          $fila1 = mysqli_num_rows($datosDetalle6);
          if ($fila1>0) { 
          while ($renglon7=mysqli_fetch_array($datosDetalle6)) {
            if ($renglon7['ArchivoDocente']!='') {
              echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$emailInst.'/'.$renglon7['ArchivoDocente'].'" target="_blank" >
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
              echo '<a href="javascript:nueva_calificacion_tarea('.$renglon['id'].','.$idTareaDetalle.','.$idMateria.');">
              <img src="opciones/editar.png"></a>';
            if ($renglon6['Calificacion']!='') {
               echo '<a href="javascript:eliminar_trabajo_estudiante('.$idTareaDetalle.', '.$idMateria.', '.$idSesion.');"><img src="opciones/eliminar.png"></a>';
              }else{
  
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


<br><br>


<div class="card-header">
          <i class="fa fa-table"></i> <?php echo $Nombre; ?>

          <center> Trabajo Final</center>
 <center>
    </div>
 
<div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0" >
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
          $sqlFinal= "SELECT t.*, a.Materia,u.id , a.idPosgrado FROM catg_tareas AS t 
                      INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria 
                      INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura 
                      INNER JOIN catg_catedratico AS c ON c.id= d.idDocente 
                      INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado 
                      WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND u.id='$idAlumno' AND t.Tarea_tipo=1 AND t.Eliminado=0
                      ORDER BY  t.idTarea 
                         ";

            $datos2 = mysqli_query($conexion,$sqlFinal);
            mysqli_set_charset($conexion,"utf8");
           
            $contador=0;
            while ($filaFinal=mysqli_fetch_array($datos2)) {
            $idTarea = $filaFinal['idTarea'];
            echo '<tr>';
            $contador=$contador+1;

            echo '
            <td>'.$contador.'</td>
            <td>'.$filaFinal['Materia'].'</td>
            <td>'.$filaFinal['TituloTarea'].'</td>
            <td>'.$filaFinal['FechaEntrega'].'</td>';
            
            echo '<td>';
          while ($renglon2=mysqli_fetch_array($datosDetalle)) {
            
            if ($renglon2['ArchivoAlumno']!='') {
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$emailInst.'/'.$renglon2['ArchivoAlumno'].'" target="_blank" >
              <img src="opciones/reportar.png">
            </a>';
            }else{
              echo "";
            }
          }
            echo '</td>';

            echo '<td>';
          while ($renglon3=mysqli_fetch_array($datosDetalle2)) {     
            if ($renglon3['ComentariosAlumno']!='') {
              echo '<img src="opciones/comentario.png">';
            }else{
              echo "";
            }
          }
            echo '</td>';

            echo '<td>';
          while ($renglon4=mysqli_fetch_array($datosDetalle3)) {
            if ($renglon4['FechaEntregaAlumno']!='') {
              echo $renglon4['FechaEntregaAlumno'];
            }else{
              echo "";
            }
          }
            echo '</td>';

            echo '<td>';
          while ($renglon5=mysqli_fetch_array($datosDetalle4)) {
            if ($renglon5['ArchivoAlumno']!='') {
              echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon['idTarea'].','.$renglon['idPosgrado'].',0,'.$idMateria.');"><img src="opciones/cargar.png"></a>';
            }else{
              echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon['idTarea'].','.$renglon['idPosgrado'].','.$renglon['idSesion'].','.$idMateria.','.$renglon['id'].');"><img src="opciones/cargar.png"></a>';
            }
          }
            echo '</td>';

            echo '<td>';
          while ($renglon6=mysqli_fetch_array($datosDetalle5)) {
            if ($renglon6['ArchivoAlumno']!='') {
              echo '';
            }else{
              echo "";
            }
          }
            echo '</td>';

            echo '<td>';
          while ($renglon7=mysqli_fetch_array($datosDetalle6)) {
            if ($renglon7['ArchivoAlumno']!='') {
              echo '';
            }else{
              echo "";
            }
          }
            echo '</td>';

            if($_SESSION['Perfil']=='Alumno' ){

            }else{
              echo "
              <td></td>
              <td>";
              echo '<a href="javascript:nuevo_TrabajoDocente('.$renglon['idTarea'].','.$renglon['idPosgrado'].','.$renglon['idSesion'].','.$idMateria.','.$renglon['id'].');">
              <img src="opciones/editar.png"></a>';
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
    <script type="text/javascript">
        function regresarSesion(id){
      $('#contenido').load("php/listar_tareacomun.php?idMateria="+id);
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
