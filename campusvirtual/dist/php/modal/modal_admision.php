<style type="text/css">
  .bien{
  background-color:#3CBE34;
  text-align:center;
  font-size:14px;
  color:#FFF;
  padding:5px;
}
</style>
<head>
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
                    mostrarArchivos();
                }, function(progreso, valor) {
                    //Barra de progreso.
                    $("#barra_de_progreso").val(valor);
                });
            }

          function subirArchivosDoc() {
              $("#archivoPago").upload('php/accion/subir_archivoPag.php',
              {
              archivoPago: $("#archivoPago").val(),
              email_sis: $("#email_sis").val(),
              select_documento2: $("#select_documento2").val(),
              posgrado: $("#posgrado").val(),   
              },
        
            function(respuesta) {
              $("#barra_de_progreso2").val(0);
              if (respuesta === 1) {
              mostrarRespuesta('El archivo ha sido subido correctamente.', true);
              $("#nombre_archivo, #archivo").val('');
              } else {
                mostrarRespuesta('El archivo NO se ha podido subir.', false);
                    }
                mostrarArchivosDoc();
                }, function(progreso, valor) {
                    //Barra de progreso.
                    $("#barra_de_progreso2").val(valor);
                });
            }

            function eliminarArchivos(archivo) {
                $.ajax({
                    url: 'php/accion/eliminar_archivo.php',
                    type: 'POST',
                    timeout: 10000,
                    data: {archivo: archivo},
                    error: function() {
                        mostrarRespuesta('Error al intentar eliminar el archivo.', false);
                    },
                    success: function(respuesta) {
                        if (respuesta == 1) {
                            mostrarRespuesta('El archivo ha sido eliminado.', true);
                        } else {
                            mostrarRespuesta('Error al intentar eliminar el archivo.', false);                            
                        }
                        mostrarArchivos();
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
            
            function mostrarArchivosDoc() {
                var email_sis = $("#email_sis").val();
                var posgrado= $("#posgrado").val(); 
                //alert(correo);
                $.ajax({
                    url: "php/accion/mostrar_archivosPag.php",
                    type: "get", //send it through get method
                    data: { 
                      email_sis: email_sis, 
                      posgrado: posgrado,
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosPag").html(respuesta);
                    }
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
            $(document).ready(function() {
              if ($("#email_sis").val()!='') {

                mostrarArchivos();
                mostrarArchivosDoc();
                Refrescar_Doc();

              }
                
                $("#boton_subir").on('click', function() {
                  if ($("#select_documento").val()>0 && $("#archivo").val().length > 0) {
                      subirArchivos();
                  }else{
                    alert("Seleccione un documento de la lista");
                  }
                });
            $("#boton_subirDoc").on('click', function() {
                  if ($("#select_documento2").val()>0) {
                    subirArchivosDoc();
                  }else{
                    alert("Seleccione un documento de la lista");
                  }
                    //alert();
                });
                $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
                    var archivo = $(this).parents('.row').eq(0).find('span').text();
                    archivo = $.trim(archivo);
                    eliminarArchivos(archivo);
                });
            });
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
                mostrarArchivos();
                mostrarArchivosDoc();
                Refrescar_Doc();
              }
            });
            }else{
              
            }
          }

          
        </script>
</head>
   <div class="modal fade bd-example-modal-xl" id="registra-alumno" tabindex="-1" role="dialog" aria-labelledby="Eje" aria-hidden="true">
     
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">


          <center>
          <div class="modal-header" style="text-align: center;">
             <img src="opciones/logo-ide.png" class="responsive" width="45px" >
         <h5 class="modal-title" id="alumno" > <center >Nuevo Alumno</center></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>

          </div>
          </center> 






          <div class="modal-body">
  <form id="formulario_admision" name="formulario_admision">  
