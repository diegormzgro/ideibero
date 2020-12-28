<script type="text/javascript">

            function subirArchivos() {
                $("#archivo").upload('php/accion/subir_archivo.php',
                {
                    idSesion: $("#idSesion").val(),
                },
                function(respuesta) {
                    //Subida finalizada.
                    $("#barra_de_progreso").val(0);
                    if (respuesta === 1) {
                        mostrarRespuesta('El archivo ha sido subido correctamente.', true);
                        $("#archivo").val('');
                    } else {
                        mostrarRespuesta('El archivo NO se ha podido subir.', false);
                    }
                    mostrarArchivos();
                }, function(progreso, valor) {
                    //Barra de progreso.
                    $("#barra_de_progreso").val(valor);
                });
            }
            function mostrarArchivos() {
                var idSesion = $("#idSesion").val();
                $.ajax({
                    url: "php/accion/mostrar_archivos.php",
                    type: "get", //send it through get method
                    data: { 
                      idSesion: idSesion, 
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosDoc").html(respuesta);
                        Refrescar_Doc();
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
          function eliminar_doc(id){
            var correo = $("#correo").val();
            var posgrado= $("#posgrado").val(); 
            var url = 'php/accion/elimina_doc.php';
            var pregunta = confirm('¿Esta seguro de eliminar este documento?');
            if(pregunta==true){
              $.ajax({
              type:'POST',
              url:url,
              data: { 
                correo: correo, 
                posgrado: posgrado,
                id : id,
              },
              success: function(registro){
                alert("Documento eliminado correctamente");
                mostrarArchivos();
                Refrescar_Doc();
              }
            });
            }else{
              
            }
          }

    function Refrescar_Doc(){
    var idSesion = $('#idSesion'). val();
      
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'idSesion='+idSesion,
                success:function(html){
                    $('#select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 

}
  
</script>


 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
     <div class="modal fade bd-example-modal-xl" id="registra-tarea" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-tarea">Trabajos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaTarea();" id="formulario_tarea" class="formulario">
 
            <div class="form-group row">
            <div class="col-12 col-md-6 mb-2">
                  <label for="Docente">Titulo de Trabajo:</label>
                  <input name='Titulo' id='Titulo' class="form-control" type="text " required='required' >
            </div>
            <br>
             <div class="col-12 col-md-6 mb-2">
                  <label for="descripcion">Descripción:</label>
                  <input name='descripcion' id='descripcion' class="form-control" type="text " >
            </div>
          </div>

            <div class="form-group row">
              <br>
             <div class="col-12 col-md-4 mb-2">
                  <label for="Docente">Enlace:</label>
                  <input name='Link' id='Link' class="form-control" type="text " >
              </div>
              <br>
              <div class="col-12 col-md-4 mb-2">  
                  <label for="Docente">Fecha de Entrega:</label>
                  <input name='fecha' id='fecha'  min='1900-04-25' max="2999-12-31"  class="form-control" type="date" required >
              </div>
              <br>
              <div class="col-12 col-md-4 mb-2"> 
                  <label for="Docente">Adjuntar:</label>
                  <input name='lectura' id='lectura' class="form-control" type="file"  >
              </div>
            </div>

                 <input name='idSesion' id='idSesion' class="form-control" type="text " hidden>
                  <input name='idPosgrado' id='idPosgrado' class="form-control" type="text " hidden>

               <hr>
<!--
            <CENTER>
              <input type="submit" id="boton_subir" value="Subir" class="btn btn-success" />
            </CENTER>

            <progress class="form-control" id="barra_de_progreso" value="0" max="100"></progress>

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
            </table>

<div id="respuesta" class="alert"></div>
-->
<br>

              <input type="submit" value="Enviar" class="btn btn-success"  id="reg2"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi2"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro2" name="pro2" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id2" name="id2" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>

 <?php

}
else{
    header("location:index.html");
}
?>