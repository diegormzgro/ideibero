
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $Posgrado=$_SESSION['Posgrado'];
    $Nombre= $_SESSION['Nombre'];
    $id = $_SESSION['id'];

    require('php/conexion.php');
    if ($perfil=='Docente') {

      $consulta = "SELECT d.*, a.idPosgrado, p.abrev, a.Materia
      FROM catg_asignacion_docente AS d
      INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE  a.Eliminado=0  AND d.Estatus=1   AND d.idDocente= '$id'  AND d.Eliminado=0 ";

      $datos = mysqli_query($conexion,$consulta);
      $filas = mysqli_num_rows($datos);


    }elseif ($perfil=='Alumno') {

    $consulta ="SELECT d.*, p.abrev, a.Materia
    FROM catg_asignacion_docente AS d
    INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
    INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
    INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
    WHERE  a.Eliminado=0   AND d.Estatus=1  AND u.id='$id'  AND d.Eliminado=0 ";

    $datos = mysqli_query($conexion,$consulta);
$filas = mysqli_num_rows($datos);


    }




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link rel="shortcut icon" href="../../img/logo-100.png" type="image/vnd.microsoft.icon" />
        <title>Campus virtual</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

        
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<!--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->

<style>
  .imgRedonda {
    width:47px;
    height:47px;
    border-radius:100px;
    border:1.5px solid #ffffff;
}
body{
font-family: 'Roboto', sans-serif;
  

}
  table.dataTable thead tr {
  background-color: #54266b ;
  color: #EEEEEE;
}
th {
    text-align:center;
    font-size: 15px;
}

tr {
    text-align:center;
     font-size: 13px;
}

h1 {
    text-align:center;
     font-size: 24px;
}
h2 {
    text-align:center;
     font-size: 21px;
}
h3 {
    text-align:center;
     font-size: 18px;
}
</style>
    </head>
    <style type="text/css">
.contenido{
  max-width: 400px;

}
.container2 {
  width: 100px;
  height: 100px;

}

.div-img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.div-img.hidden {
  overflow: hidden;
}
.div-img .img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 65%;
  transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  -webkit-transform: scale(1);
  -o-transform: scale(1);
  -webkit-transition: all 500ms ease-in-out;
  -moz-transition: all 500ms ease-in-out;
  -ms-transition: all 500ms ease-in-out;
  -o-transition: all 500ms ease-in-out;
}
.div-img:hover .img {
  transform: scale(1.1);
  -ms-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  -o-transform: scale(1.1);
}

.div-img2 {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.div-img2.hidden {
  overflow: hidden;
}
.div-img2 .img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 10%;
  transform: scale(1);
  -ms-transform: scale(1);
  -moz-transform: scale(1);
  -webkit-transform: scale(1);
  -o-transform: scale(1);
  -webkit-transition: all 500ms ease-in-out;
  -moz-transition: all 500ms ease-in-out;
  -ms-transition: all 500ms ease-in-out;
  -o-transition: all 500ms ease-in-out;
}
.div-img2:hover .img2 {
  transform: scale(1.1);
  -ms-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  -o-transform: scale(1.1);
}

