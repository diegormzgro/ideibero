
  <script src="js/myjava.js"></script>

<center>
                        <h1 class="mt-4">Examen Teórico</h1></center>
               
  		 
        <div class="card-header">
          <i class="fa fa-table"></i> 

  </div>
           <div class="col" align="right">
              <?php
                $Asignacion = $_GET['Asignacion'];

                session_start();
                $perfil=$_SESSION['Perfil'];
                if ($perfil<>'alumno') {
                echo '
                <a href="javascript:listar_aulaVirtalComun('.$Asignacion.');"<button type="button" class="btn btn-dark" >Regresar</button></a>
                ';
                }else{
              ?>
                <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
                <?php
                  }
                ?>
            </div>
        </div>
<?php
include('conexion.php');

  if ($perfil<>'Alumno') {

    $id= $_GET['idAlumno'];
    $consulta_valor="SELECT SUM(Valor) AS ValorTotal,ed.idExamen FROM catg_examen_detalle  as ed 
    INNER JOIN catg_examen as e ON e.idExamen = ed.idExamen
    WHERE e.idAsignacion='$Asignacion' AND ed.Eliminado=0 AND e.Eliminado=0 AND e.Estatus=0";

    $datosMaestro = mysqli_query($conexion,$consulta_valor);
    while ($renglonValor=mysqli_fetch_array($datosMaestro)) {
          $ValorTotal = $renglonValor['ValorTotal'];
          $idExamen = $renglonValor['idExamen'];
          echo '<b>Valor del examen:</b>'.$ValorTotal;
        }

    $consulta_puntos="SELECT SUM(e.Valor) AS TotalPuntos
    FROM catg_examen_detalle_alumno  as ed 
    INNER JOIN catg_examen_detalle as e ON e.idExamenDetalle = ed.idExamen
    WHERE e.idExamen='$idExamen' AND ed.Eliminado=0 AND e.Eliminado=0 AND ed.Estatus=1 AND ed.idAlumno='$id' ";
    $datosPuntos = mysqli_query($conexion,$consulta_puntos);
    $filasPuntos = mysqli_num_rows($datosPuntos);
    
    if($filasPuntos>0){
        while ($r=mysqli_fetch_array($datosPuntos)) {
            $TotalPuntos = $r['TotalPuntos'];
            echo ' /<b>Puntos obtenidos:</b>'.$TotalPuntos;
        }
    }

  }else{
    $id=$_SESSION['id'];
        $consulta_puntos="SELECT SUM(e.Valor) AS TotalPuntos
    FROM catg_examen_detalle_alumno  as ed 
    INNER JOIN catg_examen_detalle as e ON e.idExamenDetalle = ed.idExamen
    WHERE e.idExamen='$idExamen' AND ed.Eliminado=0 AND e.Eliminado=0 AND ed.Estatus=1 AND ed.idAlumno='$id' ";
    $datosPuntos = mysqli_query($conexion,$consulta_puntos);
    $filasPuntos = mysqli_num_rows($datosPuntos);
    
    if($filasPuntos>0){
        while ($r=mysqli_fetch_array($datosPuntos)) {
            $TotalPuntos = $r['TotalPuntos'];
            echo ' /<b>Puntos obtenidos:</b>'.$TotalPuntos;
        }
    }
  }


 ?>
<form id="form_evaluacion" name="form_evaluacion"   enctype="multipart/form-data">
<?php 


$consulta="SELECT ed.* FROM catg_examen_detalle  as ed 
INNER JOIN catg_examen as e ON e.idExamen = ed.idExamen
WHERE e.idAsignacion='$Asignacion' AND ed.Eliminado=0 AND e.Eliminado=0 AND e.Estatus=0 ";
$datos1 = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($datos1);
if ($filas>0) {
  while ($renglon=mysqli_fetch_array($datos1)) {
        $idExamen = $renglon['idExamen'];

  }
}
$consulta_m="SELECT ed.* FROM catg_examen_detalle  as ed 
INNER JOIN catg_examen as e ON e.idExamen = ed.idExamen
WHERE e.idAsignacion='$Asignacion' AND ed.Eliminado=0 AND e.Eliminado=0 AND e.Estatus=0
AND ed.Tipo=1 ";

