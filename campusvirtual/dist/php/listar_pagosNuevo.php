
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
<style type="text/css">
  .card-header {
    margin-bottom: 0;
    background-color: #54266b;
    border-bottom: 1px solid rgba(0,0,0,.125);
    color: #fff;
}
.btn-link {
    font-weight: 400;
    color: #ffffff;
    text-decoration: none;
}
</style>
   <?php  include("modal/modal_admision_pago.php"); ?>

          <?php
                          require('conexion.php');
              $idAlumno = $_GET['idAlumno'];
                    //$idAlumno = 54;
            $sql= "SELECT u.pago_ultimo, u.pago_total, u.doc_cv, u.pago_beca, CONCAT_WS(' ', u.nombre, u.ap_paterno, u.ap_materno) AS Nombre
              FROM usuario_activo as u

              WHERE u.id='$idAlumno'

              ";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $filas = mysqli_num_rows($datos);

            if ($filas>0) {
            while ($renglon=mysqli_fetch_array($datos)) {
              $pago_ultimo=$renglon['pago_ultimo'];
              $pago_total=$renglon['pago_total'];
              $doc_cv = $renglon['doc_cv'];
              $pago_beca = $renglon['pago_beca'];
              $nombre = $renglon['Nombre'];
            }            
          }

          ?>              
                                      <center>

                                        <?php 
                                        echo '<a title="Ver perfil del alumno" href="javascript:editarPerfil('.$idAlumno.');">
              <img src="opciones/editar.png">
              </a><br>';
                                        echo $nombre; ?></center>
 
          <div id="agrega-registros">
        <div class="">
          <!--
          <center><button type="button" class="btn btn-info" id="nuevo_pago">Nuevo Pago</button></center>
        -->

          
          <div class="col" align="right">
            <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
          </div>
        </div>
        <div class="card-body">
            <?php
              if ($pago_ultimo!="") {
                $pago_ultimo2= $pago_ultimo+ 1;

                $pag=str_replace(',','',$pago_total); 
                $pago_ultimo3 = $pag * ($pago_beca/100);
                $nuevoPa = $pag - $pago_ultimo3;

 
                 echo '<br>Mensualidades:'.$pago_total. ' Beca: '.$pago_beca;
                 echo '<br>Porcentaje de recargo: '.$doc_cv. '%';

              }
            ?>
          </div>


<br><br>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
<?php 
                $idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Primer Cuatrimestre'
              ORDER BY o.Orden

              ";
            $datos = mysqli_query($conexion,$sql);
 while ($renglon=mysqli_fetch_array($datos)) {

              $idOrden= $renglon['Orden'];
              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.activo=1
              GROUP BY  p.idAlumno, p.idOrden, p.id";
              $datos4 = mysqli_query($conexion,$consulta_total);
            $filasGeneral = mysqli_num_rows($datos4);

          }
if ($filasGeneral>0){
 echo '
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="1C" name="1C" value="" id="defaultCheck1" checked>
        <label class="form-check-label" for="defaultCheck1">
        Activo
      </label>
      </div>
 ';

}else{
        echo '
              <div class="form-check">
      <input class="form-check-input"  type="checkbox" id="1C" value="" name="1C">
        <label class="form-check-label" for="defaultCheck1">
        Activar
      </label>
      </div>
       ';
}
?>

<script type="text/javascript">
          $('#1C').click(function (event) {
            if (this.checked) {
                $('#1C').each(function () {
                    this.checked = true;
                    activaPago(1,'<?php echo $idAlumno ?>');
                });
            } else {
                $('#1C').each(function () {
                    this.checked = false;
                    desactivaPago(1,'<?php echo $idAlumno ?>');
                });
            }
            });
