<?php
//Include database configuration file
//db details
$dbHost = 'localhost';
$dbUsername = 'ibero';
$dbPassword = 'ibero';
$dbName = 'ibero';

$email_sis = $_POST["email_sis"];
$posgrado = $_POST['posgrado'];

include('../conexion.php');

$con ="SELECT * FROM usuario_activo WHERE emailInst='$email_sis'";
$datosc = mysqli_query($conexion,$con);
 while ($renglon=mysqli_fetch_array($datosc)) {
    $emailPart = $renglon['email_particular'];
  }

$sql= "SELECT doc.*, c.Documento, c.Orden FROM documentos as doc 
INNER JOIN catg_documentos as c ON doc.idArchivo= c.id
WHERE doc.Correo='$emailPart' AND doc.Eliminado=0 AND c.TipoDoc=0 ORDER BY c.Orden ASC ";
$datos = mysqli_query($conexion,$sql);
$filas = mysqli_num_rows($datos);
 


//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$db -> set_charset("utf8");

if(isset($_POST["posgrado"])){

    if ($filas>0) {
    //Get all state data
    $query = $db->query("SELECT id, Documento, Orden FROM catg_documentos WHERE idPosgrado = ".$_POST['posgrado']."  AND TipoDoc=0 AND id NOT IN (SELECT d.idArchivo FROM documentos AS d WHERE d.Eliminado=0 AND d.Correo='$emailPart')
        ORDER BY Orden ");    
    }else{
    echo "string";
    //Get all state data
    $query = $db->query("SELECT id, Documento, Orden FROM catg_documentos WHERE idPosgrado = ".$_POST['posgrado']."  AND TipoDoc=0 AND id NOT IN (SELECT d.idArchivo FROM documentos AS d WHERE d.Eliminado=0 AND d.Correo='$email_sis')
        ORDER BY Orden ");
    }
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Seleccionar documento</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['Orden'].'.'.$row['Documento'].'</option>';
        }
    }else{
        echo '<option value="">Documento no disponible</option>';
    }
}


?>