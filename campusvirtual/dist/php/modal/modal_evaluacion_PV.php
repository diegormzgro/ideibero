
     <div class="modal fade bd-example-modal-xl" id="registra-evaluacion-PV" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-tarea">Pregunta de verdadero y Falso</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaEvaluacionV();" id="formulario_evaluacion_PV" class="formulario">
 
             <label>Escriba la pregunta </label> 
 <input type="tex" name="PreguntaPV" id="PreguntaPV" class="form-control" required>
 <br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="radioPV" id="radioPV1" value="Verdadero" required>
 <input type="tex" name="R1V" id="R1V" class="form-control" value="Verdadero" readonly>
</div>
 <br>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="radioPV" id="radioPV2" value="Falso">
 <input type="tex" name="R2V" id="R2V" class="form-control" value="Falso" readonly>
</div>
 
 
 <br> <br>
 <label>Valor de Pregunta</label>
<input type="number" name="ValorPV" id="ValorPV" class="form-control"  min="1"  required>


                 <input name='idExamenPV' id='idExamenPV' class="form-control" type="text " hidden>
 
                 <input name='idAsignacionPV' id='idAsignacionPV' class="form-control" type="text " hidden>

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

              <input type="submit" value="Enviar" class="btn btn-success"  id="regPV"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="ediPV"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="proPV" name="proPV" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="idPV" name="idPV" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>
