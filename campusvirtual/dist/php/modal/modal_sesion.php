 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
     <div class="modal fade" id="registra-sesion" tabindex="-1" role="dialog" aria-labelledby="registra-sesion" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-sesion">Sesión</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaSesion();" id="formulario_sesion" class="formulario" >
 

                  <label for="TituloSES">Nombre de la sesión:</label>
                  <input name='TituloSES' id='TituloSES' class="form-control" type="text" required='required' >

                  <label for="descripcionLec">Fecha de la sesión:</label>
                  <input name='FechaSES' id='FechaSES' class="form-control" type="date"  min='1900-04-25' max="2999-12-31"  required='required' >

 
                  <label for="descripcionLec">Hora de Inicio:</label>
                  <input type="time" id="HoraI" name="HoraI" class="form-control" required>

                  <label for="descripcionLec">Hora de Finalización:</label>
                  <input type="time" id="HoraF" name="HoraF" class="form-control" required>
                  
                  <label for="TituloSES">Contraseña:</label>
                  <input name='Pass' id='Pass' class="form-control" type="text" required='required' >

                  <label for="TituloSES">Link:</label>
                  <input name='Link' id='Link' class="form-control" type="text" required='required' >
                  <div id="Diferido">
                  <label for="LinkDiferido">Link Diferido:</label>
                  <input name='LinkDiferido' id='LinkDiferido' class="form-control" type="text" >
                  </div>

                  <input type="" name="id_grupo" id="id_grupo" hidden>
                  <input type="" name="id_materia" id="id_materia" hidden>
<br>

              <input type="submit" value="Adjuntar" class="btn btn-success" id="regSES"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="ediSES"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="proSES" name="proSES" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="idSES" name="idSES" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>

 <?php

}
else{
    header("location:index.html");
}
?>

