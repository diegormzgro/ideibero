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


            <form onsubmit="return agregaLectura();" id="formulario_lectura" class="formulario" enctype="multipart/form-data">
 

                  <label for="Materialec">Materia:</label>
                  <select name='materiaLec' id='materiaLec' class="form-control" required='required' >
                  <option value=''>Seleccione</option>
                  <?php
                    require('conexion.php');
                    $sql=" SELECT cm.idMateria, cm.Materia
                            FROM catg_materias as cm
                            INNER JOIN catg_docentes AS d ON d.idDocente= cm.idDocente
                            WHERE cm.Eliminado=0 AND d.eliminado=0  AND d.correo='".$perfil."'";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                    </select>

                  <label for="Titulolec">Titulo de Lectura:</label>
                  <input name='TituloLec' id='TituloLec' class="form-control" type="text " required='required' >

                  <label for="descripcionLec">Descripción:</label>
                  <textarea name='descripcionLec' id='descripcionLec' class="form-control" type="textarea" required='required' rows="3"></textarea>

                  <label for="lectura">Adjuntar lectura:</label>
                  <input name='Archivo' id='Archivo' class="form-control" type="file"  >

<br>

              <input type="submit" value="Adjuntar" class="btn btn-success" id="regLec"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="ediLec"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="proLec" name="proLec" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="idLec" name="idLec" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>
 <div colspan="2" id="mensaje"></div>
</div></div></div>

 <?php

}
else{
    header("location:index.html");
}
?>