</script>

      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         Primer cuatrimestre
        </button>

      </h5>

    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

            <table id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>
                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>
                  <th>Subir Archivo </th>
                  <th>Archivo</th>
                  <th>Diferencia</th>
                  <th>Subir Archivo </th>
                  <th>Archivo</th>
                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>
              <?php
                $idAlumno = $_GET['idAlumno'];

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Primer Cuatrimestre'
              ORDER BY o.Orden";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' 
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo '<td><img  src="opciones/cargar.png"></td>';

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
echo '<td><a href="javascript:pago_nuevo_diferencia('.$renglon['Orden'].','.$idAlumno.' , '.$dife.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td> <img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td> <img  src="opciones/cargar.png"></td>';
              }
            }

              $consulta_total_dif = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.diferencia
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.diferencia=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle_dif = mysqli_query($conexion,$consulta_total_dif);
          
          $filasGeneralDif = mysqli_num_rows($datos_detalle_dif);
          if ($filasGeneralDif>0) {
            # code...
  
          while ($renglon_dif=mysqli_fetch_array($datos_detalle_dif)) {

          if ($renglon_dif['archivo']<>'' AND $renglon_dif['diferencia']==1) {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon_dif['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }
          }}else{
            echo '<td></td>';
            }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }

            echo "<td>";
            if ($dife<0) {
                echo '<a href="javascript:moverExcedente('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-dark fas fa-star "></i></a>';
                echo '<a href="javascript:pago_nuevo_excedente('.$renglon['Orden'].','.$idAlumno.' , '.$dife.');"> <img  src="opciones/cargar.png"></a>';
            }
            echo '
            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
             
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

          }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
            }else{
                            $dife = 0;

              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "";
            }
            echo '<td></td>';


            if ($dife>0) {
              echo '<td><img  src="opciones/cargar.png"></td>';

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

echo '

            <td></td>
            <td></td>';
            if ($dife>0) {
echo '<td><a href="javascript:pago_nuevo_diferencia('.$renglon['Orden'].','.$idAlumno.' , '.$dife.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td> <img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td> <img  src="opciones/cargar.png"></td>';
              }
            }echo '
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
                          <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>

            </a>
         
              </td></tr>';
            }

          }
}
          


            ?>
              </tbody>
       
            </table>

<?php 

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Primer Cuatrimestre'
              ORDER BY o.Orden";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
                            $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden'  AND p.recargo=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              }

            $filasGeneral = mysqli_num_rows($datos_detalle);
    if ($filasGeneral>0) {
 echo'
            <table id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>';
              
                $idAlumno = $_GET['idAlumno'];

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Primer Cuatrimestre'
              ORDER BY o.Orden";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;


             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' 
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            echo '<td>
            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
                        <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
             
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

            }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }
            echo '
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
                <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>

              </td></tr>';
            }

          }
      }


?>

      </div>
    </div>
  </div>






  
  <div class="card">
    <div class="card-header" id="headingTwo">
<?php 
                $idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Segundo Cuatrimestre'
              ORDER BY o.Orden

              ";
            $datos = mysqli_query($conexion,$sql);
 while ($renglon=mysqli_fetch_array($datos)) {

              $idOrden= $renglon['Orden'];
              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.activo=1
              GROUP BY  p.idAlumno, p.idOrden, p.id";
              $datos4 = mysqli_query($conexion,$consulta_total);
            $filasGeneral = mysqli_num_rows($datos4);

          }
if ($filasGeneral>0){
 echo '
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="2C" name="2C" value="" checked>
        <label class="form-check-label" for="defaultCheck1">
        Activo
      </label>
      </div>
 ';

}else{
        echo ' <div class="form-check">
      <input class="form-check-input"  type="checkbox" id="2C" value="" name="2C">
        <label class="form-check-label" for="defaultCheck1">
        Activar
      </label>
      </div>';
}


?>

<script type="text/javascript">
          $('#2C').click(function (event) {
            if (this.checked) {
                $('#2C').each(function () {
                    this.checked = true;
                    activaPago(6,'<?php echo $idAlumno ?>');
                });
            } else {
                $('#2C').each(function () {
                    this.checked = false;
                    desactivaPago(6,'<?php echo $idAlumno ?>');
                });
            }
            });
