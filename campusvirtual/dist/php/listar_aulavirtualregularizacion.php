<style type="text/css">
.bgimg {
    background-image: url('opciones/fondo2.png');
    height: 345px; width: 875px;color: #ffffff;
    padding: 51px;
    background-repeat: no-repeat;
}
</style>
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    
    require('conexion.php');  

    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $Posgrado=$_SESSION['Posgrado'];
    $FechaActual=$_SESSION['FechaActual'];
    $id = $_SESSION['id'];
    $idPosgrado = $_SESSION['idPosgrado'];
    
    if(isset($_GET['idMateria'])){
      $idMateria = $_GET['idMateria'];
      if ($perfil=='Docente') {

      $consulta = "SELECT d.*, a.idPosgrado, p.abrev, a.Materia, a.idMateria
      FROM catg_asignacion_docente AS d
      INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE  a.Eliminado=0  AND d.idDocente= '$id' AND d.idAsignatura='$idMateria' AND d.Eliminado=0 ";

    }elseif ($perfil=='Alumno') {

    $consulta ="SELECT d.*, p.abrev, a.Materia, a.idMateria
    FROM catg_asignacion_docente AS d
    INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
    INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
    INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
    WHERE a.idPosgrado='$idPosgrado' AND a.Eliminado=0  AND u.id='$id' AND d.idAsignatura='$idMateria' AND d.Eliminado=0 ";

}else{

}
    }else{

       if ($perfil=='Docente') {

      $consulta = "SELECT d.*, a.idPosgrado, p.abrev, a.Materia, a.idMateria
      FROM catg_asignacion_docente AS d
      INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE  a.Eliminado=0  AND (d.Estatus=1 or d.Estatus=3)  AND d.idDocente= '$id' AND d.Eliminado=0   ";

    }elseif ($perfil=='Alumno') {

    $consulta ="SELECT d.*, p.abrev, a.Materia, a.idMateria
    FROM catg_asignacion_docente AS d
    INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
    INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
    INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
    WHERE a.idPosgrado='$idPosgrado' AND a.Eliminado=0  AND d.Estatus=1 AND d.Eliminado=0 AND d.idGrupo=u.id_grupo AND u.id='$id'  ";

}else{

}  


    }
?>
 <script src="js/myjava.js"></script>
<center> <h1 class="mt-4">Aula Virtual</h1></center>
                   <center>



                    
    <?php 


$ProgramaEstudio="";
$abrev="";






$datos = mysqli_query($conexion,$consulta);
while ($renglon=mysqli_fetch_array($datos)) {
        //$link= $renglon['Link'];
        $ProgramaEstudio=$renglon['ProgramaEstudio'];
        $abrev =$renglon['abrev'];
        $Materia =$renglon['Materia'];
        $idMateria2 =$renglon['idMateria'];
        $Asignacion = $renglon['id'];
        $Calendario = $renglon['Calendario'];
  }

$con = "SELECT * FROM catg_examen WHERE idAsignacion='$Asignacion' AND Eliminado=0 AND Estatus =0";

$datos2 = mysqli_query($conexion,$con);
$filas2 = mysqli_num_rows($datos2);

