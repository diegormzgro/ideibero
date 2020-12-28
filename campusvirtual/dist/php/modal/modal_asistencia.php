<div class="modal fade" id="registra-asistencia" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-clase">Asistencias</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div id="mensaje"></div>


            <form onsubmit="return agregaAsistenciaCE();" id="formulario_asistencia" enctype="multipart/form-data" class="formulario">



                  <label for="Docente">Asistencia:</label>
                  <select class="form-control" id="Asistencia" name="Asistencia" required>
                    <option value="">Seleccione</option>
                    <option value="1">Directo</option>
                    <option value="2">Diferido</option>
                    <option value="3">Falta</option>
                  </select>
                  

                  <input name='idAlumno' id='idAlumno' class="form-control" type="text" hidden>
                  <input name='idSesion' id='idSesion' class="form-control" type="text" hidden>
                  <input name='idMateria' id='idMateria' class="form-control" type="text" hidden>
                  

<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro" name="pro" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>
</div></div></div>