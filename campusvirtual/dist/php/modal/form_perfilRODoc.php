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
          $id = $_SESSION['id'];
        }
      require('../conexion.php');
      if ($perfil=='Docente'){
      $sql="SELECT u.* 
      FROM catg_catedratico AS u
      WHERE u.emailInst='".$correo."' ";

      $datos = mysqli_query($conexion,$sql);
      $filas = mysqli_num_rows($datos);
      while ($renglon=mysqli_fetch_array($datos)) {
              $Nombre = $renglon['nombre'];
              $Primer_ap = $renglon['ap_paterno'];
              $Segundo_ap= $renglon['ap_materno'];
              $sexo =  $renglon['sexo'];
              $fecha_nac =  $renglon['fecha_nac'];
              $email =  $renglon['email'];
              $emailInst =  $renglon['emailInst'];
               $pass =  $renglon['pass'];

              $titulo =  $renglon['titulo'];
              
              $nacionalidad =  $renglon['nacionalidad'];
              $curp =  $renglon['curp'];
              $telefono =  $renglon['telefono'];
              $telefono_fijo =  $renglon['telefono_fijo'];
              $ext =  $renglon['ext'];
              $calle =  $renglon['calle'];

              $num_ext =  $renglon['num_ext'];
              $num_int =  $renglon['num_int'];
              $colonia =  $renglon['colonia'];
              $municipio =  $renglon['municipio'];
              $estado =  $renglon['estado'];
              $cod_postal =  $renglon['cod_postal'];

              $pais =  $renglon['pais'];
              $lic =  $renglon['lic'];
              $lic_uni =  $renglon['lic_uni'];
              $lic_pais =  $renglon['lic_pais'];
              $lic_estatus =  $renglon['lic_estatus'];
              $lic_fecha =  $renglon['lic_fecha'];  
              
              $mtria =  $renglon['mtria'];
              $mtria_uni =  $renglon['mtria_uni'];
              $mtria_pais =  $renglon['mtria_pais'];
              $mtria_estatus =  $renglon['mtria_estatus'];
              $mtria_fecha =  $renglon['mtria_fecha'];

              $doc =  $renglon['doc'];
              $doc_uni =  $renglon['doc_uni'];
              $doc_pais =  $renglon['doc_pais'];
              $doc_estatus =  $renglon['doc_estatus'];
              $doc_fecha =  $renglon['doc_fecha'];


        }
      }else{
      $sql="SELECT u.* 
      FROM usuario_activo AS u

      WHERE u.emailInst='".$correo."' ";
      $datos = mysqli_query($conexion,$sql);
      $filas = mysqli_num_rows($datos);
      while ($renglon=mysqli_fetch_array($datos)) {
              $Nombre = $renglon['nombre'];
              $Primer_ap = $renglon['ap_paterno'];
              $Segundo_ap= $renglon['ap_materno'];
              $posgrado =  $renglon['id_posgrado'];
              $sexo =  $renglon['sexo'];
              $fecha_nac =  $renglon['fecha_nac'];
              $email =  $renglon['email_particular'];
              $emailInst =  $renglon['emailInst'];
              $telefono =  $renglon['telefono'];
              $calle =  $renglon['calle'];
              $num_int =  $renglon['num_int'];
              $num_ext =  $renglon['num_ext'];
              $ciudad =  $renglon['ciudad'];
              $estado =  $renglon['estado'];
              $cod_postal =  $renglon['cod_postal'];
              $periodo =  $renglon['periodo'];
              $nacionalidad =  $renglon['nacionalidad'];
        }
      }
