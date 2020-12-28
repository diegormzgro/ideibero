
     <div class="modal fade bd-example-modal-xl" id="registra-evaluacion" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-tarea">Evaluación</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaEvaluacion();" id="formulario_evaluacion" class="formulario">
 
            <div class="form-group row">
            <div class="col-12 col-md-4 mb-2">
                  <label for="Docente">Titulo de Examen Teórico:</label>
                  <input name='Titulo' id='Titulo' class="form-control" type="text " required='required' >
            </div>
            <br>
             <div class="col-12 col-md-4 mb-2">
                  <label for="descripcion">Descripción:</label>
                  <input name='descripcion' id='descripcion' class="form-control" type="text " >
            </div>
              <div class="col-12 col-md-4 mb-2">  
                  <label for="Docente">Fecha:</label>
                  <input name='fecha' id='fecha'  min='1900-04-25' max="2999-12-31"  class="form-control" type="date" required >
              </div>
          </div>


                 <input name='idAsignacion' id='idAsignacion' class="form-control" type="text " hidden>
                  <input name='idPosgrado' id='idPosgrado' class="form-control" type="text " hidden>

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