$consulta_v="SELECT ed.* FROM catg_examen_detalle  as ed 
INNER JOIN catg_examen as e ON e.idExamen = ed.idExamen
WHERE e.idAsignacion='$Asignacion' AND ed.Eliminado=0 AND e.Eliminado=0 AND e.Estatus=0
AND ed.Tipo=2 ";

$consulta_a="SELECT ed.* FROM catg_examen_detalle  as ed 
INNER JOIN catg_examen as e ON e.idExamen = ed.idExamen
WHERE e.idAsignacion='$Asignacion' AND ed.Eliminado=0 AND e.Eliminado=0 AND e.Estatus=0
AND ed.Tipo=3 ";


$consulta_general="SELECT ed.Respuesta as RespuestaA, e.* FROM catg_examen_detalle_alumno  as ed 
INNER JOIN catg_examen_detalle as e ON e.idExamenDetalle = ed.idExamen
WHERE e.idExamen='$idExamen' AND ed.Eliminado=0 AND e.Eliminado=0 AND e.Estatus=0 AND ed.idAlumno='$id' ";
       $datosg = mysqli_query($conexion,$consulta_general);
        $filasg = mysqli_num_rows($datosg);

      $datos = mysqli_query($conexion,$consulta);

     $datosm = mysqli_query($conexion,$consulta_m);
     $datosv = mysqli_query($conexion,$consulta_v);
     $datosa = mysqli_query($conexion,$consulta_a);
