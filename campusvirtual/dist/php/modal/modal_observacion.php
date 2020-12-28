<div class="modal fade" id="registra-observacion" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-clase">Observación</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div id="mensaje"></div>


            <form onsubmit="return agregaObservacion();" id="formulario_observacion" enctype="multipart/form-data" class="formulario">



                  <label for="Docente">Observación y/o Comentario:</label>
                <textarea id="observacion" class="form-control"></textarea>
                  

                  <input name='idAlumno' id='idAlumno' class="form-control" type="text" hidden>
                  <input name='idTarea' id='idTarea' class="form-control" type="text" hidden>
                  

<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro" name="pro" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>
</div></div></div>

 