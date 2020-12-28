 <style type="text/css">
     .list-unstyled {
    display: flex;
    flex-direction: column;
    padding-left: 20px;
    margin-bottom: 0;
}
   .list-group {
    display: flex;
    flex-direction: column;
    padding-left: 30px;
    margin-bottom: 0;
}
 </style>
 <script src="js/myjava.js"></script>

   <h2 class="mt-4">Programa de regularización 2020    </h2> 
     
    
 
 <center>
 <div class="row">


     <div class="col" align="right">
          <a href="general.php">
          
     <button type="button" class="btn btn-dark" >Regresar</button></a>
  
    </div>
  </div>
</center>

        </div>

<br><br><br><br>
<table  class="table container">
  <thead>
    <th>ID</th>
    <th>Descripción</th>
    <th>PDF</th>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Convocatoria</td>
      <td>
        <a style="cursor:pointer;" href="archivos/Regularizacion/CONVOCATORIA REGULARIZACIÓN v2.pdf" target="_blank"> 
<img src="opciones/reportar.png">        </a>
      </td>
    </tr>

    <tr>
      <td>2</td>
      <td>Lineamientos para la elaboración del trabajo de investigación</td>
      <td>
        <a style="cursor:pointer;" href="archivos/Regularizacion/LINEAMIENTOS PARA LA ELABORACIÓN DEL TRABAJO DE INVESTIGACIÓN.pdf" target="_blank"> 
<img src="opciones/reportar.png">        </a>
      </td>
    </tr>

    <tr>
      <td>3</td>
      <td>Guía para la elaboración de trabajos de investigación primera fase</td>
      <td>
        <a style="cursor:pointer;" href="archivos/Regularizacion/GUIA PARA LA ELABORACION DE TRABAJOS DE INVESTIGACION 1a FASE.pdf" target="_blank"> 
<img src="opciones/reportar.png">        </a>
      </td>
    </tr>

    <tr>
      <td>4</td>
      <td>Guía para la elaboración de trabajos de investigación segunda fase</td>
      <td>
        <a style="cursor:pointer;" href="archivos/Regularizacion/GUIA PARA LA ELABORACION DE TRABAJOS DE INVESTIGACION 2a FASE.pdf" target="_blank"> 
<img src="opciones/reportar.png">        </a>
      </td>
    </tr>

  </tbody>

</table>
<!--
        <div class="row">
          <div class="col-xs-6 col-md-6">    
          <center>
            <a istyle="cursor:pointer;" href="archivos/Regularizacion/GUIA PARA LA ELABORACION DE TRABAJOS DE INVESTIGACION 1a FASE.pdf" target="_blank"> 
              <img class="img-fluid"  src="opciones/regularizacion/getipf.png"> 
            </a>
          </center>
          </div>
          <div class="col-xs-6 col-md-6">    
          <center>
            <a style="cursor:pointer;" href="archivos/Regularizacion/GUIA PARA LA ELABORACION DE TRABAJOS DE INVESTIGACION 2a FASE.pdf" target="_blank"> 
              <img class="img-fluid"  src="opciones/regularizacion/getisf.png"> 
            </a>
          </center>
          </div>
       
        </div>
<br><br>

<br><br>

        <div class="row">
          <div class="col-xs-6 col-md-6">    
          <center>
            <a istyle="cursor:pointer;" href="archivos/Regularizacion/LINEAMIENTOS PARA LA ELABORACIÓN DEL TRABAJO DE INVESTIGACIÓN.pdf" target="_blank"> 
              <img class="img-fluid"  src="opciones/regularizacion/letf.png"> 
            </a>
          </center>
          </div>
          <div class="col-xs-6 col-md-6">    
          <center>
            <a style="cursor:pointer;" href="archivos/Regularizacion/CONVOCATORIA REGULARIZACIÓN v2.pdf" target="_blank"> 
              <img class="img-fluid"  src="opciones/regularizacion/cr.png"> 
            </a>
          </center>
          </div>       
        </div>

-->
                        </div>


    <script type="text/javascript">

        function regresarlectura(id){
      $('#contenido').load("php/listar_lecturaComun.php?idMateria="+id);
      }
          $('#tarea').click(function(){

            $('#contenido').load("php/listar_tarea.php");
        });      

          $(document).ready(function() {

        $('#dataTable').DataTable( {

          "language": {
          "lengthMenu": "Mostrar _MENU_ por pagina   ",
          "zeroRecords": "Sin registros ",
          "info": " Pagina _PAGE_ de _PAGES_   Total: _TOTAL_ registros",
          "infoEmpty": "Ningún registro",

          "search": "Buscar:",
          "paginate": {
          "first":      "Primer",
          "previous":   "Anterior",
          "next":       "Siguiente",
          "last":       "Ultimo",
          "loadingRecords": "Espere un momento - Cargando datos..."
      },
      buttons: {
                  colvis: 'Habilitar columnas'
              }
      },
      "bDestroy": true,
      
      //"info":     false,

           buttons: [
               {
                   extend: 'colvis',
                   collectionLayout: 'fixed two-column'
               },

           ],




          
             } );
        } );
</script>
 
