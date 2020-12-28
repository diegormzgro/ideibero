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
<div> 
                         <div class="row">
    <div class="col">
                       
        <div class="div-img hidden" >
            <img class="img"  src="opciones/posgrado/Maestria1.png"   id="Ma1">

        </div>
</div><div class="col">
</div>
    <div class="col">   
        <div class="div-img hidden" >
            <img class="img" src="opciones/posgrado/Maestria2.png" id="Ma2" >
        </div>
    </div>    


</div>
<br>
 <div class="row">
    <div class="col">
    </div>
    <div class="col">
    
                    <div class="div-img hidden" >
                       <center><a id="Estudiante">  <img class="img" src="opciones/posgrado/Estudiantil.png" ></a></center>
                   </div>
    </div>
    <div class="col">
    </div>
</div>
<br>
                         <div class="row">
    <div class="col">
                       
        <div class="div-img hidden" >
            <img class="img"  src="opciones/posgrado/Doctorado1.png"  id="Do1" >
        </div>
</div>
<div class="col">
    </div>
    <div class="col">   
        <div class="div-img hidden" >
            <img class="img" src="opciones/posgrado/Doctorado2.png" id="Do2" >
        </div>
    </div>    


</div>
</div>

<br>

    <script type="text/javascript">

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