@media only screen and (min-width: 400px) {
.imglogo {
  width: 30%;
  height: 30%;
}
}
    </style>
    <body class="sb-nav-fixed" style="height:200px;">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
           <a class="nav-link" href="general.php" >
 
              <img src="opciones/logo.png" class="img-fluid" align="left">


          </a>
              
                        
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
             
            <ul class="navbar-nav ml-auto ml-md-0">
               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!-- -->
                    <?php
                         if($_SESSION['Perfil']=='Control Escolar' ){ 
                            echo " <img src='archivos/perfil/prueba.png' class='imgRedonda img-fluid' />";
                          }else{
                            echo ' <i class="fas fa-user fa-fw"></i>';
                          }
                     ?>
                     
                      <font color="white"> <h7>
                <?php echo $Nombre;?></h7>
                </font></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                         
                         <a class="dropdown-item" href="login.html">Cerrar sesión</a>
        </li>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">  
 
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"> </div>
                            <a class="nav-link" href="general.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Campus Virtual</a>
 
                            <div class="sb-sidenav-menu-heading">Panel de Control</div>
        <?php
          
         if($_SESSION['Perfil']=='Control Escolar' ){ ?>
                            <a class="nav-link" id="admision"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Admisiones</a>
                            <!--<a class="nav-link" id="estudiante"><div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>Estudiantes</a>-->
                            <a class="nav-link" id="clasesCE"><div class="sb-nav-link-icon"><i class="fas fa-play"></i></div>Mis posgrados</a>
                            <a class="nav-link" id="pagos"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>Pagos</a>
                            <a class="nav-link" id="pagos"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>Mis Cursos</a>
                            <a class="nav-link" id="catedraticos"><div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>Catedraticos</a>
                            <a class="nav-link" id="servicios"><div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>Servicios Escolares</a>
                            <a class="nav-link" id="comunidad"><div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>Calendario Escolar</a>
                            <a class="nav-link" href="https://ideiberoamericasp.ebookcentral.proquest.com/libCentral/Login.aspx?r=needlogin" target="_blank"><div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>Biblioteca Digital</a>
                            <a class="nav-link" href="https://iide-edu.com:2096/" target="_blank"><div class="sb-nav-link-icon"><i class="fas fa-mail-bulk"></i></div>Correo Electrónico</a>
                            <a class="nav-link" id="comunidad"><div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>Revista</a>
                            <a class="nav-link" id="comunidad"><div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>Blog</a>
                            <a class="nav-link" id="comunidad"><div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>Solicita Información</a>
                            
                            
                            
                            
                            
        <?php  }
        elseif($_SESSION['Perfil']=='Docente'){ ?>   
            <a class="nav-link" id="PerfilRO"><div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>Perfil</a>
                            <!--<a class="nav-link" id="estudiante"><div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>Estudiantes</a>-->
            <a class="nav-link" href="javascript:listar_calificacionesDocente('<?php echo $id ?>');"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>Mis Cátedras</a>
            
            <a class="nav-link" href="https://ideiberoamericasp.ebookcentral.proquest.com/libCentral/Login.aspx?r=needlogin" target="_blank"><div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>Biblioteca Digital</a>
            <?php 
            if ($filas >1) {
               echo '<a class="nav-link" id="modalclasecomun" href="javascript:listar_aulaVirtalComun('.$id.');"><div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>Aula Virtual</a>';
            }else{
              echo '<a class="nav-link" id="AulavirtualES"><div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>Aula Virtual</a>';
            }
            ?>
            <a class="nav-link" href="https://iide-edu.com:2096/" target="_blank"><div class="sb-nav-link-icon"><i class="fas fa-mail-bulk"></i></div>Correo Electronico</a>
      
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"></div>
             
              <div class="sb-sidenav-collapse-arrow"></div></a>
              <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
          </div> 
             

        <?php }else{ ?>

            <a class="nav-link" id="PerfilRO"><div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>Perfil</a>
                            <!--<a class="nav-link" id="estudiante"><div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>Estudiantes</a>-->
            <a  href='javascript:ProgresoEducativo("<?php echo $id ?>");' class="nav-link"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Progreso Educativo</a>
            <a class="nav-link" id="PagosE"><div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>Pagos</a>
            
            <a class="nav-link" href="https://ideiberoamericasp.ebookcentral.proquest.com/libCentral/Login.aspx?r=needlogin" target="_blank"><div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>Biblioteca Digital</a>

            <?php 
            if ($filas >1) {
               echo '<a class="nav-link" id="modalclasecomun" href="javascript:listar_aulaVirtalComun('.$id.');"><div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>Aula Virtual</a>';
            }else{
              echo '<a class="nav-link" id="AulavirtualES"><div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>Aula Virtual</a>';
            }
            ?>
          
            <a class="nav-link" href="https://iide-edu.com:2096/" target="_blank"><div class="sb-nav-link-icon"><i class="fas fa-mail-bulk"></i></div>Correo Electronico</a>
      
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"></div>
             
              <div class="sb-sidenav-collapse-arrow"></div></a>
              <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
           
          </div>

        <?php }
        ?>
                        </div>
 
                    </div>
                   <!-- <div class="sb-sidenav-footer">
                        
                    </div>-->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid" >
                      <div id="contenido">
                         <div class="card mb-3"  align="center">
                          
                          
                        <center> <h1 class="mt-4" align="center">Instituto Iberoamericano de Derecho Electoral</h1></center>
                        <br>
                        </div>
                       <div id="agrega-registros">
                        
                         <div class="row">
    <div class="col">
                      
