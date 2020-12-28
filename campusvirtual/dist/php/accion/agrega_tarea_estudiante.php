<script src="js/myjava.js"></script>

<?php
session_start();
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL );

header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$correo=$_SESSION['emailInst'];

$pro2 = $_POST['pro2'];
$idTarea = $_POST['idTarea2'];
$Titulo = $_POST['Titulo'];
$Descripcion = $_POST['Descripcion'];
$Comentarios = $_POST['Comentarios'];
$idSesion= $_POST['idSesion2'];
$idMateria= $_POST['idMateria2'];
$idPosgrado= $_POST['idPosgrado2'];
$id2=$_POST['id2'];


$perfil=$_SESSION['emailInst'];
$id=$_SESSION['id'];
$emailInst=$_SESSION['emailInst'];


$posgrado = $idPosgrado;
if ($posgrado==1) {
  $posgrado = "MDCDH";
}elseif ($posgrado == 2) {
  $posgrado = "MDE";
}elseif($posgrado == 3){
  $posgrado = "DDCDH";
}else{
  $posgrado = "DDE";
}

$micarpeta = "../../archivos/Tareas/$posgrado/$emailInst/";

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}else{
}


$cons_mat = " SELECT * FROM catg_asignatura WHERE idMateria = '$idMateria' AND Eliminado=0 ";
$con_mat = mysqli_query($conexion,$cons_mat);


          while ($renglon23=mysqli_fetch_array($con_mat)) {
            $Materia = $renglon23['Materia'];
            
          }


$cons_ses = " SELECT * FROM catg_sesiones WHERE idSesion = '$idSesion' AND Eliminado=0 ";
$ses = mysqli_query($conexion,$cons_ses);


          while ($renglon2=mysqli_fetch_array($ses)) {
            $FechaSesion = date("d-m-Y", strtotime($renglon2['FechaSesion']));
            
          }

$cons_cons = " SELECT * FROM usuario_activo WHERE emailInst = '$emailInst' AND Eliminado=0 ";
$se2s = mysqli_query($conexion,$cons_cons);

          while ($renglon3=mysqli_fetch_array($se2s)) {
            $Correo = $renglon3['email_particular'];
            
          }




//$sql = "UPDATE catg_tareas_detalle SET Eliminado = 1 WHERE idTarea = '$idTarea' ";
//$registro = mysqli_query($conexion,$sql);

$sql = "SELECT Tarea_tipo FROM catg_tareas WHERE idTarea = '$idTarea' AND Eliminado=0 ";
$registro = mysqli_query($conexion,$sql);


          while ($renglon=mysqli_fetch_array($registro)) {
            $tareaTipo = $renglon['Tarea_tipo'];
          }
          //echo $tareaTipo;


