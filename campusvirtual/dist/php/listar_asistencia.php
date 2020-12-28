 <?php

    session_start();
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $id = $_SESSION['id'];

    require('conexion.php');
    $idMateria = intval($_GET['idMateria']);
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
      if ($perfil=='Alumno') {
        $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND u.id='$id' AND d.Eliminado=0 AND m.idMateria='$idMateria' AND u.eliminado=0 AND u.emailInst<>'' AND d.idGrupo= u.id_grupo
       ORDER BY s.FechaSesion ASC
       ";
      }elseif ($perfil=='Docente') {
        $sql= "SELECT s.idSesion, m.Materia,CONCAT_WS(' ', u.ap_paterno,u.ap_materno, u.nombre) AS NombreCompleto2 ,CONCAT_WS(' ',u.nombre, u.ap_paterno,u.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria, u.id AS idAlumno
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND d.idDocente='$id' AND d.Eliminado=0 AND u.bloqueado=0 AND m.idMateria='$idMateria' AND u.eliminado=0 AND u.emailInst<>'' AND d.idGrupo= u.id_grupo
       GROUP BY s.idSesion
       ORDER BY s.FechaSesion, NombreCompleto2  ASC
       ";

      $sqlDet= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',u.nombre, u.ap_paterno,u.ap_materno) AS NombreCompleto, CONCAT_WS(' ', u.ap_paterno,u.ap_materno, u.nombre) AS NombreCompleto2, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria, u.id AS idAlumno
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND d.idDocente='$id' AND d.Eliminado=0 AND m.idMateria='$idMateria' AND u.eliminado=0 AND u.emailInst<>''
       ORDER BY s.FechaSesion, NombreCompleto2  ASC
       ";
      $sqlAlum= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ', u.ap_paterno,u.ap_materno, u.nombre) AS NombreCompleto2, CONCAT_WS(' ',u.nombre, u.ap_paterno,u.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria, u.id AS idAlumno
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND d.idDocente='$id' AND d.Eliminado=0 AND m.idMateria='$idMateria'  AND u.eliminado=0 AND u.emailInst<>''
       GROUP BY  u.id
       ORDER BY s.FechaSesion, NombreCompleto2  ASC
       ";
      }else{
        $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0 AND m.idMateria='$idMateria' AND d.Eliminado=0  AND u.eliminado=0 AND u.emailInst<>''
       GROUP BY s.idSesion
       ";
      }


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
                }
  
 
 }


?>
 <script src="js/myjava.js"></script>
 <center> <h1 class="mt-4">Asistencias</h1></center>

                        
          <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">

          <i class="fa fa-table"></i> Asistencias
           
    <div class="col" align="right">
     <?php echo '<a href="javascript:regresarSesion('.$idMateria.');"><button type="button" class="btn btn-dark" >Regresar</button></a>';?>
    </div>
          </div>
          <br> 

        <div class="card-body">
          <div class="table-responsive" id="table">
<!--
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <?php
                if ($perfil!='Alumno') {
                  # code...
                
                ?>
              <TR>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">ID</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Nombre</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Sesión</Th>               
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Fecha</Th>
                <Th COLSPAN=3>Control de Asistencia</Th>
              </Tr>
              <TR>
 
                <Th>Directo</Th><Th>Diferido</Th><Th>Faltas</Th>
              </TR>

              <?php 
              }else{
              ?>

                <TR>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">ID</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Sesión</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Fecha</Th>
                <Th COLSPAN=3>Control de Asistencia</Th>
              </Tr>
              <TR>
 
                <Th>Directo</Th><Th>Diferido</Th><Th>Faltas</Th>
              </TR>
            <?php } ?>
              </thead>
            <tbody>
            
  <?php 
            $contador=0;
            $datos = mysqli_query($conexion,$sql);

        if ($perfil=='Alumno') {
            while ($renglon=mysqli_fetch_array($datos)) {
              $idSesion = $renglon['idSesion'];
              $contador = $contador +1;
              echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreSesion'].'</td>
            <td>'.$renglon['FechaSesion'].'</td>';
            
            $consulta ="SELECT * FROM asistencias a WHERE a.idSesion='$idSesion' AND a.idAlumno='$id' AND Eliminado=0 GROUP BY a.idAlumno, a.idSesion";
            $datos2 = mysqli_query($conexion,$consulta);
            $filas = mysqli_num_rows($datos2);
            if ($filas==0) {
              echo '<td></td>
              <td></td>
              <td><img src="opciones/falta.png"></td>
              ';
            }else{
              while ($renglon2=mysqli_fetch_array($datos2)) {
              $idEstatus = $renglon2['idEstatus'];
              if ($idEstatus==1) {
                    echo '
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              <td></td>
              ';
                  }else{
                echo '
              <td></td>
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              ';
                  }
              }
            }
            echo "</tr>";
          }
          
      }elseif($perfil=='Docente'){

           
            $datos = mysqli_query($conexion,$sql);
           while ($renglon=mysqli_fetch_array($datos)) {
            $contador = $contador +1;
            $idAlumno = $renglon['idAlumno'];
            $idSesion = $renglon['idSesion'];
              echo '<tr>
                <td>'.$contador.'</td>
                <td>'.$renglon['NombreCompleto'].'</td>
                <td>'.$renglon['NombreSesion'].'</td>
                <td>'.$renglon['FechaSesion'].'</td>';

            $consulta ="SELECT * FROM asistencias a WHERE a.idSesion='$idSesion' AND a.idAlumno='$idAlumno' AND Eliminado=0 GROUP BY a.idAlumno, a.idSesion";
            $datos2 = mysqli_query($conexion,$consulta);
            $filas = mysqli_num_rows($datos2);
            if ($filas==0) {
              echo '<td></td>
              <td></td>
              <td><img src="opciones/falta.png"></td>
              ';
            }else{
              while ($renglon2=mysqli_fetch_array($datos2)) {
              $idEstatus = $renglon2['idEstatus'];
              if ($idEstatus==1) {
                    echo '
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              <td></td>
              ';
                  }else{
                echo '
              <td></td>
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              ';
                  }
              }
            }
            echo "</tr>";
          }
        }
    
                ?>
        
              </tbody>
             
            </table>
            </div>
