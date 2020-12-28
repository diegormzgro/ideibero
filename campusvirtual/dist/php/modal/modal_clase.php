<style type="text/css">
  .bien{
  background-color:#3CBE34;
  text-align:center;
  font-size:14px;
  color:#FFF;
  padding:5px;
}
</style>
 
     <div class="modal fade" id="registra-clase" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-clase">Clases</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
 <div id="mensaje"></div>


            <form onsubmit="return agregaClase();" id="formulario_clase" enctype="multipart/form-data" class="formulario">

                  <label for="nombre">Posgrado:</label>
                  <select id="posgrado" name="posgrado" class="form-control" readonly>
                  <option selected>Seleccione...</option>
                  <option value="1">MDCDH</option>
                  <option value="2">MDE</option>
                  <option value="3">DDCDH</option>
                  <option value="4">DDE</option>
                  <option value="5">Maestrías</option>
                  <option value="6">Doctorados</option>
                  <option value="7">Todos</option>
                  </select>
                  <br>
                  <label for="nombre">Grupo:</label>
                  <select id="Grupo" name="Grupo" class="form-control" readonly>
                  </select>
                  <br>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Múltiple</label>
                    </div>
                    <br>
                  <label for="primer_ap">Cátedra:</label>
                  <!--<input type="text" class="form-control" id="catedra" name="catedra" placeholder="Nombre de la cátedra"  required>-->
                  <select name='catedra' id='catedra' class="form-control" required='required' readonly >
                    <?php
                   // require('../conexion.php');
                    $sql="SELECT ma.idMateria, ma.Materia FROM catg_asignatura as ma WHERE ma.Eliminado=0";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                    </select>
                    <br>
                  <label for="Docente">Docente:</label>
                  <select name='docente' id='docente' class="form-control" required='required' >
                  <option value=''>Seleccione</option>
                  <?php
                    require('../conexion.php');
                    $sql="SELECT ma.id, CONCAT_WS(' ',ma.nombre, ma.ap_paterno,ma.ap_materno) AS Nombre FROM catg_catedratico as ma WHERE ma.eliminado=0";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                    </select>
                    <br>
                  <label for="status">Estatus:</label>
                  <select name='status' id='status' class="form-control" required='required' >
                  <option value=''>Seleccione</option>
                  <?php
                   
                    $sql="select id, Estatus from sta_materias";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                    </select>
                    <br>
                  <label for="Docente">Adjuntar Programa de Estudio:</label>
                  <input name='ProgramaEstudio' id='ProgramaEstudio' class="form-control" type="file">
                  <br>
                  <label for="Docente">Adjuntar calendario de la asignatura:</label>
                  <input name='Calendario' id='Calendario' class="form-control" type="file">
                  <br>
                  <center><a type="button"id="link" name="link" value="archivo"><img src="opciones/pdf.png" class="responsive" width="45px" > </a></center>
                  <input name='archivo' id='archivo' class="form-control" type="text" hidden>
                  <input name='idGrupo' id='idGrupo' class="form-control" type="text" hidden>
                  
                  <img src="opciones/cargando.gif" id="cargando" name="cargando" hidden>

<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro" name="pro" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id" name="id" readonly="readonly" style="visibility:hidden;"/>
             
           
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
 