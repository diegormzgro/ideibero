 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Tareas</h1></center>
                        
                        
                             
          <div id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> Clases 
           
          <center><button type="button" class="btn btn-info" id="nueva_tarea">Nueva Tarea</button></center>
           
        </div>
        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo tarea</th>
                  <th>Descripcion</th>
                  <th>Link</th>
                  <th>Materia</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "SELECT t.idTarea, t.TituloTarea, t.Descripcion, t.Link, m.Materia, d.correo
                    FROM catg_tareas AS t
                    INNER JOIN catg_materias AS m ON m.idMateria= t.idMateria
                    INNER JOIN catg_docentes AS d ON d.idDocente= m.idDocente
                    WHERE t.Eliminado=0 AND d.correo='".$perfil."'";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
            echo '<tr>
            <td>'.$renglon['idTarea'].'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>
            <td>'.$renglon['Link'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>
              <a href="javascript:editarTarea('.$renglon['idTarea'].');"><i class="btn-outline-primary fas fa-pencil-alt"></i></a>
              <a href="javascript:eliminar_tarea('.$renglon['idTarea'].');"><i class="btn-outline-danger fas fa-times"></i></a>
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>

 
      </div>
 
</div></div>
                        </div>
                        <?php  include("modal/modal_tarea.php"); ?>

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
      "scrollY": "500px",
      "scrollX":        true,
      "scrollCollapse": true,
      "paging":         false,
      "autoWidth": false,
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
else{
    header("location:index.html");
}
?>