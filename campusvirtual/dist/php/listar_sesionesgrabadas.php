 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
?>

 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Sesiones</h1></center>
                        
                        
                             
          <div id="agrega-registros">
             <p align="left"> <a href="general.php" class="btn btn-dark"> Regresar</a></p>
        <div class="card-header">
          <i class="fa fa-table"></i> Clases 

 <center>
 <div class="row">
  <?php 
if ($perfil==='Control Escolar') {

echo'
<div class="col">
     <button type="button" class="btn btn-primary" id="Nueva_Sesion">Nueva Sesión</button>
    </div>
        <div class="col">
     <button type="button" class="btn btn-success" id="nueva_lectura">Nueva Lectura</button>
    </div>
     <div class="col">
     <button type="button" class="btn btn-info" id="nueva_tarea">Nuevo Trabajo</button>
    </div>
  </div>';}
  ?>
  </div>
</center>

        </div>
        <div class="card-body">
          <div class="table-responsive" id="table">
<?php 
if ($perfil==='Control Escolar') {

?>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Posgrado</th>
                  <th>Asignatura</th>
                  <th>Fecha</th> 
                  <th>Inicio</th>
                  <th>Termino</th>
                  <th>Directo</th>
                  <th>Diferido</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "
                    SELECT s.idSesion, p.abrev, m.Materia, s.NombreSesion, 
              DATE_FORMAT(s.FechaSesion, '%d/%m/%Y') AS FechaSesion,
            s.HoraInicio, s.HoraTermino, s.Link
FROM catg_sesiones as s
INNER JOIN catg_materias as m ON m.idMateria=s.idMateria
INNER JOIN catg_posgrado as p ON p.id= m.idPosgrado
WHERE s.Eliminado=0;";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador =0;
            while ($renglon=mysqli_fetch_array($datos)) {
            $contador= $contador +1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['abrev'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>'.$renglon['FechaSesion'].'</td>
            <td>'.$renglon['HoraInicio'].'</td>
            <td>'.$renglon['HoraTermino'].'</td>
           
            <td>
            <button class="btn btn-danger" >
            <i class="fas fa-caret-square-right" aria-hidden="true"></i>
            </button>
            </td>

            <td>
            <button class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Clase no disponible" disabled>
            <i class="fa fa-video" aria-hidden="true"></i>
            </button>
            </td>
     

            </tr>';

                    }
            ?>
              </tbody>
              </table>
             </div>
            
<?php 
}else{ 

?>

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Posgrado</th>
                  <th>Asignatura</th>
                  <th>Fecha</th>
                  <th>Inicio</th>
                  <th>Termino</th>
                  <th>Directo</th>
                  <th>Diferido</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= " 
                    SELECT s.idSesion, p.abrev, m.Materia, s.NombreSesion, 
                  DATE_FORMAT(s.FechaSesion, '%d/%m/%Y') AS FechaSesion, s.HoraInicio, s.HoraTermino, s.Link
FROM catg_sesiones as s
INNER JOIN catg_materias as m ON m.idMateria=s.idMateria
INNER JOIN catg_posgrado as p ON p.id= m.idPosgrado
INNER JOIN login as l ON l.idPosgrado= p.id
                    WHERE s.Eliminado=0 AND s.Eliminado=0 AND l.correo='$correo';
                    ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
           $contador =0;
            while ($renglon=mysqli_fetch_array($datos)) {
            $contador= $contador +1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['abrev'].'</td>
            <td>'.$renglon['Materia'].'</td>
            <td>'.$renglon['FechaSesion'].'</td>

            <td>'.$renglon['HoraInicio'].'</td>
            <td>'.$renglon['HoraTermino'].'</td>
            <td>
            <button class="btn btn-danger" >
            <i class="fas fa-caret-square-right" aria-hidden="true"></i>
            </button>
            </td>
            
            <td>
            <button class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Clase no disponible" disabled>
            <i class="fa fa-video" aria-hidden="true"></i>
            </button>
            </td>
            
            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>

<?php 
}
?>
 
      </div>
 
</div></div>

                        <?php  include("modal/modal_clase.php"); include("modal/modal_tarea.php");
                        include("modal/modal_lectura.php"); include("php/modal/modal_sesion.php");
                        ?>

    <script type="text/javascript">
 
          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
        });      
          $('#form').click(function(){

            $('#contenido').load("php/modal/form_archivo.php");
        });

          $('#Calendario').click(function(){

            $('#contenido').load("php/modal/listar_calendarioprograma.php");
        });



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
      dom: 'Bfrtip' ,
      //"info":     false,

           buttons: [
               {
                   extend: 'colvis',
                   collectionLayout: 'fixed two-column'
               },

           ],


             });
 
</script>
 
  <?php

}
else{
    header("location:index.html");
}
?>