 <!DOCTYPE html>
 <html>

<script src="js/myjava.js"></script>
<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro = $_POST['pro'];
$id=$_POST['id'];

$nombre = $_POST['nombre'];
$primer_ap = $_POST['primer_ap'];
$segundo_ap = $_POST['segundo_ap'];
$titulo = $_POST['titulo'];

$email = $_POST['email'];
$emailInst = $_POST['emailInst'];
$telefono = $_POST['telefono'];

session_start();
//VERIFICAMOS EL PROCESO


switch($pro){
	case 'Registro':
		$sql = "INSERT INTO catg_catedratico (titulo,nombre, ap_paterno, ap_materno, email, emailInst) ".  "VALUES ($titulo, '$nombre', '$primer_ap', '$segundo_ap', '$email', '$emailInst')";
   
		$datos = mysqli_query($conexion,$sql);
		
	break;
	
	case 'Edicion':
		$sql= "UPDATE catg_catedratico SET titulo='$titulo', email='$email', emailInst='$emailInst',  cv='$file_name2', foto='$file_name1' WHERE id='$id'";
		$datos = mysqli_query($conexion,$sql);
		
	break;

}
         
    $sql= "SELECT  u.id, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst
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
             
                      
    <script type="text/javascript">
    
    $(document).ready(function() {
        $('#dataTable').DataTable({
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
             });
        } );


</script>
