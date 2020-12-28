 <script src="js/myjava.js"></script>
<center>
          <div class="card mb-3"  id="agrega-registros">
        <div class="card-header">

  
           
          <div align="right">
<a href="general.php">
          <button type="button" class="btn btn-dark">Regresar</button>
          </a>
          </div>
          </div>
          <br> 

        <div class="card-body">
          <div class="table-responsive" id="table">

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Posgrado</th>
                  <th>Archivo</th>
                  <th>Acción</th>
                </tr>
              </thead>
            <tbody>
              <?php

               
                 
            $sql= "SELECT p.id, p.nombre_posgrado, p.abrev, c.Calendario  FROM catg_posgrado AS p
                  INNER JOIN calendario AS c ON c.idPosgrado= p.id
                  WHERE c.Eliminado=0
                    ";

     require('conexion.php');
            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador + 1;
            echo '<tr>
            <td>'.$contador.'</td>
            <td>'.$renglon['nombre_posgrado'].'</td>
            <td>
            <a href="archivos/Calendario/'.$renglon['abrev'].'/'.$renglon['Calendario'].'" target="_blank" >
            <img src="opciones/reportar.png">
            </a>
            </td>
            <td>           
              <a href="javascript:editarCalendario('.$renglon['id'].');">
              <img src="opciones/editar.png"></a></a>
              
            </td>

            </tr>';

                    }
            ?>
              </tbody>
             
            </table>
            </div>

 
      </div>
 
</div>
                        <?php  include("modal/modal_calendario.php"); ?>

  <script type="text/javascript">
   function listar_materias(id){
      $('#contenido').load("php/posgrado/listar_clasesgenericas.php?id="+id);
  }
          $('#regresar').click(function(){
            $('#contenido').load("php/listar_posgradoindex.php");
        });
 function listar_alumnos(id){
  $('#contenido').load("php/listar_perfil.php?id="+id);

}


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