<!-- Classic tabs -->
<div class="classic-tabs mx-2">
<center>
  <ul class="nav tabs-orange" id="myClassicTabOrange" role="tablist" style="text-align: justify;">
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
      <a class="nav-link waves-light" id="awesome-tab-classic-orange" data-toggle="tab" href="#awesome-classic-orange"
        role="tab" aria-controls="awesome-classic-orange" aria-selected="false">
        <center><i class="fas fa-dollar-sign fa-2x pb-2" aria-hidden="true"></i>
        <br>Pagos
        </center>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="awesome-tab-classic-orange3" data-toggle="tab" href="#awesome-classic-orange3"
        role="tab" aria-controls="awesome-classic-orange3" aria-selected="false">
        <center><i class="fas fa-chalkboard-teacher fa-2x pb-2" aria-hidden="true"></i>
        <br>Grupos
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
</center>

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
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="primer_ap">Primer Apellido <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="primer_ap" name="primer_ap" placeholder="Primer Apellido"  required>
              <input id="idPerfil" name="idPerfil"  hidden>

                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="segundo_ap">Segundo Apellido <font style="color:red">*</font></label>
                  <input type="text" class="form-control" placeholder="Segundo Apellido" name="segundo_ap" id="segundo_ap">
                </div>
                
              </div>
              <br>
              <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_nac">Fecha de Nacimiento <font style="color:red">*</font></label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Fecha Nacimiento" >
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="sexo">Sexo <font style="color:red">*</font></label>
                  <select id="sexo" name="sexo" class="form-control">
                  <option selected>Seleccione...</option>
                  <option value="1">Femenino</option>
                  <option value="2">Masculino</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Nacionalidad <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" >
                </div>
              </div>
              <br>
                <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">CURP <font style="color:red">*</font></label>
                  <input type="text" maxlength="18" class="form-control" id="curp" name="curp" placeholder="CURP" >
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Celular <font style="color:red">*</font></label>
                  <input type="tel" maxlength="10" class="form-control" id="tel_celular" name="tel_celular" placeholder="Teléfono Celular">
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Fijo u Otro <font style="color:red">*</font></label>
                  <input type="tel" maxlength="10" class="form-control" id="tel_fijo" name="tel_fijo" placeholder="Otro Teléfono" >
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                  <label for="telefono">Extensión <font style="color:red">*</font></label>
                  <input type="tel" class="form-control" id="tel_ext" name="tel_ext" placeholder="Extensión" >
                </div>
              </div>
              <br>

              <div class="form-group row">
                <!---->

                <div class="col-12 col-sm-6 col-md-6">
                  <label for="email">Email <font style="color:red">*</font></label>
                  <input type="email" class="form-control" id="correo" name="correo" placeholder="Email" required>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="nombre">Posgrado <font style="color:red">*</font></label>
                  <select id="posgrado" name="posgrado" class="form-control" required>
                  <option selected>Seleccione...</option>
                  <option value="1">MDCDH</option>
                  <option value="2">MDE</option>
                  <option value="3">DDCDH</option>
                  <option value="4">DDE</option>
                  </select>
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
                  <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" required>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Exterior <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="numeroe" name="numeroe" placeholder="Número Exterior">
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Interior <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="numeroi" name="numeroi" placeholder="Número Interior" required>
                </div>
              </div>
              <br>
              <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="calle">Colonia <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" required>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="ciudad">Ciudad/Municipio <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad/Municipio" required>
                </div>
              </div>
              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="estado">Estado/Provincia <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Código Postal <font style="color:red">*</font></label>
                  <input type="text" max="99999" placeholder="Código Postal" maxlength="5" class="form-control" id="cod_postal"  name="cod_postal" required>
                </div>
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">País <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="pais" name="pais" placeholder="País" required>
                </div>
              </div>
            </div>
        </div>
      </div>
                <!--<div class="form-group row">
               
               </div>-->
  
      <div align="right">
        <a type="button" class="btn btn-success" onclick="menu2()" style="color: white">Guardar</a>
      </div>
      <br>
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
                  <input type="text" class="form-control" id="lic" name="lic"  placeholder="Licenciatura" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_lic_uni">Universidad <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="lic_universidad" name="lic_universidad" placeholder="Universidad" >
                </div>
                  </div>

              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_lic_pais">País <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="lic_pais_e" name="lic_pais_e" placeholder="País de estudio" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_lic_status">Estatus <font style="color:red">*</font></label>
                 <select name="lic_status_e" id="lic_status_e" class="form-control">
                   <option value="">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin" id="lb_lic_fecha">Fecha de finalización <font style="color:red">*</font></label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" id="lic_fecha_fin" name="lic_fecha_fin" placeholder="Fecha finalización" >
                  </div>
                </div>



              <br>
              <br>
                    <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_maestria">Maestría <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="mtr" name="mtr" placeholder="Maestría" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_ma_uni">Universidad <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="mtr_universidad" name="mtr_universidad" placeholder="Universidad" >
                </div>
                  </div>

              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_ma_pais">País <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="mtr_pais_e" name="mtr_pais_e" placeholder="País de estudio" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_ma_status">Estatus <font style="color:red">*</font></label>
                 <select name="mtr_status_e" id="mtr_status_e" class="form-control">
                   <option value="">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin" id="lb_ma_fecha">Fecha de finalización <font style="color:red">*</font></label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" id="mtr_fecha_fin" name="mtr_fecha_fin" placeholder="Fecha finalización" >
                  </div>
                </div>



              <br>
              <br>
                    <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_doctorado">Doctorado <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="doct" name="doct" placeholder="Doctorado" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_doc_uni">Universidad <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="doct_universidad" name="doct_universidad" placeholder="Universidad" >
                </div>
                  </div>

              <br>
              <div class="form-group row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_doc_pais">País <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="doct_pais_e" name="doct_pais_e" placeholder="País de estudio" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_doc_status">Estatus <font style="color:red">*</font></label>
                 <select name="doct_status_e" id="doct_status_e" class="form-control">
                   <option value="">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin" id="lb_doc_fecha">Fecha de finalización <font style="color:red">*</font></label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" id="doct_fecha_fin" name="doct_fecha_fin" placeholder="Fecha finalización" >
                  </div>
                </div>

            </div>
              </div>

      <div align="right">
        <a type="button" class="btn btn-secondary" onclick="menu1()" style="color: white" >Anterior</a>
        <a type="button" class="btn btn-success" onclick="menu3()" style="color: white" >Guardar</a>

      </div>
        <br>
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
                        <input type="submit" id="boton_subir" value="Subir" class="btn btn-success" />
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
      <div align="right">
        <a type="button" class="btn btn-secondary" onclick="menu2()" style="color: white" >Anterior</a>
        <a type="button" class="btn btn-success" onclick="menu4()" style="color: white" >Guardar</a>
      </div>
      <br>
    </div>
    <div class="tab-pane fade" id="awesome-classic-orange" role="tabpanel" aria-labelledby="awesome-tab-classic-orange">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Plan de Pagos</h5> 
            </div>
            <br>

              <div class="form-group row">
                <div class="col">
                  <label for="num_doc">Convocatoria <font style="color:red">*</font></label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required>
                </div>
                <div class="col">
                  <label for="num_doc">Último número de pago <font style="color:red">*</font></label>
                  <input type="number" name="ultimoPago" id="ultimoPago" class="form-control"  min="1" max="25">
                </div>

                <!--<div class="col">
                  <label for="tipo_pago">Frecuencia de pago:</label>
                  <select name='frecuencia' id='frecuencia' class="form-control" required='required' >
                  <option value=''>Seleccione</option>
                  <?php
                   
                    $sql="SELECT * FROM catg_tipo_pago";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                  </select>
                </div>-->



                </div>
