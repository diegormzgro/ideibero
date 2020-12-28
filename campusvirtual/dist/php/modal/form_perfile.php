<div id="agrega-registro" >
        <div class="card-header">
          <i class="fa fa-table"></i> Alumno 
 
 <center>

     <button type="button" class="btn btn-dark" id="Estudiante">Regresar</button>
   

    </div>
           <form  onsubmit="return agregaAlumno();" id="form_perfil" name="form_perfil"  >
              <div class="row">
                <div class="col">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                 <div class="col">
                  <label for="primer_ap">Primer Apellido:</label>
                  <input type="text" class="form-control" id="primer_ap" name="primer_ap" placeholder="Primer Apellido"  required>
                </div>
                <div class="col">
                  <label for="segundo_ap">Segundo Apellido:</label>
                  <input type="text" class="form-control" placeholder="Segundo Apellido" id="segundo_ap">
                </div>
               </div>

              <div class="row">
                <div class="col">
                  <label for="nombre">Posgrado:</label>
                  <select id="posgrado" class="form-control">
                  <option selected>Seleccione...</option>
                  <option value="1">MDCDH</option>
                  <option value="2">MDE</option>
                  <option value="3">DDCDH</option>
                  <option value="4">DDE</option>
                  </select>
                </div>
                 <div class="col">
                  <label for="sexo">Sexo:</label>
                  <select id="sexo" class="form-control">
                  <option selected>Seleccione...</option>
                  <option value="1">Femenino</option>
                  <option value="2">Masculino</option>
                  </select>
                </div>
                <div class="col">
                  <label for="fecha_nac">Fecha de Nacimiento:</label>
                  <input type="date" class="form-control" id="fecha_nac" placeholder="Fecha Nacimiento" required>
                </div>
               </div>

                <div class="row">
                <div class="col">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="col">
                  <label for="email">Email Institucional:</label>
                  <input type="email" class="form-control" id="emailInst" placeholder="Email"  >
                </div>
                 <div class="col">
                  <label for="telefono">Teléfono:</label>
                  <input type="tel" class="form-control" id="telefono" placeholder="Teléfono" required>
                </div>
                </div>

               <div class="row">
                <div class="col">
                  <label for="calle">Calle:</label>
                  <input type="text" class="form-control" id="calle" placeholder="Calle" required>
                </div>
                 <div class="col">
                  <label for="numero">Número Interior:</label>
                  <input type="text" class="form-control" id="numeroi" placeholder="Número Interior" required>
                </div>
                 <div class="col">
                  <label for="numero">Número Exterior:</label>
                  <input type="text" class="form-control" id="numeroe" placeholder="Número Exterior">
                </div>
               </div>
          
               <div class="row">
                <div class="col">
                  <label for="ciudad">Ciudad:</label>
                  <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" required>
                </div>
                 <div class="col">
                  <label for="estado">Estado:</label>
                  <input type="text" class="form-control" id="estado" placeholder="Estado" required>
                </div>
                </div>

               <div class="row">
                <div class="col">
                  <label for="cp">Código Postal:</label>
                  <input type="number" class="form-control" id="cp" placeholder="Código Postal" required>
                </div>
                 <div class="col">
                  <label for="periodo">Periodo:</label>
                  <input type="number" class="form-control" id="periodo" placeholder="Periodo" required>
                </div>
                </div>

               <div class="row">
                <div class="col">
                  <label for="cp">Nacionalidad:</label>
                  <input type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad" required>
                </div>
                 <div class="col">
                  <label for="doc_acre">Documento acreditación:</label>
                  <select id="periodo" class="form-control">
                  <option selected>Seleccione...</option>
                  <option value="Credencial">Credencial</option>
                  <option value="Título">Título</option>
                  <option value="Cédula">Cédula</option>
                  </select>
                </div>
                  <div class="col">
                  <label for="num_doc">Número de documento:</label>
                  <input type="text" class="form-control" id="num_doc" placeholder="Número de documento" required>
                </div>
                </div>

                <hr>
               <center><h4>Estudios Previos</h4></center> 
               <div class="row">
                <div class="col">
                  <label for="universidad">Universidad:</label>
                  <input type="text" class="form-control" id="universidad" placeholder="Universidad" required>
                </div>
                 <div class="col">
                  <label for="pais_e">Pais de estudio:</label>
                  <input type="text" class="form-control" id="pais_e" placeholder="Pais de estudio" required>
                </div>
                 <div class="col">
                 <label for="estado_e">Estado de estudio:</label>
                 <input type="text" class="form-control" id="estado_e" placeholder="Estado de estudio" required>
                </div>
                </div>

               <div class="row">
                <div class="col">
                  <label for="titulo">Tipo de titulo:</label>
                  <input type="text" class="form-control" id="titulo" placeholder="Titulo" required>
                </div>
                 <div class="col">
                  <label for="fecha_fin">Fecha de finalización:</label>
                  <input type="date" class="form-control" id="fecha_fin" placeholder="Fecha finalización" required>
                </div>
                </div>
                <hr>
               <center><h4>Documentación</h4></center> 
               <div class="row">
                 <div class="col">
                  <label for="doc_foto">Fotografía:</label>
                  <input type="file" class="form-control" id="doc_foto" required>
                </div>
                 <div class="col">
                 <label for="doc_acta">Acta:</label>
                 <input type="file" class="form-control" id="doc_acta"  required>
                </div>
                 <div class="col">
                 <label for="doc_titulo">Titulo:</label>
                 <input type="file" class="form-control" id="doc_titulo"  required>
                </div>                
                </div>

               <div class="row">
                <div class="col">
                  <label for="doc_identificación">Identificación:</label>
                  <input type="file" class="form-control" id="doc_identificacion" required>
                </div>
                 <div class="col">
                  <label for="doc_cv">Curriculum:</label>
                  <input type="file" class="form-control" id="doc_cv" required>
                </div>
                 <div class="col">
                 <label for="doc_curp">Curp:</label>
                 <input type="file" class="form-control" id="doc_curp"  required>
                </div>
                 <div class="col">
                 <label for="doc_certificado">Certificado:</label>
                 <input type="file" class="form-control" id="doc_certificado"  required>
                </div>
                 <div class="col">
                 <label for="doc_cedula">Cédula:</label>
                 <input type="file" class="form-control" id="doc_cedula"  required>
                </div>                       
                </div>

<br>
              <input type="submit" value="Registrar" class="btn btn-success" id="regPerfil"/>
              <input type="submit" value="Editar" class="btn btn-warning"  id="ediPerfil"/>               
              <input type="hidden"  id="proPerfil"/> 
                          <input type="hidden"   id="idPerfil"/> 
          </form>

</div>

<script type="text/javascript">

        $('#Estudiante').click(function(){
            $('#contenido').load("php/listar_perfil.php");
        });

</script>