?>



  <script src="js/myjava.js"></script>
    <script type="text/javascript">
          function eliminar_doc(id){
            var correo = $("#email_sis").val();

            var url = 'php/accion/elimina_docDoc.php';
            var pregunta = confirm('¿Esta seguro de eliminar este documento?');
            if(pregunta==true){
              $.ajax({
              type:'POST',
              url:url,
              data: { 
                correo: correo, 
                id : id,
              },
              success: function(registro){
                alert("Documento eliminado correctamente");
                mostrarArchivos();
              }
            });
            }else{
              
            }
          }
        function mostrarArchivos() {
          var email_sis = $("#email_sis").val(); 
                $.ajax({
                    url: "php/accion/mostrar_archivosDoc.php",
                    type: "get", //send it through get method
                    data: { 
                      email_sis: email_sis, 
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosDoc").html(respuesta);
                        Refrescar_Doc();
                    }
                });
        }

            function subirArchivos() {
                $("#archivo").upload('php/accion/subir_archivoDoc.php',
                {
                    titulo: $("#titulo").val(),
                    correo: $("#email_sis").val(),
                    select_documento: $("#select_documento").val(),
  
                },
                function(respuesta) {
                    //Subida finalizada.
                    $("#barra_de_progreso").val(0);
                    if (respuesta === 1) {
                        mostrarRespuesta('El archivo ha sido subido correctamente.', true);
                        $("#nombre_archivo, #archivo").val('');
                    } else {
                        mostrarRespuesta('El archivo NO se ha podido subir.', false);
                    }
                    mostrarArchivos();
                    buscardoc();
                }, function(progreso, valor) {
                    //Barra de progreso.
                    $("#barra_de_progreso").val(valor);
                });
            }

            function mostrarRespuesta(mensaje, ok){
                $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
                if(ok){
                    $("#respuesta").addClass('alert-success').show(250).delay(4000).hide(250);
                }else{
                    $("#respuesta").addClass('alert-danger').show(250).delay(4000).hide(250);
                }
            }
    function buscardoc(){
          var email_sis = $('#email_sis'). val();
    var posgrado = $('#titulo').val();
        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        }
    }
                $("#boton_subir").on('click', function() {
                  if ($("#select_documento").val()>0 && $("#archivo").val().length > 0) {
                      subirArchivos();
                  }else{
                    alert("Seleccione un documento de la lista");
                  }
                });

      


        </script>

        <div class="card-header" align="left">
          <i class="fa fa-table"></i> Perfil 
            <center>
              <div class="row">
               <div class="col" align="right">
                  <a href="general.php">    
                    <button type="button" class="btn btn-dark">Regresar</button>
                  </a>
              </div>
            </div>
          </center>
        </div>
<form  onsubmit="return guardar_alumno();" id="formulario"  >
<div id="agrega-registro">
          <br>
