 <script src="js/myjava.js"></script>
<?php
session_start();

include('../conexion.php');

 
$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO
$sql = "SELECT * FROM catg_grupo WHERE idGrupo = '$id'";
$datos = mysqli_query($conexion,$sql);
while ($renglon=mysqli_fetch_array($datos)) {
           $idPosgrado= $renglon['idPosgrado'];
            }

$sql= "SELECT g.nombre_posgrado  FROM catg_posgrado AS g WHERE id='$idPosgrado'
                    ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
              $nombre_grupo = $renglon['nombre_posgrado'];
            }
//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_grupo SET Eliminado = 1 WHERE idGrupo = '$id' ";
$registro = mysqli_query($conexion,$sql);

 echo '

       <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">

          <i class="fa fa-table"></i> Grupos /';  echo $nombre_grupo; 
    echo '       
          <center>
          <button type="button" class="btn btn-dark" id="regresar">Regresar</button>
          </center>
          </div>
          <br> 

        <div class="card-body">
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
                    WHERE g.Eliminado=0 AND idPosgrado='$idPosgrado'
                    ";


               $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador + 1;
              $id = $renglon['idGrupo'];
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreGrupo'].'</td>
            <td>'.date("d-m-Y", strtotime($renglon$renglon['Periodo'])).'</td>
            <td>'.$renglon['Estatus'].'</td>
            <td>
             <a href="javascript:listar_materias('.$renglon['idGrupo'].');">
             <img src="opciones/plan.png">
             </i></a>
            <a href="javascript:listar_alumnos('.$id_Posgrado.');">
            <img src="opciones/estudianteicon.png"></a>
              <a href="javascript:editarGrupo('.$renglon['idGrupo'].');">
              <img src="opciones/editar.png"></a></a>
              <a href="javascript:eliminar_grupo('.$renglon['idGrupo'].');"><img src="opciones/eliminar.png"></a></a>
                 
            </td>

            </tr>';


                    }


            echo '  </tbody>
             
            </table>
</div>
 
      
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