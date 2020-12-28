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
    $id = intval($_GET['id']);
    require('../conexion.php');

    $sql ="SELECT p.nombre_posgrado, p.id, g.NombreGrupo, p.abrev FROM catg_grupo AS g 
          INNER JOIN catg_posgrado AS p ON p.id= g.idPosgrado
          WHERE g.idGrupo='$id' AND g.Eliminado=0 ";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $nombreCurso = $renglon['NombreGrupo'];
            $nombre_posgrado = $renglon['nombre_posgrado'];
             $id_Posgrado = $renglon['id'];
             $abrev = $renglon['abrev'];
                }
?>
 <script src="js/myjava.js"></script>
<center> <h2 class="mt-4"><?php echo $nombre_posgrado.'/'.$nombreCurso; ?></h2></center>
                        
                        
                             
          <div class="card mb-3"  id="agrega-registros">

 


 
      

                  <div class="card-header">
         
 <div class="row">
  <div class="col">
 <i class="fa fa-table"></i> Asignaturas
 </div> 
<div class="col" >
     <button type="button" class="btn btn-primary" id="form" >Nueva Asignatura</button>
    </div>
    

         <div class="col" align="right">
          <?php echo '<a href="javascript:regresar('.$id.');">'; 
          ?>
     <button type="button" class="btn btn-dark">Regresar</button>
   </a>
    </div>
  </div>
        </div>
          <div class="table-responsive" id="table">

<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
                           <thead>
                <tr>
                  <th>ID</th>
                  
                  <th>Materia</th>
                  <th>Programa de Estudio</th>
                  <th>Calendario</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                //$id_Posgrado = intval($_GET['id_Posgrado']);

$sql= "SELECT a.idMateria, p.abrev, a.Materia, (SELECT m.ProgramaEstudio FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$id') AS ProgramaEstudio, 
(SELECT m.Calendario FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$id') AS Calendario, 

      (SELECT st.Estatus FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$id') AS Estatus,
      (SELECT m.id FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$id') AS id
      fROM catg_asignatura AS a
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE a.idPosgrado='$id_Posgrado' AND a.Eliminado=0 ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
            echo '<tr>
            <td>'.$contador.'</td>
             <td>'.$renglon['Materia'].'</td>
             '; 

             if ($renglon['ProgramaEstudio']<>'') {
              echo '<td><a href="archivos/ProgramaEstudio/'.$abrev.'/'.$renglon['ProgramaEstudio'].'" target="_blank">
              <img src="opciones/reportar.png">
            </a></td>';
             }else{
              echo '<td></td>';
             }
             if ($renglon['Calendario']<>'') {
              echo '<td><a href="archivos/ProgramaEstudio/'.$abrev.'/'.$renglon['Calendario'].'" target="_blank">
              <img src="opciones/reportar.png">
            </a></td>';
             }else{
              echo '<td></td>';
             }        
            echo '
            <td>'.$renglon['Estatus'].'</td>
            <td style=" white-space: nowrap;">';
            if ($renglon['ProgramaEstudio']<>'') {
              echo '<a href="javascript:listar_sesion('.$renglon['id'].', '.$id.');" title="Sesiones">
              <img class="img-fluid" src="opciones/sesionesicon.png">
              </a>';
              echo '<a href="javascript:lista_asistencia('.$renglon['idMateria'].');">
              <img src="opciones/lista.png"></a>';

              }
              
              echo '

              <a href="javascript:editarClase('.$renglon['idMateria'].', '.$id.');">
              <img class="img-fluid" src="opciones/editar.png">
              </a>
              ';
             if ($renglon['ProgramaEstudio']<>'') {
              echo '<a href="javascript:eliminar_clase('.$renglon['id'].');" >
              <img class="img-fluid" src="opciones/eliminar.png">
              </a>';
            }echo '
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table>
          </div>
          </div>
          </div>

    </div>

 

                        <?php  
                        include("../modal/modal_clase.php"); 
                        include("../modal/modal_tarea.php");
                        include("../modal/modal_lectura.php");
                    
                        ?>

    <script type="text/javascript">
      function lista_asistencia(idMateria){
        $('#contenido').load("php/listar_asistenciaCE.php?idMateria="+idMateria);
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

          $('#Calendario').click(function(id, idGrupo){
            $('#contenido').load("php/listar_calendarioprograma.php?id="+id, "idGrupo="+idGrupo);
        });
 
     function regresar(id){
      $('#contenido').load("php/listar_grupos.php?id_Posgrado="+id);
      }

      function listar_sesion(id, idGrupo){
      $('#contenido').load("php/listar_calendarioprograma.php?id="+id,  "idGrupo="+idGrupo);
      }

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