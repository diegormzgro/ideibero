 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
      $id = $_SESSION['id'];
?>
<center> <h1 class="mt-4">Pagos</h1></center>
                        
                                  <?php
                          require('conexion.php');

            $sql= "SELECT u.pago_ultimo, u.pago_total, u.doc_cv, u.pago_beca
              FROM usuario_activo as u

              WHERE u.id='$id'

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
            }      
                          if ($pago_ultimo!="") {
                $pago_ultimo2= $pago_ultimo+ 1;

                $pag=str_replace(',','',$pago_total); 
                $pago_ultimo3 = $pag * ($pago_beca/100);
                $nuevoPa = $pag - $pago_ultimo3;


              }      
          }

            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id, o.Semestre
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$id' AND ( o.Orden IN (SELECT idOrden FROM catg_pago WHERE idAlumno='$id' AND idOrden= o.Orden AND eliminado=0 AND activo=1 ORDER BY idOrden ASC))
              GROUP BY o.Semestre
              ORDER BY o.Orden ASC

              LIMIT 5
             
              ";
            $con=0;
            $datos = mysqli_query($conexion,$sql);
                        $filas = mysqli_num_rows($datos);


          ?>   
                             
          <div id="agrega-registros">
        <div class="card-header">
          <!--<center><button type="button" class="btn btn-info" id="nuevo_pago_alumno">Adjuntar comprobante de Pago</button></center>-->
          <i class="fa fa-table"></i> 
          <?php
            if ($filas>0) {
              while ($renglon=mysqli_fetch_array($datos)) {
                  echo $renglon['Semestre'];
              }
          }
          ?>
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
                $recargo_total = (($pago_total * $doc_cv));

              }

            ?>
     


                <div class=" col card-body" align="center">
          <div class="card text-white mb-3" style="background-color: #54266b; max-width: 28rem;">
            
  <div class="card-header">Cuenta de Pago</div>
  <div class="card-body" >
    <div class="text-justify">
                     Institución Bancaria: BBVA Bancomer <br>
Nombre: Instituto Iberoamericano de Derecho Electoral<br>
Número de Cuenta: 0112312530<br>
Clabe Interbancaria: 012180001123125300<br>
  </div>
</div>
</div>
        </div>
           </div>
          <div class="table-responsive" id="table">
<!--
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>
                  <th>A pagar</th>
                  <th>Pagado</th>
                  <th>Diferencia</th>
                  <th>Fecha de Pago</th>
                  <th>Archivo<--/th>
                  <th>Estatus</th>
                  <th>Recargo</th> 
 
                </tr>
              </thead>
            <tbody>

              <?php
                $hoy = date("d");
                require('conexion.php');

            $sql= "SELECT p.id,po.abrev,  CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, tp.Pago, fp.forma_pago, sp.Estatus as Totalidad, p.fecha, p.fecha_recargo,p.descripcion, p.archivo, IF(p.estatus=1,'Validado','Pendiente') AS Estatus, u.emailInst, p.pago as PagoE
FROM catg_pago as p
INNER JOIN usuario_activo as u ON p.idAlumno= u.id
INNER JOIN sta_pago as sp ON sp.id = p.totalidad
INNER JOIN catg_tipo_pago as tp ON tp.idtipopago= p.tipo_pago
INNER JOIN catg_forma_pago as fp ON fp.id=p.forma_pago
INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
WHERE p.eliminado=0 AND u.id='$id'";


            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador +1;
            echo '<tr>
            <td>'. $contador.'</td>
            <td>'.$renglon['descripcion'].'</td>
            <td>'.$renglon['PagoE'].'</td>
            <td>'.$renglon['PagoE'].'</td>
            <td>0</td>
            <td>'.$renglon['fecha'].'</td>
           <td>';
            if ($renglon['archivo']!='') {
              echo '<a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon['archivo'].'" target="_blank" ><img src="opciones/reportar.png">
            </a>';
            }else{
             echo '';
            }
            echo '
            <td>'.$renglon['Estatus'].'</td>
            <td>Sin Recargo</td>


            </tr>';

                    }
            ?>
              </tbody>
            
            </table>
