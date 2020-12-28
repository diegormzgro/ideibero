<style type="text/css">
.bgimg {
    background-image: url('opciones/fondo2.png');
    height: 345px; width: 875px;color: #ffffff;
    padding: 51px;
    background-repeat: no-repeat;
}
h4 {
    text-align: left;
    font-size: 17px;
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
}
?>
 <script src="js/myjava.js"></script>
<br><br><br><br><br><br>
                 

<br><br><br><br><br>
<center> <h1 class="mt-4">Reunión Universitaria</h1></center>
  <center>
<br>
    <div class='bgimg'>
    <div class="div-img2 hidden" >
      <br>
      <a href="https://zoom.us/j/93246275149" target="_blank" >
           <img class="img2"  src="opciones/youtube.png"  >
          
</a>
              </div>
            <br>
            <h3 align="center">Acceso: 2U0spf</h3>
            <br>
          
            <h4 align="left">Fecha: 28/05/2020 Inicia: 17:00 hrs</h4>
           

               </div>



                              
          <div id="agrega-registros">
          
                       

         </center>   
</div>
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
