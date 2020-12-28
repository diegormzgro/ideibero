<?php
	$usuario = $_POST['form_user_name'];
  //$pass= $_POST['pass'];
  include('conexion.php');
 

  //$consulta_u ="SELECT * FROM usuario_activo WHERE email_particular='$usuario'";
  $consulta_c ="SELECT * FROM correo WHERE correo='$usuario'";
  $datosu = mysqli_query($conexion,$consulta_u);
  $datosc = mysqli_query($conexion,$consulta_c);

  //$filasu = mysqli_num_rows($datosu);
  $filasc = mysqli_num_rows($datosc);
  $var4 =0;

  while ($renglon=mysqli_fetch_array($datosc)) {
  }

  if ($filasc==0) {
 
    $var4=1;
    echo $var4;
  }else{
        $var4=0;

    echo $var4;
  }



 ?>