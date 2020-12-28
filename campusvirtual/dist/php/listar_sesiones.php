 <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
-->
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $id = $_SESSION['id'];
    $idMateria = $_GET['idMateria'];
    require('conexion.php');

if ($perfil=='Docente') {
$sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE d.idDocente='$id' AND s.Eliminado=0 AND d.Eliminado=0 AND m.idMateria='$idMateria'
ORDER BY s.FechaSesion ASC
 ";
}elseif ($perfil=='Alumno') {
$sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, m.idMateria
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria

 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
 WHERE u.id='$id' AND s.Eliminado=0 AND d.Eliminado=0 AND m.idMateria='$idMateria'
ORDER BY s.FechaSesion ASC
 ";
}

    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $Materia = $renglon['Materia'];
            $Docente = $renglon['NombreCompleto'];
            $idMateria = $renglon['idMateria'];
                }
?>
 <script src="js/myjava.js"></script>
<?php if ($perfil=='Docente') {
echo ' <h2 class="mt-4">';
echo 'Asignatura: '.$Materia.''; 
echo '</h2></center>';
  }else{
echo ' <h2 class="mt-4">';
echo 'Asignatura: '.$Materia.'<p align="right">Catedrático:'.$Docente.'</p>'; 
echo '</h2></center>';
}                      
  ?>                      
                             
          <div class="card mb-3">

 


 
      

                  <div class="card-header">
         
 <div class="row">
  <div class="col">
 <i class="fa fa-table"></i> Sesiones
 </div> 
        <div class="col">
          <?php //echo' <a href="javascript:Nueva_Sesion('.$idAsignacion.','.$idGrupo.');">     <button type="button" class="btn btn-success">Nueva Sesión</button></a>'; ?>

    </div>

    <div class="col" align="right">
     <?php echo '<a href="javascript:regresaraula('.$idMateria.');"><button type="button" class="btn btn-dark" >Regresar</button></a>';?>
    </div>
  </div>
        </div>
        <div id="agrega-registros">
<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
                           <thead>
                <tr>
                 <th>ID</th>
                  <th>Sesión</th>
                  <th>Fecha</th> 
                  <th>Inicia</th>
                  <th>Finaliza</th>
                  <th>Directo</th>
                  <th>Diferido</th>
                  
                </tr>
              </thead>
            <tbody>
              <?php

                //$id_Posgrado = intval($_GET['id_Posgrado']);
if ($perfil=='Docente') {
$sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE s.Eliminado=0  AND d.idDocente='$id'  AND m.idMateria='$idMateria'
ORDER BY s.FechaSesion ASC ";
}
elseif ($perfil=='Alumno') {
  $sql="SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria

 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 INNER JOIN usuario_activo AS u ON u.id_posgrado = m.idPosgrado
 WHERE u.id='$id' AND s.Eliminado=0 AND d.Eliminado=0 AND m.idMateria='$idMateria' AND d.idGrupo= u.id_grupo  
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

            if ($renglon['LinkDiferido'] <> '') {
              echo '           
            <td>
               <button class="btn btn-secondary">
                <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
              </button>
            </td>
            <td>';
         if ($_SESSION['Perfil']=='Alumno') {
              echo '
            <a href="'.$renglon['LinkDiferido'].'" onclick="asistencias_diferido('.$id.','.$renglon['idSesion'].',2)" target="_blank">
<button class="btn btn-primary">
            <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
            </button>
            </a>
            ';
          }else{
            echo '  <a href="'.$renglon['LinkDiferido'].'"  target="_blank">
            <button class="btn btn-primary">
            <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
            </button>';
}
echo '

            </a>
            </td>
            ';
            }else{
              echo '
            <td>';
            if ($_SESSION['Perfil']=='Alumno') {
            echo '<a href="'.$renglon['Link'].'"  target="_blank" onclick="asistencias('.$id.','.$renglon['idSesion'].',1)">';
            }else{
            echo '<a href="'.$renglon['Link'].'"  target="_blank">';

              }
              echo '
            <button class="btn btn-danger"  >

            <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
                        </button>
            </a>
            </td>

            <td>
                  <button class="btn btn-secondary">
                <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
              </button>
            </td>
            
              ';
            }

           echo ' </tr>';

                    }
            ?>
              </tbody>
             
            </table>
          </div>
          </div>

    </div>

 

                        <?php  
                        include("modal/modal_sesion.php");
                        //include("modal/modal_clase.php"); 
                        //include("modal/modal_tarea.php");
                        //include("modal/modal_lectura.php");
                    
                        ?>

    <script type="text/javascript">
             function regresaraula(id){
      $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);
      }
function asignar(id){   
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var id= id;
       /// Invocamos a nuestro script PHP
    $.post("miscript.php", { id: id }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    //$("#recargado").html(data);
    });        
}

          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
        });   
          $('#Grupos').click(function(){

            $('#contenido').load("php/listar_grupos.php");
        });      
          $('#form').click(function(){

            $('#contenido').load("php/modal/form_archivo.php");
        });

          $('#Calendario').click(function(){

            $('#contenido').load("php/listar_calendarioprograma.php");
        });
         $('#Aulavirtual').click(function(){
            $('#contenido').load("php/listar_posgradoindex.php");
          
        });
          $(document).ready(function() {

        $('#dataTable, #dataTable2').DataTable( {
          responsive: true,
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

          
             } );
        } );
</script>
 
  <?php

}
else{
    header("location:login.html");
}
?>