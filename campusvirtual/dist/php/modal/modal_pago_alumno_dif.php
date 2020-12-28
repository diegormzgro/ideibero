 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $perfil=$_SESSION['emailInst'];
      $id = $_SESSION['id'];
?>

<style type="text/css">
  .bien{
  background-color:#3CBE34;
  text-align:center;
  font-size:14px;
  color:#FFF;
  padding:5px;
}
</style>
 
     <div class="modal fade" id="registra-pago-dif" tabindex="-1" role="dialog" aria-labelledby="registra-clase" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registra-pago">Pagos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">


            <form onsubmit="return agregaPagoDif();" id="formulario_pago_dif" name="formulario_pago_dif" enctype="multipart/form-data" class="formulario">
              <input type="text" name="idOrden_dif" id="idOrden_dif" hidden >
                  <label for="alumno">Alumno:</label>
                  <select name='alumno_dif' id='alumno_dif' class="form-control" required='required' readonly>
                  <?php
                   
                    $sql="SELECT u.id,CONCAT_WS(' - ',po.abrev,  CONCAT_WS(' ',u.nombre,u.ap_paterno,ap_materno)) as Nombre 
                          FROM usuario_activo as u
                          INNER JOIN catg_posgrado as po ON po.id= u.id_posgrado
                          WHERE u.eliminado=0 AND u.id='$id'";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                    </select>


                  <label for="tipo_pago" hidden>Concepto de pago:</label>
                  <select name='tipo_pago_dif' id='tipo_pago_dif' class="form-control" hidden>
                  <?php
                   
                    $sql="SELECT * FROM sta_pago_concepto WHERE id=5";

                    $datos = mysqli_query($conexion,$sql);
                    mysqli_set_charset($conexion,"utf8");
                    while ($renglon=mysqli_fetch_array($datos)) {
                    echo "<option value='".$renglon[0]."'>".$renglon[1]."</option>";
                    }
                    ?>
                  </select>

                  <label for="forma_pago">Forma de pago:</label>
                  <select name='forma_pago_dif' id='forma_pago_dif' class="form-control" required='required' >
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

                  <p>Montos:</p>

   

                   
                    <input type="number" id="pago_dif" name="pago_dif" min="1" max="9999" class="form-control" required>




                  <label for="primer_ap">Fecha de pago:</label>
                  <input type="date" min='1900-04-25' max="2999-12-31" class="form-control" id="fecha_pago_dif" name="fecha_pago_dif" required>
  

                  <label for="primer_ap">Descripción:</label>
                  <input type="text" class="form-control" id="descripcion_dif" name="descripcion_dif" placeholder="Descripción"  required>

                  <label for="Docente">Adjuntar comprobante:</label>
                  <input name='file_pago_dif' id='file_pago_dif' class="form-control" type="file" required='required' >
<br>

              <input type="submit" value="Registrar" class="btn btn-success" id="reg_dif"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="edi_dif"/>               
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <input type="text" required="required" readonly="readonly" id="pro_dif" name="pro_dif" readonly="readonly"style="visibility:hidden;" />
              <input type="text" required="required" readonly="readonly" id="id_dif" name="id_dif" readonly="readonly" style="visibility:hidden;"/>
             
           
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