-->


          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>
                  <th>Fecha Límite de Pago</th>
                  <th>Monto Total</th>
                  <th>% de Beca </th>
                  <th>A pagar</th>
                  <th>Pagado</th>
                  <th>Subir Archivo </th>
                  <th>Archivo</th>
                  <th>Diferencia</th>
                  <th>Subir Archivo </th>
                  <th>Archivo</th>
                  <th>Fecha de Registro</th>
                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>
              <?php
            $fecha =date("05-07-2020");


            $sql= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$id' AND ( o.Orden IN (SELECT idOrden FROM catg_pago WHERE idAlumno='$id' AND idOrden= o.Orden AND eliminado=0 AND activo=1 ORDER BY idOrden ASC))
 
              ORDER BY o.Orden ASC

              LIMIT 7
             
              ";
            $con=0;
            $datos = mysqli_query($conexion,$sql);
             while ($renglon=mysqli_fetch_array($datos)) {
              $idOrden=$renglon['Orden'];
              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.diferencia
              FROM catg_pago as p WHERE p.idAlumno='$id' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              
              $con = $con + 1;
            $filasGeneral = mysqli_num_rows($datos_detalle);
            if ($idOrden==2 || $idOrden==7 || $idOrden==12 || $idOrden ==17 || $idOrden==22) {
               
            }else{
              $fecha= date("d-m-Y",strtotime($fecha."+ 1 month")); 
            }

            if ($filasGeneral>0) {

            while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $dife=0;              
              

              
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }

            if ($renglon2['Estatus']=='Validado' ) {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            
            echo '<td>'.$con.'</td>';
            echo '
            <td>'.$renglon['Concepto'].' </td>
            <td>'.$fecha.'</td>
            <td>$'.$pago_total.'</td>
            <td>'.$pago_beca. '%</td>';

            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';
              echo '<td>$'.number_format($renglon2['pago'], 2, '.', ','). '</td>';
            }else{
              echo "<td>$".number_format($nuevoPa, 2, '.', ','). "</td>";
              if ($renglon2['Estatus']=='Validado') {
              echo '<td>$'.number_format($nuevoPa, 2, '.', ','). '</td>';

              }else{
                              echo "<td></td>";

              }
            }




            if ($dife>0) {
              echo "<td><img  src='opciones/cargar.png'></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo_estudiante('.$renglon['Orden'].','.$renglon['id'].');"> <img  src="opciones/cargar.png"></a></td>';
              }
            }


          $consulta_total_dif2 = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.diferencia
              FROM catg_pago as p WHERE p.idAlumno='$id' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.diferencia=1
              GROUP BY  p.idAlumno, p.idOrden
              LIMIT 1
              ";
              $datos_detalle_dif2 = mysqli_query($conexion,$consulta_total_dif2);
          $filasGeneralDif2 = mysqli_num_rows($datos_detalle_dif2);

          echo "<td>";

          if ($renglon2['archivo']<>'') {
            echo '<a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            ';
          }

          if ($filasGeneralDif2>0) {
            
          while ($renglon_dif=mysqli_fetch_array($datos_detalle_dif2)) {
          if ($renglon_dif['archivo']<>'' AND $renglon_dif['diferencia']==1) {
            echo '<a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon_dif['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  
            ';
          }
            }
          }
          echo "</td>";
          
          if ($dife>0) {
            echo "<td>$".$dife."</td>";
          }else{
            echo "<td></td>";
          }

            if ($dife>0) {
              echo '<td><a href="javascript:pago_nuevo_diferencia('.$renglon['Orden'].','.$id.' , '.$dife.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td><img  src="opciones/cargar.png"></td>';
              }
            }
              $consulta_total_dif = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.diferencia
              FROM catg_pago as p WHERE p.idAlumno='$id' AND p.Eliminado=0 AND p.idOrden='$idOrden' AND p.recargo=0 AND p.diferencia=1
              GROUP BY  p.idAlumno, p.idOrden  LIMIT 1";
              $datos_detalle_dif = mysqli_query($conexion,$consulta_total_dif);
          
          $filasGeneralDif = mysqli_num_rows($datos_detalle_dif);
          if ($filasGeneralDif>0 AND $dife==0) {
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



            //echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            if ($renglon2['Estatus']<>'Validado') {
            echo '<td>
              <a href="javascript:eliminar_pago('.$idOrden.','.$id.');"><img src="opciones/eliminar.png"></a>
            </td></tr>';
            }else{
                         echo '<td>
              <img src="opciones/eliminar.png">
            </td></tr>'; 
            }
            }

            }else{
                          echo '<td>'.$con.'</td>';
            echo '
            <td>'.$renglon['Concepto']. '</td>
            <td>'.$fecha.'</td>
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
            <td>

              <a href="javascript:eliminar_pago('.$idOrden.','.$id.');"><img src="opciones/eliminar.png"></a>
            </td></tr>';
            }

          }}

            ?>
              </tbody>
       
            </table>
      </div>
 
<?php


              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.idOrden
              FROM catg_pago as p WHERE p.idAlumno='$id' AND p.Eliminado=0 AND p.recargo=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
              $filasGeneral = mysqli_num_rows($datos_detalle);


