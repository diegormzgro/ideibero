
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
     <div class="modal fade" id="registra-tarea-docente" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-tarea">Reenviar Trabajos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="mensaje_docente"></div>

            <form onsubmit="return agregaTareaDocente();" id="formulario_tarea_docente" class="formulario">
 <div id="mensajedocente"></div>
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
            <div class="form-group row">
              <br>

              <div class="col-12"> 
                  <label for="Docente">Adjuntar:</label>
                  <input name='ArchivoDocente' id='ArchivoDocente' class="form-control" type="file">
              </div>

            </div>

                 <input name='idTarea2' id='idTarea2' class="form-control" type="text " hidden>
                  <input name='idPosgrado2' id='idPosgrado2' class="form-control" type="text" hidden>
                  <input name='idSesion2' id='idSesion2' class="form-control" type="text" hidden>
                  <input name='idMateria2' id='idMateria2' class="form-control" type="text" hidden>
                  <input name='idAlumno2' id='idAlumno2' class="form-control" type="text" hidden>
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