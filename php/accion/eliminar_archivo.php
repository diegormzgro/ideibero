<?php
if (isset($_POST['archivo'])) {
    $archivo = $_POST['archivo'];
    if (file_exists("../../archivos/prueba/$archivo")) {
        unlink("../../archivos/prueba/$archivo");
        echo 1;
    } else {
        echo 0;
    }
}
?>