<br>
            <div class="panel-heading-default">
              Inscripción
            </div>
              <br>
               <div class="form-group row">
                <div  class="col">
                <label for="tipo_pago">Monto Total <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_inscripcion" name="monto_inscripcion">
                </div>
                </div>
              <div class="col">
              <label for="tipo_pago">% Beca otorgada <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" maxlength="2" class="form-control number"  id="beca_inscripcion" name="beca_inscripcion">
                </div>
              </div>
              <div class="col">
              <label for="tipo_pago">Monto a pagar <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control numbers" id="cantidad_inscripcion" name="cantidad_inscripcion" readonly>
                </div>
              </div>
                <div class="col">
                  <label for="num_doc">% de Recargo/ Reinscripción <font style="color:red">*</font></label>
                  <input type="number" name="doc_cv" id="doc_cv" class="form-control"  min="1" max="24">
                </div>
              </div>


     
            <br>
            <div class="panel-heading-default">
          Mensualidad
        </div>
          <br>
          <div class="form-group row">
              <div class="col">
                <label for="tipo_pago">Monto Total <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" name="monto_mensualidad" id="monto_mensualidad">
                </div>
              </div>
              <div class="col">
              <label for="tipo_pago">% Beca otorgada <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" maxlength="2" class="form-control number" name="beca_mensualidad" id="beca_mensualidad">
                </div>
              </div>
              <div class="col">
              <label for="tipo_pago">Monto a pagar <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_total_mensualidad" readonly>
                </div>
              </div>
                <div class="col">
                  <label for="num_doc">% de Recargo <font style="color:red">*</font></label>
                  <input type="number" name="doc_cert" id="doc_cert" class="form-control"  min="1" max="24">
                </div>
          </div>


          <br>
          <center>
               <div>
            <button type="button" class="btn btn-primary" id="carta_admision">Carta de admisión</button>
            </div>
            </center>
         <br> 
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Pagos</h5> 
            </div>
            <br>
            <div class="panel-heading-default">
              <b>Inscripción</b> 
            </div>
        <br>    
   <div class="form-group row">
     <div  class="col">
                <label for="tipo_pago">Monto a pagar <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_pagar_inscripcion" name="monto_pagar_inscripcion">
                </div>
                </div>
           <div  class="col">
                <label for="tipo_pago">Monto pagado <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_pagado_inscripcion" name="monto_pagado_inscripcion">
                </div>
                </div>
           <div  class="col">
                <label for="tipo_pago">Diferencia <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_diferencia_inscripcion" readonly>
                </div>
                </div>
                <div class="col">
                  <label for="fecha_pago">Fecha de pago <font style="color:red">*</font></label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" name="fecha_pago_inscripcion" id="fecha_pago_inscripcion" required>
                </div>
