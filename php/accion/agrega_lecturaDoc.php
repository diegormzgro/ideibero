<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include('../conexion.php');
$id2 = $_SESSION['id'];
$id=$_POST['idLec'];
$pro = $_POST['proLec'];

$Titulo = $_POST['TituloLec'];
$descripcion = $_POST['descripcionLec'];
$link = $_POST['Liga'];
$idSesion = $_POST['idSesion'];
$idPosgrado = $_POST['idPosgrado'];
$posgrado= $idPosgrado;





$perfil=$_SESSION['emailInst'];


if ($posgrado==1) {
  $posgrado = "MDCDH";
}elseif ($posgrado == 2) {
  $posgrado = "MDE";
}elseif($posgrado == 3){
  $posgrado = "DDCDH";
}else{
  $posgrado = "DDE";
}

$micarpeta = "../../archivos/Lecturas/$posgrado";

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);

}else{

}

switch($pro){
      	case 'Registro':

      if ($_FILES['Archivo']['name']!="") {

          $archivo = $_FILES['Archivo'];
          $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        
          $nombre = $_FILES['Archivo']['name'];
          if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {
          $sql = "INSERT INTO catg_lecturas (idMateria, TituloLectura, Descripcion, Archivo, Link) ".  "VALUES ($idSesion, '$Titulo', '$descripcion', '$nombre', '$link')";
          $datos = mysqli_query($conexion,$sql);
         
          break;
          } 

          }else{
          $sql = "INSERT INTO catg_lecturas (idMateria, TituloLectura, Descripcion, Link) ".  "VALUES ($idSesion, '$Titulo', '$descripcion', '$link')";
          $datos = mysqli_query($conexion,$sql);
          break;
          }


	
	case 'Edicion':
        if ($_FILES['Archivo']['name']!="") {

            $archivo = $_FILES['Archivo'];
            $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
          
            $nombre = $_FILES['Archivo']['name'];
            if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {
        		$sql= "UPDATE catg_lecturas SET TituloLectura='$Titulo', Descripcion='$descripcion', Archivo='$nombre', Link='$link' WHERE idLectura='$id'";
        		$datos = mysqli_query($conexion,$sql);
        		break;
          }
      }else{
            $sql= "UPDATE catg_lecturas SET TituloLectura='$Titulo', Descripcion='$descripcion', Link='$link' WHERE idLectura='$id'";
            $datos = mysqli_query($conexion,$sql);
            break;

        }
    }

    $consulta= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE s.idSesion='$idSesion' AND s.Eliminado=0 AND d.Eliminado=0
 ";
 
    $datos2 = mysqli_query($conexion,$consulta);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos2)) {
            $NombreSesion = $renglon['NombreSesion'];
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idGrupo = $renglon['idGrupo'];
            $idPosgrado = $renglon['idPosgrado'];
            $idMateria = $renglon['idMateria'];
                }

?>

         

 

        <div class="card-body">
          <div class="table-responsive" id="table">
<?php if($_SESSION['Perfil']=='Control Escolar' ){
  echo '
             <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Sesión</th>
                  <th>Titulo Lectura</th>
                  <th>Descripción</th>
                  <th>Archivo</th>
                </tr>
              </thead>
            <tbody>';


            $sql= " SELECT *
                    FROM catg_lecturas as cm WHERE cm.idMateria='$idSesion' AND cm.Eliminado=0
                   ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
          $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador + 1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td style=" text-align:justify;">'.$renglon['NombreSesion'].'</td>
            <td style=" text-align:justify;">'.$renglon['TituloLectura'].'</td>
            <td style=" text-align:justify;">'.$renglon['Descripcion'].'</td><td>';
            if ($renglon['Link']!='') {
              echo '<a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png" >
            </a>';
            }else{
              echo "";
            }
            if ($renglon['Archivo']!='') {
              echo '<a href="archivos/Lecturas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a>';
            }else{
              echo "";
            }

            if ($_SESSION['Perfil']=='Docente') {
             echo '
              <a href="javascript:editarLectura('.$renglon['idLectura'].','.$idPosgrado.');">
              <img src="opciones/editar.png">
              </a>
              <a href="javascript:eliminar_lectura('.$renglon['idLectura'].');">
              <img src="opciones/eliminar.png">
              </a>
             ';
            }
                    }
                  }else{

        echo '
       <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo Lectura</th>
                  <th>Descripción</th>
                  <th>Enlace</th>
                  <th>Archivo</th>
                  <th>Acción</th>
                 
                </tr>
              </thead>
            <tbody>';

               

            $sql= "SELECT cm.*, s.NombreSesion
                    FROM catg_lecturas as cm
            INNER JOIN catg_sesiones AS s ON s.idSesion= cm.idMateria
            INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
            INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
            WHERE cm.Eliminado=0 AND d.Estatus=1 AND a.Eliminado=0  AND d.idDocente='$id2' AND a.idMateria='$idMateria' AND s.idSesion='$idSesion'
            ORDER BY s.idSesion, cm.idLectura
                   ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
           $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador + 1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td style=" text-align:justify;">'.$renglon['TituloLectura'].'</td>
            <td style=" text-align:justify;">'.$renglon['Descripcion'].'</td>';
            if ($renglon['Link']!='') {
              echo '<td><a href="'.$renglon['Link'].'" target="_blank" ><img src="opciones/link.png" >
            </a></td>';
            }else{
              echo "<td></td>";
            }
            if ($renglon['Archivo']!='') {
              echo '<td><a href="archivos/Lecturas/'.$posgrado.'/'.$renglon['Archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a></td>';
            }else{
              echo "<td></td>";
            }

            if ($_SESSION['Perfil']=='Docente') {
             echo '<td>
              <a href="javascript:editarLectura('.$renglon['idLectura'].','.$idPosgrado.');">
              <img src="opciones/editar.png">
              </a>
              <a href="javascript:eliminar_lectura('.$renglon['idLectura'].');">
              <img src="opciones/eliminar.png">
              </a>
             ';
            }


            echo '
            </td>';





            echo '</tr>';

                    }     
            }
            ?>
              </tbody>
             </div>
            </table>

 
      </div>
 
</div></div>
                        </div>
        <?php include("../modal/modal_lecturaDoc.php");?>
    <script type="text/javascript">
        function regresarlectura(id){
      $('#contenido').load("php/listar_lecturaComun.php?idMateria="+id);
      }
      function regresarAula(id){
      $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);
      }
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