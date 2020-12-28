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
     $idSesion = $_GET['idSesion'];
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
            $Materia = $renglon['Materia'];
            $Docente = $renglon['NombreCompleto'];
            }
?>
 <script src="js/myjava.js"></script>

   <h2 class="mt-4">Titulo de la Asignatura: "<?php echo $Materia; ?>"  
               <div  align="right">
                  Catedrático: <?php echo $Docente; ?>
               </div>
    </h2> 
     
        <div class="card-header" align="left">
          <i class="fa fa-table"></i> Lecturas 
 
 <center>
 <div class="row">
   <!-- <div class="col">
     <button type="button" class="btn btn-primary" id="nueva_clase">Nueva Clase</button>
    </div>-->
        <div class="col">
          <?php if ($perfil=='Alumno') {
            # code...
          }else{
            echo ' <a href="javascript:nueva_LecturaIDDoc('.$idSesion.','.$idPosgrado.');">     <button type="button" class="btn btn-success">Nueva Lectura </button></a>'; 
          } ?>
     
    </div>

     <div class="col" align="right">
          <?php echo '<a href="javascript:regresarlectura('.$idMateria.');">'; 
          ?>
     <button type="button" class="btn btn-dark" >Regresar</button></a>
  
    </div>
  </div>
</center>

        </div>
        <div id="agrega-registros">
        <div class="card-body">
          <div class="table-responsive" id="table">
<?php if($_SESSION['Perfil']=='Control Escolar' ){
  echo '
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo Lectura</th>
                  <th>Descripción</th>
                  <th>Enlace</th>
                  <th>Archivo</th>
                </tr>
              </thead>
            <tbody>';

                require('conexion.php');
 if($_SESSION['Perfil']=='Docente' ){
              $sql= " SELECT cm.*
                    FROM catg_lecturas as cm
            INNER JOIN catg_sesiones AS s ON s.idSesion= cm.idMateria
            INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
            INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
            WHERE cm.Eliminado=0  AND a.idPosgrado='$posgrado'AND s.idSesion='$idSesion'
            ORDER BY s.idSesion, cm.idLectura
                   ";
 }else{
              $sql= " SELECT cm.*
                    FROM catg_lecturas as cm
            INNER JOIN catg_sesiones AS s ON s.idSesion= cm.idMateria
            INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
            INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
            WHERE cm.Eliminado=0  AND a.idPosgrado='$posgrado' AND s.idSesion='$idSesion'
            ORDER BY s.idSesion, cm.idLectura
                   ";

 }



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
            }echo '

            </tr>';

                    }
                  }elseif($_SESSION['Perfil']=='Docente') {
                  
       echo' <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
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

                require('conexion.php');

 if($_SESSION['Perfil']=='Docente' ){
              $sql= " SELECT cm.*, s.NombreSesion
                    FROM catg_lecturas as cm
            INNER JOIN catg_sesiones AS s ON s.idSesion= cm.idMateria
            INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
            INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
            WHERE cm.Eliminado=0 AND a.Eliminado=0  AND d.idDocente='$id' AND a.idMateria='$idMateria' AND s.idSesion='$idSesion'
            ORDER BY s.idSesion, cm.idLectura
                   ";
 }else{
              $sql= " SELECT cm.*, s.NombreSesion
                    FROM catg_lecturas as cm
            INNER JOIN catg_sesiones AS s ON s.idSesion= cm.idMateria
            INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
            INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
            

            WHERE cm.Eliminado=0  AND a.Eliminado=0 AND a.idMateria='$idMateria' AND s.idSesion='$idSesion'
            ORDER BY s.idSesion, cm.idLectura
                   ";

 }

      
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



                  else{
       echo' <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo Lectura</th>
                  <th>Descripción</th>
                  <th>Enlace</th>
                  <th>Archivo</th>
                </tr>
              </thead>
            <tbody>';

                require('conexion.php');

 if($_SESSION['Perfil']=='Docente' ){
              $sql= " SELECT cm.*, s.NombreSesion
                    FROM catg_lecturas as cm
            INNER JOIN catg_sesiones AS s ON s.idSesion= cm.idMateria
            INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
            INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
            WHERE cm.Eliminado=0 AND a.Eliminado=0  AND d.idDocente='$id' AND a.idMateria='$idMateria' AND s.idSesion='$idSesion'
            ORDER BY s.idSesion, cm.idLectura
                   ";
 }else{
              $sql= " SELECT cm.*, s.NombreSesion
                    FROM catg_lecturas as cm
            INNER JOIN catg_sesiones AS s ON s.idSesion= cm.idMateria
            INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
            INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
            

            WHERE cm.Eliminado=0 AND a.Eliminado=0 AND a.idMateria='$idMateria' AND s.idSesion='$idSesion'
            ORDER BY s.idSesion, cm.idLectura
                   ";

 }

      
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
        <?php include("modal/modal_lecturaDoc.php");?>

    <script type="text/javascript">

        function regresarlectura(id){
      $('#contenido').load("php/listar_lecturaComun.php?idMateria="+id);
      }
          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
        });      

          $(document).ready(function() {


        } );
</script>
 
  <?php

}
else{
    header("location:index.html");
}
?>