 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
?>
     <div class="modal fade" id="registra-lectura" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-lectura">Lectura</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaLecturaDoc();" id="formulario_lectura" class="formulario" enctype="multipart/form-data">
 
                  <label for="Titulolec">Titulo de Lectura:</label>
                  <input name='TituloLec' id='TituloLec' class="form-control" type="text " required='required' >

                  <label for="descripcionLec">Descripción:</label>
                  <textarea name='descripcionLec' id='descripcionLec' class="form-control" type="textarea"  rows="3"></textarea>

                  <label for="link">Enlace:</label>
                  <input name='Liga' id='Liga' class="form-control" type="text">

                  <label for="lectura">Adjuntar lectura:</label>
                  <input name='Archivo' id='Archivo' class="form-control" type="file"  >
                  <input name='idSesion' id='idSesion' class="form-control" type="text " hidden>
                  <input name='idPosgrado' id='idPosgrado' class="form-control" type="text " hidden>
                  <br>
                  <center>
                    <a type="button"id="link" name="link" value="archivo" hidden>
                      <img src="opciones/pdf.png" class="responsive" width="45px"> 
                    </a>
                  </center>
                  <input name='archivo' id='archivo' class="form-control" type="text" hidden>

 

<br>

            <input type="submit" value="Adjuntar" class="btn btn-success" id="regLec"/>
            <input type="submit" value="Editar" class="btn btn-warning"  id="ediLec"/>               
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <input type="text" required="required" readonly="readonly" id="proLec" name="proLec" readonly="readonly"style="visibility:hidden;" />
            <input type="text" required="required" readonly="readonly" id="idLec" name="idLec" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>
<script type="text/javascript">
  $(document).ready(function() {
  $("#link").click(function(){
    $("#link").attr("href", $('#archivo').val()).attr('target','_blank');
  });
  });
</script>
 
 <?php

}
else{
    header("location:index.html");
}
?>