</script>





      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Segundo Cuatrimestre
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">


            <table id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>
              <?php

                $idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Segundo Cuatrimestre'
              ORDER BY o.Orden

              ";
            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' 
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
echo '<td><a href="javascript:pago_nuevo_diferencia('.$renglon['Orden'].','.$idAlumno.' , '.$dife.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td> <img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td> <img  src="opciones/cargar.png"></td>';
              }
            }

              $consulta_total_dif = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.diferencia
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.diferencia=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle_dif = mysqli_query($conexion,$consulta_total_dif);
          
          $filasGeneralDif = mysqli_num_rows($datos_detalle_dif);
          if ($filasGeneralDif>0) {
            # code...
  
          while ($renglon_dif=mysqli_fetch_array($datos_detalle_dif)) {

          if ($renglon_dif['archivo']<>'' AND $renglon_dif['diferencia']==1) {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon_dif['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }
          }}else{
            echo '<td></td>';
            }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            echo '<td>
            <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon2['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

            }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
                          echo '<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
         
              </td></tr>';
            }

          }

          


            ?>
              </tbody>
       
            </table>

<?php 

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Segundo Cuatrimestre'
              ORDER BY o.Orden";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
                            $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden'  AND p.recargo=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              }

            $filasGeneral = mysqli_num_rows($datos_detalle);
    if ($filasGeneral>0) {
 echo'
            <table id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>';
              
                $idAlumno = $_GET['idAlumno'];

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Segundo Cuatrimestre'
              ORDER BY o.Orden";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;


             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' 
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            echo '<td>
            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
                        <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon2['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

            }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
                          echo '<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
  
              </td></tr>';
            }

          }
      }


?>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
<?php                 $idAlumno = $_GET['idAlumno'];

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Tercer Cuatrimestre'
              ORDER BY o.Orden

              ";
            $datos = mysqli_query($conexion,$sql);
 while ($renglon=mysqli_fetch_array($datos)) {

              $idOrden= $renglon['Orden'];
              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.activo=1
              GROUP BY  p.idAlumno, p.idOrden, p.id";
              $datos4 = mysqli_query($conexion,$consulta_total);
            $filasGeneral = mysqli_num_rows($datos4);

          }
if ($filasGeneral>0){
 echo '
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="3C" value="" id="3C" checked>
        <label class="form-check-label" for="defaultCheck1">
        Activo
      </label>
      </div>
 ';

}else{
        echo ' <div class="form-check">
      <input class="form-check-input"  type="checkbox" id="3C" value="" name="3C">
        <label class="form-check-label" for="defaultCheck1">
        Activar
      </label>
      </div>';
}


?>

<script type="text/javascript">
          $('#3C').click(function (event) {
            if (this.checked) {
                $('#3C').each(function () {
                    this.checked = true;
                    activaPago(11,'<?php echo $idAlumno ?>');
                });
            } else {
                $('#3C').each(function () {
                    this.checked = false;
                    desactivaPago(11,'<?php echo $idAlumno ?>');
                });
            }
            });
</script>


      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Tercer Cuatrimestre
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">


            <table  id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>
              <?php

                $idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Tercer Cuatrimestre'
              ORDER BY o.Orden

              ";
            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' 
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
echo '<td><a href="javascript:pago_nuevo_diferencia('.$renglon['Orden'].','.$idAlumno.' , '.$dife.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td> <img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td> <img  src="opciones/cargar.png"></td>';
              }
            }

              $consulta_total_dif = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.diferencia
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.diferencia=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle_dif = mysqli_query($conexion,$consulta_total_dif);
          
          $filasGeneralDif = mysqli_num_rows($datos_detalle_dif);
          if ($filasGeneralDif>0) {
            # code...
  
          while ($renglon_dif=mysqli_fetch_array($datos_detalle_dif)) {

          if ($renglon_dif['archivo']<>'' AND $renglon_dif['diferencia']==1) {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon_dif['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }
          }}else{
            echo '<td></td>';
            }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            echo '<td>
            <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon2['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

            }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
                          echo '<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
         
              </td></tr>';
            }

          }

          


            ?>
              </tbody>
       
            </table>

<?php 

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Primer Cuatrimestre'
              ORDER BY o.Orden";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
                            $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden'  AND p.recargo=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              }

            $filasGeneral = mysqli_num_rows($datos_detalle);
    if ($filasGeneral>0) {
 echo'
            <table id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>';
              
                $idAlumno = $_GET['idAlumno'];

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Primer Cuatrimestre'
              ORDER BY o.Orden";

            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");

            $contador=0;
            $dife=0;
            $nuevoPago = 0;
            $count =0;

            $dife=0;


             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' 
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$idAlumno.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            echo '<td>
            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
                        <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon2['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

            }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
                          echo '<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
  
              </td></tr>';
            }

          }
      }