<div class="div-img hidden" >
        
                    <?php 
          if ($perfil==='Control Escolar') {
            echo '<center><a id="Admision"><img class="img img-fluid" src="opciones/admisiones.png" alt="Admisiones" data-toggle="tooltip" data-placement="top" title="Admisiones">  </a></center>';
          }elseif ($perfil==='Docente') {
            echo '<center><a id="PerfilROC"> <img class="img img-fluid"  src="opciones/Perfil.png" alt="Perfil"  data-toggle="tooltip" data-placement="top" title="Perfil"> </a></center>';
          }else{
            echo '<center><a id="PerfilROC"> <img class="img img-fluid"  src="opciones/Perfil.png" alt="Perfil"  data-toggle="tooltip" data-placement="top" title="Perfil"> </a></center>';
          }

          ?>

      </div>
</div>
    <div class="col">   
     
           <div class="div-img hidden" >
        <?php 
          if ($perfil==='Control Escolar') {
            echo '<center><a id="Aulavirtual"><img class="img img-fluid" src="opciones/posgrados.png" alt="Aula Virtual" data-toggle="tooltip" data-placement="top" title="Mis Posgrados"></a></center>

            ';
          }elseif ($perfil==='Docente') {
            echo '<center><a href="javascript:listar_calificacionesDocente('.$id.');">
                <img class="img" src="opciones/Catedras.png" alt="Catedras" data-toggle="tooltip" data-placement="top" title="Mis catedras">
                </a></center>';
          }else{
            echo '<center><a  href="javascript:ProgresoEducativo('.$id.');"> <img class="img"  src="opciones/progreso.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Progreso Educativo"> </a></center>';
          }

          ?>
        </div>
    </div>    

    <div class="col">   
      <div class="div-img hidden" >
          <?php 
          if ($perfil==='Control Escolar') {
            echo '<center><a id="Pagos"> <img class="img img-fluid" src="opciones/Pagos.png" alt="Pagos" data-toggle="tooltip" data-placement="top" title="Pagos"> </a></center>';
          }elseif ($perfil==='Docente') {
          if ($filas >1) {
              echo '<a  href="javascript:listar_aulaVirtalComun('.$id.');">
                    <img class="img" src="opciones/Aula.png" alt="Aula virtual" data-toggle="tooltip" data-placement="top" title="Aula Virtual">
                    </a>';
            }else{
              echo'<a class="nav-link" id="AulavirtualESCentral"><img class="img" src="opciones/Aula.png" alt="Aula virtual" data-toggle="tooltip" data-placement="top" title="Aula Virtual"></a>';
            }
          }else{
            echo '<center><a id="PagosECentral"> <img class="img"  src="opciones/Pagos.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Pagos"> </a></center>';
          }

          ?>
           </div>
        
    </div>    

