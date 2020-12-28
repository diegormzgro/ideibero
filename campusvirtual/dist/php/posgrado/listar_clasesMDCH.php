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

    $sql ="SELECT g.NombreGrupo FROM catg_grupo AS g WHERE idGrupo='$id'";
    $datos = mysqli_query($conexion,$sql);
      mysqli_set_charset($conexion,"utf8");
            
            while ($renglon=mysqli_fetch_array($datos)) {
            $nombreCurso = $renglon['NombreGrupo'];
                }
?>
 <script src="js/myjava.js"></script>
<center> <h2 class="mt-4">Maestría en Derecho Constitucional y Derechos Humanos/ Asignaturas/ <?php echo $nombreCurso; ?></h2></center>
                        
                        
                             
          <div class="card mb-3"  id="agrega-registros">

 


 
      

                  <div class="card-header">
         
 <div class="row">
  <div class="col">
 <i class="fa fa-table"></i> Asignaturas
 </div> 
<div class="col">
     <button type="button" class="btn btn-primary" id="form">Nueva Asignatura</button>
    </div>
   <div class="col">
     <button type="button" class="btn btn-danger" id="Calendario">Sesiones</button>
    </div>
        <div class="col">
     <button type="button" class="btn btn-success" id="nueva_lectura">Nueva Lectura</button>
    </div>
     <div class="col">
     <button type="button" class="btn btn-info" id="nueva_tarea">Nuevo Trabajo</button>
    </div>
         <div class="col">
     <button type="button" class="btn btn-warning" id="Aulavirtual">Regresar</button>
    </div>
  </div>
        </div>
<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
                           <thead>
                <tr>
                  <th>#</th>
                  <th>Posgrado</th>
                  <th>Materia</th>
                  <th>Archivo</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                $id_Posgrado = intval($_GET['id_Posgrado']);

$sql= "SELECT a.idMateria, p.abrev, a.Materia, (SELECT m.ProgramaEstudio FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria) AS ProgramaEstudio,
      (SELECT st.Estatus FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0) AS Estatus
      fROM catg_asignatura AS a
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE a.idPosgrado=1 AND a.Eliminado=0 ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador=$contador+1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['abrev'].'</td>
             <td>'.$renglon['Materia'].'</td>
            <td><a href="archivos/ProgramaEstudio/'.$renglon['ProgramaEstudio'].'" target="_blank" >
            <img src="opciones/reportar.png">
            </a></td>
            <td></td>
            <td>
            
              <a href="javascript:eliminar_clase('.$renglon['idMateria'].');"><i class="btn-outline-danger fas fa-times"></i></a>
              
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
                        include("../modal/modal_clase.php"); 
                        include("../modal/modal_tarea.php");
                        include("../modal/modal_lectura.php");
                    
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