<div class="classic-tabs mx-2">
  <ul class="nav tabs-orange" id="myClassicTabOrange" role="tablist">
    <li class="nav-item">
      <a class="nav-link  waves-light active show"  id="profile-tab-classic-orange" data-toggle="tab" href="#profile-classic-orange"
        role="tab" aria-controls="follow-classic-orange" aria-selected="true">
        <center><i class="fas fa-user fa-2x pb-2" aria-hidden="true"></i>
        <br>Datos personales
        </center>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange"
        role="tab" aria-controls="follow-classic-orange" aria-selected="false">
        <center><i class="fas fa-address-book fa-2x pb-2"aria-hidden="true"></i>

        <br>Formación Academica
        </center>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="contact-tab-classic-orange" data-toggle="tab" href="#contact-classic-orange"
        role="tab" aria-controls="contact-classic-orange" aria-selected="false">
        <center><i class="fas fa-copy fa-2x pb-2" aria-hidden="true"></i>
        <br> Documentación
        </center>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link waves-light" id="awesome-tab-classic-orange2" data-toggle="tab" href="#awesome-classic-orange2"
        role="tab" aria-controls="awesome-classic-orange2" aria-selected="false">
        <center><i class="fab fa-black-tie fa-2x pb-2" aria-hidden="true"></i>
        <br>Identidad Institucional
        </center>

      </a>
    </li>
  </ul>

  <div class="tab-content card" id="myClassicTabContentOrange">

    <div class="tab-pane fade active show" id="profile-classic-orange" role="tabpanel" aria-labelledby="profile-tab-classic-orange">
           
            
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h5 class="panel-title">Datos Personales</h5> 
      </div>
      <div class="panel-body">
         <div class="panel panel-primary">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="nombre">Nombre:</label>
                <?php
                if ($Nombre) {
                  echo '<input type="text" class="form-control" value="'.$Nombre.'" id="nombre" name="nombre" placeholder="Nombre" readonly>';
                }else{
                   echo '<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" >';
                }
                  
                  ?>
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="primer_ap">Primer Apellido:</label>
                <?php
                if ($Primer_ap) {
                  echo '<input type="text" class="form-control" value="'.$Primer_ap.'" id="primer_ap" name="primer_ap"  readonly>';
                }else{
                   echo '<input type="text" class="form-control" id="primer_ap" name="primer_ap" placeholder="Primer Apellido" >';
                }
                  
                  ?>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="segundo_ap">Segundo Apellido:</label>
                <?php
                if ($Segundo_ap) {
                  echo '<input type="text" class="form-control" value="'.$Segundo_ap.'" id="segundo_ap" name="segundo_ap"  readonly>';
                }else{
                   echo '<input type="text" class="form-control" id="segundo_ap" name="segundo_ap" placeholder="Segundo Apellido" >';
                }
                  ?>
                </div>
                
              </div>
              <br>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_nac">Fecha de Nacimiento:</label>
                <?php
                if ($fecha_nac!="") {
                  echo '<input type="date" min="1900-04-25" max="2999-12-31" class="form-control" value="'.$fecha_nac.'" id="fecha_nac" name="fecha_nac">';
                }else{
                   echo '<input type="date" min="1900-04-25" max="2999-12-31" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Segundo Apellido" >';
                }
                ?>
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="sexo">Sexo:</label>
                  <?php 
                  if ($sexo==1) {
                  echo '
                        <select id="sexo" name="sexo" class="form-control">
                          
                          <option value="1" selected>Femenino</option>
                          <option value="2" >Masculino</option>
                        </select>
                    ';

                  }elseif ($sexo==2) {
                   
                  echo '
                        <select id="sexo" name="sexo" class="form-control">
                          <option value="2" selected>Masculino</option>
                          <option value="1">Femenino</option>
                          
                        </select>
                    ';


                  }else{
                    echo '
                        <select id="sexo" name="sexo" class="form-control">
                          <option selected>Seleccione...</option>
                          <option value="1">Femenino</option>
                          <option value="2">Masculino</option>
                        </select>
                    ';
                  }

                  ?>


                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Nacionalidad:</label>
                  <input type="text" class="form-control" value="<?php echo $nacionalidad ?>" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" >
                </div>
              </div>
              <br>
                <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">CURP:</label>
                  <input type="text"  maxlength="18" class="form-control" value="<?php echo $curp; ?>" id="curp" name="curp" placeholder="CURP" >
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Celular:</label>
                  <input type="tel" maxlength="10" class="form-control" value="<?php echo $telefono; ?>" id="tel_celular" name="tel_celular" placeholder="Teléfono Celular">
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Fijo u Otro:</label>
                  <input type="tel" maxlength="10" class="form-control" value="<?php echo $telefono_fijo; ?>" id="tel_fijo" name="tel_fijo" placeholder="Otro Teléfono" >
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                  <label for="telefono">Extensión:</label>
                  <input type="tel" maxlength="6" class="form-control" value="<?php echo $ext; ?>" id="tel_ext" name="tel_ext" placeholder="Extensión" >
                </div>
              </div>
              <br>

              <div class="row">
                <!---->

                <div class="col-12 col-sm-6 col-md-6">
                  <label for="email">Email:</label>
                <?php
                if ($email) {
                  echo '<input type="email" class="form-control" value="'.$email.'" id="correo" name="correo" >';
                }else{
                   echo '<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico" >';
                }
                ?>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="nombre">Título:</label>
                  <?php
                    if ($titulo==-1) {
                      echo '
                      <select class="form-control"  id="titulo" name="titulo">
                        <option value="-1" selected>Maestría</option>
                        <option value="-3" >Doctorado</option>
                      </select>
                      ';

                    }elseif($titulo==-3){
                      echo '
                      <select class="form-control"  id="titulo" name="titulo">
                        <option value="-3" selected>Doctorado</option>
                        <option value="-1">Maestría</option>
                      </select>
                      ';

                    }else{
                      echo '
                      <select class="form-control"  id="titulo" name="titulo">
                        <option value="">Seleccione</option>
                        <option value="-1">Maestría</option>
                        <option value="-3">Doctorado</option>
                      </select>
                      ';
                    }
                  ?>

                </div>
              </div>
               </div>

             </div>

           </div>
              

          <div class="panel panel-info">
                <div class="panel-heading">
                  <h5 class="panel-title">Dirección</h5> 
                </div>
                <div class="panel-body">
                  <div class="panel panel-info">
                   
                <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="calle">Calle:</label>
                  <input type="text" class="form-control" value="<?php echo $calle; ?>" id="calle" name="calle" placeholder="Calle" required>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Exterior:</label>
                  <input type="text" class="form-control" value="<?php echo $num_ext;  ?>" id="numeroe" name="numeroe" placeholder="Número Exterior">
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Interior:</label>
                  <input type="text" class="form-control" value="<?php echo $num_int;  ?>" id="numeroi" name="numeroi" placeholder="Número Interior" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="calle">Colonia:</label>
                  <input type="text" class="form-control" value="<?php echo $colonia;  ?>" id="colonia" name="colonia" placeholder="Colonia" required>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="ciudad">Ciudad/Municipio:</label>
                  <input type="text" class="form-control" value="<?php echo $municipio; ?>" id="ciudad" name="ciudad"  placeholder="Ciudad/Municipio" required>
                </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="estado">Estado/Provincia:</label>
                  <input type="text" class="form-control" value="<?php echo $estado; ?>" id="estado" name="estado" placeholder="Estado" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Código Postal:</label>
                  <input type="number" maxlength="5" class="form-control" value="<?php echo $cod_postal;  ?>" id="cp" name="cp" placeholder="Código Postal" required>
                </div>
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">País:</label>
                  <input type="text" class="form-control" value="<?php echo $pais; ?>" id="pais" name="pais" placeholder="País" required>
                </div>

              </div>
            </div>
        </div>
      </div>
                <!--<div class="form-group row">
               
               </div>-->

    </div>

      



    <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
   
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h5 class="panel-title">Formación Academica</h5> 
                </div>
                <div class="panel-body">

                    <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_lic">Licenciatura <font style="color:red">*</font></label>
                  <?php 
                    if ($lic!="") {
                      echo ' <input type="text" value='.$lic.' class="form-control" name="lic" id="lic" placeholder="Licenciatura" >' ;
                    }else{
                      echo ' <input type="text" class="form-control" name="lic" id="lic" placeholder="Licenciatura" >' ;
                    }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_lic_uni">Universidad <font style="color:red">*</font></label>
                  <?php
                    if ($lic_uni!="") {
                      echo '<input type="text" class="form-control" id="lic_uni" name="lic_uni" placeholder="Universidad" value='.$lic_uni.'>';
                    }else{
                     echo '<input type="text" class="form-control" id="lic_uni" name="lic_uni" placeholder="Universidad">'; 
                    }
                  ?>
                  
                </div>
                  </div>

              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_lic_pais">País <font style="color:red">*</font></label>
                  <?php
                    if ($lic_pais!="") {
                      echo '<input type="text" class="form-control" id="lic_pais" name="lic_pais" placeholder="País de estudio" value='.$lic_pais.'>';
                    }else{
                      echo '<input type="text" class="form-control" id="lic_pais" name="lic_pais" placeholder="País de estudio">';
                    }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_lic_status">Estatus <font style="color:red">*</font></label>
                 <?php
                  if ($lic_estatus==1) {
                    echo '
                       <select name="lic_estatus" id="lic_estatus" class="form-control">
                        <option value="1">Cursando</option>
                         <option value="2">En Proceso de titulación</option>
                        <option value="3">Finalizado</option> 
                       </select>
                    ';
                  }elseif($lic_estatus==2){
                    echo '
                       <select name="lic_estatus" id="lic_estatus" class="form-control">
                       <option value="2">En Proceso de titulación</option>
                        <option value="1">Cursando</option>
                         
                        <option value="3">Finalizado</option> 
                       </select>
                    ';

                  }elseif ($lic_estatus==3) {
                    echo '
                       <select name="lic_estatus" id="lic_estatus" class="form-control">
                       <option value="3">Finalizado</option>
                         <option value="1">Cursando</option>
                         <option value="2">En Proceso de titulación</option>
                         
                       </select>
                    ';

                   }else{
                    echo '
                       <select name="lic_estatus" id="lic_estatus" class="form-control">
                         <option value="0">Seleccionar</option>
                         <option value="1">Cursando</option>
                         <option value="2">En Proceso de titulación</option>
                         <option value="3">Finalizado</option>
                       </select>
                    ';
                  }
                 ?>

               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin" id="lb_lic_fecha">Fecha de finalización <font style="color:red">*</font></label>
                  <?php
                    if ($lic_fecha!="") {
                      echo '
                          <input type="date" min="1900-04-25" value='.$lic_fecha.' max="2999-12-31" class="form-control" id="lic_fecha" name="lic_fecha" placeholder="Fecha finalización" >
                      ';
                    }else{
                  echo '
                          <input type="date" min="1900-04-25"  max="2999-12-31" class="form-control" id="lic_fecha" name="lic_fecha" placeholder="Fecha finalización" >
                      ';
                    }
                  ?>
                  </div>
                </div>



              <br>
              <br>
                    <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_maestria">Maestría <font style="color:red">*</font></label>
                  <?php
                    if ($mtria!="") {
                      echo '<input type="text" class="form-control" id="mtria" name="mtria" value='.$mtria.' placeholder="Maestría" >';
                    }else{
                       echo '<input type="text" class="form-control" id="mtria" name="mtria" placeholder="Maestría" >';
                    }
                  ?>
                  
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_ma_uni">Universidad <font style="color:red">*</font></label>
                  <?php
                    if ($mtria_uni!="") {
                      echo '<input type="text" class="form-control" id="mtria_uni" name="mtria_uni" value='.$mtria_uni.' placeholder="Maestría" >';
                    }else{
                       echo '<input type="text" class="form-control" id="mtria_uni" name="mtria_uni" placeholder="Maestría" >';
                    }
                  ?>
                </div>
                  </div>

              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_ma_pais">País <font style="color:red">*</font></label>
                  <?php
                      if ($mtria_pais!="") {
                        echo '<input type="text" class="form-control" name="mtria_pais" id="mtria_pais" value='.$mtria_pais.' placeholder="País de estudio" >';
                      }else{
                        echo '<input type="text" class="form-control" name="mtria_pais" id="mtria_pais" placeholder="País de estudio" >';
                      }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_ma_status">Estatus <font style="color:red">*</font></label>
                
                  <?php 
                    if ($mtria_estatus==1) {
                      echo '
                        <select name="mtria_status_e" id="mtria_status_e" class="form-control">
                           <option value="1">Cursando</option>
                           <option value="2">En Proceso de titulación</option>
                           <option value="3">Finalizado</option>
                        </select>
                      ';
                    }elseif($mtria_estatus==2){
                      echo '
                        <select name="mtria_status_e" id="mtria_status_e" class="form-control">
                        <option value="2">En Proceso de titulación</option>
                        <option value="3">Finalizado</option>
                           <option value="1">Cursando</option>
                           
                           
                        </select>
                      ';
                    }elseif ($mtria_estatus==3) {
                      echo '
                        <select name="mtria_status_e" id="mtria_status_e" class="form-control">
                        <option value="3">Finalizado</option>
                        <option value="2">En Proceso de titulación</option>
                        <option value="1">Cursando</option>
                           
                        </select>
                      ';
                    }else{
                    echo '
                        <select name="mtria_status_e" id="mtria_status_e" class="form-control">
                        
                        <option value="0">Seleccione</option>
                        <option value="1">Cursando</option>
                        <option value="2">En Proceso de titulación</option>
                        <option value="3">Finalizado</option>   
                        </select>
                      ';
                    }
                  ?>

               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin" id="lb_ma_fecha">Fecha de finalización <font style="color:red">*</font></label>
                  <?php
                      if ($mtria_fecha!="") {
                        echo '
                  <input type="date" min="1900-04-25" max="2999-12-31" class="form-control" value='.$mtria_fecha.' id="mtria_fecha_fin" name="mtria_fecha_fin" placeholder="Fecha finalización" >
                        ';
                      }else{
                        echo '
                  <input type="date" min="1900-04-25" max="2999-12-31" class="form-control" id="mtria_fecha_fin" name="mtria_fecha_fin" placeholder="Fecha finalización" >
                        ';
                      }
                  ?>
                  </div>
                </div>



              <br>
              <br>
                    <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_doctorado">Doctorado <font style="color:red">*</font></label>
                  <?php
                    if ($doc!="") {
                      echo '
                  <input type="text" class="form-control" value='.$doc.' id="doc" name="doc" placeholder="Doctorado" >

                      ';
                    }else{
                                            echo '
                  <input type="text" class="form-control"  id="doc" name="doc" placeholder="Doctorado" >

                      ';
                    }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_doc_uni">Universidad <font style="color:red">*</font></label>
                  <?php
                    if ($doc_uni!="") {
                      echo '<input type="text" class="form-control" id="doc_universidad" name="doc_universidad" value='.$doc_uni.' placeholder="Universidad" >';
                    }else{
                      echo '<input type="text" class="form-control" id="doc_universidad" name="doc_universidad"  placeholder="Universidad" >';

                    }
                  ?>
                </div>
                  </div>

              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_doc_pais">País <font style="color:red">*</font></label>
                  <?php
                    if ($doc_pais!="") {
                      echo ' <input type="text" class="form-control" value='.$doc_pais.' id="doc_pais_e" name="doc_pais_e" placeholder="País de estudio" >';
                    }else{
                      echo ' <input type="text" class="form-control"  id="doc_pais_e" name="doc_pais_e" placeholder="País de estudio" >';

                    }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_doc_status">Estatus <font style="color:red">*</font></label>
                  <?php 
                    if ($doc_estatus==1) {
                      echo '
                 <select name="doc_status_e" id="doc_status_e" class="form-control">
                   <option value="1">Cursando</option>

                   <option value="2">En Proceso de titulación</option>

                  <option value="3">Finalizado</option>
                   
                 </select>
                           
                      ';
                    }elseif($doc_estatus==2){
                      echo '
                        
                 <select name="doc_status_e" id="doc_status_e" class="form-control">
                   <option value="2">En Proceso de titulación</option>

                  <option value="3">Finalizado</option>
                   <option value="1">Cursando</option>
                   
                 </select>
                           
                           
                      ';
                    }elseif ($doc_estatus==3) {
                      echo '
                 <select name="doc_status_e" id="doc_status_e" class="form-control">

                  <option value="3">Finalizado</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   
                 </select>
                      ';
                    }else{
                    echo '
                 <select name="doc_status_e" id="doc_status_e" class="form-control">

                   <option value="0">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
                      ';
                    }
                  ?>


               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin" id="lb_doc_fecha">Fecha de finalización <font style="color:red">*</font></label>
                  <?php
                    if ($doc_fecha!="") {
                    echo '<input type="date" min="1900-04-25" value='.$doc_fecha.' max="2999-12-31" class="form-control" id="doc_fecha_fin" name="doc_fecha_fin" placeholder="Fecha finalización" >';
                    }else{
                      echo '<input type="date" min="1900-04-25"  max="2999-12-31" class="form-control" id="doc_fecha_fin" name="doc_fecha_fin" placeholder="Fecha finalización" >';
                    }
                  ?>
                  </div>
                </div>


            </div>
              </div>


            </div>
          

    <div class="tab-pane fade" id="contact-classic-orange" role="tabpanel" aria-labelledby="contact-tab-classic-orange">
      
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Documentación</h5> 
            </div>
           
            <form action="javascript:void(0);" id="form_doc" enctype="multipart/form-data">
              <br>
              <label for="tipo_pago">Documento <font style="color:red">*</font></label>
              <select name='select_documento' id='select_documento' class="form-control" required='required' >
                <option value=''>Seleccione</option>
              </select>
              
              <hr>
              <div class="form-group row">
                    <div class="col-lg-2"> 
                        <label> Nombre el archivo <font style="color:red">*</font></label> 
                    </div>
                    <div class="col-lg-2" hidden>
                        <input type="text" name="nombre_archivo" id="nombre_archivo" hidden />
                    </div>
                    <div class="col-lg-2">
                        <input type="file" name="archivo" id="archivo" />
                    </div>                    
              </div>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-2">
                        <input type="button" id="boton_subir" value="Subir" class="btn btn-success" />
                    </div>
                    <div class="col-lg-4">
                        <progress id="barra_de_progreso" value="0" max="100"></progress>
                    </div>
                </div>
            </form>
             
          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Documento</th>
                  <th>Fecha</th>
                  <th>Acción</th>

                </tr>
              </thead>
              <tbody id="archivos_subidosDoc">
              
              </tbody>
              <div id="respuesta" class="alert"></div>
            </table>



    </div>


    </div>
        <div class="tab-pane fade" id="awesome-classic-orange2" role="tabpanel" aria-labelledby="identidad_institucional">
    <form id="form_inst" name="form_inst">
            <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Identidad Institucional</h5> 
            </div>

      <br>
              <div class="form-group row">
                <div class="col">
                  <label for="email_sis">Sistema <font style="color:red">*</font></label>
                  <?php
                  if ($emailInst) {
                    echo '<input type="text" class="form-control" id="email_sis" name="email_sis" value='.$emailInst.' readonly>';
                    }else{
                      echo '<input type="email" class="form-control" name="email_sis" id="email_sis" placeholder="Sistema" required>';
                    }
                  ?>
                  
                </div>
                  <div class="col">
                  <label for="pass_sis">Contraseña <font style="color:red">*</font></label>
                  <?php
                  if ($pass) {
                    echo '<input type="text" class="form-control" id="pass_sis" name="pass_sis" value='.$pass.' readonly>';
                    }else{
                      echo ' <input type="text" class="form-control" name="pass_sis" id="pass_sis" placeholder="Contraseña" required>';
                    }
                  ?>   
                 
                </div>
            </div>
            <br>
             <div class="form-group row" >
                <div class="col">
                  <label for="usuario_biblio">Correo Institucional<font style="color:red">*</font></label>
                  <?php
                  if ($emailInst) {
                    echo '<input type="text" class="form-control" id="email_sis" name="email_sis" value='.$emailInst.' readonly>';
                    }else{
                      echo '<input type="email" class="form-control" name="email_sis" id="email_sis" placeholder="Sistema" required>';
                    }
                  ?>                </div>
                  <div class="col">
                  <label for="pass_biblio">Contraseña <font style="color:red">*</font></label>
                  <?php
                  if ($pass) {
                    echo '<input type="text" class="form-control" id="pass_sis" name="pass_sis" value='.$pass.' readonly>';
                    }else{
                      echo ' <input type="text" class="form-control" name="pass_sis" id="pass_sis" placeholder="Contraseña" required>';
                    }
                  ?>
                </div>
            </div>
          </form>  
           </div>

          </div>

