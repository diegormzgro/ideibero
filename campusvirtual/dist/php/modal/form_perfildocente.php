   <div class="modal fade bd-example-modal-xl" id="registra-docente" tabindex="-1" role="dialog" aria-labelledby="Eje" aria-hidden="true">
     
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">


          <center>
          <div class="modal-header" style="text-align: center;">
             <img src="opciones/logo-ide.png" class="responsive" width="45px" >
         <h5 class="modal-title" id="alumno" > <center >Docente</center></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>

          </div>
          </center> 





   <form  onsubmit="return guardar_PerfilDocente();" id="form_docenteperfil"  >
<!-- Classic tabs -->
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
                  <input type="" name="idPerfilCat" id="idPerfilCat" hidden>
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="mtro_nombre" name="mtro_nombre" placeholder="Nombre" required>
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="primer_ap">Primer Apellido:</label>
                  <input type="text" class="form-control" id="mtro_primer_ap" name="mtro_primer_ap" placeholder="Primer Apellido"  required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="segundo_ap">Segundo Apellido:</label>
                  <input type="text" class="form-control" placeholder="Segundo Apellido" name="mtro_segundo_ap" id="mtro_segundo_ap">
                </div>
                
              </div>
              <br>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_nac">Fecha de Nacimiento:</label>
                  <input type="date" class="form-control"  min="1900-04-25" max="2999-12-31" id="mtro_fecha_nac" name="mtro_fecha_nac" placeholder="Fecha Nacimiento" >
                </div>
                 <div class="col-12 col-sm-6 col-md-4">
                  <label for="sexo">Sexo:</label>
                  <select id="mtro_sexo" name="mtro_sexo" class="form-control">
                  <option value="">Seleccione...</option>
                  <option value="1">Femenino</option>
                  <option value="2">Masculino</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Nacionalidad:</label>
                  <input type="text" class="form-control" id="mtro_nacionalidad" name="mtro_nacionalidad" placeholder="Nacionalidad" >
                </div>
              </div>
              <br>
                <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">CURP:</label>
                  <input type="text" maxlength="18" class="form-control" id="mtro_curp" name="mtro_curp" placeholder="CURP" >
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Celular:</label>
                  <input type="tel" maxlength="10" class="form-control" id="mtro_tel_celular" name="mtro_tel_celular" placeholder="Teléfono Celular">
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Fijo u Otro:</label>
                  <input type="tel" maxlength="18" class="form-control" id="mtro_tel_fijo" name="mtro_tel_fijo" placeholder="Otro Teléfono" >
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                  <label for="telefono">Extensión:</label>
                  <input type="tel" class="form-control" id="mtro_tel_ext" name="mtro_tel_ext" placeholder="Extensión" >
                </div>
              </div>
              <br>

              <div class="row">
                <!---->

                <div class="col-12 col-sm-6 col-md-6">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="mtro_correo" name="mtro_correo" placeholder="Email" required>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="nombre">Título:</label>
                  <select class="form-control" id="mtro_titulo_doc" name="mtro_titulo_doc">
                    <option value="0">Seleccione</option>
                    <option value="-1">Maestría</option>
                    <option value="-3">Doctorado</option>
                  </select>
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
                  <input type="text" class="form-control" id="mtro_calle" name="mtro_calle" placeholder="Calle" required>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Exterior:</label>
                  <input type="text" class="form-control" id="mtro_numeroe" name="mtro_numeroe" placeholder="Número Exterior">
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                  <label for="numero">Número Interior:</label>
                  <input type="text" class="form-control" id="mtro_numeroi" name="mtro_numeroi" placeholder="Número Interior" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="calle">Colonia:</label>
                  <input type="text" class="form-control" id="mtro_colonia" name="mtro_colonia" placeholder="Colonia" required>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                  <label for="ciudad">Ciudad/Municipio:</label>
                  <input type="text" class="form-control" id="mtro_ciudad" name="mtro_ciudad" placeholder="Ciudad/Municipio" required>
                </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="estado">Estado/Provincia:</label>
                  <input type="text" class="form-control" id="mtro_estado" name="mtro_estado" placeholder="Estado" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Código Postal:</label>
                  <input type="text" maxlength="5" class="form-control" id="mtro_cp" name="mtro_cp" placeholder="Código Postal" required>
                </div>
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">País:</label>
                  <input type="text" name="mtro_pais" class="form-control" id="mtro_pais" placeholder="País" required>
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


    </div>

      



    <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
   
             <div class="panel panel-warning">
                <div class="panel-heading">
                  <h5 class="panel-title">Formación Academica</h5> 
                </div>
                <div class="panel-body">
                  <div class="panel panel-warning">
                    <div class="row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_lic">Licenciatura:</label>
                  <input type="text" class="form-control" id="mtro_lic"
                  name="mtro_lic" placeholder="Licenciatura" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_lic_uni">Universidad:</label>
                  <input type="text" class="form-control" id="mtro_lic_universidad" name="mtro_lic_universidad" placeholder="Universidad" >
                </div>
                  </div>

              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_lic_pais">País:</label>
                  <input type="text" class="form-control" id="mtro_lic_pais_e" name="mtro_lic_pais_e" placeholder="País de estudio" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_lic_status">Estatus:</label>
                 <select name="mtro_status_e" id="mtro_status_e" class="form-control">
                   <option value="0">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="fecha_fin" id="lb_lic_fecha">Fecha de finalización:</label>
                  <input type="date" class="form-control" id="mtro_lic_fecha_fin" min='1900-04-25' max="2999-12-31" name="mtro_lic_fecha_fin" placeholder="Fecha finalización" >
                  </div>
                </div>



              <br>
              <br>
                    <div class="row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_maestria">Maestría:</label>
                  <input type="text" class="form-control" id="mtro_mtria" name="mtro_mtria" placeholder="Maestría" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_ma_uni">Universidad:</label>
                  <input type="text" class="form-control" id="mtro_mtria_universidad" name="mtro_mtria_universidad" placeholder="Universidad" >
                </div>
                  </div>

              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_ma_pais">País:</label>
                  <input type="text" class="form-control" id="mtro_mtria_pais" name="mtro_mtria_pais" placeholder="País de estudio" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_ma_status">Estatus:</label>
                 <select name="mtro_mtria_status_e" id="mtro_mtria_status_e" class="form-control">
                   <option value="0">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="mtro_mtria_fecha_fin" id="lb_ma_fecha">Fecha de finalización:</label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" id="mtro_mtria_fecha_fin" name="mtro_mtria_fecha_fin" placeholder="Fecha finalización" >
                  </div>
                </div>



              <br>
              <br>
                    <div class="row">
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="titulo" id="lb_doctorado">Doctorado:</label>
                  <input type="text" class="form-control" id="mtro_doctorado" name="mtro_doctorado" placeholder="Doctorado" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-6">
                  <label for="universidad" id="lb_doc_uni">Universidad:</label>
                  <input type="text" class="form-control" id="mtro_doctorado_uni" name="mtro_doctorado_uni" placeholder="Universidad" >
                </div>
                  </div>

              <br>
              <div class="row">
                  <div class="col-12 col-sm-6 col-md-4">
                  <label for="pais_e" id="lb_doc_pais">País:</label>
                  <input type="text" class="form-control" id="mtro_doctorado_pais_e" name="mtro_doctorado_pais_e" placeholder="País de estudio" >
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                 <label for="lic_estado_e" id="lb_doc_status">Estatus:</label>
                 <select name="mtro_doctorado_status_e" id="mtro_doctorado_status_e" class="form-control">
                   <option value="0">Seleccionar</option>
                   <option value="1">Cursando</option>
                   <option value="2">En Proceso de titulación</option>
                   <option value="3">Finalizado</option>
                 </select>
               </div>
                   <div class="col-12 col-sm-6 col-md-4">
                  <label for="mtro_doctorado_fecha_fin" id="lb_doc_fecha">Fecha de finalización:</label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" id="mtro_doctorado_fecha_fin" name="mtro_doctorado_fecha_fin" placeholder="Fecha finalización" >
                  </div>
                </div>


                </div>
            </div>
              </div>
      <div align="right">
        <a type="button" class="btn btn-secondary" onclick="menu1()" style="color: white" >Anterior</a>
        <a type="button" class="btn btn-success" onclick="menu3()" style="color: white" >Guardar</a>

      </div>


            </div>
          

    <div class="tab-pane fade" id="contact-classic-orange" role="tabpanel" aria-labelledby="contact-tab-classic-orange">
      
               
               <center><h4>Documentación</h4></center> 

                        
           
           
            <form action="javascript:void(0);" id="form_doc_docente" enctype="multipart/form-data">
              
                 <label for="tipo_pago">Documento:</label>
                  <select name='mtro_select_documento' id='mtro_select_documento' class="form-control" required='required' >
                  <option value=''>Seleccione</option>

                  </select>
                  <hr>
                <div class="row">
                    <div class="col-lg-2"> 
                        <label> Nombre el archivo: </label> 
                    </div>
                    <div class="col-lg-2" hidden>
                        <input type="text" name="mtro_nombre_archivo" id="mtro_nombre_archivo" hidden />
                    </div>
                    <div class="col-lg-2">
                        <input type="file" name="archivo" id="archivo" />
                    </div>                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-2">
                        <input type="button" id="boton_subir" value="Subir" class="btn btn-success" />
                    </div>
                    <div class="col-lg-4">
                        <progress id="barra_de_progreso" value="0" max="100"></progress>
                    </div>
                </div>
            </form>
             <hr>

            <hr>
             
          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Documento</th>
                  <th>Fecha</th>
                  <th>Acción</th>

                </tr>
              </thead>
              <tbody id="mtro_archivos_subidosDoc">
              
              </tbody>
            </table>

