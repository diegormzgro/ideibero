<div class="modal fade" id="registra-directorio" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-directorio">Observación</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div id="mensaje"></div>


            <form onsubmit="return agregaDirectorio();" id="formulario_Directorio" enctype="multipart/form-data" class="formulario">


                  <label for="Docente">Institución:</label>
                  <input type="text" id="INSTITUCION" name="INSTITUCION" class="form-control">

                  <label for="Docente">Nombre:</label>
                  <input type="text" id="NOMBRE" name="NOMBRE" class="form-control">

                  <label for="Docente">Cargo:</label>
                  <input type="text" id="CARGO" name="CARGO" class="form-control">

                  <label for="Docente">Correo:</label>
                  <input id="CORREO" name="CORREO" class="form-control"></textarea>
                  
                  <label for="Docente">Estatus de envío:</label>
                  <input type="text" id="ENVIO" name="ENVIO" class="form-control">
                  

<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro" name="pro" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>
</div></div></div>

 