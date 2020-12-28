 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    
    $id_Posgrado = intval($_GET['id_Posgrado']);

     require('conexion.php');

    $sql= "SELECT g.nombre_posgrado
           FROM catg_posgrado AS g
          WHERE id='$id_Posgrado'
                    ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
              $nombre_grupo = $renglon['nombre_posgrado'];
            }

?>
 <script src="js/myjava.js"></script>
<center>

                       <!-- <form>
                          <label> Seleccione el grupo:</label>
                          <select class="form-control">
                            
                          </select>
                        </form>-->
                             
          <div class="card mb-3" name="agrega-registros"  id="agrega-registros">
        <div class="card-header">

          <i class="fa fa-table"></i> Grupos / <?php echo $nombre_grupo; ?>
           
          <div align="right">
          <button type="button" class="btn btn-dark" id="regresar">Regresar</button>
          </div>
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
              <?php

               
                 
            $sql= "SELECT g.idGrupo, g.NombreGrupo, g.Periodo, stg.Estatus
                    FROM catg_grupo AS g
                    INNER JOIN sta_grupos AS stg ON stg.id=g.Estatus
                    WHERE g.Eliminado=0 AND idPosgrado='$id_Posgrado' 
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
            <td>'.date("d-m-Y", strtotime($renglon['Periodo'])).'</td>
            <td>'.$renglon['Estatus'].'</td>
            <td>
            <a href="javascript:listar_alumnos('.$id.');">
            <img src="opciones/estudianteicon.png"></a>

                 
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table>
            </div>

 
      </div>
 
</div>

  <script type="text/javascript">
   function listar_materias(id){
      $('#contenido').load("php/posgrado/listar_clasesgenericas.php?id="+id);
  }
          $('#regresar').click(function(){
            $('#contenido').load("php/listar_posgradoindexpago.php");
        });
 function listar_alumnos(idPosgrado){
  $('#contenido').load("php/listar_pagosNuevo1.php?idPosgrado="+idPosgrado);

}


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
else{
    header("location:index.html");
}
?>