<div id="mtro_respuesta" class="alert"></div>
            <a type="button" class="btn btn-secondary" onclick="menu4()" style="color: white">Anterior</a>
            <a type="button" class="btn btn-success" onclick="menu6()" style="color: white">Guardar</a>


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

                   <input type="email" class="form-control" name="email_sis" id="email_sis" placeholder="Sistema" required>
                    
   
                  
                </div>
                  <div class="col">
                  <label for="pass_sis">Contraseña <font style="color:red">*</font></label>
                    <input type="text" class="form-control" name="pass_sis" id="pass_sis" placeholder="Contraseña" required>
                </div>
            </div>
            <br>
             <div class="form-group row">
                <div class="col">
                  <label for="usuario_biblio">Correo Institucional<font style="color:red">*</font></label>
                  <input type="email" class="form-control" id="usuario_correo" name="usuario_correo" placeholder="Biblioteca digital" >
                </div>
                  <div class="col">
                  <label for="pass_sis">Contraseña <font style="color:red">*</font></label>
                  <input type="text" class="form-control" id="pass_sis2" name="pass_sis2" placeholder="Contraseña" >
                </div>
            </div>
                <button class="btn btn-success" id="editaDocente" name="editaDocente">Guardar</button>

          </form>  
           </div>

</div>
</div>




 






 
<script type="text/javascript">
          function mostrarArchivos() {
          var email_sis = $("#email_sis").val(); 
                $.ajax({
                    url: "php/accion/mostrar_archivosDoc.php",
                    type: "get", //send it through get method
                    data: { 
                      email_sis: email_sis, 
                    },
                    success: function(respuesta) {
                        $("#mtro_archivos_subidosDoc").html(respuesta);
                        Refrescar_Doc();
                    }
                });
        }
            function subirArchivos() {
                $("#archivo").upload('php/accion/subir_archivoDoc.php',
                {
                    titulo: $("#mtro_titulo_doc").val(),
                    correo: $("#email_sis").val(),
                    select_documento: $("#mtro_select_documento").val(),
  
                },
                function(respuesta) {
                    //Subida finalizada.
                    $("#barra_de_progreso").val(0);
                    if (respuesta === 1) {
                        mostrarRespuesta('El archivo ha sido subido correctamente.', true);
                        $("#mtro_nombre_archivo, #mtro_archivo").val('');
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
    var posgrado = $('#mtro_titulo_doc').val();
        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#mtro_select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        }
    }
                $("#boton_subir").on('click', function() {
                    subirArchivos();
                });

$(document).ready(function(){
    $('#mtro_titulo_doc').on('change',function(){
        var posgrado = $(this).val();
        mostrarArchivos();
        //mostrarArchivosDoc();
    var email_sis = $('#email_sis'). val();
    var posgrado = $('#mtro_titulo_doc').val();
        if(posgrado){
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#mtro_select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 
        } 
        
      });

var posgrado = $('#mtro_titulo_doc').val();
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
    $('#editaDocente').on('click',function(){
      $.ajax({
          type: 'POST',
          url : "php/accion/edita_docente_ce.php",
          data: $("#form_docenteperfil, #form_inst").serialize(),
          success: function(data){
            
  $('#registra-docente').modal('hide');
  $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $.alert({
              title: 'Docente!',
              content: 'Información guardada correctamente',
              });


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



            function mostrarRespuesta(mensaje, ok){
                $("#respuesta").removeClass('alert-success').removeClass('alert-danger').html(mensaje);
                if(ok){
                    $("#respuesta").addClass('alert-success').show(250).delay(4000).hide(250);
                }else{
                    $("#respuesta").addClass('alert-danger').show(250).delay(4000).hide(250);
                }
            }



      


        </script>