</div>
 <br>

          <?php 
          if ($perfil==='Docente') {
            echo '
            <div class="row">

                  <div class="col">
                <div class="div-img hidden" >
                <center> 
                  <a href="https://ideiberoamericasp.ebookcentral.proquest.com/libCentral/Login.aspx?r=needlogin" target="_blank"><div class="sb-nav-link-icon">
                  <img class="img"  src="opciones/Biblioteca.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Biblioteca Digital">
                  </a> 
                </center>
                  </div>
                  </div>

           <div class="col">   
          <div class="div-img hidden" >
                  
                <center><a href="https://iide-edu.com:2096/" target="_blank"><img class="img"  src="opciones/Correo.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Correo Electrónico"></a></center>
                 
            </div>
            </div>

            <div class="col">
            <div class="div-img hidden" >
            <img class="img img-fluid"  src="opciones/calendario.png" id="calendario"  data-toggle="tooltip" data-placement="top" title="Calendario Escolar">
            </div>
            </div>
            </div>

            ';
          }elseif ($perfil=='Alumno') {
            echo "<br>";
          }
          ?>
               <div class="row">
                  <div class="col">
            <div class="div-img hidden" >
                  
                      <?php 
          if ($perfil==='Control Escolar') {
            echo '<center><a id="">
             <img class="img img-fluid" src="opciones/cursos.png"  data-toggle="tooltip" data-placement="top" title="Mis cursos"></a></center>
             </a></center>';
          }
          elseif ($perfil==='Docente') {
            //echo ' <center><a href="https://ideiberoamericasp.ebookcentral.proquest.com/libCentral/Login.aspx?r=needlogin" target="_blank"><div class="sb-nav-link-icon">
             //     <img class="img"  src="opciones/Biblioteca.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Biblioteca Digital">
            //</a> </center>';
          }
          else{
            echo '<center><a href="https://ideiberoamericasp.ebookcentral.proquest.com/libCentral/Login.aspx?r=needlogin" target="_blank"><div class="sb-nav-link-icon">
                  <img class="img" src="opciones/Biblioteca.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Biblioteca Digital">
            </a> </center>';
          }

          ?>
               </div> 

              </div>
              <div class="col">   
         <div class="div-img hidden" >
          <?php 
          if ($perfil==='Control Escolar') {
            echo '<center>
            <img class="img img-fluid"  src="opciones/catedraticos.png" id="catedraticoscentral"  data-toggle="tooltip" data-placement="top" title="Catedráticos">
            </center>';
          }elseif ($perfil==='Docente') {
            echo '';
          }else{
            echo '<center>';
          if ($filas >1) {
              echo '<a  href="javascript:listar_aulaVirtalComun('.$id.');">
                    <img class="img" src="opciones/Aula.png" alt="Aula virtual" data-toggle="tooltip" data-placement="top" title="Aula virtual">
                    </a>';
            }else{
              echo'<a class="nav-link" id="AulavirtualESCentral"><img class="img" src="opciones/Aula.png" alt="Aula virtual" data-toggle="tooltip" data-placement="top" title="Aula virtual"></a>';
            }
            echo '</center>';
            ;
          }

          ?>
       </div>
    </div>    

    <div class="col">   
         <div class="div-img hidden" >
                      <?php 
          if ($perfil==='Control Escolar') {
            echo '<center>
                  <img class="img img-fluid"  src="opciones/servicios.png" id=""  data-toggle="tooltip" data-placement="top" title="Servicios Escolares">
             </center>';
          }elseif ($perfil==='Docente') {
            echo '';
          }else{
            echo '<center><a href="https://iide-edu.com:2096/" target="_blank"><img class="img"  src="opciones/Correo.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Correo Electrónico"></a></center>';
          }

          ?>
        </div>
       
    </div>    

