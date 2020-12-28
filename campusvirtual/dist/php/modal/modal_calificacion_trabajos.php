<div class="modal fade" id="registra-calificacion-trabajos" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-clase">Clases</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div id="mensaje"></div>


            <form onsubmit="return agregaCalificacionTrabajos();" id="formulario_calificacion_trabajos" enctype="multipart/form-data" class="formulario">


              

                  <label for="Docente">Calificación:</label>
                  <select class="form-control" name='calificacion_trabajo' id='calificacion_trabajo' >
                    <option value="">Seleccione</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="NP">NP</option>
                    <option value="NA">NA</option>
                    <option value="5">5</option>
                  </select>
                  <br>
                  <label for="descripcion">Comentarios:</label>
              <textarea name='ComentariosDocente' id='ComentariosDocente' class="form-control" type="text "></textarea>  
              <br>

              <div class="col-12"> 
                  <label for="Docente">Adjuntar:</label>
                  <input name='ArchivoDocente2' id='ArchivoDocente2' class="form-control" type="file"  >
              </div>

                  <input name='idAlumnoTrabajo' id='idAlumnoTrabajo' class="form-control" type="text" hidden>
                  <input name='idMateriaTrabajo' id='idMateriaTrabajo' class="form-control" type="text" hidden>
                  <input name='idTrabajoDetalle' id='idTrabajoDetalle' class="form-control" type="text" hidden>
                  

<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro" name="pro" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>
</div></div></div>

 