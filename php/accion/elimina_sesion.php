<?php
session_start();

include('../conexion.php');

 
$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO
$sql = "SELECT s.idSesion, d.id
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 WHERE s.idSesion='$id'";

$registro = mysqli_query($conexion,$sql);
while ($renglon=mysqli_fetch_array($registro)) {
$idAsignacion= $renglon['id'];
  } 


$sql = "UPDATE catg_sesiones SET Eliminado = 1 WHERE idSesion = '$id' ";
$registro = mysqli_query($conexion,$sql);

echo '
<script src="js/myjava.js"></script>
 <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
                           <thead>
                <tr>
                 <th>ID</th>
                  <th>Sesión</th>
                  <th>Fecha</th> 
                  <th>Inicia</th>
                  <th>Finaliza</th>
                  <th>Directo</th>
                  <th>Diferido</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>';
           

                //$id_Posgrado = intval($_GET['id_Posgrado']);

$sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE  d.id='$idAsignacion'AND s.Eliminado=0
ORDER BY s.FechaSesion ASC";
 
            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreSesion'].'</td>
            <td>'.$renglon['FechaSesion'].'</td>
            <td>'.$renglon['HoraInicio'].'</td>
            <td>'.$renglon['HoraTermino'].'</td>';
            if ($renglon['LinkDiferido'] <> '') {
              echo '           
            <td>
               <button class="btn btn-secondary">
                <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
              </button>
            </td>
            <td>
            <a href="'.$renglon['LinkDiferido'].'"  target="_blank">
            <button class="btn btn-primary">
            <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
            </button>

            </a>
            </td>
            ';
            }else{
              echo '
            <td>
            <a href="'.$renglon['Link'].'"  target="_blank">
            <button class="btn btn-danger"  >

            <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
                        </button>
            </a>
            </td>

            <td>
                  <button class="btn btn-secondary">
                <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
              </button>
            </td>
            
              ';
            }


            echo '<td style=" white-space: nowrap;">

              <a href="javascript:listarLecturas('.$renglon['idSesion'].');" title="Lecturas">
              <img class="img-fluid"  src="opciones/lectura.png"></a>    
              <a href="javascript:listarTrabajos('.$renglon['idSesion'].');" title="Trabajos">
              <img class="img-fluid"  src="opciones/trabajo.png">
              </a>
              <a href="javascript:editarSesion('.$renglon['idSesion'].');" title="Editar Sesión">
              <img class="img-fluid"  src="opciones/editar.png"></a>
              <a href="javascript:eliminar_sesion('.$renglon['idSesion'].');" title="Elimar Sesión">
              <img class="img-fluid"  src="opciones/eliminar.png"></a>
              
            </td>

            </tr>';

                    }
                     
            ?>
              </tbody>
             
            </table>

            <?php include("../modal/modal_sesion.php"); ?>

    <script type="text/javascript">
 
 
      $(document).ready(function() {

        $('#dataTable').DataTable( {

          responsive: true,
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





          
             } );
        } );
</script>
