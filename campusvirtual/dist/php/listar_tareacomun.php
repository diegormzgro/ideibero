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
WHERE m.idMateria='$idMateria' AND s.Eliminado=0 AND d.Eliminado=0
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
               <div  align="right">
                  <?php echo $Docente; ?>
           <?php echo '<a href="javascript:regresarSesion('.$idMateria.');">'; ?>
           <br>
              <button type="button" class="btn btn-dark" >Regresar</button></a>
               </div>
      </h2>              
        <div class="card-header" align="left">
          <i class="fa fa-table"></i> Trabajos Parciales
 
         <center>
      <div class="row">
        <div class="col">
          <?php if ($perfil=='Alumno') {
            # code...
          }else{
              
          } ?>
     
        </div>


      </div>


        </div>
        <div class="card-body">



<div id="agrega-registros">
<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
                           <thead>
                <tr>
                 <th>ID</th>
                  <th>Sesión</th>
                  <th>Fecha</th> 
                  <th>Inicia</th>
                  <th>Finaliza</th>
                  <th>Trabajos</th>
                </tr>
              </thead>
            <tbody>
              <?php

if ($perfil=='Docente') {
$sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido, m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE s.Eliminado=0  AND d.idDocente='$id' AND d.Estatus=1 AND m.idMateria='$idMateria' AND d.Eliminado=0
ORDER BY s.FechaSesion ASC ";
}
elseif ($perfil=='Alumno') {
  $sql="SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido,m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria

 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
 WHERE u.id='$id' AND s.Eliminado=0 AND d.Eliminado=0 AND d.Estatus=1 AND m.idMateria='$idMateria' AND d.Eliminado=0 AND d.idGrupo= u.id_grupo
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
            <td>'.$renglon['NombreSesion'].'</td>
            <td>'.date("d-m-Y", strtotime($renglon['FechaSesion'])).'</td>
            <td>'.$renglon['HoraInicio'].'</td>
            <td>'.$renglon['HoraTermino'].'</td>';
            echo '
            <td>

      <a href="javascript:listarTrabajos('.$renglon['idSesion']. ',' .$renglon['idMateria']. ');" title="Trabajos">
              <img src="opciones/trabajo.png"></a>    
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table>
          </div>
        </div>
   </div>
 

              <?php

                require('conexion.php');
 if($_SESSION['Perfil']=='Alumno' ){
            $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido,m.idMateria, min(s.FechaSesion) AS FechaMin, max(s.FechaSesion) AS FechaMax
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria

 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
 WHERE u.id='$id' AND s.Eliminado=0 AND d.Eliminado=0 AND d.Estatus=1 AND m.idMateria='$idMateria'
ORDER BY s.FechaSesion ASC
 ";

            $sqlFinal= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
                        INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
                        INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
                        INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                        INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                        WHERE d.Eliminado=0 AND a.idMateria='$idMateria' AND t.Tarea_tipo=1 AND s.idSesion='$idSesion' AND s.Eliminado=0
                        ORDER BY s.idSesion, t.idTarea 
                         ";
                      }


        else{


            $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, min(s.FechaSesion) AS FechaMin, max(s.FechaSesion) AS FechaMax, s.Link, s.Calificacion, s.LinkDiferido, m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
  WHERE s.Eliminado=0  AND d.idDocente='$id' AND d.Estatus=1 AND m.idMateria='$idMateria' AND d.Eliminado=0
ORDER BY s.FechaSesion ASC
 ";

                        $sqlFinal= "SELECT t.*, s.NombreSesion FROM catg_tareas AS t
                        INNER JOIN catg_sesiones AS s ON s.idSesion = t.idMateria
                        INNER JOIN catg_asignacion_docente AS d ON d.id=s.idMateria
                        INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
                        INNER JOIN catg_catedratico AS c ON c.id= d.idDocente
                        WHERE d.Eliminado=0 AND d.idDocente='$id' AND t.Tarea_tipo=1 AND s.idSesion='$idSesion' AND s.Eliminado=0
                             ORDER BY s.idSesion, t.idTarea 
                         ";


                      }

            $datos = mysqli_query($conexion,$sql);
            $datosFinal = mysqli_query($conexion,$sqlFinal);
            ?>

    <div class="card mb-3"  id="agrega-registros">
      <div class="card-header">
      <i class="fa fa-table"></i> Trabajo Final
      </div>
 
<div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="tb_calificacion"  cellspacing="0" >
              <thead>
                
                <tr>
                 <th>ID</th>
                  <th>Materia</th>
                  
                  <th>Inicio</th>
                  <th>Finalización</th>
                  <th>Trabajo Final</th>
                
                </tr>
              </thead>
            <tbody>
              <?php

          
            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            $filas = mysqli_num_rows($datos);
        
            if ($idMateria<>'undefined') {
                          while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>'.$renglon['FechaMin'].'</td>
            <td>'.$renglon['FechaMax'].'</td>';
            echo '
            <td>

      <a href="javascript:listarTrabajosFinal('.$renglon['idSesion']. ',' .$renglon['idMateria']. ');" title="Trabajos">
              <img src="opciones/trabajo.png"></a>    
              
            </td>

            </tr>';

                    }
            }

            ?>
              </tbody>
          
            </table>
            </div>
          </div>
         </div>

        <?php include("modal/modal_lectura.php");?>
        <?php  include("modal/modal_tareafinal.php"); ?>
    <script type="text/javascript">
      function listarTrabajos(id, idMateria){
      $('#contenido').load("php/listar_tareacomun2.php?idSesion="+id, "idMateria="+idMateria);
      }
            function listarTrabajosFinal(id, idMateria){
      $('#contenido').load("php/listar_tareafinal.php?idSesion="+id, "idMateria="+idMateria);
      }
        function regresarSesion(id){
      $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);
      }
          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
        });      

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
 
  <?php

}
else{
    header("location:index.html");
}
?>