<script src="node_modules/blueimp-file-upload/js/jquery.fileupload.js"></script>
<br>
 <form action="php/accion/subirarchivo.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

                  <label for="nombre">Posgrado:</label>
                  <select id="posgrado" name="posgrado" class="form-control">

                  <option selected>Seleccione...</option>
                  <option value="1">MDE</option>
                  <option value="2">MDCyDH</option>
                  <option value="3">MDE y MDCyDH</option>
                  <option value="4">DDE</option>
                  <option value="5">DDCDH</option>
                  <option value="6">DDE y DCDH</option>
                  <option value="7">MDE, MDCyDH / DDE y DDCDH </option>
                  </select>

                  <label for="primer_ap">Nombre de cátedra:</label>
                  <input type="text" class="form-control" id="catedra" name="catedra" placeholder="Nombre de la cátedra"  required>

                  <label for="Docente">Docente:</label>
                  <select name='docente' id='docente' class="form-control" required='required' >
                  <option value=''>Seleccione</option>
                  <?php
                    require('../conexion.php');
                    $sql="SELECT ma.idDocente, CONCAT_WS(' ',ma.ap_paterno,ma.ap_materno,ma.nombre) AS Nombre FROM catg_docentes as ma WHERE ma.eliminado=0";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                    </select>



                  <label for="userfile">Adjuntar Programa de Estudio:</label>
                  <input name='file1[]' id='file1[]' class="form-control" type="file" required='required' multiple="multiple" data-toggle="tooltip" data-placement="top" title="Para adjuntar mas de un archivo mantener la tecla ctrl sostenida y darle clic al otro archivo" onchange="handleFiles(this.files)">


<br>

              <input type="submit" value="Enviar" class="btn btn-success" >
                  
              <button class="btn btn-secondary" type="button" id="Regresar">Cancelar</button>
             
           
</form>
<div id="archivos|" name="archivos|">

</div>
<script type="text/javascript">
            $('#Regresar').click(function(){

            $('#contenido').load("php/listar_posgradoindex.php");
        });  
function handleFiles(files) {
  var d = document.getElementById("archivos");
  if (!files.length) {
    d.innerHTML = "<p>¡No se han seleccionado archivos!</p>";
  } else {
    var list = document.createElement("ul");
    d.appendChild(list);
    for (var i=0; i < files.length; i++) {
      var li = document.createElement("li");
      list.appendChild(li);
      
      var info = document.createElement("span");
      info.innerHTML = files[i].name + ": " + files[i].size + " bytes";
      li.appendChild(info);
    }
  }
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('#fileupload').fileupload();
})
</script>