
     <div class="modal fade bd-example-modal-xl" id="registra-evaluacion-PA" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-tarea">Pregunta Abierta</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaEvaluacionPA();" id="formulario_evaluacion_PA" class="formulario">
 
             <label>Escriba la pregunta </label> 
 <input type="tex" name="PreguntaPA" id="PreguntaPA" class="form-control" required>
 <br>
 

              <label>Escriba la respuesta </label> 
 <textarea name="RespuestaPA" id="RespuestaPA" class="form-control" required>
 </textarea>
 <br>
 
 <label>Valor de Pregunta</label>
<input type="number" name="ValorPA" id="ValorPA" class="form-control" min="1" required>


                 <input name='idExamenPA' id='idExamenPA' class="form-control" type="text " hidden>
 
                 <input name='idAsignacionPA' id='idAsignacionPA' class="form-control" type="text " hidden>

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

              <input type="submit" value="Enviar" class="btn btn-success"  id="regPA"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="ediPA"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="proPA" name="proPA" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="idPA" name="idPA" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>