if ($tareaTipo==0) {
  # code...

$nuevo_msj ='TRABAJOS PARCIALES 


El Instituto Iberoamericano de Derecho Electoral le informa que ha recibido su trabajo parcial correspondiente a la sesión de fecha '. $FechaSesion.'

Si tiene alguna duda con motivo de este correo electrónico comuníquese a los números telefónicos 55 6062 7722 / 55 79131372 o al correo electrónico posgrados@iide-edu.com

Le enviamos un cordial saludo.

Atentamente
Instituto Iberoamericano de Derecho Electoral';


  $from = "notificaciones@iide-edu.com";
  $to = $Correo;

  $subjet = "Notificación/ Entrega de Trabajo";
  $mensaje =  $nuevo_msj;
  $headers = "From:". $from;
if ($Correo!="") {
  mail($to,$subjet,$mensaje,$headers);
}






  $from = "notificaciones@iide-edu.com";
  $to = "ing.blancoross@gmail.com";

  $subjet = "Nueva tarea de";
  $mensaje = $emailInst;
  $headers = "From:". $from;

  mail($to,$subjet,$mensaje,$headers);

}else{

$nuevo_msj ='TRABAJO FINAL 


El Instituto Iberoamericano de Derecho Electoral le informa que ha recibido su trabajo final correspondiente a la materia '. $Materia.'

Si tiene alguna duda con motivo de este correo electrónico comuníquese a los números telefónicos 55 6062 7722 / 55 79131372 o al correo electrónico posgrados@iide-edu.com

Le enviamos un cordial saludo.

Atentamente
Instituto Iberoamericano de Derecho Electoral';


  $from = "notificaciones@iide-edu.com";
  $to = $Correo;

  $subjet = "Notificación/ Entrega de Trabajo";
  $mensaje =  $nuevo_msj;
  $headers = "From:". $from;

if ($Correo!="") {
  mail($to,$subjet,$mensaje,$headers);
}




  $from = "notificaciones@iide-edu.com";
  $to = "ing.blancoross@gmail.com";

  $subjet = "Nueva tarea de";
  $mensaje = $emailInst;
  $headers = "From:". $from;

  mail($to,$subjet,$mensaje,$headers);

}


      if ($_FILES['lectura']['name']!="") {
          $archivo = $_FILES['lectura'];
          $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
          $nombre = $_FILES['lectura']['name'];
          if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {
          $sql = "INSERT INTO catg_tareas_detalle (idTarea, idAlumno, TituloTarea, Descripcion, Comentarios, Archivo) ".  "VALUES ($idTarea, $id, '$Titulo', '$Descripcion', '$Comentarios', '$nombre')";
          $datos = mysqli_query($conexion,$sql);
          } 
          }else{
            $sql = "INSERT INTO catg_tareas_detalle (idTarea, idAlumno, TituloTarea, Descripcion, Comentarios, Archivo) ".  "VALUES ($idTarea, $id, '$Titulo', '$Descripcion', '$Comentarios', '$nombre')";
            $datos = mysqli_query($conexion,$sql);
          }

 include("../modal/modal_tarea_estudiante.php");


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
                </tr>
                  ';                
              }
              ?>
              </thead>
            <tbody>
              <?php

        if($_SESSION['Perfil']=='Alumno' ){
          $id=$_SESSION['id'];
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
          $idSesion= $_POST['idSesion2'];
          $idTarea = $renglon['idTarea'];
          if ($tareaTipo==0) {
          $consulta="SELECT t.*, s.NombreSesion,td.Archivo AS ArchivoAlumno, td.TituloTarea AS TituloAlumno, td.Descripcion AS DescripcionAlumno, td.Comentarios AS ComentariosAlumnos, td.FechaAgrega as FechaAlumno, td.idTareaDetalle, td.Calificacion AS Cali FROM catg_tareas AS t
          INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
          INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
          INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
          INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
          INNER JOIN catg_tareas_detalle AS td ON td.idTarea= t.idTarea
          WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND td.idTarea='$idTarea' AND s.idSesion='$idSesion'  AND td.idAlumno='$id' AND t.Tarea_tipo=0 AND t.Eliminado=0 AND td.Eliminado=0 AND s.Eliminado=0
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
          $dFinal = mysqli_query($conexion,$consulta);

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
              <a onClick="alert(\'Ya tiene un trabajo enviado\')"><img src="opciones/cargar.png"></a>
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
              <td></td>
              <td></td>';
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
              while ($renglon31=mysqli_fetch_array($dFinal)) {
                 if ($tareaTipo==0) {
              echo '<a href="javascript:eliminar_trabajo_estudiante('.$renglon31['idTareaDetalle'].', '.$idMateria.', '.$idSesion.');"><img src="opciones/eliminar.png"></a>';
              echo '</td></tr>'; 
              }else{
                echo '<a href="javascript:eliminar_trabajo_estudiante_final('.$renglon31['idTareaDetalle'].', '.$idMateria.', '.$idSesion.');"><img src="opciones/eliminar.png"></a>';
              echo '</td></tr>'; 
              }
            }
            }
      }
            ?>
      </tbody>    
       </table>
        </div>
          </div>


<?php 

if ($tareaTipo==0) {
?>
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
<?php
}else{
?>

<script type="text/javascript">
         function regresarSesion(idSesion,idMateria){
      $('#contenido').load("php/listar_tareacomun.php?idSesion="+idSesion, "idMateria="+idMateria);
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


<?php

}

?>