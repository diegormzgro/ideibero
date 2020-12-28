 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
        $id = $_SESSION['id'];
        $idMateria =$_GET['idMateria'];
        include('conexion.php');
    $sql= " SELECT a.Materia, s.NombreSesion FROM catg_asignatura as a
 INNER JOIN catg_sesiones AS s ON s.idMateria = a.idMateria
    WHERE a.idMateria='$idMateria' AND s.Eliminado=0 AND a.Eliminado=0";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $Materia= $renglon['Materia'];
              $NombreSesion= $renglon['NombreSesion'];
             }
                
?>

 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Alumnos</h1></center>
                 <div class="col" align="right">
                  <h4><?php echo $NombreSesion; ?></h4>
                 </div> 
            
        <div class="card-header">
          <i class="fa fa-table"></i> <?php echo $Materia; ?> 
          <div class="col" align="right">
          <?php echo '<a href="javascript:regresarSesion('.$idMateria.');"><button type="button" class="btn btn-dark" >Regresar</button></a>'; 
          ?>
        </div>
        </div>
        <!--<a href="archivos/Actas/Acta1.pdf" target="_blank" ><img src="opciones/reportar.png"></a>-->
                   <div class="card mb-3"  id="agrega-registros">

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
            <tbody>
              <?php

                require('conexion.php');

      $sql= "SELECT  u.id, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst,  p.abrev AS Posgrado, pe.NombrePerfil AS Perfil, IF(u.bloqueado=1,'Bloqueado','Activo') AS estatus
            FROM usuario_activo as u
            INNER JOIN catg_posgrado as p ON p.id= u.id_posgrado
            INNER JOIN catg_perfil as pe On pe.idPerfil= u.id_perfil
            INNER JOIN catg_asignatura as m ON m.idPosgrado = p.id
            INNER JOIN catg_asignacion_docente AS d ON d.idAsignatura= m.idMateria

            WHERE u.id_perfil<>0 AND m.Materia='$Materia'  AND u.bloqueado=0 AND u.eliminado=0 AND u.emailInst<>'' AND d.idGrupo= u.id_grupo
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
            $sqlCali ="SELECT c.idAsignatura, c.idAlumno, c.idDocente, c.Docente, c.Alumno, c.Calificacion, c.idCalificacion FROM catg_calificaciones AS c WHERE c.Eliminado=0 AND c.idDocente='$id' AND c.idAlumno='$idAlumno' AND  idAsignatura='$idMateria' ";
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
              <a href="javascript:listar_calificaciones('.$renglon['id'].','.$idMateria.');"><i class="btn-outline-success far fa-eye" title="Trabajos"></i>
              </a>';
              if ($Calificacion!="") {
        echo '
                <a href="javascript:editarCalificacion('.$idCalificacion.','.$idMateria.');">
              <img src="opciones/editar.png" title="Calificación">
              </a>';
              }else{
                echo '
                <a href="javascript:nueva_calificacion('.$renglon['id'].','.$idMateria.');">
              <img src="opciones/editar.png" title="Calificación">
              </a>';
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
                        
  <?php  include("modal/modal_calificacion.php"); ?>
    <script type="text/javascript">

function listar_calificaciones(id, idMateria){
  $('#contenido').load("php/modal/form_calificacionescomun.php?idMateria="+idMateria, "id="+id);
  $("body").toggleClass("sb-sidenav-toggled");

}
        function regresarSesion(id){
      $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);
      }
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