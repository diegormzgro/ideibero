<?php

$email_sis =$_GET['email_sis'];
include('../conexion.php');

$sql= "SELECT doc.*, c.Documento, c.Orden FROM documentos as doc 
INNER JOIN catg_documentos as c ON doc.idArchivo= c.id
WHERE doc.Correo='$email_sis' AND doc.Eliminado=0 AND c.TipoDoc=0 ORDER BY c.Orden ASC ";
           
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
            <a href="archivos/docente/'.$email_sis.'/'.$renglon['NombreArchivo'].'" target="_blank" ><img src="opciones/reportar.png"></a>
            <a href="javascript:eliminar_doc('.$renglon['id'].');"><img src="opciones/eliminar.png"></a>

            </td>

            </tr>';

                    }
           
            


?>
  </tbody>