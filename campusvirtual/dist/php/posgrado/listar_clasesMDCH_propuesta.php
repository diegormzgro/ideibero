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
          <i class="fa fa-table"></i> Clases 

 <center>
 <div class="row">
  <div class="col">
     <button type="button" class="btn btn-outline-primary" id="Grupos">Grupos</button>
    </div>
<div class="col">
     <button type="button" class="btn btn-primary" id="form">Nueva Clase</button>
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
</center>

        </div>
         <ul  class="list-group list-group-horizontal">
    <li class="list-group-item"><a data-toggle="tab" href="#home">Asignaturas </a></li>
    <li class="list-group-item"><a data-toggle="tab" href="#menu1" > Estudiantes asignados</a></li>
    <li class="list-group-item"><a data-toggle="tab" href="#menu2"> Estudiantes por asignar</a></li>
    <li class="list-group-item"><a data-toggle="tab" href="#menu3"> Propuesta</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

       <div class="card mb-3"  id="agrega-registros">
                <div class="card-header">
          <i class="fa fa-table"></i> Asignaturas 

        </div>
        <div class="card-body">
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

                
$sql= "SELECT a.idMateria,s.abrev, a.Materia, a.ProgramaEstudio
FROM catg_asignatura as a
INNER JOIN catg_posgrado AS s ON s.id=a.idPosgrado
WHERE s.id=1";


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


 



    <div id="menu1" class="tab-pane fade">
      

<div class="card mb-3"  id="agrega-registros">
            <table class="table table-striped table-bordered" id="dataTable2" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Posgrado</th>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
<tbody>
              <?php

                

            $sql= "SELECT  u.id, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst,  p.abrev AS Posgrado, pe.NombrePerfil AS Perfil, IF(u.bloqueado=1,'Bloqueado','Activo') AS estatus
FROM usuario_activo as u
INNER JOIN catg_posgrado as p ON p.id= u.id_posgrado
INNER JOIN catg_perfil as pe On pe.idPerfil= u.id_perfil
WHERE u.id_perfil=1 AND u.id_posgrado=1 AND u.eliminado=0";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
            echo '<tr>
            <td>'.$renglon['id'].'</td>
            <td>'.$renglon['Posgrado'].'</td>
            <td>'.$renglon['nombre'].'</td>
            <td>'.$renglon['ap_paterno'].'</td>
            <td>'.$renglon['ap_materno'].'</td>
            <td>'.$renglon['estatus'].'</td>
            <td>
              <a href="javascript:editarPerfil('.$renglon['id'].');"><i class="btn-outline-primary fas fa-pencil-alt"></i></a>
              <a href="javascript:listar_calificaciones('.$renglon['id'].');"><i class="btn-outline-success far fa-eye"></i>

              </a>
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             

            </table>
          </div>

    </div>
    <div id="menu2" class="tab-pane fade">
<div class="card mb-3"  id="agrega-registros">
            <table class="table table-striped table-bordered" id="dataTable2" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Posgrado</th>
                  <th>Nombre</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
<tbody>
  </tbody>
             

            </table>
          </div>

    </div>
    <div id="menu3" class="tab-pane fade">
      <div class="card mb-3"  id="agrega-registros">
      <div class="row">
        <div class="col">
                      <table class="table table-striped table-bordered" id="dataTable2" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
              <?php

                

            $sql= "SELECT  u.id, u.ap_paterno, u.ap_materno, u.nombre, u.emailInst,  p.abrev AS Posgrado, pe.NombrePerfil AS Perfil, IF(u.bloqueado=1,'Bloqueado','Activo') AS estatus
FROM usuario_activo as u
INNER JOIN catg_posgrado as p ON p.id= u.id_posgrado
INNER JOIN catg_perfil as pe On pe.idPerfil= u.id_perfil
WHERE u.id_perfil=1 AND u.id_posgrado=1 AND u.eliminado=0 AND u.id NOT IN (SELECT gd.idEstudiante FROM catg_grupo_detalle AS gd WHERE gd.Eliminado=0 AND gd.idGrupo='$id')";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            while ($renglon=mysqli_fetch_array($datos)) {
            echo '<tr>
            <td>'.$renglon['id'].'</td>
            <td>'.$renglon['nombre'].' '.$renglon['ap_paterno']. ' '.$renglon['ap_materno']. '</td>
            <td>
              <a href="javascript:asignar('.$renglon['id'].');" class="btn btn-outline-primary">Asignar</a>
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table></div>
        </div>
        <div class="col">
          <div class="card mb-3"  id="agrega-registros">
         <table class="table table-striped table-bordered" id="dataTable2" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Acción</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
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