<style type="text/css">
  .bien{
  background-color:#3CBE34;
  text-align:center;
  font-size:14px;
  color:#FFF;
  padding:5px;
}
</style>
 
     <div class="modal fade" id="registra-docenteDatos" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Docentes</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div   id="mensaje"></div>

            <form onsubmit="return agregaDocente();" id="formulario_docenteDatos" enctype="multipart/form-data" class="formulario">

                  <label for="nombre">Título:</label>
                  <select class="form-control" id="titulo" name="titulo">
                    <option value="">Seleccione</option>
                    <option value="-1">Maestría</option>
                    <option value="-3">Doctorado</option>
                  </select>

                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" >

                  <label for="primer_ap">Primer Apellido:</label>
                  <input type="text" class="form-control" id="primer_ap" name="primer_ap" placeholder="Primer Apellido"  required>

                  <label for="segundo_ap">Segundo Apellido:</label>
                  <input type="text" class="form-control" placeholder="Segundo Apellido" id="segundo_ap" name="segundo_ap">

                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" >

                  <label for="email">Email Institucional:</label>
                  <input type="email" class="form-control" name="emailInst" id="emailInst" placeholder="Email Institucional"  required>

                  <label for="telefono">Teléfono:</label>
                  <input type="tel" maxlength="10" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" >

<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro" name="pro" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden;"/>
             
           
    </form>
    </div>
             
                  </div>
                </div>
            </div>

 