?>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
<?php 
                $idAlumno = $_GET['idAlumno'];

            //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Cuarto Cuatrimestre'
              ORDER BY o.Orden

              ";
            $datos = mysqli_query($conexion,$sql);
 while ($renglon=mysqli_fetch_array($datos)) {

              $idOrden= $renglon['Orden'];
              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.activo=1
              GROUP BY  p.idAlumno, p.idOrden, p.id";
              $datos4 = mysqli_query($conexion,$consulta_total);
            $filasGeneral = mysqli_num_rows($datos4);

          }


if ($filasGeneral>0){
 echo '
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="4C" value="" id="4C" checked>
        <label class="form-check-label" for="defaultCheck1">
        Activo
      </label>
      </div>
 ';

}else{
        echo ' <div class="form-check">
      <input class="form-check-input"  type="checkbox" id="4C" value="" name="4C">
        <label class="form-check-label" for="defaultCheck1">
        Activar
      </label>
      </div>';
}


?>

<script type="text/javascript">
          $('#4C').click(function (event) {
            if (this.checked) {
                $('#4C').each(function () {
                    this.checked = true;
                    activaPago(16,'<?php echo $idAlumno ?>');
                });
            } else {
                $('#4C').each(function () {
                    this.checked = false;
                    desactivaPago(16,'<?php echo $idAlumno ?>');
                });
            }
            });
</script>

      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
          Cuarto Cuatrimestre
        </button>
      </h5>
    </div>
    <div id="collapseThree1" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">


            <table id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>
              <?php
                $idAlumno = $_GET['idAlumno'];

               // $idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Cuarto Cuatrimestre'
              ORDER BY o.Orden

              ";


             $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;

            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' 
              GROUP BY  p.idAlumno, p.idOrden";

              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            echo '<td>
            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

            }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
                          echo '<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
         
              </td></tr>';
            }

          }

            ?>
              </tbody>
       
            </table>



      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
<?php 
                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Quinto Cuatrimestre'
              ORDER BY o.Orden

              ";
            $datos = mysqli_query($conexion,$sql);
 while ($renglon=mysqli_fetch_array($datos)) {

              $idOrden= $renglon['Orden'];
              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.activo=1
              GROUP BY  p.idAlumno, p.idOrden, p.id";
              $datos4 = mysqli_query($conexion,$consulta_total);
            $filasGeneral = mysqli_num_rows($datos4);

          }
if ($filasGeneral>0){
 echo '
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="5C" value="" id="5C" checked>
        <label class="form-check-label" for="defaultCheck1">
        Activo
      </label>
      </div>
 ';

}else{
        echo ' <div class="form-check">
      <input class="form-check-input"  type="checkbox" id="5C" value="" name="5C">
        <label class="form-check-label" for="defaultCheck1">
        Activar
      </label>
      </div>';
}


?>

<script type="text/javascript">
          $('#5C').click(function (event) {
            if (this.checked) {
                $('#5C').each(function () {
                    this.checked = true;
                    activaPago(25,'<?php echo $idAlumno ?>');
                });
            } else {
                $('#5C').each(function () {
                    this.checked = false;
                    desactivaPago(25,'<?php echo $idAlumno ?>');
                });
            }
            });
</script>
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
          Quinto Cuatrimestre
        </button>
      </h5>
    </div>
    <div id="collapseThree2" class="collapse" aria-labelledby="collapseThree2" data-parent="#accordion">
      <div class="card-body">

            <table  id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>
              <?php
                $idAlumno = $_GET['idAlumno'];

                //$idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno' AND o.Semestre='Quinto Cuatrimestre'
              ORDER BY o.Orden

              ";

            $datos = mysqli_query($conexion,$sql);
            $dife=0;
             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden = $renglon['Orden'];

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, p.recargo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden'
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              

            $filasGeneral = mysqli_num_rows($datos_detalle);
            

            if ($filasGeneral>0) {


            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }
            if ($renglon2['Estatus']=='Validado') {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            </td>';
          }else{
            echo '<td></td>';
          }
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
              echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td></td>';
              }
            }

          if ($renglon2['archivo']<>'') {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }



            echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            echo '<td>
            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:validaPago('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-success fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
                          </td></tr>';
 
            }

            }else{
                          echo '<td>'.$renglon['Orden'].'</td>';
            echo '
            <td>'.$renglon['Concepto'].'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
                          echo '<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:validaPago2('.$renglon['Orden'].','.$renglon['id'].');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>            </td></tr>';
            }

          }

            ?>
              </tbody>
       
            </table>




      </div>
    </div>
  </div>
