 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $Posgrado=$_SESSION['Posgrado'];
?>

          <div id="agrega-registros">
        <div class="card-header">
         <a href="general.php"> Regresar</a>
           
        </div>
        <?php 
        $ProgramaEstudio="";
		include('conexion.php');
        if($_SESSION['Perfil']=='Control Escolar' ){
        	$sql ="SELECT p.abrev, m.ProgramaEstudio, se.FechaSesion,CONCAT('','archivos/ProgramaEstudio/',m.ProgramaEstudio)as archivo FROM catg_materias as m
					INNER JOIN catg_posgrado as p ON p.id= m.idPosgrado
					INNER JOIN login as l on l.idPosgrado= m.idPosgrado
					INNER JOIN catg_sesiones AS se ON se.idMateria= m.idMateria
					WHERE m.Eliminado=0 AND CURDATE()<= se.FechaSesion";
$datos = mysqli_query($conexion,$sql);
		while ($renglon=mysqli_fetch_array($datos)) {
        		$ProgramaEstudio= $renglon['archivo'];
  		}
  		echo "<a href='<?php echo $ProgramaEstudio; ?>'>Descargar </a>";
  		

}else{
					$sql ="SELECT p.abrev, m.ProgramaEstudio, se.FechaSesion,CONCAT('','archivos/ProgramaEstudio/',m.ProgramaEstudio)as archivo FROM catg_materias as m
					INNER JOIN catg_posgrado as p ON p.id= m.idPosgrado
					INNER JOIN login as l on l.idPosgrado= m.idPosgrado
					INNER JOIN catg_sesiones AS se ON se.idMateria= m.idMateria
					WHERE m.Eliminado=0 AND CURDATE()<= se.FechaSesion AND l.Correo='$correo' ";
					$datos = mysqli_query($conexion,$sql);
		while ($renglon=mysqli_fetch_array($datos)) {
        		$ProgramaEstudio= $renglon['archivo'];
  		}
  		echo "<a href='echo $ProgramaEstudio'>Descargar </a>";
  	
}
        	
		
        ?>

</div>

 <?php

}
else{
    header("location:index.html");
}
?>