if ($filasg>0) {
        $contador=0;

  while ($renglon=mysqli_fetch_array($datosg)) {

              $contador = $contador +1;
              $idExamen =$renglon['idExamen'];
              $Respuesta = $renglon['RespuestaA'];

            if ($renglon['Tipo']==2 ) {
    echo '<br><br><label><b>'.$contador.'- '.$renglon['Texto'].'</label> <label>('.$renglon['Valor'].' Puntos)/(Respuesta correcta: '.$renglon['Respuesta'].')</b></label><br> <br> ';

                if ($renglon['P1_Text']) {
                  if ($Respuesta=='Verdadero'and $Respuesta== $renglon['Respuesta']) {
    echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'"  value="Verdadero" readonly checked/> '.$renglon['P1_Text'].' 
    <i class="btn-outline-succes fas fa-check"></i><br><br>';                  
  }elseif ($Respuesta=='Verdadero'and $Respuesta<> $renglon['Respuesta']) {
    echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'"  value="Verdadero" readonly  checked/> '.$renglon['P1_Text'].' 
    <i class="btn-outline-danger fas fa-times"></i><br><br>';
      }
  else{
        echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'" readonly  value="Verdadero"  /> '.$renglon['P1_Text'].'<br><br>';
  }

                }
                if ($renglon['P2_Text']) {
                  if ($Respuesta=='Falso' and $Respuesta== $renglon['Respuesta']) {
    echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'" readonly  value="Falso"  checked/> '.$renglon['P2_Text'].' <i class="btn-outline-succes fas fa-check"></i><br><br>';
                  }elseif ($Respuesta=='Falso' and $Respuesta<> $renglon['Respuesta']) {
    echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'" readonly  value="Falso"  checked/> '.$renglon['P2_Text'].' <i class="btn-outline-danger fas fa-times"></i><br><br>';                 
     }
                  else{
                        echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'" readonly   value="Falso"  /> '.$renglon['P2_Text'].'<br><br>';

                  }
                }
              }




              if ($renglon['Tipo']==1) {
                echo '<br><br><label><b>'.$contador.'- '.$renglon['Texto'].'</label> <label>('.$renglon['Valor'].' Puntos)/(Respuesta correcta: '.$renglon['Respuesta'].')</b></label><br> <br> ';

                if ($renglon['P1_Text']) {
                  if ($Respuesta=='Opción 1'and $Respuesta== $renglon['Respuesta']) {
                    echo '<input class="form-check-input" type="radio" name="RM'.$renglon['idExamenDetalle'].'" id="" value="Opción 1" readonly checked /> '.$renglon['P1_Text'].'<i class="btn-outline-succes fas fa-check"></i><br><br>';
                  }elseif ($Respuesta=='Opción 1'and $Respuesta<> $renglon['Respuesta']) {
                    echo '<input class="form-check-input" type="radio" name="RM'.$renglon['idExamenDetalle'].'" id="" value="Opción 1" checked readonly/> '.$renglon['P1_Text'].'<i class="btn-outline-danger fas fa-times"></i><br><br>';
                  }else{
                    echo '<input class="form-check-input" type="radio" name="RM'.$renglon['idExamenDetalle'].'" id="" value="Opción 1" readonly /> '.$renglon['P1_Text'].'<br><br>';
                  }
                }

                if ($renglon['P2_Text']) {
                  if ($Respuesta=='Opción 2'and $Respuesta== $renglon['Respuesta']) {
                    echo '<input class="form-check-input" type="radio"  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 2" readonly checked/> '.$renglon['P2_Text'].'<i class="btn-outline-succes fas fa-check"></i><br><br>';
                  }elseif ($Respuesta=='Opción 2'and $Respuesta<> $renglon['Respuesta']) {
                    echo '<input class="form-check-input" type="radio"  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 2" readonly checked/> '.$renglon['P2_Text'].'<i class="btn-outline-danger fas fa-times"></i><br><br>';
                    }else{
                         echo '<input class="form-check-input" type="radio"  name="RM'.$renglon['idExamenDetalle'].'" readonly value="Opción 2" /> '.$renglon['P2_Text'].'<br><br>'; 
                    }
                }

                if ($renglon['P3_Text']) {
                    if ($Respuesta=='Opción 3'and $Respuesta== $renglon['Respuesta']) {
                      echo '<input class="form-check-input" type="radio" readonly name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 3"  checked/> '.$renglon['P3_Text'].'<i class="btn-outline-succes fas fa-check"></i><br><br>';
                    }elseif ($Respuesta=='Opción 3'and $Respuesta<> $renglon['Respuesta']) {
                      echo '<input class="form-check-input" type="radio" readonly name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 3"  checked/> '.$renglon['P3_Text'].'<i class="btn-outline-danger fas fa-times"></i><br><br>';
                    }else{
                       echo '<input class="form-check-input" type="radio" readonly name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 3" /> '.$renglon['P3_Text'].'<br><br>'; 
                    }
                }

                if ($renglon['P4_Text']) {
                    if ($Respuesta=='Opción 4'and $Respuesta== $renglon['Respuesta']) {
                  echo '<input class="form-check-input" type="radio" readonly name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 4"  checked/> '.$renglon['P4_Text'].'<i class="btn-outline-succes fas fa-check"></i><br><br>';
                    }elseif ($Respuesta=='Opción 4'and $Respuesta<> $renglon['Respuesta']) {
                  echo '<input class="form-check-input" type="radio" readonly  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 4"  checked/> '.$renglon['P4_Text'].'<i class="btn-outline-danger fas fa-times"></i><br><br>';
                    }else{
                       echo '<input class="form-check-input" type="radio" readonly  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 4" /> '.$renglon['P4_Text'].'<br><br>'; 
                  }
                }

                if ($renglon['P5_Text']) {
                  if ($Respuesta=='Opción 5'and $Respuesta== $renglon['Respuesta']) {

                    echo '<input class="form-check-input" type="radio" readonly  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 5"  checked/> '.$renglon['P5_Text'].'<i class="btn-outline-succes fas fa-check"></i><br><br>';
                  }elseif ($Respuesta=='Opción 5'and $Respuesta<> $renglon['Respuesta']) {

                    echo '<input class="form-check-input" type="radio" readonly  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 5"  checked/> '.$renglon['P5_Text'].'<i class="btn-outline-danger fas fa-times"></i><br><br>';
                  }else{
                       echo '<input class="form-check-input" type="radio" readonly  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 5" /> '.$renglon['P5_Text'].'<br><br>'; 
                  }
                }

}


          if ($renglon['Tipo']==3) {

              echo '<br><br><label><b>'.$contador.'- '.$renglon['Texto'].'</label> <label>('.$renglon['Valor'].' Puntos)</label></b><br> <br> ';
              echo '<textarea class="form-control" readonly type="text" name="RA'.$renglon['idExamenDetalle'].'" id="RA'.$renglon['idExamenDetalle'].'" 
              rows="20" > '.$Respuesta.'</textarea>';
      if ($perfil<>'Alumno') {
              echo '<input class="form-check-input" type="radio" name="RAC'.$renglon['idExamenDetalle'].'" id="" value="Correcta"  requiered/> Correcta<br>
                  <input class="form-check-input" type="radio" name="RAC'.$renglon['idExamenDetalle'].'" id="" value="Incorrecta"  requiered/> Incorrecta<br>
                  ';              
                }

              echo '<br><br>';

          }





          }  

            if ($perfil<>'Alumno') {
              echo '<input id="alumno" name="alumno" value="'.$id.'" hidden>';
              echo "<button class='btn btn-success' id='calificar'>Calificar</button>";
   echo "<input name='idExamen' id='idExamen' value=".$idExamen." hidden>
            <input name='Asignacion' id='Asignacion' value=".$Asignacion." hidden> ";
            }else{
            }


}else{
        $filas = mysqli_num_rows($datos);
if ($filas>0) {
       echo'<h2>El presente examen consta de tres apartados, el primero se compone de preguntas con respuesta de opción booleana (Verdadero o Falso), el segundo contiene preguntas con respuesta por opción múltiple y el último apartado se conforma por preguntas con respuesta abierta. Toda pregunta que no sea respondida se evaluará como incorrecta.</h2>
       <br><br>
';
           echo'
           <center>
               ';
  echo "Opción booleana.

</center>
  <br>
<br>";
       $contador=0;
  while ($renglon=mysqli_fetch_array($datosv)) {
              $contador = $contador +1;
              $idExamen =$renglon['idExamen'];

            if ($renglon['Tipo']==2) {
    echo '<br><br><label><b>'.$contador.'- '.$renglon['Texto'].'</label> <label>('.$renglon['Valor'].' Puntos)</label></b><br> <br> ';

                if ($renglon['P1_Text']) {
    echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'"  value="Verdadero"  requiered/> '.$renglon['P1_Text'].'<br><br>';
                }
                if ($renglon['P2_Text']) {
    echo '<input class="form-check-input" type="radio" name="RV'.$renglon['idExamenDetalle'].'"   value="Falso"  /> '.$renglon['P2_Text'].'<br><br>';
                }
              }
          }    
              echo'<br><center>Opción múltiple.</center><br>
Elija la opción o las opciones que corresponden a la respuesta correcta.
</h5> <br>';
 
            while ($renglon=mysqli_fetch_array($datosm)) {
              $idExamen =$renglon['idExamen'];

              if ($renglon['Tipo']==1) {
                $contador = $contador +1;

                echo '<br><br><label><b>'.$contador.'- '.$renglon['Texto'].'</label> <label>('.$renglon['Valor'].' Puntos)</label></b><br> <br> ';

                if ($renglon['P1_Text']) {
    echo '<input class="form-check-input" type="radio" name="RM'.$renglon['idExamenDetalle'].'" id="" value="Opción 1"  requiered/> '.$renglon['P1_Text'].'<br><br>';
                }
                if ($renglon['P2_Text']) {
    echo '<input class="form-check-input" type="radio"  name="RM'.$renglon['idExamenDetalle'].'"  value="Opción 2"  /> '.$renglon['P2_Text'].'<br><br>';
                }
                if ($renglon['P3_Text']) {
    echo '<input class="form-check-input" type="radio"  name="RM'.$renglon['idExamenDetalle'].'" value="Opción 3"  /> '.$renglon['P3_Text'].'<br><br>';
                }
                if ($renglon['P4_Text']) {
    echo '<input class="form-check-input" type="radio"  name="RM'.$renglon['idExamenDetalle'].'" value="Opción 4"  /> '.$renglon['P4_Text'].'<br><br>';
                }
                if ($renglon['P5_Text']) {
    echo '<input class="form-check-input" type="radio"  name="RM'.$renglon['idExamenDetalle'].'" value="Opción 5"  /> '.$renglon['P5_Text'].'<br><br>';
                }
              }
    }
    echo " ";
  

    while ($renglon=mysqli_fetch_array($datosa)) {
                    $idExamen =$renglon['idExamen'];

          if ($renglon['Tipo']==3) {
              $contador = $contador +1;
    echo '<br><br><label><b>'.$contador.'- '.$renglon['Texto'].'</label> <label>('.$renglon['Valor'].' Puntos)</label></b><br> <br> ';
    echo '<textarea class="form-control" type="text" name="RA'.$renglon['idExamenDetalle'].'" id="RA'.$renglon['idExamenDetalle'].'" rows="20" requiered> </textarea>'.$renglon['P1_Text'].'';
    
          }
          }      

            echo "<input name='idExamen' id='idExamen' value=".$idExamen." hidden>
            <input name='Asignacion' id='Asignacion' value=".$Asignacion." hidden> ";
            if ($perfil<>'Alumno') {

              # code...
            }else{
              echo "<button class='btn btn-success' id='enviar'>Terminar Examen</button>";
            }
    
          }
 }