-->
            <?php
                if ($perfil=='Alumno') {
            ?>
            
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
               <TR>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">ID</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Sesión</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Fecha</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Inicia</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Finaliza</Th>
                <Th COLSPAN=3>Control de Asistencia</Th>
              </Tr>
              <TR>
 
                <Th>Directo</Th><Th>Diferido</Th><Th>Faltas</Th>
              </TR>
            </thead>
            <tbody>
              <?php
              $contador=0;
            $datos = mysqli_query($conexion,$sql);
           while ($renglon=mysqli_fetch_array($datos)) {
              $idSesion = $renglon['idSesion'];
              $Fecha = $renglon['FechaSesion'];
              $hoy= date("Y-m-d");
              $contador = $contador +1;
              echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['NombreSesion'].'</td>
            <td>'.$renglon['FechaSesion'].'</td>
            <td>'.$renglon['HoraInicio'].'</td>
            <td>'.$renglon['HoraTermino'].'</td>'
            ;
            
            $consulta ="SELECT * FROM asistencias a WHERE a.idSesion='$idSesion' AND a.idAlumno='$id' AND Eliminado=0 GROUP BY a.idAlumno, a.idSesion";
            $datos2 = mysqli_query($conexion,$consulta);
            $filas = mysqli_num_rows($datos2);
            if ($filas==0 && ($Fecha>$hoy)) {
              echo '<td></td>
              <td></td>
              <td></td>
              ';
            }elseif ($filas==0 && ($Fecha<$hoy)) {
              echo '<td></td>
              <td></td>
              <td><img src="opciones/falta.png"></td>
              ';            
            }elseif ($filas==0 || ($Fecha>$hoy)) {
              echo '<td></td>
              <td></td>
              <td></td>
              '; 
            }else{
              while ($renglon2=mysqli_fetch_array($datos2)) {
              $idEstatus = $renglon2['idEstatus'];
              if ($idEstatus==1) {
                    echo '
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              <td></td>
              ';
                  }else{
                echo '
              <td></td>
              <td><img src="opciones/asistencia.png"></td>
              <td></td>
              ';
                  }
              }
            }
            echo "</tr>";
          }
              ?>
            </tbody>
            <?php }else{ ?>

            
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
             <thead> 
              <tr>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">ID</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Nombre</Th>
            <?php
            $contador=0;
            $datos = mysqli_query($conexion,$sql);

            while ($renglon=mysqli_fetch_array($datos)) {

              echo '<th COLSPAN=3>'.$renglon['NombreSesion'].'</th>';
            }
            ?>
              </tr>
              <tr>
              <?php 
              $datos = mysqli_query($conexion,$sql);
              while ($renglon=mysqli_fetch_array($datos)) {
                echo '
              
                <Th>D</Th><Th>D</Th><Th>F</Th>
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
       WHERE  s.Eliminado=0 AND d.idDocente='$id' AND d.Eliminado=0 AND m.idMateria='$idMateria'  AND u.bloqueado=0  AND u.eliminado=0 AND u.emailInst<>'' AND d.idGrupo= u.id_grupo
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
       WHERE  s.Eliminado=0 AND d.idDocente='$id' AND d.Eliminado=0 AND m.idMateria='$idMateria' AND u.id ='$idAlumno' AND u.bloqueado=0   AND u.eliminado=0 AND u.emailInst<>'' AND d.idGrupo= u.id_grupo
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
              ';
            }elseif ($filas==0 && ($Fecha<$hoy)) {
              echo '<td></td>
              <td></td>
              <td><img src="opciones/falta.png"></td>
              ';            
            }elseif ($filas==0 || ($Fecha>$hoy)) {
              echo '<td></td>
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
              ';
                  }else{
                echo '
              <td></td>
              <td><img src="opciones/asistencia.png"></td>
              <td></td>';
                }
              }
            }



            }

          }
              ?>

              </tbody>


            </table>
          <?php } ?>
      </div>
 
</div>
           <!--   <a href="archivos/lista.pdf" target="_blank"><img src="opciones/reportar.png"></a>-->

  <script type="text/javascript">
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
        dom: 'Bfrtip',
        buttons: [
             'excel',
        ],
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
 
