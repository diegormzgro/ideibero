<script src="js/myjava.js"></script>

<?php
header("Content-Type: text/html;charset=utf-8");
include('../conexion.php');
$pro = $_POST['proSES'];

$TituloSES = $_POST['TituloSES'];
$FechaSES = $_POST['FechaSES'];
$HoraI = $_POST['HoraI'];
$Link = $_POST['Link'];
$LinkDiferido = $_POST['LinkDiferido'];
$HoraF = $_POST['HoraF'];
$id=$_POST['idSES'];
session_start();
//VERIFICAMOS EL PROCESO
$perfil=$_SESSION['emailInst'];
$id_grupo =$_POST['id_grupo'];
$id_materia =$_POST['id_materia'];
$Pass =$_POST['Pass'];

switch($pro){
	case 'Registro':
		$sql = "INSERT INTO catg_sesiones (idMateria, NombreSesion, FechaSesion, HoraInicio, HoraTermino, Link, LinkDiferido, Pass) ".  "VALUES ($id_materia, '$TituloSES', '$FechaSES', '$HoraI', '$HoraF', '$Link', '$LinkDiferido', '$Pass')";
		//$sql = "INSERT INTO catg_materias (idPosgrado, idDocente, Materia, FechaInicial, Estatus) VALUES($posgrado, $docente, '$catedra', '$fecha_i', $status)";
		$datos = mysqli_query($conexion,$sql);
		
	break;
	
	case 'Edicion':
		$sql= "UPDATE catg_sesiones SET NombreSesion='$TituloSES', FechaSesion='$FechaSES', HoraInicio='$HoraI', HoraTermino='$HoraF', Link='$Link', LinkDiferido = '$LinkDiferido', Pass='$Pass' WHERE idSesion='$id'";
		$datos = mysqli_query($conexion,$sql);
		
	break;


}
 
 ?>
  <script src="js/myjava.js"></script>
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

                //$id_Posgrado = intval($_GET['id_Posgrado']);

$sql= "SELECT s.idSesion, m.Materia, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS NombreCompleto, s.NombreSesion, s.FechaSesion, s.HoraInicio, s.HoraTermino, s.Link, s.Calificacion, s.LinkDiferido
 FROM catg_sesiones AS s
 INNER JOIN catg_asignacion_docente AS d ON d.id= s.idMateria
 INNER JOIN catg_asignatura AS m ON m.idMateria = d.idAsignatura
 INNER JOIN catg_catedratico AS ma ON ma.id=d.idDocente 
 WHERE d.id='$id_materia' AND s.ELiminado=0
ORDER BY s.FechaSesion ASC";
 
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
            <td>
            <a href="'.$renglon['LinkDiferido'].'"  target="_blank">
            <button class="btn btn-primary">
            <i class="fas fa-caret-square-right" aria-hidden="true" ></i>
            </button>

            </a>
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



            echo '<td style=" white-space: nowrap;">

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

            <?php include("../modal/modal_sesion.php"); ?>

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