?>

</form>

        </div>
 
      </div>
 
	<script type="text/javascript">
function listar_aulaVirtalComun(id){
  $('#contenido').load("php/listar_evaluacionindex.php?idMateria="+id);

}
    $('#enviar').click(function(){
          var url = 'php/accion/agregaPM_Alumno.php';
          var pregunta = confirm('¿Esta seguro de terminar esta evaluación?'); 
          if(pregunta==true){

            $.ajax({
            type:'POST',
            url:url,
            data:$('#form_evaluacion').serialize(),
            success: function(registro){
              alert("Examen terminado");
              location.href='general.php';
              return false;

            }

          });
                  return false;

                      //alert("10/10");
         }else{
            return false;
          }
        });


    $('#calificar').click(function(){
          var url = 'php/accion/calificar_examen.php';
          var pregunta = confirm('¿Esta seguro de calificar esta evaluación?'); 
          if(pregunta==true){

            $.ajax({
            type:'POST',
            url:url,
            data:$('#form_evaluacion').serialize(),
            success: function(registro){
              alert("Examen calificado");
              //location.href='general.php';
              return false;

            }

          });
                  return false;

                      //alert("10/10");
         }else{
            return false;
          }
        });
             pantalla = document.getElementById("screen");
        
          var isMarch = false; 
          var acumularTime = 0; 
      
      function cronometro () { 
         timeActual = new Date();
         acumularTime = timeActual - timeInicial;
         acumularTime2 = new Date();
         acumularTime2.setTime(acumularTime); 
         cc = Math.round(acumularTime2.getMilliseconds()/10);
         ss = acumularTime2.getSeconds();
         mm = acumularTime2.getMinutes();
         hh = acumularTime2.getHours()-18;
         if (cc < 10) {cc = "0"+cc;}
         if (ss < 10) {ss = "0"+ss;} 
         if (mm < 10) {mm = "0"+mm;}
         if (hh < 10) {hh = "0"+hh;}
         pantalla.innerHTML = hh+" : "+mm+" : "+ss+" : "+cc;
         if (ss==5) {
            alert("Se cierra");
         }
         }
        

        function start () {
           if (isMarch == false) { 
            timeInicial = new Date();
            control = setInterval(cronometro,10);
            isMarch = true;

            }
         }


      $(document).ready(function() {


  
  });


</script>
 