</div>
                  <?php 
          if ($perfil==='Control Escolar') {
            echo '
          <br>



                         <div class="row">
                        
    <div class="col">
     <div class="div-img hidden">
    <img class="img img-fluid"  src="opciones/calendario.png" id="calendario"  data-toggle="tooltip" data-placement="top" title="Calendario escolar">
    </div></div>

    
    <div class="col">   
    <div class="div-img hidden" >
    <a href="https://ideiberoamericasp.ebookcentral.proquest.com/libCentral/Login.aspx?r=needlogin" target="_blank">
                  <img class="img"  src="opciones/Biblioteca.png" alt="Perfil"  data-toggle="tooltip" data-placement="top" title="Biblioteca Digital">
            </a>
      
        </div>
  </div>

   
    <div class="col">   
     <div class="div-img hidden" >
     <a href="https://iide-edu.com:2096/" target="_blank">

            <img class="img"  src="opciones/Correo.png" alt="Perfil" data-toggle="tooltip" data-placement="top" title="Correo Electrónico"></a>
 
    </div>  
    </div>  

</div> 
<br>




                         <div class="row">
                        
    <div class="col">
     <div class="div-img hidden" >
          <img class="img"  src="opciones/revista.png" id="revista"  data-toggle="tooltip" data-placement="top" title="Revista">
     

    </div></div>

    
    <div class="col">   
    <div class="div-img hidden" >
      <img class="img"  src="opciones/blog.png" id="blog"  data-toggle="tooltip" data-placement="top" title="Blog">
        </div>
  </div>

   
    <div class="col">   
     <div class="div-img hidden" >
      <img class="img" src="opciones/Solicitar.png" alt="Solicitar Información"  data-toggle="tooltip" data-placement="top" title="Solicita Información">
    </div>  
    </div>  

</div> 

';}
?>




</div>

         </div>           </div>

</main>

          
                        
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Instituto Iberoamericano de Derecho Electoral 2020</div>
               
                        </div>
                    </div>
                </footer>
            </div>
        </div>


    <!-- Logout Modal-->
    <div class="modal fade" id="CerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Esta seguro que desea cerrar su sesión?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" style="background-color:#D4C19C;">Cancelar</button>
            <a class="btn btn-primary" href="php/cerrar_sesion.php" style="background-color:#9D2449;"/>Aceptar</a>
          </div>
        </div>
      </div>
    </div>

     <div class="modal fade" id="clase-curso" tabindex="-1" role="dialog" aria-labelledby="clase-curso" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="clase-curso">Clases en cursos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Asignatura</th>

                </tr>
              </thead>
              <tbody>
               <?php
               

    if ($perfil=='Docente') {

    $consulta = "SELECT d.*, a.idPosgrado, p.abrev, a.Materia, a.idMateria
      FROM catg_asignacion_docente AS d
      INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
      INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
      WHERE  a.Eliminado=0 AND d.Estatus=1 AND d.idDocente= '$id'  AND d.Eliminado=0 ";

    }elseif ($perfil=='Alumno') {

    $consulta ="SELECT d.*, p.abrev, a.Materia, a.idMateria
    FROM catg_asignacion_docente AS d
    INNER JOIN catg_asignatura  AS a ON d.idAsignatura=a.idMateria
    INNER JOIN usuario_activo AS u ON u.id_posgrado = a.idPosgrado
    INNER JOIN catg_posgrado AS p ON p.id= a.idPosgrado
    WHERE a.Eliminado=0 AND d.Estatus=1 AND u.id='$id'  AND d.Eliminado=0 ";

    }                    

                
            $datos = mysqli_query($conexion,$consulta);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
            $contador = $contador +1;
            echo '<tr>

            <td><a href="javascript:listar_aulaVirtal('.$renglon['idMateria'].');">'.$renglon['Materia'].'</a></td>


            </tr>';

                    }   

                ?>
              </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/upload.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
            

        <script type="text/javascript">
