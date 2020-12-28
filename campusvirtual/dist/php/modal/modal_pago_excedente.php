<style type="text/css">
  .bien{
  background-color:#3CBE34;
  text-align:center;
  font-size:14px;
  color:#FFF;
  padding:5px;
}
</style>
 
     <div class="modal fade" id="registra-pago-exc" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-pago">Mover excedente</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <div id="mensaje"></div>
            
            <form onsubmit="return agregaPagoExc();" id="formulario_pago_exc" name="formulario_pago_exc">
              <input type="text" name="idOrden_exc" id="idOrden_exc" hidden>
              <input type="text" name="alumno_exc" id="alumno_exc" hidden>
              <input type="text" name="idAlumno_exc" id="idAlumno_exc" hidden>

                 <!-- <label for="alumno">Alumno:</label>
                  <select name='alumno' id='alumno' class="form-control" required='required' readonly >
                  <option value=''>Seleccione</option>
                  <?php
                   //$idAlumno = $_GET['idAlumno'];
                    $sql="SELECT u.id,CONCAT_WS(' - ',po.abrev,  CONCAT_WS(' ',u.nombre,u.ap_paterno,ap_materno)) as Nombre 
                          FROM usuario_activo as u
                          INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
                          WHERE u.eliminado=0 ";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                    </select>-->
                  
                  <label for="tipo_pago" id="lb_num_pago" hidden>Número de pago:</label>
                  <input class="form-control" type="number" name="num_pago_exc" id="num_pago_exc" hidden>
                  
                  <br>
                  <label for="tipo_pago" hidden>Concepto de pago:</label>
                  <select name='tipo_pago_exc' id='tipo_pago_exc' class="form-control" required='required' readonly hidden>
                  <?php
                   
                    $sql="SELECT * FROM sta_pago_concepto WHERE id=5";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                  </select>
                  <br>
                  <label for="forma_pago">Forma de pago:</label>
                  <select name='forma_pago_exc' id='forma_pago_exc' class="form-control" required='required' >
                  <option value=''>Seleccione</option>
                  <?php
                   
                    $sql="SELECT * FROM catg_forma_pago";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                  </select>
                  
                  <br>
                  <p>Montos:</p>
  
                            
                    <input type="number" id="pago_exc" name="pago_exc" class="form-control" min="1" max="9999"  required>




                  <br>
                  <label for="primer_ap">Fecha de Pago:</label>
                  <input type="date" class="form-control" id="fecha_pago_exc" min='1900-04-25' max="2999-12-31"  name="fecha_pago_exc" required>
                  <br>
                  <label for="primer_ap">Descripción:</label>
                  <input type="text" class="form-control" id="descripcion_exc" name="descripcion_exc" placeholder="Descripción"  required>
                  <br>
                  <label for="Docente">Adjuntar comprobante:</label>
                  <input name='file_pago_exc' id='file_pago_exc' class="form-control" type="file" required='required' >
<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg_exc"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi_exc"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro_exc" name="pro_exc" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id_exc" name="id_exc" readonly="readonly" style="visibility:hidden;"/>
             
           
</form>
</div>

</div></div></div>

 