</div>
   
          <br>
        <div class="panel-heading-default">
            Mensualidad
          </div>
              <br>
   <div class="form-group row">
     <div  class="col">
                <label for="tipo_pago">Monto a pagar <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_pagar_mensualidad" name="monto_pagar_mensualidad">
                </div>
                </div>
           <div  class="col">
                <label for="tipo_pago">Monto pagado <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_pagado_mensualidad" name="monto_pagado_mensualidad">
                </div>
                </div>
           <div  class="col">
                <label for="tipo_pago">Diferencia <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_diferencia_mensualidad" readonly>
                </div>
                </div>
                <div class="col">
                  <label for="fecha_pago">Fecha de pago <font style="color:red">*</font></label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" name="fecha_pago_mensualidad" id="fecha_pago_mensualidad" required>
                </div>

   </div>
 </div>

<!--                
                  <div  class="col-12 col-sm-6 col-md-6">
                  <label for="fecha_pago">Fecha de pago inscripción <font style="color:red">*</font></label>
                  <input type="date" class="form-control" id="fecha_pago" required>
                </div>
              <div class="form-group row">


                <div class="col">
                  <label for="plan_reinscripcion">Plan de pago Reinscripción <font style="color:red">*</font></label>
                  <input type="number" class="form-control" id="plan_reinscripcion" name="plan_reinscripcion" placeholder="Plan de pago" required>
                </div>


                <div class="col">
                  <label for="plan_mensualidad">Plan de pago mensualidad <font style="color:red">*</font></label>
                  <input type="number" class="form-control" id="plan_mensualidad" name="plan_mensualidad" placeholder="Plan de pago" required>
                </div>


            </div>

            <div class="form-group row">
             
              <div class="col">
              <label for="tipo_pago">Beca de inscripción <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="number" class="number" id="beca_inscripcion" name="beca_inscripcion">
                </div>
              </div>

            <div class="col">
                    
                <label for="tipo_pago">Monto de Reinscripción <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_reinscripcion">
                </div>
              </div>




            </div>

              <div class="form-group row">
  
              <div class="col">
              <label for="tipo_pago">Cantidad a pagar inscripción <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control numbers" id="cantidad_inscripcion" name="cantidad_inscripcion" readonly>
                </div>
              </div>

              <div class="col">
              <label for="tipo_pago">Beca de Reinscripción <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="form-control number" id="beca_reinscripcion">
                </div>
              </div>

              <div class="col">
              <label for="tipo_pago">Beca de mensualidad <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="form-control number" id="beca_mensualidad">
                </div>
              </div>

              </div>




              <div class="form-group row">
                <div class="col"></div>

            <div class="col">
              <label for="tipo_pago">Monto a pagar de Reinscripción <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_total_reinscripcion" readonly>
                </div>
              </div>

              <div class="col">
              <label for="tipo_pago">Monto a pagar de mensualidad <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_total_mensualidad" readonly>
                </div>
              </div>

              </div>
            


              <div class="form-group row">
                <div class="col"></div>
                              <div class="col">
              <label for="tipo_pago">Recargo <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="form-control number" id="beca_recargo_reinscripcion">
                </div>
              </div>
              <div class="col">
              <label for="tipo_pago">Recargo <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="form-control number" id="beca_recargo_mensualidad">
                </div>
              </div>
              </div>

             
               <div class="form-group row">
                <div class="col"></div>
                  <div class="col">
                <label for="tipo_pago">Monto a pagar con Recargo <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_recargo_reinscripcion">
                </div>
              </div>

                            <div class="col">
              <label for="tipo_pago">Monto a pagar con Recargo <font style="color:red">*</font></label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="form-control number" id="monto_recargo_mensualidad" readonly>
                </div>
              </div>
              
            </div>

          -->

