<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include('../conexion.php');
$pro = $_POST['pro'];
$idAlumno = $_POST['idAlumno'];
$id=$_POST['id'];
$Alumno= $_POST['idAlumno'];
    $Asignatura = $_POST['idMateria'];
  
$Calificacion = $_POST['calificacion'];
$perfil=$_SESSION['Perfil'];
if ($perfil=='Docente') {
$idDocente = $_SESSION['id'];
}else{
      $sql = "SELECT * FROM catg_calificaciones WHERE idCalificacion='$id' ";

    $datos = mysqli_query($conexion,$sql);
$filas = mysqli_num_rows($datos);
if ($filas>0) {
    while ($renglon=mysqli_fetch_array($datos)) {
      $idDocente = $renglon['idDocente'];
      $idAlumno = $renglon['idAlumno'];
    }
}else{


  $sql = "SELECT * FROM catg_asignacion_docente WHERE Eliminado=0 AND idAsignatura ='$Asignatura' ";

    $datos = mysqli_query($conexion,$sql);

    while ($renglon=mysqli_fetch_array($datos)) {
      $idDocente = $renglon['idDocente'];

    }
}

             
}



//VERIFICAMOS EL PROCESO
$perfil=$_SESSION['Perfil'];
switch($pro){
  case 'Registro':
    $sql = "INSERT INTO catg_calificaciones (idAsignatura, idDocente,idAlumno, Calificacion) ".  "VALUES ('$Asignatura', '$idDocente', '$idAlumno',  '$Calificacion')";
 
    $datos = mysqli_query($conexion,$sql);
    
  break;
  
  case 'Edicion':
    $sql= "UPDATE catg_calificaciones SET Calificacion='$Calificacion'  WHERE idCalificacion='$id'";
    $datos = mysqli_query($conexion,$sql);
    
  break;

}
?>

 <script src="js/myjava.js"></script>

<?php
  if ($perfil=='Docente') {
echo '
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
                  <th>Calificación</th>
                  <th>Acción</th>


                </tr>
              </thead>
            <tbody>';

      $sql= "SELECT  u.id, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst,  p.abrev AS Posgrado, pe.NombrePerfil AS Perfil, IF(u.bloqueado=1,'Bloqueado','Activo') AS estatus
            FROM usuario_activo as u
            INNER JOIN catg_posgrado as p ON p.id= u.id_posgrado
            INNER JOIN catg_perfil as pe On pe.idPerfil= u.id_perfil
            INNER JOIN catg_asignatura as m ON m.idPosgrado = p.id
            WHERE u.id_perfil<>0 AND m.idMateria='$Asignatura'  AND u.bloqueado=0
ORDER BY u.ap_paterno,  u.ap_materno, u.nombre
            ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $idAlumno= $renglon['id'];
            $contador = $contador +1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['Posgrado'].'</td>
            <td>'.$renglon['nombre'].'</td>
            <td>'.$renglon['ap_paterno'].'</td>
            <td>'.$renglon['ap_materno'].'</td><td>';
            $sqlCali ="SELECT c.idAsignatura, c.idAlumno, c.idDocente, c.Docente, c.Alumno, c.Calificacion, c.idCalificacion FROM catg_calificaciones AS c WHERE c.Eliminado=0 AND c.idDocente='$idDocente' AND c.idAlumno='$idAlumno' ";
            $datos1 = mysqli_query($conexion,$sqlCali);
            mysqli_set_charset($conexion,"utf8");
              $Calificacion="";
            while ($renglon2=mysqli_fetch_array($datos1)) {
              $Calificacion =$renglon2['Calificacion'];
              $idCalificacion =$renglon2['idCalificacion'];
            echo ''.$renglon2['Calificacion'].'';
            }
            echo '</td>
            <td>
              <a href="javascript:listar_calificaciones('.$renglon['id'].','.$Asignatura.');"><i class="btn-outline-success far fa-eye" title="Trabajos"></i>
              </a>';
              if ($Calificacion!="") {
        echo '
                <a href="javascript:editarCalificacion('.$idCalificacion.','.$Asignatura.');">
              <img src="opciones/editar.png" title="Calificación">
              </a>';
              }else{
                echo '
                <a href="javascript:nueva_calificacion('.$renglon['id'].','.$Asignatura.');">
              <img src="opciones/editar.png" title="Calificación">
              </a>';
              }
              
              echo '
            </td>
            </tr>';

                    }
            echo '
              </tbody>
             </div>
            </table>




 
      </div>
 
</div></div>';

        } else{
echo '
        <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">
          <i class="fa fa-table"></i> Calificaciones
        </div>
<div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Posgrado</th>
                  <th>Asignatura</th>
                  <th>Docente</th>
                 <th>Calificación</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>';

            $sql= " SELECT u.id,  p.abrev, a.Materia,a.idMateria,
(SELECT c.idCalificacion FROM catg_calificaciones AS c WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura AND c.Eliminado=0) AS idCalificacion,
(SELECT c.Calificacion FROM catg_calificaciones AS c WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura AND c.Eliminado=0) AS Calificacion,
(SELECT CONCAT_WS(' ', ca.ap_paterno, ca.ap_materno, ca.nombre) AS Docente FROM catg_calificaciones AS c INNER JOIN catg_catedratico AS ca ON ca.id = c.idDocente WHERE c.idAlumno=u.id AND a.idMateria=c.idAsignatura  AND c.Eliminado=0) AS Docente
FROM usuario_activo AS u
INNER JOIN catg_posgrado AS p ON p.id= u.id_posgrado
INNER JOIN catg_asignatura AS a ON a.idPosgrado=p.id
WHERE u.id='$idAlumno' 
";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
            $contador = $contador +1;
            echo '<tr>

            <td>'.$contador.'</td>
            <td>'.$renglon['abrev'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>'.$renglon['Docente'].'</td>
             <td>'.$renglon['Calificacion'].'</td>
            
            <td>
              <a href="javascript:form_calificacionescomun('.$renglon['idMateria'].','.$renglon['id'].');" title="Estudiantes">
              <img src="opciones/estudianteicon.png"></a> ';

              if ($renglon['Calificacion']!="") {
               echo ' <a href="javascript:editarCalificacion('.$renglon['idCalificacion'].','.$renglon['idMateria'].');"><i class="btn-outline-primary fas fa-pencil-alt"></i></a>
              <a href="javascript:eliminarCalificacion('.$renglon['idCalificacion'].','.$idAlumno.');"><i class="btn-outline-danger fas fa-times"></i></a>'
               ;
              }else{
                echo '<a href="javascript:nueva_calificacion('.$renglon['id'].','.$idAlumno['idMateria'].');">
              <img src="opciones/editar.png" title="Calificación">
              </a>';
              }

             
             echo '
            </td>

            </tr>';

                    }
            echo '
              </tbody>
          
            </table>
      </div>
        </div>
            </div>

            </div>

  </div>'; 
}

  ?>
                        
  <?php  include("../modal/modal_calificacion.php"); ?>
    <script type="text/javascript">

function listar_calificaciones(id, idMateria){
  $('#contenido').load("php/modal/form_calificacionescomun.php?idMateria="+idMateria, "id="+id);

}
        function regresarSesion(id){
      $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);
      }
           $(document).ready(function() {

        $('.table').DataTable( {

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