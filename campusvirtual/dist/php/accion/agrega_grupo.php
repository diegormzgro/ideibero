<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro = $_POST['pro'];
$Nombre_Grupo = $_POST['Nombre_Grupo'];
$Periodo = $_POST['Periodo'];
$id=$_POST['id'];
$idPosgrado=$_POST['idPosgrado'];
session_start();
//VERIFICAMOS EL PROCESO
$perfil=$_SESSION['emailInst'];
switch($pro){
  case 'Registro':
    $sql = "INSERT INTO catg_grupo (NombreGrupo, Periodo, idPosgrado) ".  "VALUES ('$Nombre_Grupo', '$Periodo', '$idPosgrado')";
 
    $datos = mysqli_query($conexion,$sql);
    
  break;
  
  case 'Edicion':
    $sql= "UPDATE catg_grupo SET NombreGrupo='$Nombre_Grupo', Periodo='$Periodo'  WHERE idGrupo='$id'";
    $datos = mysqli_query($conexion,$sql);
    
  break;

}

    $sql= "SELECT g.nombre_posgrado
           FROM catg_posgrado AS g
          WHERE id='$idPosgrado'
                    ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
              $nombre_posgrado = $renglon['nombre_posgrado'];
            }
echo '


        <div class="card-body">
                <div class="card-header">

          <i class="fa fa-table"></i> Grupos /'; echo $nombre_posgrado; 
        echo '           
          <center>
          <button type="button" class="btn btn-dark" id="regresar">Regresar</button>
          </center>
          </div>
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre del Grupo</th>
                  <th>Periodo</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
';


                       $sql= "SELECT g.idGrupo, g.NombreGrupo, g.Periodo, stg.Estatus
                    FROM catg_grupo AS g
                    INNER JOIN sta_grupos AS stg ON stg.id=g.Estatus
                    WHERE g.Eliminado=0 AND g.idPosgrado='$idPosgrado' ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador + 1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreGrupo'].'</td>
            <td>'.date("d-m-Y", strtotime($renglon['Periodo'])).'</td>
            <td>'.$renglon['Estatus'].'</td>
            <td>
               <a href="javascript:listar_materias('.$renglon['idGrupo'].');"><i class="fas fa-search"></i></a>
            <a href="javascript:listar_alumnos('.$renglon['idGrupo'].');"><i class="btn-outline-success fas fa-address-book"></i></a>
              <a href="javascript:editarGrupo('.$renglon['idGrupo'].');"><i class="btn-outline-primary fas fa-pencil-alt"></i></a>
              <a href="javascript:eliminar_grupo('.$renglon['idGrupo'].');"><i class="btn-outline-danger fas fa-times"></i></a>
              
            </td>

            </tr>';

                    }


            echo '  </tbody>
             
            </table>
</div>
 
      </div>
 


   ';        
 


 include("../modal/modal_grupos.php");
            ?>
 

    <script type="text/javascript">
       $('#regresar').click(function(){
            $('#contenido').load("php/listar_posgradoindex.php");
        });
 
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

           buttons: [
               {
                   extend: 'colvis',
                   collectionLayout: 'fixed two-column'
               },

           ],




          
             } );
        } );
</script>