if($_SESSION['Perfil']=='Control Escolar' ){
$sql= "SELECT d.*, p.abrev, s.Link, s.FechaSesion, s.* FROM catg_asignacion_docente AS d 

 INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
 INNER JOIN catg_sesiones as s ON s.idMateria= d.id 

 INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado 
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
WHERE  DATE(s.FechaSesion)=CURDATE() AND a.Eliminado=0 AND s.Eliminado=0
";
}elseif ($_SESSION['Perfil']=='Alumno' ) {
$sql= "SELECT d.*, p.abrev, s.Link, s.FechaSesion, s.* FROM catg_asignacion_docente AS d 

 INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
 INNER JOIN catg_sesiones as s ON s.idMateria= d.id 

 INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado 
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
  WHERE a.idPosgrado='$idPosgrado' AND a.Eliminado=0 and a.idMateria='$idMateria'  AND s.Eliminado=0 AND u.id='$id' AND 
  DATE(s.FechaSesion)=CURDATE() 
  ";}
else{
$sql= "SELECT d.*, p.abrev, s.Link ,s.*
FROM catg_asignacion_docente AS d 
 INNER JOIN catg_asignatura AS a ON a.idMateria= d.idAsignatura
 INNER JOIN catg_sesiones as s ON s.idMateria= d.id 
INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado 
INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado 
  WHERE d.idDocente='$id' AND a.Eliminado=0 AND s.Eliminado=0  AND 
  DATE(s.FechaSesion)=CURDATE() 
  ";

}

$datos = mysqli_query($conexion,$sql);
$filas = mysqli_num_rows($datos);
while ($renglon=mysqli_fetch_array($datos)) {
        $link= $renglon['Link'];
        $idSesion= $renglon['idSesion'];
        $FechaSesion=$renglon['FechaSesion'];
        $HoraInicia=$renglon['HoraInicio'];
        $Pass=$renglon['Pass'];
  }

if ($filas>1) {
  echo '';
  
}else{

}


if ($filas>0 or $perfil=='Control Escolar') {
    ?>
    <div class='bgimg'>
    <div class="div-img2 hidden" >
      
      <center><h1><?php echo $Materia; ?></h1></center><br>
       <?php 
       if ($_SESSION['Perfil']=='Alumno') {
 echo '<a href="'.$link.'" target="_blank" onclick="asistencias('.$id.','.$idSesion.',1)">';
          }else{
             echo '<a href="'.$link.'" target="_blank">';
          }
      
       ?>
           <img class="img2"  src="opciones/youtube.png"  >
          </a>

              </div>
              <br>

            <h5 align="center">Acceso: <?php echo $Pass; ?></h5>
            <h5 align="left"><?php echo 'Fecha: '.$FechaSesion. ' Inicia: ' .$HoraInicia; ?></h5>



                            </div>

<?php 
}else{
  echo "<div class='bgimg'>
        <center><h1> $Materia</h1></center><br>
          <h1>''No hay clases por el momento''</h1>
          </div>";
}
?>

                              
          <div id="agrega-registros">
          
                       

         </center>   
</div>
                        </div>



  <div class="row">
    

    <div class="col">               
        <div class="div-img hidden" >

         <?php  
         if ($ProgramaEstudio <>'') {
          echo '<a href="archivos/ProgramaEstudio/'.$abrev.'/'.$ProgramaEstudio.' " target="_blank"> '; 
         }else{
          echo "<a>";
         }
         
         ?>
            <img class="img"  src="opciones/ProgramaEstudio.png"  >
          </a>
        </div>
    </div>


    <div class="col">   
        <div class="div-img hidden" >

         <?php  
         if ($Calendario <>'') {
          echo '<a href="archivos/ProgramaEstudio/'.$abrev.'/'.$Calendario.' " target="_blank"> '; 
         }else{
          echo "<a>";
         }
         ?>
              <img class="img"  src="opciones/calendarioMateria.png" >
              </a>

        </div>
    </div>    


    <div class="col">   
        <div class="div-img hidden" >
          <?php 
            if ($idMateria2) {
            echo '<a href="javascript:listar_sesiones('.$idMateria2.');">
            ';            
              }
            echo '<img class="img" src="opciones/Sesiones.png" id="calendario" ></a>';
            ?>

        </div>
    </div>    

</div>
<br>




<div class="row">


    <div class="col">   
        <div class="div-img hidden" >
          <?php 
           if ($idMateria2) {
            echo '<a href="javascript:lista_asistencia('.$idMateria2.');"><img class="img" src="opciones/Asistencias.png" ></a>';
          }else{
            echo '<img class="img" src="opciones/Asistencias.png">';  
          }?>


        </div>
    </div>



    <div class="col">   
        <div class="div-img hidden" >
           <?php 
           if ($idMateria2) {
           echo '<a href="javascript:listar_lecturaComuncomun('.$idMateria2.');">
           ';
              }
              echo '<img class="img" src="opciones/Lecturas.png"></a>';
           ?>

        </div>
    </div>


    <div class="col">   
        <div class="div-img hidden" >  
            <?php 
            if ($idMateria2) {
          echo '<a href="javascript:listar_trabajocomun('.$idMateria2.');">
            ';            
          }
          echo '<img class="img"  src="opciones/Trabajos.png" ></a>';
           
            ?>
      </div>
    </div>



</div>




<br>
<?php if($_SESSION['Perfil']<>'Alumno' ){


?>

 <div class="row" >


    <div class="col">
                       
        <div class="div-img hidden" >
        </div>
    </div>


    <div class="col">   
        <div class="div-img hidden" >  
            <?php if($_SESSION['Perfil']<>'Alumno' ){


            if ($Asignacion) {
              echo '<a href="javascript:evaluacionDocente('.$Asignacion.');">
                 ';  
              }
            echo '<img class="img"  src="opciones/ev.png" ></a>';
            }
            else{
             
                      if ($Asignacion) {

                      echo '<a href="javascript:listar_alumnos('.$idMateria2.');">
                      ';          }else{
                      
                    }

                    echo '<img class="img"  src="opciones/ev.png" >';
                    echo "</a>";
            }
            ?>
      </div>
    </div>


    <div class="col">   

    </div>   



</div>

<?php
}else{
?>

  <div class="row" >


    <div class="col">  
        <div class="div-img hidden" >
            
            <?php if($_SESSION['Perfil']=='Alumno' ){
              if ($idMateria2) {
              echo '<a href="javascript:listar_evaluaciones('.$idMateria2.');">
                 ';  
              }
            echo '<img class="img"  src="opciones/evaluaciones.png" ></a>';
            }
            else{
             
                      if ($idMateria2) {
                      echo '<a href="javascript:listar_alumnos('.$idMateria2.');">
                      ';          }else{
                      
                    }

                    echo '<img class="img"  src="opciones/evaluaciones.png" >';
                    echo "</a>";
            }
            ?>

           
        </div>
    </div>


    <div class="col">   
      <div class="div-img hidden" >
            <?php if($_SESSION['Perfil']=='Alumno' ){

            if ( $filas2>0) {
              echo '<a href="javascript:evaluacion('.$Asignacion.');">
                 ';  
              }
            echo '<img class="img"  src="opciones/ev.png" ></a>';
            }
            else{
                      
                    echo '<img class="img"  src="opciones/ev.png" >';
                    echo "</a>";
            }

            ?>


      </div>
    </div>  


    <div class="col" >   
        <div class="div-img hidden" >  

           <?php 
           if ($idMateria2) {
           echo ' 
           ';
              }
              echo '<img class="img" src="opciones/evDocente.png"></a>';

           ?>
        </div>
    </div>   
  <?php } ?>




</div>
<?php  include("modal/modal_tarea.php"); ?>

    <script type="text/javascript">
      function listar_lecturaComuncomun(id){
        $('#contenido').load("php/listar_lecturaComun.php?idMateria="+id);
      }
      function listar_trabajocomun(id){
        $('#contenido').load("php/listar_tareacomun.php?idMateria="+id);
      }
      function listar_sesiones(id){
        $('#contenido').load("php/listar_sesiones.php?idMateria="+id);
      }
      function listar_alumnos(id){
        $('#contenido').load("php/listar_perfilcomun2.php?idMateria="+id);
      }
      function listar_evaluaciones(idMateria){
        $('#contenido').load("php/modal/form_calificacionescomun.php?idMateria="+idMateria);
      }
      function lista_asistencia(idMateria){
        $('#contenido').load("php/listar_asistencia.php?idMateria="+idMateria);
      }
      function evaluacion(Asignacion){
        $('#contenido').load("php/listar_examen.php?Asignacion="+Asignacion);
      }
      function evaluacionDocente(id){
        $('#contenido').load("php/listar_evaluacionindex.php?idMateria="+id);
      }
         $('#pdf').click(function(){
            $('#contenido').load("php/ver_programaestudio.php");
        });
         $('#sesionesgrabadas').click(function(){
            $('#contenido').load("php/listar_sesionesgrabadas.php");
        });

        $('#asistencias').click(function(){
            $('#contenido').load("php/listar_asistencia.php");
        });


</script>
 
  <?php

}
else{
    header("location:index.html");
}
?>