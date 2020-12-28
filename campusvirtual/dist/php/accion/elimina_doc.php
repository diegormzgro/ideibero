 <script src="js/myjava.js"></script>
<?php
session_start();

include('../conexion.php');

$id = $_POST['id'];
$posgrado = $_POST['posgrado'];
$correo =$_POST['correo'];

$sql = "UPDATE documentos SET Eliminado = 1 WHERE id = '$id' ";
$registro = mysqli_query($conexion,$sql);

if ($posgrado==1) {
	$posgrado = "MDCDH";
}elseif ($posgrado == 2) {
	$posgrado = "MDE";
}elseif($posgrado == 3){
	$posgrado = "DDCDH";
}else{
	$posgrado = "DDE";
}


//$directorio_escaneado = scandir('../../archivos/estudiante/$posgrado/$correo/');
//$archivos = array();
//foreach ($directorio_escaneado as $item) {
    //if ($item != '.' and $item != '..') {
    //    $archivos[] = $item;
  //  }
//}
//echo json_encode($archivos);



$sql= "SELECT doc.*, c.Documento FROM documentos as doc 
INNER JOIN catg_documentos as c ON doc.idArchivo= c.id
WHERE doc.Correo='$correo' AND doc.Eliminado=0";


           
            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador +1;
            echo '<tr>
            <td>'. $contador.'</td>
<td>'.$renglon['Documento'].'</td>
<td>'.date("d-m-Y", strtotime($renglon['fechaCreacion'])).'</td>
<td><a href="javascript:eliminar_doc('.$renglon['id'].');">
<img class="img-fluid"  src="opciones/eliminar.png"></a>
<a href="archivos/estudiante/'.$posgrado.'/'.$correo.'/'.$renglon['NombreArchivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
</td>

            </tr>';

                    }


?>
</tbody>