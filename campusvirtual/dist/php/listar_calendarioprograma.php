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
    $id=$_SESSION['id'];
    $idAsignacion = intval($_GET['id']);
    $idGrupo = intval($_GET['idGrupo']);
    require('conexion.php');

$sql= "SELECT CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, m.Materia, d.id, m.idMateria
 FROM catg_asignacion_docente AS d
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 
 WHERE d.id='$idAsignacion'  AND d.Eliminado=0
 ";

    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $Materia = $renglon['Materia'];
            $Docente = $renglon['NombreCompleto'];
            $idAsignacion = $renglon['id'];
            $idMateria = $renglon['idMateria'];
                }
?>
 <script src="js/myjava.js"></script>
<center> <h2 class="mt-4"><?php echo $Materia.'/'.$Docente; ?></h2></center>
                        
                        
                             
          <div class="card mb-3" >
                  <div class="card-header">
         
      <div class="row">
      <div class="col">
     <i class="fa fa-table"></i> Sesiones
     </div> 
            <div class="col">
              <?php 
              
              echo' <a href="javascript:Nueva_Sesion('.$idAsignacion.','.$idGrupo.');">     <button type="button" class="btn btn-success">Nueva Sesión</button></a>'; ?>

        </div>
        <div class="col" hidden>
     <button type="button" class="btn btn-success" id="nueva_lectura">Nueva Lectura</button>
    </div>
     <div class="col">
          <?php 
          
          echo' <a href="javascript:trabajo_final('.$idMateria.');"><button type="button" class="btn btn-info" >Trabajo Final</button></a>'; ?>

    </div>
     <div class="col">
          <?php 
          
          echo' <button type="button" class="btn btn-warning" >Evaluación Docente</button>'; ?>

    </div>
     <div class="col">
          <?php 
          
          echo'<a href="javascript:Evaluacion('.$idAsignacion.','.$idGrupo.');"> <button type="button" class="btn btn-danger" >Examen Teórico</button></a>'; ?>

    </div>
     <div class="col" align="right">
          <?php echo '<a href="javascript:regresar('.$idGrupo.');">'; 
          ?>
     <button type="button" class="btn btn-dark">Regresar</button>
   </a>
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
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

          $sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, 
          s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido
           FROM catg_sesiones AS s
           INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
           INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
           INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
           WHERE s.idMateria='$idAsignacion' AND s.ELiminado=0
          ORDER BY s.FechaSesion ASC
           ";

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
            <a href="'.$renglon['LinkDiferido'].'" onclick="asistencias_diferido('.$id.','.$idSesion.',2) target="_blank">';
          }else{
 echo '          <button class="btn btn-primary">
            <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
            </button>';
}
            echo '</a>
            </td>
            ';
            }else{
              echo '
            <td>
            <a href="'.$renglon['Link'].'"  target="_blank">
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
            echo '
            <td style=" white-space: nowrap;">

              <a href="javascript:listarLecturas('.$renglon['idSesion'].');" title="Lecturas">
              <img class="img-fluid"  src="opciones/lectura.png"></a>    
              <a href="javascript:listarTrabajos('.$renglon['idSesion'].');" title="Trabajos">
              <img class="img-fluid"  src="opciones/trabajo.png">
              </a>
              <a href="javascript:editarSesion('.$renglon['idSesion'].');" title="Editar Sesión">
              <img class="img-fluid"  src="opciones/editar.png"></a>
              <a href="javascript:eliminar_sesion('.$renglon['idSesion'].');" title="Elimar Sesión">
              <img class="img-fluid"  src="opciones/eliminar.png"></a>
              
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
                        include("modal/modal_sesion.php");
                        //include("modal/modal_clase.php"); 
                        //include("modal/modal_tarea.php");
                        //include("modal/modal_lectura.php");
                    
                        ?>

    <script type="text/javascript">
function asignar(id){   
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var id= id;
       /// Invocamos a nuestro script PHP
    $.post("miscript.php", { id: id }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    //$("#recargado").html(data);
    });        
}
       function Evaluacion(idAsignacion, idGrupo){
      $('#contenido').load("php/lista_evaluacion.php?idAsignacion="+idAsignacion+"&idGrupo="+idGrupo);
      }
       function regresar(id){
      $('#contenido').load("php/posgrado/listar_clasesgenericas.php?id="+id);
      }
      function listarTrabajos(id){
      $('#contenido').load("php/listar_tarea.php?idSesion="+id);
      }
      function trabajo_final(id){
      $('#contenido').load("php/listar_tareafinal.php?idMateria="+id);
      }
      function listarLecturas(id){
      $('#contenido').load("php/listar_lectura.php?idSesion="+id);
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