</div>


  <div class="card">
    <div class="card-header" id="headingThree">

      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#plan" aria-expanded="false" aria-controls="plan">
Plan de pagos completo
        </button>
      </h5>
    </div>
    <div id="plan" class="collapse" aria-labelledby="plan" data-parent="#accordion">
      <div class="card-body">

          <div class="table-responsive" id="table-principal">

            <table class="" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Plan de pagos</th>
                  <th>Concepto</th>

                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>
                  <th>Diferencia</th>
                  <th>Fecha de Pago</th>
                  <th>Fecha de Sistema</th>

                  <th>Subir Pago </th>
                  <th>Archivo</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>
              <?php
                $idAlumno = $_GET['idAlumno'];

              //  $idAlumno = $_GET['idAlumno'];
            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$idAlumno'
              ORDER BY o.Orden

              ";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {

              $idOrden= $renglon['Orden'];

              $consultaDoc ="SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 ";
              $datosdoc = mysqli_query($conexion,$consultaDoc);


              $consulta ="SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0
              GROUP BY  p.idAlumno, p.idOrden";
              $datos2 = mysqli_query($conexion,$consulta);

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo
              FROM catg_pago as p WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0
              GROUP BY  p.idAlumno, p.idOrden, p.id";
              $datos4 = mysqli_query($conexion,$consulta_total);
              $filasGeneral = mysqli_num_rows($datos4);

              $contador = $contador +1;


if ($filasGeneral>=2) {

  $dife=0;
$nuevoPago = 0;
$count =0;
while ($renglon2=mysqli_fetch_array($datos4)) {
            $count = $count +1;

           
            $activo = $renglon2['activo'];

            echo '<tr>
            <td>'.$renglon['Orden'].'</td>
            <td>'.$renglon['Concepto'].'</td>
            <td>'.$renglon['Semestre'].'</td>

            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';
            if ($count==1) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
            }else{


              echo '<td>$'.number_format($dife, 2, '.', ','). '</td>';
              $dife = $dife - ($renglon2['pago'] );

            }

              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ',').'</td>';

              if ($dife>0) {
                echo '<td>$'.number_format($dife, 2, '.', ',').'</td>';              
              }else{
                echo '<td >$'.number_format($dife, 2, '.', ',').'</td>'; 
              }
              



              echo '<td>'.$renglon2['fecha'].'</td>';
              echo '<td>'.$renglon2['fecha_creacion'].'</td>';

            if ($dife>0) {
                echo "<td></td>";
               }else{
                if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
              }else{
                echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>';
              }
               }

            echo "<td>";

          if ($renglon2['archivo']<>'') {
            echo '<a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>';
                      }

        
            echo "</td>";
              echo '<td>'.$renglon2['Estatus'].'</td>';
              echo '<td>';

              if ($dife>0) {
              }else{
                if ($renglon2['Estatus']=='Validado') {
                
                }else{
                  echo '<a href="javascript:validaPago('.$renglon2['id'].','.$idAlumno.');"><i class="btn-outline-primary fas fa-check "></i></a>';
                }
             }

            echo '
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon2['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
            </td></tr>';
 


            }


                    }





