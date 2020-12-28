 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
?>
 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Materias</h1></center>
                        
                        
                             
          <div id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> Clases 
 
 <center>
 <div class="row">
<div class="col">
     <button type="button" class="btn btn-primary" id="form">Nueva Clase</button>
    </div>
   <div class="col">
     <button type="button" class="btn btn-danger" id="Calendario">Sesiones</button>
    </div>
        <div class="col">
     <button type="button" class="btn btn-success" id="nueva_lectura">Nueva Lectura</button>
    </div>
     <div class="col">
     <button type="button" class="btn btn-info" id="nueva_tarea">Nuevo Trabajo</button>
    </div>
  </div>
  </div>
</center>

        </div>
        <div class="card-body">
          <div class="table-responsive" id="table">
<?php 
if ($perfil==='Control Escolar') {

?>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Posgrado</th>
                  <th>Materia</th>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= " SELECT p.abrev, cm.idMateria,cm.Materia, d.ap_paterno, d.ap_materno, d.nombre, d.titulo, d.correo 
                    FROM catg_materias as cm
                    INNER JOIN catg_docentes AS d ON d.idDocente= cm.idDocente
                    INNER JOIN catg_posgrado AS p ON p.id=cm.idPosgrado
                    WHERE cm.Eliminado=0 AND d.eliminado=0 ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
            echo '<tr>
            <td>'.$renglon['idMateria'].'</td>
            <td>'.$renglon['abrev'].'</td>
             <td>'.$renglon['Materia'].'</td>
            <td>'.$renglon['nombre'].'</td>
            <td>'.$renglon['ap_paterno'].'</td>
            <td>'.$renglon['ap_materno'].'</td>
            <td>
            
              <a href="javascript:eliminar_clase('.$renglon['idMateria'].');"><i class="btn-outline-danger fas fa-times"></i></a>
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>
<?php 
}else{ 
?>

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Materia</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= " SELECT cm.idMateria,cm.Materia, d.ap_paterno, d.ap_materno, d.nombre, d.titulo, d.correo 
                    FROM catg_materias as cm
                    INNER JOIN catg_docentes AS d ON d.idDocente= cm.idDocente
                    WHERE cm.Eliminado=0 AND d.eliminado=0 AND d.correo='".$correo."'";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
            echo '<tr>
            <td>'.$renglon['idMateria'].'</td>
            <td>'.$renglon['nombre'].'</td>
            <td>'.$renglon['ap_paterno'].'</td>
            <td>'.$renglon['ap_materno'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>
            
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>

<?php 
}
?>
 
      </div>
 
</div></div>
                        </div>
                        <?php  include("modal/modal_clase.php"); include("modal/modal_tarea.php");
                        include("modal/modal_lectura.php");
                        ?>

    <script type="text/javascript">
 
          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
        });      
          $('#form').click(function(){

            $('#contenido').load("php/modal/form_archivo.php");
        });

          $('#Calendario').click(function(){

            $('#contenido').load("php/listar_calendarioprograma.php");
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