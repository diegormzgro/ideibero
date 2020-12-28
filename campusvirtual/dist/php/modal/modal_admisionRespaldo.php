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
                    
                    nombre_archivo: $("#nombre_archivo").val();
                    email_sis: $("#email_sis").val();
                    select_documento: $("#select_documento").val();
                    posgrado: $("#posgrado").val();
                
                $.ajax({
                    url: 'php/accion/mostrar_archivos.php',
                    dataType: 'JSON',
                    success: function(respuesta) {
                        if (respuesta) {
                            var html = '';
                            for (var i = 0; i < respuesta.length; i++) {
                                if (respuesta[i] != undefined) {
                                    html += '<div class="row"> <span class="col-lg-2"> ' + respuesta[i] + ' </span> <div class="col-lg-2"> <a class="eliminar_archivo btn btn-danger" href="javascript:void(0);"> Eliminar </a> <a href="archivos/prueba/'+ respuesta[i] +'"> bajar </a></div> </div> <hr />';
                                }
                            }
                            $("#archivos_subidos").html(html);
                        }
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
                mostrarArchivos();
                $("#boton_subir").on('click', function() {
                    subirArchivos();
                });
                $("#archivos_subidos").on('click', '.eliminar_archivo', function() {
                    var archivo = $(this).parents('.row').eq(0).find('span').text();
                    archivo = $.trim(archivo);
                    eliminarArchivos(archivo);
                });
            });
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

<!-- Classic tabs -->
<div class="classic-tabs mx-2">

  <ul class="nav tabs-orange" id="myClassicTabOrange" role="tablist">
    <li class="nav-item">
      <a class="nav-link  waves-light active show" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange"
        role="tab" aria-controls="follow-classic-orange" aria-selected="true">
        <center><i class="fas fa-user fa-2x pb-2" aria-hidden="true"></i>
        <br>Datos personales
        </center>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" 
        role="tab" aria-controls="follow-classic-orange" aria-selected="false">
        <center><i class="fas fa-address-book fa-2x pb-2"aria-hidden="true"></i>

        <br>Estudios Previos
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

  <div class="tab-content card" id="myClassicTabContentOrange">

    <div class="tab-pane fade active show" id="profile-classic-orange" role="tabpanel" aria-labelledby="profile-tab-classic-orange">
           <form  onsubmit="return guardar_alumno();" id="formulario"  >
            
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h5 class="panel-title">Datos Personales</h5> 
      </div>
      <div class="panel-body">
         <div class="panel panel-primary">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                 <div class="col-12 col-sm-6 col-md-2">
                  <label for="primer_ap">Primer Apellido:</label>
                  <input type="text" class="form-control" id="primer_ap" name="primer_ap" placeholder="Primer Apellido"  required>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                  <label for="segundo_ap">Segundo Apellido:</label>
                  <input type="text" class="form-control" placeholder="Segundo Apellido" name="segundo_ap" id="segundo_ap">
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="fecha_nac">Fecha de Nacimiento:</label>
                  <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Fecha Nacimiento" >
                </div>
                 <div class="col-12 col-sm-6 col-md-2">
                  <label for="sexo">Sexo:</label>
                  <select id="sexo" class="form-control">
                  <option selected>Seleccione...</option>
                  <option value="1">Femenino</option>
                  <option value="2">Masculino</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="cp">Nacionalidad:</label>
                  <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" >
                </div>
                <div class="col-12 col-sm-6 col-md-5">
                  <label for="cp">CURP:</label>
                  <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" >
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Teléfono Celular:</label>
                  <input type="tel" class="form-control" id="tel_celular" name="tel_celular" placeholder="Teléfono Celular" >
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label for="telefono">Teléfono Fijo:</label>
                  <input type="tel" class="form-control" id="tel_fijo" name="tel_fijo" placeholder="Teléfono Fijo" >
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <label for="telefono">Ext:</label>
                  <input type="tel" class="form-control" id="tel_ext" name="tel_ext" placeholder="Extensión" >
                </div>
                <div class="col-12 col-sm-6 col-md-5">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
              </div>
               </div>

             </div>

           </div>
              

            <div class="panel panel-success">
                <div class="panel-heading">
                  <h5 class="panel-title">Posgrado</h5> 
                </div>
                <div class="panel-body">
                  <div class="panel panel-success">
                   <div class="row">
                 <div class="col">
                  <label for="nombre">Posgrado:</label>
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

          <div class="panel panel-info">
                <div class="panel-heading">
                  <h5 class="panel-title">Dirección</h5> 
                </div>
                <div class="panel-body">
                  <div class="panel panel-info">
                   
                <div class="row">
                <div class="col">
                  <label for="calle">Calle:</label>
                  <input type="text" class="form-control" id="calle" placeholder="Calle" required>
                </div>
                 <div class="col">
                  <label for="numero">Número Exterior:</label>
                  <input type="text" class="form-control" id="numeroe" placeholder="Número Exterior">
                </div>
                 <div class="col">
                  <label for="numero">Número Interior:</label>
                  <input type="text" class="form-control" id="numeroi" placeholder="Número Interior" required>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="calle">Colonia:</label>
                  <input type="text" class="form-control" id="colonia" placeholder="Colonia" required>
                </div>
                 <div class="col">
                  <label for="estado">Estado/Provincia:</label>
                  <input type="text" class="form-control" id="estado" placeholder="Estado" required>
                </div>
                  <div class="col">
                  <label for="cp">Pais:</label>
                  <input type="text" class="form-control" id="pais" placeholder="pais" required>
                </div>
                <div class="col">
                  <label for="cp">Código Postal:</label>
                  <input type="number" class="form-control" id="cp" placeholder="Código Postal" required>
                </div>



                </div>
              </div>
        </div>
      </div>
                <!--<div class="form-group row">
               <div class="col">
                  <label for="ciudad">Ciudad:</label>
                  <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" required>
                </div>
               </div>-->
        <a class="btn btn-success" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange"
        role="tab" aria-controls="follow-classic-orange" >
        <center>Siguiente
        </center>
      </a>
    </div>

      



    <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
   
             <div class="panel panel-warning">
                <div class="panel-heading">
                  <h5 class="panel-title">Estudios Previos</h5> 
                </div>
                <div class="panel-body">
                  <div class="panel panel-warning">

               <div class="row">
                <div class="col">
                  <label for="universidad">Universidad:</label>
                  <input type="text" class="form-control" id="universidad" placeholder="Universidad" required>
                </div>
                 <div class="col">
                  <label for="pais_e">Pais de estudio:</label>
                  <input type="text" class="form-control" id="pais_e" placeholder="Pais de estudio" required>
                </div>
                 <div class="col">
                 <label for="estado_e">Estado de estudio:</label>
                 <input type="text" class="form-control" id="estado_e" placeholder="Estado de estudio" required>
                </div>
                </div>

               <div class="row">
                <div class="col">
                  <label for="titulo">Tipo de titulo:</label>
                  <input type="text" class="form-control" id="titulo" placeholder="Titulo" required>
                </div>
                 <div class="col">
                  <label for="fecha_fin">Fecha de finalización:</label>
                  <input type="date" class="form-control" id="fecha_fin" placeholder="Fecha finalización" required>
                </div>
                </div>
            </div>
              </div>
      <a class="btn btn-secondary" id="profile-tab-classic-orange" data-toggle="tab" href="#profile-classic-orange"
        role="tab" aria-controls="profile-classic-orange" aria-selected="true">
        <center>Anterior
        </center>
      </a>
        
      <a class="btn btn-success" id="contact-tab-classic-orange" data-toggle="tab" href="#contact-classic-orange"
        role="tab" aria-controls="contact-classic-orange" aria-selected="false">
        <center>Siguiente
        </center>
      </a>


            </div>
          </div>

    <div class="tab-pane fade" id="contact-classic-orange" role="tabpanel" aria-labelledby="contact-tab-classic-orange">
      
               
               <center><h4>Documentación</h4></center> 

                        
           
           
            <form action="javascript:void(0);">
              
                 <label for="tipo_pago">Documento:</label>
                  <select name='select_documento' id='select_documento' class="form-control" required='required' >
                  <option value=''>Seleccione</option>
                  <?php
                   
                    $sql="SELECT * FROM catg_documentos";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                  </select>
                  <hr>
                <div class="row">
                    <div class="col-lg-2"> 
                        <label> Nombre el archivo: </label> 
                    </div>
                    <div class="col-lg-2">
                        <input type="text" name="nombre_archivo" id="nombre_archivo" />
                    </div>
                    <div class="col-lg-2">
                        <input type="file" name="archivo" id="archivo" />
                    </div>                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-2">
                        <input type="submit" id="boton_subir" value="Subir" class="btn btn-success" />
                    </div>
                    <div class="col-lg-4">
                        <progress id="barra_de_progreso" value="0" max="100"></progress>
                    </div>
                </div>
            </form>
             <hr>
            <button type="button" class="btn btn-primary">Carta de admisión</button>

            <hr>
             
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
            </table>

<div id="respuesta" class="alert"></div>

    </div>
    <div class="tab-pane fade" id="awesome-classic-orange" role="tabpanel" aria-labelledby="awesome-tab-classic-orange">
      <center><h4>Pagos</h4></center> 
              <div class="row">

                <div class="col">
                  <label for="num_doc">Fecha Ingreso:</label>
                  <input type="date" class="form-control" id="fecha_ingreso" required>
                </div>
                <div class="col">
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
                </div>

                  <div class="col">
                  <label for="fecha_pago">Fecha de pago:</label>
                  <input type="date" class="form-control" id="fecha_pago" required>
                </div>


                </div>

               <div class="row">
                <div class="col">
                <label for="tipo_pago">Monto de inscripción:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_inscripcion" name="monto_inscripcion">
                </div>
                </div>

                <div class="col">
                  <label for="plan_reinscripcion">Plan de pago Reinscripción:</label>
                  <input type="number" class="form-control" id="plan_reinscripcion" name="plan_reinscripcion" placeholder="Plan de pago" required>
                </div>


                <div class="col">
                  <label for="plan_mensualidad">Plan de pago mensualidad:</label>
                  <input type="number" class="form-control" id="plan_mensualidad" name="plan_mensualidad" placeholder="Plan de pago" required>
                </div>


            </div>

            <div class="row">
             
              <div class="col">
              <label for="tipo_pago">Beca de inscripción:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="number" class="number" id="beca_inscripcion" name="beca_inscripcion">
                </div>
              </div>

            <div class="col">
                    
                <label for="tipo_pago">Monto de Reinscripción:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_reinscripcion">
                </div>
              </div>

                  <div class="col">
                <label for="tipo_pago">Monto de pago mensualidad:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_mensualidad">
                </div>
              </div>


            </div>

              <div class="row">
  
              <div class="col">
              <label for="tipo_pago">Cantidad a pagar inscripción:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="numbers" id="cantidad_inscripcion" name="cantidad_inscripcion" readonly>
                </div>
              </div>

              <div class="col">
              <label for="tipo_pago">Beca de Reinscripción:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="number" id="beca_reinscripcion">
                </div>
              </div>

              <div class="col">
              <label for="tipo_pago">Beca de mensualidad:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="number" id="beca_mensualidad">
                </div>
              </div>

              </div>




              <div class="row">
                <div class="col"></div>

            <div class="col">
              <label for="tipo_pago">Monto a pagar de Reinscripción:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_total_reinscripcion" readonly>
                </div>
              </div>

              <div class="col">
              <label for="tipo_pago">Monto a pagar de mensualidad:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_total_mensualidad" readonly>
                </div>
              </div>

              </div>
            


              <div class="row">
                <div class="col"></div>
                              <div class="col">
              <label for="tipo_pago">Recargo:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="number" id="beca_recargo_reinscripcion">
                </div>
              </div>
              <div class="col">
              <label for="tipo_pago">Recargo:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">%</span></div>
                 <input type="text" class="number" id="beca_recargo_mensualidad">
                </div>
              </div>
              </div>

             


               <div class="row">
                <div class="col"></div>
                  <div class="col">
                <label for="tipo_pago">Monto a pagar con Recargo:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_recargo_reinscripcion">
                </div>
              </div>

                            <div class="col">
              <label for="tipo_pago">Monto a pagar con Recargo:</label>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span></div>
                 <input type="text" class="number" id="monto_recargo_mensualidad" readonly>
                </div>
              </div>
            </div>

           <!-- <div class="row">
                  <div class="col">
                  <label for="doc_cv">Comprobante de pago inscripción:</label>
                  <input type="file" class="form-control" id="doc_ins" required>
                </div>
                 <div class="col">
                 <label for="doc_curp">Comprobante de pago reinscripción:</label>
                 <input type="file" class="form-control" id="doc_reins"  required>
                </div>
                 <div class="col">
                 <label for="doc_certificado">Comprobante de pago mensualidad:</label>
                 <input type="file" class="form-control" id="doc_men"  required>
                </div>
            </div>-->






            </div>


    
    <div class="tab-pane fade" id="awesome-classic-orange2" role="tabpanel" aria-labelledby="identidad_institucional">
      <center><h4>Identidad Institucional</h4></center> 
              <div class="row">
                <div class="col">
                  <label for="email_sis">Usuario Sistema:</label>
                  <input type="email" class="form-control" name="email_sis" id="email_sis" placeholder="Usuario Sistema" required>
                </div>
                  <div class="col">
                  <label for="pass_sis">Contraseña:</label>
                  <input type="email" class="form-control" id="pass_sis" placeholder="Contraseña" required>
                </div>
            </div>
              <div class="row">
                <div class="col">
                  <label for="email_Inst">Correo Institucional:</label>
                  <input type="email" class="form-control" id="email_Inst" placeholder="Correo Institucional" required>
                </div>
                  <div class="col">
                  <label for="pass_inst">Contraseña del correo Institucional:</label>
                  <input type="text" class="form-control" id="pass_inst" placeholder="Contraseña Institucional" required>
                </div>
            </div>
             <div class="row">
                <div class="col">
                  <label for="usuario_biblio">Usuario de biblioteca digital:</label>
                  <input type="email" class="form-control" id="usuario_biblio" placeholder="Usuario de biblioteca digital" required>
                </div>
                  <div class="col">
                  <label for="pass_biblio">Contraseña de la biblioteca digital</label>
                  <input type="text" class="form-control" id="pass_biblio" placeholder="Contraseña de la biblioteca" required>
                </div>
            </div>
            <hr>
           
            <button type="button" class="btn btn-info">Carta de identidad</button>

          </div>
          



    <div class="tab-pane fade" id="awesome-classic-orange3" role="tabpanel" aria-labelledby="identidad_institucional">
      <center><h4>Grupos</h4></center> 
             
            <label for="grupo">Grupo</label>
                <select name="grupo" id="grupo" class="form-control">
                  
                </select>


                </div>
            </div>

         
          </div>


              <br>
              <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
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

     $("#monto_inscripcion").keyup(function () {

      $(this).val(cpf($(this).val()));
       });

     $("#beca_inscripcion").keyup(function () {
      $('#cantidad_inscripcion').val(
        $('#monto_inscripcion').val().replace(/\,/g, '')-
        ($('#monto_inscripcion').val().replace(/\,/g, '') * ($('#beca_inscripcion').val()/100))
        );

        $("#cantidad_inscripcion").val(cpf($("#cantidad_inscripcion").val()));
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
    });
        });
  </script>