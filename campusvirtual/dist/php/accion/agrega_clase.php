<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro = $_POST['pro'];
$posgrado = $_POST['posgrado'];
$idPosgrado = $_POST['posgrado'];
$catedra = $_POST['catedra'];
$docente = $_POST['docente'];;
$status = $_POST['status'];
$ProgramaEstudio = $_FILES['ProgramaEstudio'];
$idGrupo = $_POST['idGrupo'];
$id=$_POST['id'];
session_start();
//VERIFICAMOS EL PROCESO
    


if ($posgrado==1) {
	$posgrado = "MDCDH";
}elseif ($posgrado == 2) {
	$posgrado = "MDE";
}elseif($posgrado == 3){
	$posgrado = "DDCDH";
}else{
	$posgrado = "DDE";
}

$micarpeta = "../../archivos/ProgramaEstudio/$posgrado";

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);

}else{

}

if ($_FILES['ProgramaEstudio']['name']!=""){
    if ($_FILES['Calendario']['name']!="") {
      $Cale_name1 = $_FILES['Calendario']['name'][0];  
      $temCale = $_FILES['Calendario']['tmp_name'][0];
      $archivoCale = $_FILES['Calendario'];
      $extensionCale = pathinfo($archivoCale['name'], PATHINFO_EXTENSION);
      $Calendario = $_FILES['Calendario']['name'];
      if (move_uploaded_file($archivoCale['tmp_name'], $micarpeta.'/'.$Calendario)) {

      }

    }

    $file_name1 = $_FILES['ProgramaEstudio']['name'][0];  
    $tem1 = $_FILES['ProgramaEstudio']['tmp_name'][0];
    
    $archivo = $_FILES['ProgramaEstudio'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	
    $nombre = $_FILES['ProgramaEstudio']['name'];
    if (move_uploaded_file($archivo['tmp_name'], $micarpeta.'/'.$nombre)) {

 	  $sql = "SELECT * FROM catg_asignacion_docente as a WHERE a.idGrupo='$idGrupo' AND a.idAsignatura='$catedra' AND a.Eliminado=0";
    $datos = mysqli_query($conexion,$sql);

    $filas = mysqli_num_rows($datos);
	while ($renglon=mysqli_fetch_array($datos)) {
        //$link= $renglon['Link'];
        $ProgramaEstudio=$renglon['ProgramaEstudio'];
  	}

	if ($filas>0) {
	$sql = "UPDATE catg_asignacion_docente as a SET idDocente='$docente', ProgramaEstudio='$nombre', Calendario='$Calendario',Estatus='$status' WHERE a.idAsignatura='$id' AND a.Eliminado=0 AND a.idGrupo='$idGrupo' ";
    $datos = mysqli_query($conexion,$sql);
	}else{
    $sql = "INSERT INTO catg_asignacion_docente (idGrupo, idAsignatura, idDocente, ProgramaEstudio, Calendario, Estatus) "."VALUES ($idGrupo, $catedra, '$docente', '$nombre', '$Calendario', $status)";
    $datos = mysqli_query($conexion,$sql);  
    }

	
    } else {
        echo 0;
    }
    
}else{
 $sql = "SELECT * FROM catg_asignacion_docente as a WHERE a.idGrupo='$idGrupo' AND a.idAsignatura='$catedra' AND a.Eliminado=0";
    $datos = mysqli_query($conexion,$sql);

    $filas = mysqli_num_rows($datos);
  while ($renglon=mysqli_fetch_array($datos)) {
        //$link= $renglon['Link'];
        $ProgramaEstudio=$renglon['ProgramaEstudio'];
    }

  if ($filas>0) {
  $sql = "UPDATE catg_asignacion_docente as a SET idDocente='$docente', Estatus='$status' WHERE a.idAsignatura='$id' AND a.Eliminado=0 AND a.idGrupo='$idGrupo' ";
    $datos = mysqli_query($conexion,$sql);
  }else{
    $sql = "INSERT INTO catg_asignacion_docente (idGrupo, idAsignatura, idDocente, Estatus) "."VALUES ($idGrupo, $catedra, '$docente',  $status)";
    $datos = mysqli_query($conexion,$sql);  
    }
}
 
 
?>
             <div class="card-header">
         
 <div class="row">
  <div class="col">
 <i class="fa fa-table"></i> Asignaturas
 </div> 
<div class="col" hidden>
     <button type="button" class="btn btn-primary" id="form" hidden>Nueva Asignatura</button>
    </div>
    

         <div class="col" align="right">
          <?php echo '<a href="javascript:regresar('.$idPosgrado.');">'; 
          ?>
     <button type="button" class="btn btn-dark">Regresar</button>
   </a>
    </div>
  </div>
        </div>
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

$sql= "SELECT a.idMateria, p.abrev, a.Materia, (SELECT m.ProgramaEstudio FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$idGrupo') AS ProgramaEstudio,
(SELECT m.Calendario FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$idGrupo') AS Calendario, 

      (SELECT st.Estatus FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$idGrupo') AS Estatus,
      (SELECT m.id FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$idGrupo') AS id
      fROM catg_asignatura AS a
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE a.idPosgrado='$idPosgrado' AND a.Eliminado=0
 

       ";


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
              echo '<td><a href="archivos/ProgramaEstudio/'.$posgrado.'/'.$renglon['ProgramaEstudio'].'" target="_blank" ><img src="opciones/reportar.png">
            </a></td>';
             }else{
              echo '<td></td>';
             }

             if ($renglon['Calendario']<>'') {
              echo '<td><a href="archivos/ProgramaEstudio/'.$posgrado.'/'.$renglon['Calendario'].'" target="_blank">
              <img src="opciones/reportar.png">
            </a></td>';
             }else{
              echo '<td></td>';
             }            
            
            echo '
            <td>'.$renglon['Estatus'].'</td>
            <td>';
            if ($renglon['ProgramaEstudio']<>'') {
              echo '<a href="javascript:listar_sesion('.$renglon['id'].', '.$idGrupo.');" title="Sesiones"><i class="btn-outline-success far fa-file-video " alt="Sesiones"></i></a>';

              }
              echo '

              <a href="javascript:editarClase('.$renglon['idMateria'].', '.$idGrupo.');"><i class="btn-outline-default fas fa-pencil-alt"></i></a>
              ';
             if ($renglon['ProgramaEstudio']<>'') {
              echo '<a href="javascript:eliminar_clase('.$renglon['id'].');" ><i class="btn-outline-danger fas fa-times"></i></a>';
            }
            echo '
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table>
          </div>
          </div>

    </div>
 <script type="text/javascript">
       function regresar(id){
      $('#contenido').load("php/listar_grupos.php?id_Posgrado="+id);
      }
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
 </script>