</div>
</div>
</div>
</div>
    <button class="btn btn-success" id="editaDocente" name="editaDocente">Guardar</button>


</div>
  </form> 
<script type="text/javascript">
      $('#lic_status').on('change',function(){
        var posgrado = $(this).val();
        if(posgrado==1){
          $('#lic_fecha_fin').attr('readonly', true);
          $('#lic_fecha_fin').val('');
        }else{
          $('#lic_fecha_fin').attr('readonly', false);
        }
    });
      $('#mtria_status').on('change',function(){
        var posgrado = $(this).val();
        //alert(posgrado);
        if(posgrado==1){
          $('#mtria_fecha_fin').attr('readonly', true);
          $('#mtria_fecha_fin').val('');
        }else{
          $('#mtria_fecha_fin').attr('readonly', false);
        }
    });
      $('#doc_estatus').on('change',function(){
        var posgrado = $(this).val();
        //alert(posgrado);
        if(posgrado==1){
          $('#doc_fecha_fin').attr('readonly', true);
          $('#doc_fecha_fin').val('');
        }else{
          $('#doc_fecha_fin').attr('readonly', false);
        }
    }); 
$(document).ready(function(){

  var email_sis = $('#email_sis'). val();
          var posgrado = $('#titulo').val();
                  $.ajax({
                      type:'POST',
                      url:'php/accion/ajax_buscadoc.php',
                      data:'posgrado='+posgrado+'&email_sis='+email_sis,
                      success:function(html){
                          $('#select_documento').html(html);
                          //$('#grupo').html('<option value="">Select state first</option>'); 
                $.ajax({
                    url: "php/accion/mostrar_archivosDoc.php",
                    type: "get", //send it through get method
                    data: { 
                      email_sis: email_sis, 
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosDoc").html(respuesta);
                        Refrescar_Doc();
                    }
                });
                      }
                  });
        $('#titulo').on('change',function(){
          var email_sis = $('#email_sis'). val();
          var posgrado = $('#titulo').val();
              if(posgrado!=""){
                  $.ajax({
                      type:'POST',
                      url:'php/accion/ajax_buscadoc.php',
                      data:'posgrado='+posgrado+'&email_sis='+email_sis,
                      success:function(html){
                          $('#select_documento').html(html);
                          //$('#grupo').html('<option value="">Select state first</option>'); 
                      }
                  }); 
                }
              });

              if (posgrado==1 || posgrado==2){
                $('#lb_lic').text('Licenciatura');
                $('#lb_lic_fecha').text('Fecha');
                $('#lb_lic_status').text('Estatus');
                $('#lb_lic_uni').text('Universidad');

                $('#lb_maestria').text('Maestría (*Opcional)');
                $('#lb_ma_fecha').text('Fecha');
                $('#lb_ma_status').text('Estatus');
                $('#lb_ma_uni').text('Universidad ');

                $('#lb_doctorado').text('Doctorado (*Opcional)');
                $('#lb_doc_fecha').text('Fecha');
                $('#lb_doc_status').text('Estatus');
                $('#lb_doc_uni').text('Universidad');
              }else{
                $('#lb_lic').text('Licenciatura');
                $('#lb_lic_fecha').text('Fecha');
                $('#lb_lic_status').text('Estatus');
                $('#lb_lic_uni').text('Universidad');

                $('#lb_maestria').text('Maestría');
                $('#lb_ma_fecha').text('Fecha');
                $('#lb_ma_status').text('Estatus');
                $('#lb_ma_uni').text('Universidad');

                $('#lb_doctorado').text('Doctorado (*Opcional)');
                $('#lb_doc_fecha').text('Fecha');
                $('#lb_doc_status').text('Estatus');
                $('#lb_doc_uni').text('Universidad');
              }

          });




    $("#email_sis").keyup(function( event ) {
    var email_sis = $('#email_sis'). val();
    var posgrado = $('#titulo').val();
        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        }
    });

      function Refrescar_Doc(){
          var email_sis = $('#email_sis'). val();
          var posgrado = $('#titulo').val();
              if(posgrado){
                  $.ajax({
                      type:'POST',
                      url:'php/accion/ajax_buscadoc.php',
                      data:'posgrado='+posgrado+'&email_sis='+email_sis,
                      success:function(html){
                          $('#select_documento').html(html);
                          //$('#grupo').html('<option value="">Select state first</option>'); 
                      }
                  }); 
              }
      }

  </script>

        <script type="text/javascript">
    $('#editaDocente').on('click',function(){
      $.ajax({
          type: 'POST',
          url : "php/accion/edita_docente.php",
          data: $("#formulario, #form_inst").serialize(),
          success: function(data){
            
   

      $.alert({
              title: 'Docente!',
              content: 'Información guardada correctamente',
              });

      $('#contenido').load("php/modal/form_perfilRODoc.php");

      return false;
          },
          error: function(error){
              alert('error en el server');
          }
        })
      return false;
    });

    </script>