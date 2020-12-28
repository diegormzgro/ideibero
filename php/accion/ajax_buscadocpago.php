<?php
//Include database configuration file
//db details
$dbHost = 'localhost';
$dbUsername = 'ibero';
$dbPassword = 'ibero';
$dbName = 'ibero';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$db -> set_charset("utf8");
if(isset($_POST["posgrado"])){
    //Get all state data
    $query = $db->query("SELECT id, Documento FROM catg_documentos WHERE idPosgrado = ".$_POST['posgrado']."  AND TipoDoc=1 ORDER BY Orden ");
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Seleccionar documento</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['Documento'].'</option>';
        }
    }else{
        echo '<option value="">Documento no disponible</option>';
    }
}


?>