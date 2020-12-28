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
    $query = $db->query("SELECT * FROM catg_grupo WHERE idPosgrado = ".$_POST['posgrado']." AND Eliminado=0");
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['idGrupo'].'">'.$row['NombreGrupo'].'</option>';
        }
    }else{
        echo '<option value="">Grupo no disponible</option>';
    }
}


?>