function listar_aulaVirtal(id){
  $('#contenido').load("php/listar_aulavirtual.php?idMateria="+id);


 $("#clase-curso").modal('hide');//ocultamos el modal
  $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  $('.modal-backdrop').remove();//eliminamos el backdrop del modal
}
 

  function listar_aulaVirtalComun(id){
     //var url = 'php/modal/modal_claseencurso?idAlumno='+id;
  $('#clase-curso').modal({
      show:true,
      backdrop:'static'
    });
  }

  function ProgresoEducativo(id){
  $('#contenido').load("php/modal/form_progresoeducativo.php?id="+id);

}
        $('#admision').click(function(){

            $('#contenido').load("php/listar_admision.php");
            $('.tooltip').remove();
        });
          $('#Admision').click(function(){

            $('#contenido').load("php/listar_admision.php");
            $('.tooltip').remove();
        });
        $('#Perfil').click(function(){
            $('#contenido').load("php/listar_perfil.php");
            $('.tooltip').remove();
        });
            $('#estudiante').click(function(){
            $('#contenido').load("php/listar_perfil.php");
            $('.tooltip').remove();
        });
        $('#PerfilRO').click(function(){
            $('#contenido').load("php/modal/form_perfilRO.php");
            $('.tooltip').remove();
        });
            $('#PerfilROC').click(function(){
            $('#contenido').load("php/modal/form_perfilRO.php");
            $('.tooltip').remove();
        });
         $('#Aulavirtual').click(function(){
            $('#contenido').load("php/listar_posgradoindex.php");
            $('.tooltip').remove();
          
        });
         $('#AulavirtualDoc').click(function(){
            $('#contenido').load("php/listar_posgradoindex.php");
            $('.tooltip').remove();
          
        });
         $('#AulavirtualES').click(function(){
 
            $('#contenido').load("php/listar_aulavirtual.php");

            $('.tooltip').remove();
          
        });
         $('#AulavirtualESCentral').click(function(){
            $('#contenido').load("php/listar_aulavirtual.php");
            $('.tooltip').remove();
          
        });
        $('#Estudiante').click(function(){
            $('#contenido').load("php/listar_perfil.php");
            $('.tooltip').remove();
        });
        $('#clases').click(function(){
            $('#contenido').load("php/listar_clase.php");
            $('.tooltip').remove();
           
        });
        $('#clasesCE').click(function(){
            $('#contenido').load("php/listar_posgradoindex.php");
            $('.tooltip').remove();
           
        });
        $('#aula').click(function(){
            $('#contenido').load("php/listar_aula.php");
            $('.tooltip').remove();
            
        });
       $('#aulaEstudiante').click(function(){
              $('#contenido').load("php/listar_claseE.php");
              $('.tooltip').remove();
        });
        $('#catedraticos').click(function(){
            $('#contenido').load("php/listar_catedraticos.php");
            $('.tooltip').remove();
        });
        $('#catedraticoscentral').click(function(){
            $('#contenido').load("php/listar_catedraticos.php");
            $('.tooltip').remove();
        });  
        $('#pagos').click(function(){
            $('#contenido').load("php/listar_pagos.php");
            $('.tooltip').remove();
        });
        $('#Pagos').click(function(){
            $('#contenido').load("php/listar_pagos.php");
            $('.tooltip').remove();
        });
        $('#PagosE').click(function(){
            $('#contenido').load("php/listar_pagosE.php");
            $('.tooltip').remove();
        });
        $('#PagosECentral').click(function(){
            $('#contenido').load("php/listar_pagosE.php");
            $('.tooltip').remove();
        });                   
        $('#biblioteca').click(function(){
            $('#contenido').load("php/listar_biblioteca.php");
            $('.tooltip').remove();
        });  
        $('#servicios').click(function(){
            $('#contenido').load("php/listar_servicios.php");
            $('.tooltip').remove();
        });  
    

    $(document).ready(function() {
               
//                                    $.alert({
  //                                      title: 'Adeudo!',
   //                                     content: 'Es necesario cubrir la cuota predeterminada',
     //                               });
                            
       //                             $.alert({
         //                               title: 'Proximo corte a vencer',
           //                             content: 'Evite recargos y page puntual',
             //                       });
    });

        </script>
      <script src="js/myjava.js"></script>
    </body>
     <?php  include("php/modal/modal_clase.php");
      include("php/modal/modal_claseencurso.php");

      ?>
</html>
 <?php

}
else{
    header("location:login.html");
}
?>