<?php
session_start();
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL );


include('../conexion.php');






$id = $_POST['id'];
$idMateria = intval($_GET['idMateria']);
$idSesion = intval($_GET['idSesion']);
//$idAlumno = intval($_GET['idAlumno']);




$sql = "UPDATE catg_tareas_detalle SET Eliminado = 1 WHERE idTareaDetalle = '$id' ";
$registro = mysqli_query($conexion,$sql);

$sql = "SELECT t.Tarea_tipo FROM catg_tareas as t INNER JOIN catg_tareas_detalle as td ON td.idTarea = t.idTarea  WHERE  td.idTareaDetalle = '$id' ";
$registro = mysqli_query($conexion,$sql);

          while ($renglon=mysqli_fetch_array($registro)) {
            $tareaTipo = $renglon['Tarea_tipo'];
          }


    $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
 INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
 WHERE  s.Eliminado=0 AND m.idMateria='$idMateria' AND s.idSesion='$idSesion' AND d.Eliminado=0  
 ";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
 
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idPosgrado = $renglon['idPosgrado'];
            $posgrado = $renglon['abrev'];
            $idGrupo = $renglon['idGrupo'];
            $idSesion = $renglon['idSesion'];
            $idMateria = $renglon['idMateria'];
            $Materia = $renglon['Materia'];
                }
    $correo=$_SESSION['emailInst'];
   $id=$_SESSION['id'];

$cons_cons = " SELECT * FROM usuario_activo WHERE emailInst = '$correo' AND Eliminado=0 ";
$se2s = mysqli_query($conexion,$cons_cons);

          while ($renglon3=mysqli_fetch_array($se2s)) {
            $Correo = $renglon3['email_particular'];
            
          }




$nuevo_msj ='El Instituto Iberoamericano de Derecho Electoral le informa que usted ha eliminado su trabajo parcial correspondiente a la asignatura '.$Materia.'

Si tiene alguna duda con motivo de este correo electrónico comuníquese a los números telefónicos 55 6062 7722 / 55 79131372 o al correo electrónico posgrados@iide-edu.com

Le enviamos un cordial saludo.

Atentamente
Instituto Iberoamericano de Derecho Electoral';


  $from = "notificaciones@iide-edu.com";
  $to = $Correo;

  $subjet = "Notificación/ Eliminación de Trabajo";
  $mensaje =  $nuevo_msj;
  $headers = "From:". $from;

if ($Correo!="") {
  mail($to,$subjet,$mensaje,$headers);
}




  $from = "notificaciones@iide-edu.com";
  $to = "ing.blancoross@gmail.com";

  $subjet = "Nueva tarea de";
  $mensaje = $correo;
  $headers = "From:". $from;

  mail($to,$subjet,$mensaje,$headers);





?>

<div id="agrega-registros">
 <div class="table-responsive" id="table">
          
            <table class="table table-striped table-bordered" id="dataTable"  >
              <thead>
                <tr>
                  <?php if($_SESSION['Perfil']=='Alumno' ){
                  echo '
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

        if($_SESSION['Perfil']=='Alumno' ){
            if ($tareaTipo==0) {

              $sql= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND s.idSesion='$idSesion' AND t.Tarea_tipo=0 AND t.Eliminado=0 AND s.Eliminado=0
          ORDER BY s.idSesion, t.idTarea ";

            }else{

              $sql= "SELECT t.*, u.id, a.Materia
          FROM catg_tareas AS t
          INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND u.id='$id'  AND t.Tarea_tipo=1 AND t.Eliminado=0 
          ORDER BY  t.idTarea";
            }
          

          $sqlFinal= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
                        INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
                        INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
                        INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                        INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                        WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND t.Tarea_tipo=1 AND s.idSesion='$idSesion' AND t.Eliminado=0 AND s.Eliminado=0
                        ORDER BY s.idSesion, t.idTarea 
                         ";
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
                        WHERE d.Eliminado=0 AND d.idDocente='$id' AND t.Tarea_tipo=1 AND s.idSesion='$idSesion' AND t.Eliminado=0 AND s.Eliminado=0
                        ORDER BY s.idSesion, t.idTarea";


            }

            $datos = mysqli_query($conexion,$sql);
            $datosFinal = mysqli_query($conexion,$sqlFinal);

            mysqli_set_charset($conexion,"utf8");
            $contador=0;
$Calificacion ="";
$idTareaDetalle="";
          while ($renglon=mysqli_fetch_array($datos)) {
          
          $idTarea = $renglon['idTarea'];
          if ($tareaTipo==0) {
          $consulta="SELECT t.*, s.NombreSesion,td.Archivo AS ArchivoAlumno, td.TituloTarea AS TituloAlumno, td.Descripcion AS DescripcionAlumno, td.Comentarios AS ComentariosAlumnos, td.FechaAgrega as FechaAlumno, td.idTareaDetalle, td.Calificacion AS Cali FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN catg_tareas_detalle AS td ON td.idTarea= t.idTarea
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND td.idTarea='$idTarea' AND s.idSesion='$idSesion' AND td.idAlumno='$id' AND t.Tarea_tipo=0 AND t.Eliminado=0 AND td.Eliminado=0 AND s.Eliminado=0
          ORDER BY s.idSesion, t.idTarea";
                    }else{

                      $consulta= "SELECT t.*,td.Archivo AS ArchivoAlumno, td.TituloTarea AS TituloAlumno, td.Descripcion AS DescripcionAlumno, td.Comentarios AS ComentariosAlumnos, td.FechaAgrega as FechaAlumno, td.idTareaDetalle, td.Calificacion AS Cali
          FROM catg_tareas AS t
          INNER JOIN catg_tareas_detalle AS td ON td.idTarea= t.idTarea
          INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN usuario_activo AS u ON u.id = td.idAlumno
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND td.idTarea='$idTarea' AND td.idAlumno='$id'  AND t.Tarea_tipo=1 AND t.Eliminado=0 AND td.Eliminado=0
          ORDER BY  t.idTarea";
                    }
         

          $detalle = mysqli_query($conexion,$consulta);
          $detalle2 = mysqli_query($conexion,$consulta);
          $detalle32 = mysqli_query($conexion,$consulta);

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
              <a onClick="alert(\'Ya tiene trabajo enviado\')"><img src="opciones/cargar.png"></a>
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
              </td><td></td><td></td>';
            }
              echo '<td>';
              while ($renglon3=mysqli_fetch_array($detalle2)) {
                  $Calificacion = $renglon3['Cali'];
                  $idTareaDetalle = $renglon3['idTareaDetalle'];
              echo '<a href="archivos/Tareas/'.$posgrado.'/'.$correo.'/'.$renglon3['ArchivoAlumno'].'" target="_blank"><img src="opciones/reportar.png"></a>';
              }           
              echo '</td><td>';
              if ($Calificacion<>'') {
              }else{
              echo '<a href="javascript:eliminar_trabajo_estudiante('.$idTareaDetalle.', '.$idMateria.', '.$idSesion.');"><img src="opciones/eliminar.png"></a>';
              echo '</td></tr>'; 
            }
      }
            ?>
      </tbody>    

       </table>


        </div>
          </div>
            </div>
<script type="text/javascript">
        function regresarSesion(id){
      $('#contenido').load("php/listar_tareacomun.php?idMateria="+id);
      }
      function regresarSesionCE(idAsignacion,idGrupo){
      $('#contenido').load("php/listar_calendarioprograma.php?id="+idAsignacion, "idGrupo="+idGrupo);
      }
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