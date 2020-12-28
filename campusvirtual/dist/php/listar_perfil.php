 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $id = intval($_GET['id']);
?>

 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Estudiantes</h1></center>
                  
           <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> Perfil 
    <div class="col" align="right">
     <?php echo '<a href="javascript:regresar('.$id.');">'; 
          ?>
     <button type="button" class="btn btn-dark">Regresar</button>
   </a>
    </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Posgrado</th>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "SELECT  u.id, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst,  p.abrev AS Posgrado, pe.NombrePerfil AS Perfil, IF(u.bloqueado=1,'Bloqueado','Activo') AS estatus
FROM usuario_activo as u
INNER JOIN catg_posgrado as p ON p.id= u.id_posgrado
INNER JOIN catg_perfil as pe On pe.idPerfil= u.id_perfil
WHERE u.id_perfil<>0 AND u.id_grupo='$id' AND u.emailInst<>''
ORDER BY u.ap_paterno, u.ap_materno, u.nombre
";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador =0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador +1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['Posgrado'].'</td>
            <td>'.$renglon['nombre'].'</td>
            <td>'.$renglon['ap_paterno'].'</td>
            <td>'.$renglon['ap_materno'].'</td>
            <td>'.$renglon['estatus'].'</td>
            <td>
              <a title="Ver perfil del alumno" href="javascript:editarPerfil('.$renglon['id'].');">
              <img src="opciones/editar.png">
              </a>
              <a title="Ver carga reticular" href="javascript:listar_calificaciones('.$renglon['id'].');">
              <i class="btn-outline-success far fa-eye"></i></a>';
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
 
</div></div>
                        </div>
   <?php  include("modal/modal_admision.php"); ?>

  
    <script type="text/javascript">
     function regresar(id){
      $('#contenido').load("php/listar_grupos.php?id_Posgrado="+id);
      }
//        $('#Nuevo_alumno').click(function(){
  //          $('#contenido').load("php/modal/form_perfile.php");
    //    });


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