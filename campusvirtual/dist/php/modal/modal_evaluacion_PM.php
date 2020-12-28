
     <div class="modal fade bd-example-modal-xl" id="registra-evaluacion-PM" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-tarea">Preguntas de Opción Múltiple</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaEvaluacionPM();" id="formulario_evaluacion_PM" class="formulario">
             <label>Escriba la pregunta</label> 
 <input type="tex" name="PreguntaPM" id="PreguntaPM" class="form-control" required>
 <br>
<div class="form-check form-check">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Opción 1" required>
 <input type="tex" name="R1" id="R1" class="form-control">
</div>
 <br>

<div class="form-check form-check">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Opción 2">
 <input type="tex" name="R2" id="R2" class="form-control">
</div>
 <br>

<div class="form-check form-check">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Opción 3">
 <input type="tex" name="R3" id="R3" class="form-control">
</div>
 <br>

<div class="form-check form-check">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="Opción 4">
 <input type="tex" name="R4" id="R4" class="form-control">
</div>
 <br>

<div class="form-check form-check">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="Opción 5">
 <input type="tex" name="R5" id="R5" class="form-control">
</div>
 <br>

 <label>Valor de Pregunta</label>
<input type="number" name="ValorPM" id="ValorPM" class="form-control" min="1"  required>

                 <input name='idExamenPM' id='idExamenPM' class="form-control" type="text " hidden>
 
                 <input name='idAsignacionPM' id='idAsignacionPM' class="form-control" type="text " hidden>
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

              <input type="submit" value="Enviar" class="btn btn-success"  id="regPM"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="ediPM"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="proPM" name="proPM" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="idPM" name="idPM" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>
