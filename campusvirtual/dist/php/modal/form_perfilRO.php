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
        $telefono =  $renglon['telefono'];

  }
}else{
$sql="SELECT u.* 
FROM usuario_activo AS u

WHERE u.id='$id' ";
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

        $calle =  $renglon['calle'];
        $num_int =  $renglon['num_int'];
        $num_ext =  $renglon['num_ext'];
        $ciudad =  $renglon['ciudad'];
        $estado =  $renglon['estado'];
        $cod_postal =  $renglon['cod_postal'];
        $colonia =  $renglon['colonia'];


        $nacionalidad =  $renglon['nacionalidad'];
        $curp =  $renglon['curp'];
        $pass =  $renglon['pass'];

        $tel_celular =  $renglon['tel_celular'];
        $tel_fijo =  $renglon['tel_fijo'];
        $tel_ext =  $renglon['ext'];
        $correo =  $renglon['email_particular'];
        $pais =  $renglon['pais'];

        $lic_lic = $renglon['lic_lic']; 
        $lic_uni = $renglon['lic_uni'];
        $lic_pais = $renglon['lic_pais'];
        $lic_status = $renglon['lic_status'];
        $lic_fecha_fin =$renglon['lic_fecha_fin']; 


        $mtr_mtr = $renglon['mtr_mtr']; 
        $mtr_uni = $renglon['mtr_uni'];
        $mtr_pais = $renglon['mtr_pais']; 
        $mtr_status = $renglon['mtr_status']; 
        $mtr_fecha_fin = $renglon['mtr_fecha_fin']; 

        $doc_doc = $renglon['doc_doc'];
        $doc_uni = $renglon['doc_uni']; 
        $doc_pais = $renglon['doc_pais']; 
        $doc_status = $renglon['doc_status'];
        $doc_fecha_fin = $renglon['doc_fecha_fin'];

  }
}


