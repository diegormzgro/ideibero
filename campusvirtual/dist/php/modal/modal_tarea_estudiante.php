
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
     <div class="modal fade bd-example-modal-xl" id="registra-tarea-estudiante" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-tarea">Trabajos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="mensajealumno"></div>

            <form onsubmit="return agregaTareaEstudiante();" id="formulario_tarea_estudiante" class="formulario">
 <div id="mensajealumno"></div>
            <div class="form-group row">
            <div class="col-12 col-md-6 mb-2">
                  <label for="Docente">Titulo de Trabajo:</label>
                  <input name='Titulo' id='Titulo' class="form-control" type="text " required='required' >
            </div>
             <div class="col-12 col-md-6 mb-2">
                  <label for="descripcion">Descripción:</label>
                  <input name='Descripcion' id='Descripcion' class="form-control" type="text " >
            </div>
          </div>
          <label for="descripcion">Comentarios:</label>
              <textarea name='Comentarios' id='Comentarios' class="form-control" type="text "></textarea>  
            <div class="form-group row">

              <div class="col-12 col-md-4 mb-2"> 
                  <label for="Docente">Adjuntar:</label>
                  <input name='lectura' id='lectura' class="form-control" type="file"  required>
              </div>
            </div>

                 <input name='idTarea2' id='idTarea2' class="form-control" type="text " hidden>
                  <input name='idPosgrado2' id='idPosgrado2' class="form-control" type="text" hidden>
                  <input name='idSesion2' id='idSesion2' class="form-control" type="text" hidden>
                  <input name='idMateria2' id='idMateria2' class="form-control" type="text" hidden>
               <hr>

<br>

              <input type="submit" value="Enviar" class="btn btn-success" name="reg2"  id="reg2"/>
              <!--<input type="submit" value="Editar" class="btn btn-warning"  id="edi2"/>-->               
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