<form action="javascript:void(1);" id="form_pag" name="form-pago">
              <br>               
                 <label for="tipo_pago">Documento <font style="color:red">*</font></label>
                  <select name='select_documento2' id='select_documento2' class="form-control" required='required' >
                  <option value=''>Seleccione</option>

                  </select>
                  <hr>
                  <br>
                <div class="form-group row">
                    <div class="col-lg-2"> 
                        <label> Nombre el archivo <font style="color:red">*</font></label> 
                    </div>

                    <div class="col-lg-2">
                        <input type="file" name="archivoPago" id="archivoPago" />
                    </div>                    
                </div>
                <hr>
                <br>
                <div class="form-group row">
                    <div class="col-lg-2">

                         <input type="submit" id="boton_subirDoc" value="Subir" class="btn btn-success" />
                    </div>
                    <div class="col-lg-4">
                        <progress id="barra_de_progreso2" value="0" max="100"></progress>
                    </div>

                </div>
            </form>

                 
            <div id="archivos_subidos"></div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Documento</th>
                  <th>Fecha</th>
                  <th>Acción</th>

                </tr>
              </thead>
              <tbody id="archivos_subidosPag">
              
              </tbody>
            </table>

    <br>
 </div>
      <div align="right">
      <a type="button" class="btn btn-secondary" onclick="menu3()" style="color: white">Anterior</a>
      <a type="button" class="btn btn-success" onclick="menu5()" style="color: white">Guardar</a>
    </div>
    <br>
            </div>


    
    <div class="tab-pane fade" id="awesome-classic-orange2" role="tabpanel" aria-labelledby="identidad_institucional">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Identidad Institucional</h5> 
            </div>

      <br>
      <form id="form_inst" name="form_inst">
              <div class="form-group row">
                <div class="col">
                  <label for="email_sis">Sistema <font style="color:red">*</font></label>
                  <input type="email" class="form-control" name="email_sis" id="email_sis" placeholder="Sistema" required>
                </div>
                  <div class="col">
                  <label for="pass_sis">Contraseña <font style="color:red">*</font></label>
                  <input type="text" class="form-control" name="pass_sis" id="pass_sis" placeholder="Contraseña" required>
                </div>
            </div>
            <br>
              <div class="form-group row" >
                <div class="col">
                  <label for="email_Inst">Correo Institucional <font style="color:red">*</font></label>
                  <input type="email" class="form-control" id="email_Inst" name="email_Inst" placeholder="Correo Institucional" required>
                </div>
                  <div class="col">
                  <label for="pass_inst">Contraseña <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="pass_inst" name="pass_inst" placeholder="Contraseña" required>
                </div>
            </div>
            <br>
             <div class="form-group row" hidden>
                <div class="col">
                  <label for="usuario_biblio">Biblioteca digital <font style="color:red">*</font></label>
                  <input type="email" class="form-control" id="usuario_biblio" placeholder="Biblioteca digital" required>
                </div>
                  <div class="col">
                  <label for="pass_biblio">Contraseña <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="pass_biblio" placeholder="Contraseña" required>
                </div>
            </div>
                <div class="form-group row" >
                <div class="col">
                  <label for="usuario_biblio">Matrícula <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="matricula" value="MDE-TOGL780505" name="matricula" placeholder="Matrícula" >
                </div>

            </div>
      </form>
           </div>

            <center>
            <button type="button" class="btn btn-primary" id="carta_identidad">Carta de identidad</button>
            </center>
               <div align="right">
      <br>    <input type="button" value="Registrar" class="btn btn-success" id="editaAlumno" name="editaAlumno"  >
              <input type="button" value="Guardar" class="btn btn-success" id="guardarAlumno"/>
              <input id="pro" hidden>
            <a type="button" class="btn btn-secondary" onclick="menu5()" style="color: white">Anterior</a>

    </div>
    <br>
          </div>
          



    <div class="tab-pane fade" id="awesome-classic-orange3" role="tabpanel" aria-labelledby="identidad_institucional">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Grupos </h5> 
            </div>
             <br>
            <label for="grupo">Grupo <font style="color:red">*</font></label>
                <select name="grupo" id="grupo" class="form-control">
                  
                </select>


                </div>
          <div align="right">
            <a type="button" class="btn btn-secondary" onclick="menu4()" style="color: white">Anterior</a>
            <a type="button" class="btn btn-success" onclick="menu6()" style="color: white">Guardar</a>
          </div>
          <br>
              </div>
            </div>
              
         
          </div>



          </form>
    </div>
    </div>
  </div>

