<?php
              session_start();
                  $perfil=$_SESSION['Perfil'];
//$select_documento = intval($_GET['select_documento']);
$posgrado = $_GET['posgrado'];
$correo =$_GET['correo'];
//$nombre = $_FILES['archivo']['name'];
//$idArchivo = intval($_GET['select_documento']);

include('../conexion.php');

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



$sql= "SELECT doc.*, c.Documento, c.Orden FROM documentos as doc 
INNER JOIN catg_documentos as c ON doc.idArchivo= c.id
WHERE doc.Correo='$correo' AND doc.Eliminado=0 AND c.TipoDoc=0 ORDER BY c.Orden ASC ";


           if ($correo!="") {
            $datos = mysqli_query($conexion,$sql);
            mysqli_set_charset($conexion,"utf8");
            $contador=0;
            while ($renglon=mysqli_fetch_array($datos)) {
              $contador = $contador +1;
            echo '<tr>
            <td>'. $renglon['Orden'].'</td>
<td>'.$renglon['Documento'].'</td>
<td>'.$renglon['fechaCreacion'].'</td>
<td>
<a href="../../archivos/estudiante/'.$posgrado.'/'.$correo.'/'.$renglon['NombreArchivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>';

echo '<a href="javascript:eliminar_doc('.$renglon['id'].');"><img src="opciones/eliminar.png"></a>';

echo '</td></tr>';
                    }

                               }

           
            


?>
  </tbody>