if ($filasGeneral>0) {

echo '<br><br><br><center><h1>Recargos</h1></center><br>
 <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>

                  <th>Fecha Límite de Pago</th>
                  <th>A pagar</th>
                  <th>Pagado</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                  <th>Diferencia</th>

                  <th>Subir Archivo </th>
                  <th>Archivo</th>

                   <th>Fecha de Registro</th>

                  <th>Estatus</th>
                  <th>Acción</th>
                </tr>
              </thead>

            <tbody>';
               while ($renglon2=mysqli_fetch_array($datos_detalle)) {
              $idOrden = $renglon2['idOrden'];

            $sql2= "SELECT o.Orden, o.Concepto, CONCAT_WS(' ',u.nombre,u.ap_paterno,u.ap_materno) AS Nombre, u.pago_ultimo, po.abrev, u.emailInst, u.id
              FROM usuario_activo AS u 
              INNER JOIN orden_pago AS o ON o.idPosgrado= u.id_posgrado
              INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
              WHERE u.id='$id' AND ( o.Orden = $idOrden)
 
              ORDER BY o.Orden DESC

              LIMIT 7";
                           $datos_detalle2 = mysqli_query($conexion,$sql2);

            while ($renglon3=mysqli_fetch_array($datos_detalle2)) {

              $consulta_total = "SELECT IF(p.estatus=1,'Validado','Por validar') AS Estatus, SUM(p.pago) as pago, p.fecha, p.id, p.archivo , p.fecha_creacion, p.activo,p.recargo, p.idOrden, p.diferencia
              FROM catg_pago as p WHERE p.idAlumno='$id' AND p.Eliminado=0 AND p.recargo=1
              GROUP BY  p.idAlumno, p.idOrden";
              $datos_detalle = mysqli_query($conexion,$consulta_total);
            while ($renglon23=mysqli_fetch_array($datos_detalle)) {

              $contador =0;
              $dife=0;
            if ($renglon2['pago'] ) {
              $dife = $nuevoPa - ($renglon2['pago']);
            }

            if ($renglon2['Estatus']=='Validado' ) {
               echo '<tr class="bg-success">';
            }elseif ($dife>0) {
               echo '<tr class="bg-warning">';
            }elseif ($renglon2['recargo']<>0){
              echo '<tr class="bg-danger">';
            }
            else{
              echo "<tr>";
            }
            $contador = $contador+ 1;
            echo '<td>'.$contador.'</td>';
            //echo '<td>RECARGO /MENSUALIDAD'.$renglon3['Orden']. '</td>';
            echo '
            <td>RECARGO / MENSUALIDAD 1 <br>
1º Cuatrimestre
            </td>
            <td>05/09/2020</td>
            <td>$'.$recargo_total.'0</td>
             ';
//echo $array;
            if ($renglon23['pago'] ) {
              $dife = $nuevoPa - ($renglon23['pago']);
               echo '<td>$'.number_format($renglon23['pago'], 2, '.', ','). '</td>';
            }else{
               echo "<td></td>";
            }




            if ($dife>0) {
              echo "<td></td>";

            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td></td>';
            }else{
              echo '<td><a href="javascript:pago_nuevo_estudiante('.$renglon3['Orden'].','.$id.');"> <img  src="opciones/cargar.png"></a></td>';
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
              echo '<td><a href="javascript:pago_nuevo_diferencia('.$renglon['Orden'].','.$id.' , '.$dife.');"> <img  src="opciones/cargar.png"></a></td>';
            }else{
            if ($renglon2['Estatus']=='Validado') {
              echo '<td><img  src="opciones/cargar.png"></td>';
            }else{
              echo '<td><img  src="opciones/cargar.png"></td>';
              }
            }

          if ($renglon2['archivo']<>'' AND $renglon2['diferencia']=1) {
            echo '<td><a href="archivos/Pagos/'.$renglon['emailInst'].'/'.$renglon2['archivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
                  </td>
            ';
          }else{
            echo '<td></td>';
          }



            //echo '<td>'.$renglon2['fecha'].'</td>';
            echo '<td>'.$renglon2['fecha'].'</td>';
            if ($renglon2['Estatus']) {
            echo '<td>'.$renglon2['Estatus'].'</td>';
            }else{
            echo '<td></td>';

            }
            if ($renglon2['Estatus']<>'Validado') {
            echo '<td>
              <a href="javascript:eliminar_pago('.$idOrden.','.$id.');"><img src="opciones/eliminar.png"></a>
            </td></tr>';
            }else{
                         echo '<td>
              <img src="opciones/eliminar.png">
            </td></tr>'; 
            }
            }

            }
}


}

?>





 
</div></div>
<?php  include("modal/modal_pago_alumno.php"); 
        include("modal/modal_pago_alumno_dif.php");
?>
       </div>
<!--
<?php
if ($hoy>5) {
  echo '
                               <div class="card-body"><h2>Recargos</h2>
            <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Concepto</th>
                  <th>A pagar</th>
                  <th>Pagado</th>
                  <th>Diferencia</th>
                  <th>Fecha de Pago</th>
                  <th>Archivo</th>
                  <th>Estatus</th>
                  <th>Recargo</th> 
 
                </tr>
              </thead>
            <tbody>
              </tbody>
            
            </table>

  </div>

  ';
}

?>

-->
                        
                     
