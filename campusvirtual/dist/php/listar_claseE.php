 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Materias</h1></center>
                        
                        
                             
          <div id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> Tareas 
 
 

        </div>
        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Posgrado</th>
                  <th>Materia</th>
                  <th>Nombre de tarea</th>
                  <th>Descripción</th>
                  <th>Link</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "SELECT l.Perfil, l.Correo, l.Pass, p.nombre_posgrado AS Posgrado, ma.Materia, t.TituloTarea, t.Descripcion, t.Link, t.idTarea
                  FROM login AS l
                  INNER JOIN catg_posgrado AS p ON p.id= l.idPosgrado
                  INNER JOIN catg_materias AS ma ON ma.idPosgrado= p.id
                  INNER JOIN catg_tareas AS t ON t.idMateria= ma.idMateria
                  WHERE Perfil='Alumno' AND l.Eliminado=0 AND l.Correo='".$perfil."'";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
            echo '<tr>
            <td>'.$renglon['idTarea'].'</td>
            <td>'.$renglon['Posgrado'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>'.$renglon['TituloTarea'].'</td>
            <td>'.$renglon['Descripcion'].'</td>
            <td>'.$renglon['Link'].'</td>
            <td>
              <a href="javascript:editarClase('.$renglon['idTarea'].');"><i class="btn-outline-primary fas fa-pencil-alt"></i></a>
              <a href="javascript:eliminar_clase('.$renglon['idTarea'].');"><i class="btn-outline-danger fas fa-times"></i></a>
               <a id="tarea"><i class="btn-outline-warning fas fa-eye"></i></a>
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
                        <?php  include("modal/modal_clase.php"); include("modal/modal_tarea.php");?>

    <script type="text/javascript">
 
          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
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