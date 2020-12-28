
  <script src="js/myjava.js"></script>

<center>
                        <h1 class="mt-4">Seminarios, Cursos y Conferencias Magistrales</h1></center>
                        
            <center><button type="button" class="btn btn-primary" id="nuevo_alumno">Nuevo Interesado</button></center>
               
  		 
        <div class="card-header">
          <i class="fa fa-table"></i> Aspirantes
          
           <div class="col" align="right">
                    <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
            </div>
        </div>
         <div class="card mb-3"  id="agrega-registros">
        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Fecha de registro</th>
                  <th>Nombre</th>
                  <th>Ap Paterno</th>
                  <th>Ap Materno</th>
                  <th>Teléfono</th>
                  <th>Email</th>
                  <th>Interes</th>
                  <th>Acción</th>
                </tr>
              </thead>
      <tbody>
                     <?php

                require('conexion.php');

            $sql= "SELECT  u.id, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst,  p.abrev AS Posgrado, IF(u.bloqueado=1,'Bloqueado','Activo') AS estatus, u.email_particular, u.tel_celular, u.fecha_registro
FROM usuario_activo as u
INNER JOIN catg_posgrado as p ON p.id= u.id_posgrado
WHERE  u.emailInst ='' AND u.eliminado=0 AND u.id_posgrado > 4
ORDER BY u.ap_paterno, u.ap_materno, u.nombre
";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador =0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador +1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['fecha_registro'].'</td>
            <td>'.$renglon['nombre'].'</td>
            <td>'.$renglon['ap_paterno'].'</td>
            <td>'.$renglon['ap_materno'].'</td>
            <td>'.$renglon['tel_celular'].'</td>
            <td>'.$renglon['email_particular'].'</td>
            <td>'.$renglon['Posgrado'].'</td>
            <td>
              <a title="Ver perfil del alumno" href="javascript:editarInteresado('.$renglon['id'].');">
              <img src="opciones/editar.png">
              </a>
              ';
              if ($renglon['estatus']=='Activo') {
                echo '<a href="javascript:eliminarAlumno('.$renglon['id'].');"><i class="btn-outline-danger fas fa-times"></i></a>';              
            }else{
              echo '<a href="javascript:activaAlumno('.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>'; 
              }
              
              echo '
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>

        </div>
 
      </div>
 <?php  include("modal/modal_curso.php"); ?>

                        </div>

	<script type="text/javascript">
 
           $('#AdmisionHistorica').click(function(){
            $('#contenido').load("php/listar_admision_historico.php");
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
 