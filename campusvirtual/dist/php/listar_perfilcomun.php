 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $idPosgrado= $_SESSION['idPosgrado'];
    $id = $_SESSION['id'];
    $idMateria = $_GET['idMateria'];
    //$idGrupo = intval($_GET['idGrupo']);
      $posgrado = $idPosgrado;
      if ($posgrado==1) {
        $posgrado = "MDCDH";
      }elseif ($posgrado == 2) {
        $posgrado = "MDE";
      }elseif($posgrado == 3){
        $posgrado = "DDCDH";
      }else{
        $posgrado = "DDE";
      }
require('conexion.php');

    $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
s.Link, s.Calificacion, d.id , d.idGrupo, m.idMateria, m.idPosgrado
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
WHERE m.idMateria='$idMateria'
 ";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $NombreSesion = $renglon['NombreSesion'];
            $FechaSesion = $renglon['FechaSesion'];
            $idAsignacion = $renglon['id'];
            $idGrupo = $renglon['idGrupo'];
            $idMateria = $renglon['idMateria'];
            $idPosgrado = $renglon['idPosgrado'];
            $idSesion = $renglon['idSesion'];
            $Materia = $renglon['Materia'];
            $Docente = $renglon['NombreCompleto'];


                }
?>
 <script src="js/myjava.js"></script>
                        
      <h2 class="mt-4">"<?php echo $Materia; ?>"  
               
      </h2> 
      <div  align="right">
                  <?php echo $Docente; ?>
               </div>             
        <div class="card-header" align="left">
          <i class="fa fa-table"></i> Lecturas 
 
         <center>
      <div class="row">
        <div class="col">
          <?php if ($perfil=='Alumno') {
            # code...
          }else{
              
          } ?>
     
        </div>

         <div class="col" align="right">
           <?php echo '<a href="javascript:regresarSesion('.$idMateria.');">'; ?>
              <button type="button" class="btn btn-dark" >Regresar</button></a>
        </div>
      </div>


        </div>
        <div class="card-body">



<div id="agrega-registros">
<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
                           <thead>
                <tr>
                 <th>ID</th>
                  <th>Posgrado</th>
                  <th>Inicio</th>
                  <th>Finalización</th>
                  <th>Alumnos</th>
                </tr>
              </thead>
            <tbody>
              <?php

if ($perfil=='Docente') {
$sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido, m.idMateria, p.abrev
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN catg_posgrado as p On p.id= m.idPosgrado
 WHERE s.Eliminado=0  AND d.idDocente='$id' AND d.Estatus=1 AND m.idMateria='$idMateria'
ORDER BY s.FechaSesion ASC ";
}
elseif ($perfil=='Alumno') {
  $sql="SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido,m.idMateria, p.abrev
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria

 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
 INNER JOIN catg_posgrado as p On p.id= m.idPosgrado
 WHERE u.id='$id' AND s.Eliminado=0 AND d.Eliminado=0 AND d.Estatus=1 AND m.idMateria='$idMateria'
ORDER BY s.FechaSesion ASC
 ";
 }


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['abrev'].'</td>
            <td>'.$renglon['HoraInicio'].'</td>
            <td>'.$renglon['HoraTermino'].'</td>';
            echo '
            <td>

              <a href="javascript:listar_alumnos('.$renglon['idMateria'].','.$renglon['idSesion'].');" title="Estudiantes">
              <img src="opciones/estudianteicon.png"></a>    
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table>
          </div>




   </div>
 


        <?php include("modal/modal_lectura.php");?>

    <script type="text/javascript">
      function listar_alumnos(id, idSesion){
        $('#contenido').load("php/listar_perfilcomun2.php?idMateria="+id,"idSesion="+idSesion);
      }
        function regresarSesion(id){
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
 
  <?php

}
else{
    header("location:index.html");
}
?>