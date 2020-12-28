 <?php

    session_start();
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $id = $_SESSION['id'];

    require('conexion.php');
            $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',u.nombre, u.ap_paterno,u.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, 
      s.Link, s.Calificacion, d.id , d.idGrupo, m.idPosgrado, p.abrev, m.idMateria, u.id AS idAlumno
       FROM catg_sesiones AS s
       INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
       INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
       INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
       INNER JOIN catg_posgrado AS p ON p.id = m.idPosgrado
       INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
       WHERE  s.Eliminado=0  AND d.Eliminado=0  AND u.emailInst<>''
       ORDER BY p.id, s.FechaSesion
       ";
 
 }


?>
 <script src="js/myjava.js"></script>
 <center> <h1 class="mt-4">Asistencias</h1></center>

                        
          <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">

          <i class="fa fa-table"></i> Asistencias
           
    <div class="col" align="right">
     <?php echo '<a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>';?>
    </div>
          </div>
          <br> 

        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                

 

                <TR>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">ID</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Posgrado</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Nombre</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Asignaturas</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Sesión</Th>
                <Th ROWSPAN=2 style="vertical-align : middle;text-align:center;">Fecha</Th>
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

           
            $datos = mysqli_query($conexion,$sql);
           while ($renglon=mysqli_fetch_array($datos)) {
            $contador = $contador +1;
            $idAlumno = $renglon['idAlumno'];
            $idSesion = $renglon['idSesion'];
              echo '<tr>
                <td>'.$contador.'</td>
                <td>'.$renglon['abrev'].'</td>
                <td>'.$renglon['NombreCompleto'].'</td>
                <td>'.$renglon['Materia'].'</td>
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

                ?>
        
              </tbody>
             
            </table>
            </div>

 
      </div>
 
</div>

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
 