</div>
<!-- Classic tabs -->


                       <div colspan="2" id="mensaje"></div>
          <div class="modal-footer">

          </div>


          </div>


        </div>
      </div>

    </div>




    <script type="text/javascript">
    const number = document.querySelector('.number');

function formatNumber (n) {
  n = String(n).replace(/\D/g, "");
  return n === '' ? n : Number(n).toLocaleString();
}
number.addEventListener('keyup', (e) => {
  const element = e.target;
  const value = element.value;
  element.value = formatNumber(value);
});

    </script>


          <script type="text/javascript">

    function quitar_comas(num){
        num = num.replace(/,/g,"");
        return num;
    }
    
    function cpf(v){
        v=v.replace(/([^0-9\.]+)/g,'');
        v=v.replace(/^[\.]/,'');
        v=v.replace(/[\.][\.]/g,'');
        v=v.replace(/\.(\d)(\d)(\d)/g,'.$1$2');
        v=v.replace(/\.(\d{1,2})\./g,'.$1');
        v = v.toString().split('').reverse().join('').replace(/(\d{3})/g,'$1,');
        v = v.split('').reverse().join('').replace(/^[\,]/,'');
        return v;
    }



     $("#monto_pagar_inscripcion, #monto_pagado_inscripcion").keyup(function () {
      $('#monto_diferencia_inscripcion').val(
        $('#monto_pagado_inscripcion').val().replace(/\,/g, '')-
        ($('#monto_pagar_inscripcion').val().replace(/\,/g, ''))
        );

        $("#monto_pagar_inscripcion").val(cpf($("#monto_pagar_inscripcion").val()));
       });

     $("#monto_pagar_mensualidad, #monto_pagado_mensualidad").keyup(function () {
      $('#monto_diferencia_mensualidad').val(
        $('#monto_pagado_mensualidad').val().replace(/\,/g, '')-
        ($('#monto_pagar_mensualidad').val().replace(/\,/g, ''))
        );

        $("#monto_pagar_mensualidad").val(cpf($("#monto_pagar_mensualidad").val()));
       });




     $("#monto_inscripcion").keyup(function () {

      $(this).val(cpf($(this).val()));
       });

     $("#beca_inscripcion").keyup(function () {
      $('#cantidad_inscripcion').val(
        $('#monto_inscripcion').val().replace(/\,/g, '')-
        ($('#monto_inscripcion').val().replace(/\,/g, '') * ($('#beca_inscripcion').val()/100))
        );

        $("#cantidad_inscripcion").val(cpf($("#cantidad_inscripcion").val()));
        $("#monto_pagar_inscripcion").val(cpf($("#cantidad_inscripcion").val()));
       });


      $("#monto_reinscripcion").keyup(function () {
        $(this).val(cpf($(this).val()));
       });


     $("#beca_reinscripcion").keyup(function () {
      $('#monto_total_reinscripcion').val(
        $('#monto_reinscripcion').val().replace(/\,/g, '')-
        ($('#monto_reinscripcion').val().replace(/\,/g, '') * ($('#beca_reinscripcion').val()/100))
        );
        $("#monto_total_reinscripcion").val(cpf($("#monto_total_reinscripcion").val()));
       });

     $("#beca_recargo_reinscripcion").keyup(function () {
      $('#monto_recargo_reinscripcion').val(
        parseInt($('#monto_reinscripcion').val().replace(/\,/g, '') 
        * 
       ($('#beca_recargo_reinscripcion').val()/100))
        );
       $("#monto_recargo_reinscripcion").val(cpf($("#monto_recargo_reinscripcion").val()));
       });


      $("#monto_mensualidad").keyup(function () {
        $(this).val(cpf($(this).val()));
       });

     $("#beca_mensualidad").keyup(function () {
      $('#monto_total_mensualidad').val(
        $('#monto_mensualidad').val().replace(/\,/g, '')-
        ($('#monto_mensualidad').val().replace(/\,/g, '') * ($('#beca_mensualidad').val()/100))
        );
        $("#monto_total_mensualidad").val(cpf($("#monto_total_mensualidad").val()));
        $("#monto_pagar_mensualidad").val(cpf($("#monto_total_mensualidad").val()));

       });

     $("#beca_recargo_mensualidad").keyup(function () {
      $('#monto_recargo_mensualidad').val(
        parseInt($('#monto_mensualidad').val().replace(/\,/g, '') 
        * 
       ($('#beca_recargo_mensualidad').val()/100))
        );
        $("#monto_recargo_mensualidad").val(cpf($("#monto_recargo_mensualidad").val()));
       });


     $('#frecuencia').on('change', function() {
      var hoy = new Date();
      if (this.value==1) {
        
        var fecha = new Date();
        var dia = fecha.getDate();
        var mes = fecha.setMonth(fecha.getMonth() +  1);
       
        alert("Su próxima fecha de pago es: "+fecha.getFullYear() +"-"+ (fecha.getMonth()+1) +"-"+ fecha.getDate());

      }
           
      });

      </script>