?>



  <script src="js/myjava.js"></script>
          <script type="text/javascript">
            function subirArchivos() {
              
                $("#archivo").upload('php/accion/subir_archivo.php',
                {
                    nombre_archivo: $("#nombre_archivo").val(),
                    email_sis: $("#email_sis").val(),
                    select_documento: $("#select_documento").val(),
                    posgrado: $("#posgrado").val(),   
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
                    mostrarArchivosDoc();
                    Refrescar_Doc();
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
                $("#boton_subir").on('click', function() {
                  if($("#select_documento").val()>0 && $("#archivo").val().length > 0 ) {
                      subirArchivos();
                  }else{
                    alert("Seleccione un documento de la lista");
                  }
                });
            $(document).ready(function() {
                mostrarArchivosDoc();

                $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
                    var archivo = $(this).parents('.row').eq(0).find('span').text();
                    archivo = $.trim(archivo);
                    eliminarArchivos(archivo);
                });
            });
      if ($('[href="#awesome-classic-orange"]').tab('show')) {
            var email_sis = $('#email_sis'). val();
    var posgrado = $('#posgrado').val();
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
    $("#select_documento").keyup(function( event ) {
    var correo = $('#email_sis'). val();
    var posgrado = $('#posgrado').val();
        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&correo='+correo,
                success:function(html){
                    $('#select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        }
    });

                function mostrarArchivosDoc() {
                var correo = $("#email_sis").val();
                var posgrado= $("#posgrado").val(); 
                //alert(correo);
                $.ajax({
                    url: "php/accion/mostrar_archivos.php",
                    type: "get", //send it through get method
                    data: { 
                      correo: correo, 
                      posgrado: posgrado,
                    },
                    success: function(respuesta) {
                        $("#archivos_subidos").html(respuesta);
                    }
                });
            }
            function mostrarArchivos() {
                var correo = $("#email_sis").val();
                var posgrado= $("#posgrado").val(); 
                //alert(correo);
                $.ajax({
                    url: "php/accion/mostrar_archivos.php",
                    type: "get", //send it through get method
                    data: { 
                      correo: correo, 
                      posgrado: posgrado,
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosDoc").html(respuesta);
                        Refrescar_Doc();
                    }
                });
            }
            

function Refrescar_Doc(){
    var email_sis = $('#email_sis'). val();
    var posgrado = $('#posgrado').val();
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
            function eliminar_doc(id){
            var emailInst = $("#email_sis").val();
            var posgrado= $("#posgrado").val(); 
            var url = 'php/accion/elimina_doc.php';
            var pregunta = confirm('¿Esta seguro de eliminar este documento?');
            if(pregunta==true){
              $.ajax({
              type:'POST',
              url:url,
              data: { 
                correo: emailInst, 
                posgrado: posgrado,
                id : id,
              },
              success: function(registro){
                alert("Documento eliminado correctamente");
                    mostrarArchivosDoc();
                    Refrescar_Doc();
              }
            });
            }else{
              
            }
          }
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
<div id="agrega-registro">
          <br>


 <form  id="formulario"  >
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
              <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="nombre">Nombre <font style="color:red">*</font></label>
                  <?php 
                  if ($Nombre) {
                    echo '<input type="text" class="form-control" id="nombre" name="nombre" value="'.$Nombre.'" readonly>';
                    }else{
                      echo '<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>';
                    } 

                  ?>
                  
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="primer_ap">Primer Apellido <font style="color:red">*</font></label>
                  <?php 
                    if ($Primer_ap) {
                      echo '<input type="text" class="form-control" id="primer_ap" name="primer_ap" value="'.$Primer_ap.'"  readonly>';
                    }else{
                      echo '<input type="text" class="form-control" id="primer_ap" name="primer_ap" placeholder="Primer Apellido"  required>';
                    }
                  ?>
                  
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="segundo_ap">Segundo Apellido <font style="color:red">*</font></label>
                  <?php 
                    if ($Segundo_ap) {
                      echo '<input type="text" class="form-control" id="segundo_ap" name="segundo_ap" value="'.$Segundo_ap.'"  readonly>';
                    }else{
                      echo '<input type="text" class="form-control" placeholder="Segundo Apellido" name="segundo_ap" id="segundo_ap">';
                    }
                    ?>
                  
                </div>
                
              </div>
              <br>
              <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_nac">Fecha de Nacimiento <font style="color:red">*</font></label>
                  <?php 
                    if ($fecha_nac) {
                      echo '<input type="date" min="1900-04-25" max="2999-12-31" class="form-control" id="fecha_nac" name="fecha_nac" value="'.$fecha_nac.'">';
                    }else{
                      echo '<input type="date" min="1900-04-25" max="2999-12-31" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Fecha Nacimiento">';
                    }
                    ?>
                  
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="sexo">Sexo <font style="color:red">*</font></label>
                <?php 
                    if ($sexo) {
                      if ($sexo=='1') {
                        echo '
                            <select id="sexo" name="sexo" class="form-control" >
                              <option value="1">Femenino</option>
                              <option value="2">Masculino</option>
                            </select>';  
                      }else{
                        echo '
                            <select id="sexo" name="sexo" class="form-control">
                              <option value="2">Masculino</option>
                              <option value="1">Femenino</option>
                            </select>';
                      }
                    }else{
                      echo '
                            <select id="sexo" name="sexo" class="form-control" required>
                              <option selected>Seleccione...</option>
                              <option value="1">Femenino</option>
                              <option value="2">Masculino</option>
                            </select>';
                    }
                ?>

                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Nacionalidad <font style="color:red">*</font></label>
                  <?php 
                    if ($nacionalidad) {
                      echo '<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="'.$nacionalidad.'" >';
                    }else{
                      echo '
                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" >';
                    }
                  ?>
                  
                </div>
              </div>
              <br>
                <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">CURP <font style="color:red">*</font></label>
                    <?php 
                      if ($curp) {
                        echo '<input type="text" maxlength="18" class="form-control" id="curp" name="curp" value="'.$curp.'" >';
                       }else{
                        echo '<input type="text" maxlength="18" class="form-control" id="curp" name="curp" placeholder="CURP" >';
                      }
                    ?>
                  
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Celular <font style="color:red">*</font></label>
                  <?php
                    if ($tel_celular) {
                      echo '<input type="tel" maxlength="10" class="form-control" id="tel_celular" name="tel_celular" value="'.$tel_celular.'" >';
                    }else{
                      echo '<input type="tel" maxlength="10" class="form-control" id="tel_celular" name="tel_celular" placeholder="Teléfono Celular">';
                    }
                  ?>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Fijo u Otro <font style="color:red">*</font></label>
                  <?php
                    if ($tel_fijo) {
                      echo '<input type="tel" maxlength="10" class="form-control" id="tel_fijo" name="tel_fijo" value="'.$tel_fijo.'" >';
                    }else{
                      echo '<input type="tel" maxlength="10" class="form-control" id="tel_fijo" name="tel_fijo" placeholder="Otro Teléfono" >';
                    }
                  ?>
                  
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                  <label for="telefono">Extensión <font style="color:red">*</font></label>
                    <?php
                      if ($tel_ext) {
                        echo '<input type="tel" class="form-control" id="tel_ext" name="tel_ext" value="'.$tel_ext.'" >';
                      }else{
                        echo '<input type="tel" class="form-control" id="tel_ext" name="tel_ext" placeholder="Extensión" >';
                      }
                    ?>
                  
                </div>
              </div>
              <br>

              <div class="form-group row">
                <!---->

                <div class="col-12 col-sm-6 col-md-6">
                  <label for="email">Email <font style="color:red">*</font></label>
                  <?php
                    if ($correo) {
                      echo '<input type="email" class="form-control" id="correo" name="correo" value="'.$correo.'" readonly>';
                    }else{
                      echo '<input type="email" class="form-control" id="correo" name="correo" placeholder="Email" required>';
                    }
                  ?>
                  
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="nombre">Posgrado <font style="color:red">*</font></label>
                  <?php 
                    if ($posgrado) {
                      if ($posgrado==1) {
                      echo '
                        <select id="posgrado" name="posgrado" class="form-control" readonly>
                        <option value="1">MDCDH</option>
                        </select>
                      ';
                      }elseif ($posgrado==2) {
                      echo '
                        <select id="posgrado" name="posgrado" class="form-control" readonly>
                        <option value="2">MDE</option>
                        </select>
                      ';                      }
                      elseif ($posgrado==3) {
                      echo '
                        <select id="posgrado" name="posgrado" class="form-control" readonly>
                        <option value="3">DDCDH</option>
                        </select>
                      ';                      
                    }else{
                      echo '
                        <select id="posgrado" name="posgrado" class="form-control" readonly>
                        <option value="4">DDE</option>
                        </select>
                      ';
                      }
                    }else{
                      echo '
                        <select id="posgrado" name="posgrado" class="form-control" required>
                        <option selected>Seleccione...</option>
                        <option value="1">MDCDH</option>
                        <option value="2">MDE</option>
                        <option value="3">DDCDH</option>
                        <option value="4">DDE</option>
                        </select>
                      ';
                    }
                  ?>

                </div>
              </div>
               </div>

             </div>

           </div>
              

          <div class="panel panel-primary">
                <div class="panel-heading">
                  <h5 class="panel-title">Dirección</h5> 
                </div>
                <div class="panel-body">
                  <div class="panel panel-primary">
                   
                <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="calle">Calle <font style="color:red">*</font></label>
                  <?php 
                     if ($calle) {
                      echo '<input type="text" class="form-control" id="calle" name="calle" 
                      value="'.$calle.'">';

                    }else{
                      echo '<input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" required>';
                    }
                  ?>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Exterior <font style="color:red">*</font></label>
                  <?php
                    if ($num_ext) {
                      echo '<input type="text" class="form-control" id="numeroe" name="numeroe" value="'.$num_ext.'">';
                    }else{
                      echo '<input type="text" class="form-control" id="numeroe" name="numeroe" placeholder="Número Exterior">';
                    }
                  ?>
                  
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Interior <font style="color:red">*</font></label>
                  <?php 
                    if ($num_int) {
                      echo '<input type="text" class="form-control" id="numeroi" value="'.$num_int.'" name="numeroi">';
                    }else{
                      echo '<input type="text" class="form-control" id="numeroi" placeholder="Número Interior" name="numeroi" required>';
                    }
                  ?>
                  
                </div>
              </div>
              <br>
              <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="calle">Colonia <font style="color:red">*</font></label>
                  <?php
                     if ($colonia) {
                      echo '<input type="text" class="form-control" name="colonia" id="colonia" value="'.$colonia.'">';
                    }else{
                      echo '<input type="text" class="form-control" name="colonia" id="colonia" placeholder="Colonia" required>';
                    }
                  ?>
                  
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="ciudad">Ciudad/Municipio <font style="color:red">*</font></label>
                  
                  <?php 
                    if ($ciudad) {
                      echo '<input type="text" class="form-control" id="ciudad" name="ciudad" value="'.$ciudad.'">';
                    }else{
                      echo '<input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad/Municipio" required>';
                    }
                  ?>

                </div>
              </div>
              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="estado">Estado/Provincia <font style="color:red">*</font></label>
                  <?php
                    if ($estado) {
                      echo '<input type="text" class="form-control" id="estado" value="'.$estado.'"  name="estado" >';
                    }else{
                      echo '<input type="text" class="form-control" id="estado" placeholder="Estado" name="estado" required>';
                    }
                  ?>
                  
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Código Postal <font style="color:red">*</font></label>
                  <?php
                    if ($cod_postal) {
                      echo '<input type="text" maxlength="5" class="form-control" id="cod_postal" maxlength="5" name="cod_postal" value='.$cod_postal.'>';
                    }else{
                      echo '<input type="text" maxlength="5" class="form-control" id="cod_postal" maxlength="5" name="cod_postal" placeholder="Código Postal" required>';
                    }
                  ?>
                  
                </div>
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">País <font style="color:red">*</font></label>
                  <?php
                    if ($pais) {
                    echo '<input type="text" class="form-control" id="pais" name="pais" value='.$pais.' >';
                      }else{
                    echo '<input type="text" class="form-control" id="pais" name="pais" placeholder="País" required>';
                    }
                  ?>
                </div>

              </div>
            </div>
        </div>
      </div>
                <!--<div class="form-group row">
               
               </div>-->
  

     <!-- <button class="btn btn-success" onclick="menu2()">Guardar</button>-->
    </div>

      



    <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
   
             <div class="panel panel-warning">
                <div class="panel-heading">
                  <h5 class="panel-title">Formación Academica</h5> 
                </div>
                <div class="panel-body">
                    <div class="row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo">Licenciatura:</label>
                  <?php
                    if ($lic_lic) {
                    echo '<input type="text" class="form-control" id="lic" name="lic" value="'.$lic_lic.'" >';
                      }else{
                    echo '<input type="text" class="form-control" id="lic" name="lic" placeholder="Licenciatura" required>';
                    }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad">Universidad:</label>
                  <?php
                    if ($lic_uni) {
                    echo '<input type="text" class="form-control" id="lic_universidad" name="lic_universidad" value="'.$lic_uni.'" >';
                      }else{
                    echo '<input type="text" class="form-control" id="lic_universidad" name="lic_universidad" placeholder="Universidad" required>';
                    }
                  ?>
                </div>
                  </div>

              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e">País:</label>
                  <?php
                    if ($lic_pais) {
                    echo '<input type="text" class="form-control" id="lic_pais_e" name="lic_pais_e" value="'.$lic_pais.'">';
                      }else{
                    echo '<input type="text" class="form-control" id="lic_pais_e" name="lic_pais_e" placeholder="Universidad" required>';
                    }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e">Estatus:</label>
                  <?php 
                               if ($lic_status!="") {
                      if ($lic_status==1) {
                      echo '
                         <select name="lic_status_e" id="lic_status_e" class="form-control">
                           <option value="1"  selected="selected">Cursando</option>
                           <option value="2">En Proceso de titulación</option>
                           <option value="3">Finalizado</option>
                         </select>
                      ';
                      }elseif ($lic_status==2) {
                      echo '
                         <select name="lic_status_e" id="lic_status_e" class="form-control">
                           <option value="2"  selected="selected">En Proceso de titulación</option>
                           <option value="1" >Cursando</option>
                           <option value="3">Finalizado</option>
                         </select>
                      ';                   
                    }
                      else{
                      echo '
                         <select name="lic_status_e" id="lic_status_e" class="form-control">
                         <option value="3" selected="selected">Finalizado</option>
                           <option value="2"  >En Proceso de titulación</option>
                           <option value="1" >Cursando</option>
                         </select>
                      ';                   
                    }
                    }else{
                      echo '
                         <select name="status_e" id="status_e" class="form-control">
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
                  <label for="fecha_fin">Fecha de finalización:</label>
                  <?php
                    if ($lic_fecha_fin!="") {
                    echo '<input type="date" class="form-control" id="lic_fecha_fin" name="lic_fecha_fin" min="1900-04-25" max="2999-12-31"  value="'.$lic_fecha_fin.'" >';
                      }else{
                    echo '<input type="date" min="1900-04-25" max="2999-12-31"  class="form-control" id="lic_fecha_fin" name="lic_fecha_fin" placeholder="Fecha finalización" >';
                    }
                  ?>
                  
                  </div>
                </div>



              <br>
              <br>
                    <div class="row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo">Maestría:</label>
                  <?php
                    if ($mtr_mtr) {
                    echo '<input type="text" class="form-control" id="mtr" name="mtr" value="'.$mtr_mtr.'" >';
                      }else{
                    echo '<input type="text" class="form-control" id="mtr" name="mtr" placeholder="Maestría" >';
                    }
                  ?>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad">Universidad:</label>
                  <?php
                    if ($mtr_uni) {
                    echo '<input type="text" class="form-control" id="mtr_universidad" name="mtr_universidad" value="'.$mtr_uni.'" >';
                      }else{
                    echo '<input type="text" class="form-control" id="mtr_universidad" name="mtr_universidad" placeholder="Universidad" required>';
                    }
                  ?>
                </div>
                  </div>

              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e">País:</label>
                  <?php
                    if ($mtr_pais) {
                    echo '<input type="text" class="form-control" id="mtr_pais_e" name="mtr_pais_e" value="'.$mtr_pais.'">';
                      }else{
                    echo '<input type="text" class="form-control" id="mtr_pais_e" name="mtr_pais_e" placeholder="Universidad" required>';
                    }
                  ?>                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e">Estatus:</label>
                  <?php 
                    if ($mtr_status!="") {
                      if ($mtr_status==1) {
                      echo '
                         <select name="mtr_status_e" id="mtr_status_e" class="form-control">
                           <option value="1"  selected="selected">Cursando</option>
                           <option value="2">En Proceso de titulación</option>
                           <option value="3">Finalizado</option>
                         </select>
                      ';
                      }elseif ($mtr_status==2) {
                      echo '
                         <select name="mtr_status_e" id="mtr_status_e" class="form-control">
                           <option value="2"  selected="selected">En Proceso de titulación</option>
                           <option value="1" >Cursando</option>
                           <option value="3">Finalizado</option>
                         </select>
                      ';                   
                    }
                      else{
                      echo '
                         <select name="mtr_status_e" id="mtr_status_e" class="form-control">
                         <option value="3" selected="selected">Finalizado</option>
                           <option value="2"  >En Proceso de titulación</option>
                           <option value="1" >Cursando</option>
                         </select>
                      ';                   
                    }
                    }else{
                      echo '
                         <select name="mtr_status_e" id="mtr_status_e" class="form-control">
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
                  <label for="fecha_fin">Fecha de finalización:</label>
                  <?php
                    if ($mtr_fecha_fin!="") {
                    echo '<input type="date" class="form-control" id="mtr_fecha_fin" name="mtr_fecha_fin" placeholder="Fecha finalización" min="1900-04-25" max="2999-12-31"  value="'.$mtr_fecha_fin.'" >';
                      }else{
                    echo '<input type="date" min="1900-04-25" max="2999-12-31"  class="form-control" id="mtr_fecha_fin" name="mtr_fecha_fin" placeholder="Fecha finalización" >';
                    }
                  ?>
                  </div>
                </div>



              <br>
              <br>
                    <div class="row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo">Doctorado:</label>
                  <input type="text" class="form-control" id="doc_lic" placeholder="Doctorado" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad">Universidad:</label>
                  <input type="text" class="form-control" id="doc_universidad" placeholder="Universidad" >
                </div>
                  </div>

              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e">País:</label>
                  <input type="text" class="form-control" id="doc_pais_e" placeholder="País de estudio" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e">Estatus:</label>
                 <select name="doc_status_e" id="doc_status_e" class="form-control">
                   <option value="0">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin">Fecha de finalización:</label>
                  <input type="date" class="form-control" id="doc_fecha_fin" name="doc_fecha_fin" placeholder="Fecha finalización" >
                  </div>
                </div>


            </div>
              </div>
              <!--
      <button class="btn btn-secondary" onclick="menu1()">Anterior</button>

      <button class="btn btn-success" onclick="menu2()">Guardar</button>

-->
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
              <tbody id="archivos_subidos">
              
              </tbody>
              <div id="respuesta" class="alert"></div>
            </table>



    </div>
<!--<input type="submit" value="Guardar" class="btn btn-success" id="reg"/>-->
    </div>


    <div class="tab-pane fade" id="awesome-classic-orange2" role="tabpanel" aria-labelledby="identidad_institucional">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Identidad Institucional</h5> 
            </div>

      <br>
              <div class="form-group row">
                <div class="col">
                <form id="form_inst">
                  <label for="email_sis">Sistema <font style="color:red">*</font></label>
                  <?php
                  if ($emailInst) {
                    echo '<input type="text" class="form-control" id="email_sis" name="email_sis" value='.$emailInst.' readonly>';
                    }else{
                      echo '<input type="email" class="form-control" name="email_sis" id="email_sis" placeholder="Sistema" required readonly>';
                    }
                  ?>
                  
                </div>
                  <div class="col">
                  <label for="pass_sis">Contraseña <font style="color:red">*</font></label>
                  <?php
                  if ($pass) {
                    echo '<input type="text" class="form-control" id="pass_sis" name="pass_sis" value='.$pass.' readonly>';
                    }else{
                      echo ' <input type="text" class="form-control" name="pass_sis" id="pass_sis" placeholder="Contraseña" required readonly>';
                    }
                  ?>   
                 
                </div>
            </div>
            <br>
              <div class="form-group row" >
                <div class="col">
                  <label for="email_Inst">Correo Institucional <font style="color:red">*</font></label>
                  <?php
                  if ($emailInst) {
                    echo '<input type="text" class="form-control" id="email_sis" name="email_sis" value='.$emailInst.' readonly>';
                    }else{
                      echo '<input type="email" class="form-control" name="email_sis" id="email_sis" placeholder="Sistema" required readonly>';
                    }
                  ?>
                </div>
                  <div class="col">
                  <label for="pass_inst">Contraseña <font style="color:red">*</font></label>
                  <?php
                  if ($pass) {
                    echo '<input type="text" class="form-control" id="pass_sis" name="pass_sis" value='.$pass.' readonly>';
                    }else{
                      echo ' <input type="text" class="form-control" name="pass_sis" id="pass_sis" placeholder="Contraseña" required readonly>';
                    }
                  ?>
                </div>
            </div>
            <br>
             <div class="form-group row" >
                <div class="col" hidden>
                  <label for="usuario_biblio">Correo <font style="color:red">*</font></label>
                  <input type="email" class="form-control" id="email_Inst2" placeholder="Biblioteca digital" >
                </div>
                  <div class="col" hidden>
                  <label for="pass_biblio">Contraseña <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="pass_inst2" placeholder="Contraseña" >
                </div>
            </div>
            </form>
           </div>


    <br>
          </div>




  </form>
</div>
</div>

                   <div align="right">
      <br>
    

              <input type="button" value="Guardar" class="btn btn-success" id="EditarAlumno"/>

    </div>


    <script type="text/javascript">
    $('#EditarAlumno').on('click',function(){
      $.ajax({
          type: 'POST',
          url : "php/accion/edita_alumno.php",
          data: $("#formulario, #form_inst").serialize(),
          success: function(data){
            
              //$('#formulario_admision')[0].reset();
      $.alert({
              title: 'Alumno!',
              content: 'Información guardada correctamente',
              });
      //$('#contenido').load("php/modal/form_perfilRO.php");
      return false;
          },
          error: function(error){
              alert('error en el server');
          }
        })
      return false;
    });

    </script>