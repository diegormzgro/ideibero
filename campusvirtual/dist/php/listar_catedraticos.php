
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
<center> <h1 class="mt-4">Catedráticos</h1></center>
        <center>
         <button type="button" class="btn btn-success" id="nuevo_docenteDatos">Nuevo Catedrático</button>
       </center>
                                   
            
        <div class="card-header">
          <i class="fa fa-table"></i> Perfil 
            <div class="col" align="right">
              <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
            </div>
        </div>

        <div class="card-body">
          <div class="table-responsive" id="table">
            <table class="table table-striped table-bordered" id="dataTable"  cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Correo</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody id="agrega-registros">
              <?php

                require('conexion.php');

            $sql= "SELECT  u.id, u.titulo, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst
              
                    FROM catg_catedratico as u

                    WHERE u.eliminado=0";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
            $contador = $contador +1;
            echo '<tr>

            <td>'.$contador.'</td>
            <td>'.$renglon['nombre'].'</td>
            <td>'.$renglon['ap_paterno'].'</td>
            <td>'.$renglon['ap_materno'].'</td>
            <td>'.$renglon['emailInst'].'</td>
            <td>
              <a href="javascript:editarPerfilCatedratico('.$renglon['id'].');"><i class="btn-outline-primary fas fa-pencil-alt"></i></a>
              <a href="javascript:listar_calificacionesDocente('.$renglon['id'].');"><i class="btn-outline-success far fa-eye"></i>

              <a href="javascript:eliminarPerfilCatedratico('.$renglon['id'].');"><i class="btn-outline-danger fas fa-times"></i></a>
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table>
            </div>
 
      </div>
 

                        <?php  
                        include("modal/modal_docente.php");
                        include("modal/form_perfildocente.php");
                        

                        ?>
                     
    <script type="text/javascript">

         // $('#Nuevo_docente').click(function(){
         //   $('#contenido').load("php/modal/form_perfildocente.php");
        //});
    
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
             });
        } );


</script>
 
  <?php

}
else{
    header("location:index.html");
}
?>