else{




            echo '<tr>
            <td>'.$renglon['Orden'].'</td>
            <td>'.$renglon['Concepto'].'</td>
            <td>'.$renglon['Semestre'].'</td>

            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>
            <td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
            $filas = mysqli_num_rows($datos2);
            //Si existe pago


            if ($filas>0) {
 
            while ($renglon2=mysqli_fetch_array($datos2)) {
                          $activo = $renglon2['activo'];

              $dife = $nuevoPa - $renglon2['pago'];
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ',').'</td>';

              if ($dife>0 AND $activo==0) {
                echo '<td bgcolor="red">$'.number_format($dife, 2, '.', ',').'</td>';              
              }else{
                echo '<td >$'.number_format($dife, 2, '.', ',').'</td>'; 
              }
              
              echo '<td>'.$renglon2['fecha'].'</td>';
              echo '<td>'.$renglon2['fecha_creacion'].'</td>';
            if ($dife>0) {
                echo "<td></td>";
               }else{
                if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
              }else{
                echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>';
              }
               }

            echo "<td>";

           while ($renglon3=mysqli_fetch_array($datosdoc)) {
            if ($renglon3['archivo']<>'') {
            echo '<a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon3['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>';
                        }

            }
            echo "</td>";
              echo '<td>'.$renglon2['Estatus'].'</td>';
              echo '<td>';

              if ($dife>0) {
              }else{
                if ($renglon2['Estatus']=='Validado') {
                
                }else{
                  echo '<a href="javascript:validaPago('.$renglon2['id'].','.$idAlumno.');"><i class="btn-outline-primary fas fa-check "></i></a>';
                }
             }

            echo '
                          <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
              <a href="javascript:editarPago('.$renglon2['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pago('.$renglon2['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
            </td></tr>';
 

            if ($dife>0 AND $renglon2['pago']>0) {

            echo '<tr>
            <td>'.$renglon['Orden'].'</td>
            <td>DIFERENCIA</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>';
            echo '<td >$'.number_format($dife, 2, '.', ',').'</td>
            <td></td>
            '; 
            echo '<td><a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>

            <td></td>
            <td></td>
            <td></td>
            </tr>
            ';
             }
            }


          }else{
            echo '
            <td></td>
            <td></td>

            <td></td>
            <td></td>
            <td>

            <a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>
            <td></td>
            <td>Por validar</td>';
            echo '<td>
            <a href="javascript:activaPagoI('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-warning fa fa-child" aria-hidden="true"></i>
            </a>
            <a href="javascript:validaPago2('.$renglon['Orden'].','.$idAlumno.');"><i class="btn-outline-primary fas fa-check "></i></a>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            </td>

            </tr>';
          }

                    }
                      }

            ?>
              </tbody>
       
            </table>

       </div>

         <div class="card-body"><h2>Recargos</h2>
          <div class="table-responsive" id="table2">

            <table class="" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
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

                $idAlumno = $_GET['idAlumno'];
              $consultaDoc ="SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo, o.Orden, CONCAT_WS('', u.nombre, u.ap_paterno, u.ap_materno) as Nombre
              FROM catg_pago as p 
              INNER JOIN usuario_activo AS u ON u.id='$idAlumno'
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado

              WHERE p.idAlumno='$idAlumno' AND p.Eliminado=0  AND p.recargo=1
              GROUP BY  p.idAlumno, p.idOrden, p.id";
              $datosdoc = mysqli_query($conexion,$consultaDoc);



            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datosdoc)) {
            $contador = $contador +1;

            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['Nombre'].'</td>
            <td></td>
            <td></td>
            <td>

            <a href="javascript:pago_nuevo('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>
            <td></td>
            <td></td>
            <td></td>';
             echo '<td>
            <a href="javascript:activaRecargo('.$renglon['Orden'].','.$idAlumno.');">
            <i class="btn-outline-danger fa fa-exclamation-circle" aria-hidden="true"></i>
            </a>
            <a href="javascript:editarPago('.$renglon['id'].');"><img src="opciones/editar.png"></a>
              <a href="javascript:eliminar_pagoR('.$renglon['id'].','.$idAlumno.');"><img src="opciones/eliminar.png"></a>
            </td>';
            echo "</tr>";
            }
            ?>
          </tbody>
        
            </table>
     </div>
 
      </div>
</div></div>
</div>
<br><br>







                        </div>
                        
  <?php  include("modal/modal_pago.php"); 
include("modal/modal_pago_dif.php");
include("modal/modal_pago_excedente.php");
  ?>
                     
    <script type="text/javascript">
     $('#vista').on('click',function(){
$(".divIDClass").show();
$(".display:none").show();

    });
 
      $(document).ready(function() {

        $('le').DataTable( {

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
      "scrollY": "600px",
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
 
