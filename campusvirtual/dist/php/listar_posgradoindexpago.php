<style type="text/css">
.bgimg {
    background-image: url('opciones/bannerclase.png');
    height: 270px; width: 800px;color: #ffffff;
    padding: 100px;
}
</style>
 <?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
if(($_SESSION['emailInst'])!=''){
    $correo=$_SESSION['emailInst'];
    $perfil=$_SESSION['Perfil'];
    $Posgrado=$_SESSION['Posgrado'];
    $FechaActual=$_SESSION['FechaActual'];
?>

 <script src="js/myjava.js"></script>
    <div class="card mb-3"  align="center" hidden>
        <center> <h1 class="mt-4">Pagos</h1></center>

    </div>
                   <div class="col" align="right">
                    <a href="general.php"><button type="button" class="btn btn-dark" >Regresar</button></a>
                </div>


<br><br>

  <div id="pin" name="pin" class="container">
    <center> 
    <label for="pass"> Pin:
    <input type="password" class="form-control" name="pass" id="pass"></label>
    <br>
    <button class="btn btn-success" id="entrar" name="entrar">Entrar </button>
    </center>

  </div>
<br>

    <script type="text/javascript">
        $('#entrar').click(function(){
          if ($('#pass').val()=='0001') {

            $('#contenido').load("php/listar_posgradoindexpago2.php");
          }else{
            alert("Pin incorrecto");
            $('#contenido').load("php/listar_posgradoindexpago.php");
          }
        });


         $('#Ma1').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=1");
        });
         $('#Ma2').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=2");
        });
          $('#Do1').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=3");
        });
          $('#Do2').click(function(){
            $('#contenido').load("php/listar_gruposPagos.php?id_Posgrado=4");
        });
        $('#Estudiante').click(function(){
            $('#contenido').load("php/listar_perfilGeneralPago.php");
            $('.tooltip').remove();
        });

</script>
 
  <?php

}
else{
    header("location:login.html");
}
?>