<?php
session_start();

include('../conexion.php');

 
$id = $_POST['id'];

//VERIFICAMOS EL PROCESO
$perfil=$_SESSION['emailInst'];
//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_materias SET Eliminado = 1 WHERE idMateria = '$id' ";
$registro = mysqli_query($conexion,$sql);
//mysqli_query($conexion,"DELETE FROM cat_ejes WHERE pk_eje = '$id'");
$sql = "UPDATE catg_asignacion_docente SET Eliminado = 1 WHERE id = '$id' ";
$registro = mysqli_query($conexion,$sql);


$sql ="SELECT d.id, d.idGrupo, a.idPosgrado, p.abrev
FROM catg_asignacion_docente AS d
INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
INNER JOIN catg_posgrado AS p ON p.id=a.idPosgrado
WHERE d.id='$id'";
$registro = mysqli_query($conexion,$sql);
mysqli_set_charset($conexion,"utf8");

  while ($renglon=mysqli_fetch_array($registro)) {
   $id= $renglon['idGrupo'];
   $id_Posgrado = $renglon['idPosgrado'];
   $abrev= $renglon['abrev'];
   }


$sql= "SELECT a.idMateria, p.abrev, a.Materia, (SELECT m.ProgramaEstudio FROM catg_asignacion_docente AS m WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$id') AS ProgramaEstudio,
      (SELECT st.Estatus FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$id') AS Estatus,
      (SELECT m.id FROM catg_asignacion_docente AS m INNER JOIN sta_materias AS st ON st.id= m.Estatus WHERE m.idAsignatura=a.idMateria AND m.Eliminado=0 AND m.idGrupo='$id') AS id
      fROM catg_asignatura AS a
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE a.idPosgrado='$id_Posgrado' AND a.Eliminado=0 ";


 echo '     
                  <div class="card-header">
         
 <div class="row">
  <div class="col">
 <i class="fa fa-table"></i> Asignaturas
 </div> 
<div class="col" >
     <button type="button" class="btn btn-primary" id="form" >Nueva Asignatura</button>
    </div>
    

         <div class="col" align="right">';
           echo '<a href="javascript:regresar('.$id.');">'; 
          
          echo '
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
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>';



      

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
              echo '<td><a href="archivos/ProgramaEstudio/'.$abrev.'/'.$renglon['ProgramaEstudio'].'" target="_blank" ><img src="opciones/reportar.png">
            </a></td>';
             }else{
              echo '<td></td>';
             }
            
            
            echo '
            <td>'.$renglon['Estatus'].'</td>
            <td>';
            if ($renglon['ProgramaEstudio']<>'') {
              echo '<a href="javascript:listar_sesion('.$renglon['id'].', '.$id.');" title="Sesiones"><i class="btn-outline-success far fa-file-video " alt="Sesiones"></i></a>';

              }
              echo '

              <a href="javascript:editarClase('.$renglon['idMateria'].', '.$id.');"><i class="btn-outline-default fas fa-pencil-alt"></i></a>
              ';
             if ($renglon['ProgramaEstudio']<>'') {
              echo '<a href="javascript:eliminar_clase('.$renglon['id'].');" ><i class="btn-outline-danger fas fa-times"></i></a>';
            }
              echo '
              
            </td>

            </tr>';

                    }


            echo '   </tbody>
             </div>
            </table>

 
      </div>
 
</div></div>
                        </div>
                       

   ';        
 


 include("../modal/modal_clase.php");
            ?>
 

    <script type="text/javascript">
 
 
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

      //"scrollX": true,
      dom: 'Bfrtip' ,
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