<script src="js/myjava.js"></script>

<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro2 = $_POST['pro2'];
$materia = $_POST['idSesion'];
$Titulo = $_POST['Titulo'];
$descripcion = $_POST['descripcion'];
$Link = $_POST['Link'];
$id=$_POST['id2'];
$idSesion = $_POST['idSesion'];
if (isset($_POST['idPosgrado'])){

  $idPosgrado = $_POST['idPosgrado'];
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

  }else{
    $idPosgrado = $idPosgrado;

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


$perfil=$_SESSION['emailInst'];

$fecha = $_POST['fecha'];



$micarpeta = "../../archivos/Tareas/$posgrado";

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);

}else{

}


switch($pro2){
        case 'Registro':

      if ($_FILES['lectura']['name']!="") {

          $archivo = $_FILES['lectura'];
          $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        
          $nombre = $_FILES['lectura']['name'];
          if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {
          $sql = "INSERT INTO catg_tareas (idMateria, TituloTarea, Descripcion, Link, Archivo, FechaEntrega, Tarea_tipo) ".  "VALUES ($materia, '$Titulo', '$descripcion', '$Link', '$nombre', '$fecha', 1)";
          $datos = mysqli_query($conexion,$sql);
         
          break;
          } 

          }else{
         $sql = "INSERT INTO catg_tareas (idMateria, TituloTarea, Descripcion, Link, FechaEntrega, Tarea_tipo) ".  "VALUES ($materia, '$Titulo', '$descripcion', '$Link','$fecha', 1)";
          $datos = mysqli_query($conexion,$sql);
          break;
          }


  
  case 'Edicion':
        if ($_FILES['lectura']['name']!="") {

            $archivo = $_FILES['lectura'];
            $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
          
            $nombre = $_FILES['lectura']['name'];
            if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {
           $sql= "UPDATE catg_tareas SET  
           TituloTarea='$Titulo', Descripcion='$descripcion', 
           Link='$Link', Archivo='$nombre', FechaEntrega='$fecha'  WHERE idTarea='$id'";
            $datos = mysqli_query($conexion,$sql);
            break;
          }
      }else{
            $sql= "UPDATE catg_tareas SET TituloTarea='$Titulo', 
            Descripcion='$descripcion', Link='$Link',FechaEntrega='$fecha'  WHERE idTarea='$id'";
            $datos = mysqli_query($conexion,$sql);
            break;

        }
    }
 
  
  include("../modal/modal_tareafinal.php");
            ?>
 


  <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable"  >
              <thead>
                <tr>

                  <th style="vertical-align : middle;text-align:center;">ID</th>
                  <th  style="vertical-align : middle;text-align:center;">Título</th>
                  <th style="vertical-align : middle;text-align:center;">Descripción</th>
                  <th style="vertical-align : middle;text-align:center;">Entrega</th>
                  <th style="vertical-align : middle;text-align:center;">Enlace</th>
                  <th style="vertical-align : middle;text-align:center;">Archivo</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php
              if ($id) {
                            $consulta= "SELECT a.idPosgrado, t.idMateria, t.idMateria FROM catg_tareas AS t
                    INNER JOIN catg_asignacion_docente AS d ON t.idMateria=d.idAsignatura
                    INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                    INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                    WHERE t.idTarea='$id' ";  
            $datos = mysqli_query($conexion,$consulta);
            while ($renglon=mysqli_fetch_array($datos)) {
                    $idPosgrado = $renglon['idPosgrado'];
                   $idMateria = $renglon['idMateria'];

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
              $materia=$idMateria;

              }


            $sqlFinal= "SELECT t.* FROM catg_tareas AS t
                        
                        INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura=t.idMateria
                        INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                        INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                        WHERE d.Eliminado=0 AND a.idMateria='$materia' AND t.Tarea_tipo=1 AND t.Eliminado=0
                        ORDER BY t.idTarea 
                         ";
            $datos = mysqli_query($conexion,$sqlFinal);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
             while ($renglon=mysqli_fetch_array($datos)) {
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
            echo '
            <td>
              <a href="javascript:editarTareaFinal('.$renglon['idTarea'].','.$idPosgrado.');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_tarea_final('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a>
    


            </td>
            ';

              echo '
            
            </tr>';
                    }

            ?>
              </tbody>
             </div>
            </table>


    <script type="text/javascript">
 
 
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