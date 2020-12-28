<?php
session_start();

include('../conexion.php');

 
$id = $_POST['id'];
 
//VERIFICAMOS EL PROCESO
$perfil=$_SESSION['emailInst'];
//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_tareas SET Eliminado = 1 WHERE idTarea = '$id' ";
$registro = mysqli_query($conexion,$sql);

 $consulta ="SELECT a.idMateria, a.idSesion,t.idPosgrado 
 FROM catg_sesiones a 
 INNER JOIN catg_tareas as l ON l.idMateria= a.idSesion

INNER JOIN catg_asignacion_docente AS d ON d.id= a.idMateria

INNER JOIN catg_asignatura AS t ON t.idMateria = d.idAsignatura 
WHERE l.idTarea = '$id'
";
 
       mysqli_set_charset($conexion,"utf8");
       $datos = mysqli_query($conexion,$consulta);
            while ($renglon=mysqli_fetch_array($datos)) {
      $idAsignacion=$renglon['idMateria'];
      $idSesion=$renglon['idSesion'];
      $idPosgrado=$renglon['idPosgrado'];
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




  <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable"  >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Sesión</th>
                  <th>Título</th>
                  <th>Descripcion</th>
                  <th>Entrega</th>
                  <th>Enlace</th>
                  <th>Archivo</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

            $sql= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
                    INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
                    INNER JOIN catg_asignacion_docente AS d ON s.idMateria=d.id
                    INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                    INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                    
                    WHERE t.idMateria='".$idSesion."' AND s.Eliminado=0 AND t.Eliminado=0 AND t.Tarea_tipo=0";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
           echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreSesion'].'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>
              <td>'.date("d-m-Y", strtotime($renglon['FechaEntrega'])).'</td>'
            ;

                     
            if ($renglon['Link']!='') {
            echo '<td><a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png"></a></td>';
            }else{
              echo "<td></td>";
            }
            if ($renglon['Archivo']!='') {
              echo '<td><a href="archivos/Tareas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo "<td></td>";
            }
            echo '<td>
              <a href="javascript:editarTarea('.$renglon['idTarea'].','.$idPosgrado.');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_tarea('.$renglon['idTarea'].');"><img src="opciones/eliminar.png"></a>
              
              
            </td>

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