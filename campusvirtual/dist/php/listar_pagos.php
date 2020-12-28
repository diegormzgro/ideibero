<!--<style type="text/css">
.bgimg {
    background-image: url('opciones/bannerclase.png');
    height: 270px; width: 800px;color: #ffffff;
    padding: 100px;
}
</style>
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $Posgrado=$_SESSION['Posgrado'];
    $FechaActual=$_SESSION['FechaActual'];
?>

 <script src="js/myjava.js"></script>
    <div class="card mb-3"  align="center">
        <center> <h1 class="mt-4">Pagos</h1></center>

    </div>
                   <div class="col" align="right">
                    <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
                </div>


<br><br>

                         <div class="row">
    <div class="col">
                       
        <div class="div-img hidden" >
            <img class="img"  src="opciones/posgrado/Maestria1.png"   id="Ma1">

        </div>
</div><div class="col">
</div>
    <div class="col">   
        <div class="div-img hidden" >
            <img class="img" src="opciones/posgrado/Maestria2.png" id="Ma2" >
        </div>
    </div>    


</div>
<br>
 <div class="row">
    <div class="col">
    </div>
    <div class="col">
    
                    <div class="div-img hidden" >
                       <center><a id="Estudiante">  <img class="img" src="opciones/posgrado/Estudiantil.png" ></a></center>
                   </div>
    </div>
    <div class="col">
    </div>
</div>
<br>
                         <div class="row">
    <div class="col">
                       
        <div class="div-img hidden" >
            <img class="img"  src="opciones/posgrado/Doctorado1.png"  id="Do1" >
        </div>
</div>
<div class="col">
    </div>
    <div class="col">   
        <div class="div-img hidden" >
            <img class="img" src="opciones/posgrado/Doctorado2.png" id="Do2" >
        </div>
    </div>    


</div>
<br>

    <script type="text/javascript">
         $('#Ma1').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=1");
        });
         $('#Ma2').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=2");
        });
          $('#Do1').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=3");
        });
          $('#Do2').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=4");
        });
        $('#Estudiante').click(function(){
            $('#contenido').load("php/listar_perfilGeneralPagos.php");
            $('.tooltip').remove();
        });

</script>
 
  <?php

}
else{
    header("location:login.html");
}
?>-->

 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Pagos</h1></center>
                        
                        
                             
          <div id="agrega-registros">
        <div class="card-header"><center><button type="button" class="btn btn-info" id="nuevo_pago">Nuevo Pago</button></center>
          <i class="fa fa-table"></i> Pagos general
          <div class="col" align="right">
            <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Posgrado</th>
                  <th>Alumno</th>
                  <th>Tipo de Pago</th>
                  <th>Forma de Pago</th>
                  <th>Descripción</th>
                  <th>Pagó</th>
                  <th>Monto</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

                require('conexion.php');

            $sql= "SELECT p.id,po.abrev,  CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, tp.Concepto, fp.forma_pago, sp.Estatus as Totalidad, p.fecha, p.fecha_recargo,p.descripcion, p.archivo, IF(p.estatus=1,'Validado','En Validación') AS Estatus, u.emailInst, p.Archivo, p.pago
              FROM catg_pago as p
              INNER JOIN usuario_activo as u ON p.idAlumno= u.id
              INNER JOIN sta_pago as sp ON sp.id = p.totalidad
              INNER JOIN sta_pago_concepto as tp ON tp.id= p.tipo_pago
              INNER JOIN catg_forma_pago as fp ON fp.id=p.forma_pago
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE p.eliminado=0

              ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador +1;
            echo '<tr>
            <td>'. $contador.'</td>
            <td>'.$renglon['abrev'].'</td>
            <td>'.$renglon['Nombre'].'</td>
            <td>'.$renglon['forma_pago'].'</td>
            <td>'.$renglon['Concepto'].'</td>
            <td>'.$renglon['descripcion'].'</td>
            <td>'.$renglon['fecha'].'</td>
            <td>'.number_format($renglon['pago'], 2, ',', '.').'</td>
            <td>'.$renglon['Estatus'].'</td>
            <td>';
            if ($renglon['Archivo']!='') {
              echo '<a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon['Archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a>';
            }else{
             echo '';
            }
            echo '
              <a href="javascript:eliminar_pago('.$renglon['id'].');"><img src="opciones/eliminar.png"></a>
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             </div>
            </table>

 
      </div>
 
</div></div>
                        </div>
                        
                        <?php  include("modal/modal_pago.php"); ?>
                     
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
      "scrollY": "500px",
      "scrollX":        true,
      "scrollCollapse": true,
      "paging":         false,
      "autoWidth": false,
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
 
  <?php

}
else{
    header("location:index.html");
}
?>