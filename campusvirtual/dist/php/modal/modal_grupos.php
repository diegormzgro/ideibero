 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
     <div class="modal fade" id="registra-grupo" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-grupo">Grupo</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaGrupo();" id="formulario_grupo" class="formulario" enctype="multipart/form-data">
 
                  <label for="Titulolec">Nombre del grupo:</label>
                  <input name='Nombre_Grupo' id='Nombre_Grupo' class="form-control" type="text " required='required' >

                  <label for="descripcionLec">Periodo:</label>
                  <input name='Periodo' id='Periodo' class="form-control" type="date" required='required' >


                  <input name='idPosgrado' id='idPosgrado' class="form-control" type="text" required='required' hidden>


<br>

              <input type="submit" value="Guardar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro" name="pro" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>

 <?php

}
else{
    header("location:index.html");
}
?>