<script type="text/javascript">
$(document).ready(function(){
    $('#posgrado').on('change',function(){
        var posgrado = $(this).val();
        mostrarArchivos();
        mostrarArchivosDoc();
        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscagrupo.php',
                data:'posgrado='+posgrado,
                success:function(html){
                    $('#grupo').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        }

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

        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadocpago.php',
                data:'posgrado='+posgrado,
                success:function(html){
                    $('#select_documento2').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        }

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



    $('#lic_status_e').on('change',function(){
        var posgrado = $(this).val();
        //alert(posgrado);
        if(posgrado==1){
          $('#lic_fecha_fin').attr('readonly', true);
          $('#lic_fecha_fin').val('');
        }else{
          $('#lic_fecha_fin').attr('readonly', false);
        }
    });

    $('#mtr_status_e').on('change',function(){
        var posgrado = $(this).val();
        //alert(posgrado);
        if(posgrado==1){
          $('#mtr_fecha_fin').attr('readonly', true);
          $('#mtr_fecha_fin').val('');
        }else{
          $('#mtr_fecha_fin').attr('readonly', false);
        }
    });

    $('#doct_status_e').on('change',function(){
        var posgrado = $(this).val();
        //alert(posgrado);
        if(posgrado==1){
          $('#doct_fecha_fin').attr('readonly', true);
          $('#doct_fecha_fin').val('');
        }else{
          $('#doct_fecha_fin').attr('readonly', false);
        }
    });

        });

    $("#email_sis").keyup(function( event ) {
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
    });

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


function Refrescar_Pag(){
    var email_sis = $('#email_sis'). val();
    var posgrado = $('#posgrado').val();
        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadocpago.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        }
}
  function menu1(){
    $('[href="#profile-classic-orange"]').tab('show');
  }

  function menu2(){
    $('[href="#follow-classic-orange"]').tab('show');
  }

  function menu3(){
    $('[href="#contact-classic-orange"]').tab('show');
  }
  function menu4(){
    $('[href="#awesome-classic-orange"]').tab('show');
  }
  function menu5(){
    $('[href="#awesome-classic-orange3"]').tab('show');
  }
  function menu6(){
    $('[href="#awesome-classic-orange2"]').tab('show');
  }
  </script>

  <script type="text/javascript">
      $('#guardarAlumno').on('click',function(){
      $.ajax({
          type: 'POST',
          url : "php/accion/agrega_alumno.php",
          data: $("#formulario_admision, #form_inst").serialize(),
          success: function(data){
            
              $('#formulario_admision')[0].reset();
              $('#registra-alumno').modal('hide');

      $.alert({
              title: 'Alumno!',
              content: 'Información guardada correctamente',
              });

      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      return false;
          },
          error: function(error){
              alert('error en el server');
          }
        })
      return false;
    });
  </script>

      <script type="text/javascript">
    $('#editaAlumno').on('click',function(){
      $.ajax({
          type: 'POST',
          url : "php/accion/edita_alumno.php",
          data: $("#formulario_admision, #form_inst").serialize(),
          success: function(data){
        
         $('#registra-alumno').modal('hide');

      $.alert({
              title: 'Alumno!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      return false;
          },
          error: function(error){
              alert('error en el server');
          }
        })
      return false;
    });

    $('#carta_admision').on('click',function(){
      $.ajax({
          type: 'POST',
          url : "php/accion/carta_admision.php",
          data: $("#formulario_admision, #form_inst").serialize(),
          success: function(data){
      
      $.alert({
              title: 'Alumno!',
              content: 'Información enviada correctamente',
              });

          },
          error: function(error){
              alert('error en el server');
          }
        })
      return false;
    });

    $('#carta_identidad').on('click',function(){
      $.ajax({
          type: 'POST',
          url : "php/accion/carta_identidad.php",
          data: $("#formulario_admision, #form_inst").serialize(),
          success: function(data){
      
      $.alert({
              title: 'Alumno!',
              content: 'Información enviada correctamente',
              });

          },
          error: function(error){
              alert('error en el server');
          }
        })
      return false;
    });
    </script>