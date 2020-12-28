<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
session_start();

$idAlumno = $_POST['idAlumno'];
$idSesion = $_POST['idSesion'];
$idMateria = $_POST['idMateria'];
$idEstatus = $_POST['Asistencia'];




$sql= "SELECT * FROM asistencias WHERE idAlumno='$idAlumno' AND idSesion='$idSesion' AND Eliminado=0  ";


$datos = mysqli_query($conexion,$sql);
$filas = mysqli_num_rows($datos);

if ($filas==0) {
	if ($idEstatus<>3) {
    $sql ="INSERT INTO asistencias (idAlumno, idSesion, idEstatus) ".  "VALUES ('$idAlumno', '$idSesion', '$idEstatus')";
  $datos = mysqli_query($conexion,$sql);
  }


}else{
$sql= "UPDATE asistencias SET Eliminado=1  WHERE idAlumno='$idAlumno' AND idSesion='$idSesion' AND Eliminado=0 ";
    $datos = mysqli_query($conexion,$sql);
    if ($idEstatus<>3) {
    $sql ="INSERT INTO asistencias (idAlumno, idSesion, idEstatus) ".  "VALUES ('$idAlumno', '$idSesion', '$idEstatus')";
    $datos = mysqli_query($conexion,$sql);
        }
    

}


        $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria, d.idDocente
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND m.idMateria='$idMateria' AND d.Eliminado=0
       GROUP BY s.idSesion
       ";
      


    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $NombreSesion = $renglon['NombreSesion'];
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idPosgrado = $renglon['idPosgrado'];
            $posgrado = $renglon['abrev'];
            $idGrupo = $renglon['idGrupo'];
            $idMateria = $renglon['idMateria'];
             $idDocente = $renglon['idDocente'];
                }


?>

        <div class="card-header">

          <i class="fa fa-table"></i> Asistencias
           
    <div class="col" align="right">
   <?php 
   echo '<a href="javascript:regresar('.$idGrupo.');">
   <button type="button" class="btn btn-dark" >Regresar</button>
   </a>';?>
    </div>
  </div>

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
             <thead> 
              <tr>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">ID</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Nombre</Th>
            <?php
            $contador=0;
            $datos = mysqli_query($conexion,$sql);

            while ($renglon=mysqli_fetch_array($datos)) {

              echo '<th COLSPAN=4>'.$renglon['NombreSesion'].'</th>';
            }
            ?>
              </tr>
              <tr>
              <?php 
              $datos = mysqli_query($conexion,$sql);
              while ($renglon=mysqli_fetch_array($datos)) {
                echo '
              
                <Th>D</Th><Th>D</Th><Th>F</Th><th>A</th>
              ';
              }
              ?>
              </tr>
              </thead>

              <tbody>
              <?php
                $contador=0;


      
      $sqlAlum= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ', u.ap_paterno,u.ap_materno, u.nombre) AS NombreCompleto2, CONCAT_WS(' ',u.nombre, u.ap_paterno,u.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria, u.id AS idAlumno
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND d.idDocente='$idDocente' AND d.Eliminado=0 AND m.idMateria='$idMateria' 
       GROUP BY  u.id
       ORDER BY s.FechaSesion, NombreCompleto2  ASC";

                $datos = mysqli_query($conexion,$sqlAlum);
                while ($renglon=mysqli_fetch_array($datos)) {
                $idAlumno = $renglon['idAlumno'];
                
      $sqlAlumSES= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ', u.ap_paterno,u.ap_materno, u.nombre) AS NombreCompleto2, CONCAT_WS(' ',u.nombre, u.ap_paterno,u.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria, u.id AS idAlumno
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND d.idDocente='$idDocente' AND d.Eliminado=0 AND m.idMateria='$idMateria' AND u.id ='$idAlumno'
       GROUP BY  u.id, s.idSesion
       ORDER BY s.FechaSesion, NombreCompleto2  ASC";
         

                
                $contador = $contador +1;
                echo '<tr>
                <td>'.$contador.'</td>
                <td>'.$renglon['NombreCompleto'].'</td>';
            $datos2 = mysqli_query($conexion,$sqlAlumSES);
            while ($renglon=mysqli_fetch_array($datos2)) {

            $idSesion = $renglon['idSesion'];
            $Fecha = $renglon['FechaSesion'];
            $hoy= date("Y-m-d"); 
            $consulta ="SELECT * FROM asistencias a WHERE a.idSesion='$idSesion' AND a.idAlumno='$idAlumno' AND a.Eliminado=0 GROUP BY a.idAlumno, a.idSesion ";
            $datos3 = mysqli_query($conexion,$consulta);
            $filas = mysqli_num_rows($datos3);
  
            if ($filas==0 && ($Fecha>$hoy)) {
              echo '<td></td>
              <td></td>
              <td></td>
              <td></td>
              ';
            }elseif ($filas==0 && ($Fecha<$hoy)) {
              echo '<td></td>
              <td></td>
              <td><img src="opciones/falta.png"></td>
              <td><a title="Editar calificación" href="javascript:nueva_asistencia('.$idAlumno.', '.$idSesion.', '.$idMateria.');"><img src="opciones/editar.png"></a></td>
              ';            
            }elseif ($filas==0 || ($Fecha>$hoy)) {
              echo '<td></td>
              <td></td>
              <td></td>
              <td></td>
              '; 
            } else{
              while ($renglon2=mysqli_fetch_array($datos3)) {
              $idEstatus = $renglon2['idEstatus'];
              if ($idEstatus==1) {
                    echo '
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              <td></td>
              <td><a title="Editar calificación" href="javascript:nueva_asistencia('.$idAlumno.', '.$idSesion.', '.$idMateria.');"><img src="opciones/editar.png"></a></td>
              ';
                  }else{
                echo '
              <td></td>
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              <td><a title="Editar calificación" href="javascript:nueva_asistencia('.$idAlumno.', '.$idSesion.', '.$idMateria.');"><img src="opciones/editar.png"></a></td>
              ';
                }
              }
            }



            }

          }
              ?>

              </tbody>


            </table>
<?php  include("../modal/modal_asistencia.php"); ?>


  <script type="text/javascript">
       function regresar(id){
      $('#contenido').load("php/posgrado/listar_clasesgenericas.php?id="+id);
      }
            function regresarSesion(id){
      $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);
      }
   function listar_materias(id){
      $('#contenido').load("php/posgrado/listar_clasesgenericas.php?id="+id);
  }
          $('#regresar').click(function(){
            $('#contenido').load("php/listar_posgradoindex.php");
        });
 function listar_alumnos(id){
  $('#contenido').load("php/listar_perfil.php?id="+id);

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
 