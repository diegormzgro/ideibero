
  <script src="js/myjava.js"></script>

<center>
                        <h1 class="mt-4">Admisiones</h1></center>
                        
 
                             
  		 
        <div class="card-header">
          <i class="fa fa-table"></i> Aspirantes
           <div class="col" align="right">
                <button type="button" class="btn btn-dark" id="Admision">Regresar</button>
                </div>
        </div>
         <div class="card mb-3"  id="agrega-registros">
        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fecha inicial</th>
                  <th>Nombre</th>
                  <th>Ap Paterno</th>
                  <th>Ap Materno</th>
                  <th>Teléfono</th>
                  <th>Email</th>
                  <th>Interes</th>
                  <th>Status</th>
                </tr>
              </thead>
			<tbody>
              <?php

                require('conexion.php');

			$sql= "SELECT u.*, p.abrev, e.estatus
					FROM usuario AS u 
					INNER JOIN catg_posgrado AS p ON p.id=u.id_posgrado
					INNER JOIN estatus AS e ON e.id=u.`status`
					WHERE u.eliminado=0";

			$datos = mysqli_query($conexion,$sql);
 			mysqli_set_charset($conexion,"utf8");
			while ($renglon=mysqli_fetch_array($datos)) {
        	echo '<tr>
      		<td>'.$renglon['id'].'</td>
       		<td>'.$renglon['fecha_inicio'].'</td>
       		<td>'.$renglon['nombre'].'</td>
			<td>'.$renglon['ap_paterno'].'</td>
       		<td>'.$renglon['ap_materno'].'</td>
       		<td>'.$renglon['telefono'].'</td>
       		<td>'.$renglon['email'].'</td>
			<td>'.$renglon['abrev'].'</td>
       		<td>'.$renglon['estatus'].'</td>


      		</tr>';

					}
			?>
              </tbody>
             </div>
            </table>

        </div>
 
      </div>
 <?php  include("modal/modal_admision.php"); ?>

                        </div>

	<script type="text/javascript">
        $('#Admision').click(function(){
            $('#contenido').load("php/listar_admision.php");
            $('.tooltip').remove();
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
 