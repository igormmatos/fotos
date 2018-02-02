<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();

require_once ("classes/Fotos.php");

$fotos = new Fotos();

$fotos->add();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Foto+</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Caveat|Dosis" rel="stylesheet">
  <style>
  .topo{
    font-family: 'Caveat', cursive;
  }
  .pop{
    margin-top: 15px;
    position:absolute;
    width: 97%;
  }
  .pop_msg{
    position:absolute;
    width: 20%;
    font-family: 'Dosis', sans-serif;

  }
  a{
    color: #fff;
  }
  a:hover{
    color: #f8f9fa;
    text-decoration: none;
  }
  .text-modal{
    font-family: 'Dosis', sans-serif;
  }
</style>
<script>
$(document).ready(function(){
  $("#para_cima").click(function(){
    $('html, body').animate({scrollTop: 0}, 300);
  });
  $("#Adicionar").click(function(){
    $("#add_foto").modal();
  });
  $("#fechar_msg").click(function(){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "limpar_session.php", true);
    xhttp.send();
  });
  <?php if(isset($_SESSION['msg'])) :?>
  setInterval(function(){$("#fechar_msg").click();}, 5000);
  <?php endif?>
});
</script>
</head>
<body>
  <div class="clearfix pop">
    <span class="float-right" id="Adicionar"><i class="fa fa-plus" style="font-size: 35px; cursor:pointer"></i></span>
  </div>
  <div class="pop_msg mt-5 ml-2">
    <?php if(isset($_SESSION['msg'])) :?>
      <div class="alert <?php echo $_SESSION['alert'];?> alert-dismissable fade show" style="position: relative;">
        <button type="button" class="close" data-dismiss="alert" id="fechar_msg">&times;</button>
        <?php echo $_SESSION['msg'];?>
      </div>
    <?php endif?>
  </div>
  <div class="jumbotron bg-white topo">
    <div class="row text-center">
      <div class="col-md-12">
        <h1>Teste<i>+</i></h1>
        <!--h1>FOTO<i>+</i></h1-->
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-12">
        <h2>Teste</h2>
        <!--h2>"A fotografia é uma das poucas coisas que tem poder sobre o tempo: ela o paralisa.."</h2-->
      </div>
    </div>
  </div>
</div>
<div class="container-fluid p-0">
  <div class="row mx-auto">
    <div class="col-md-4 col-6 p-0">
      <!--img class="img-fluid" src="imagens/bridge.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/coffee.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/gondol.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/lights.jpg" alt="Bridge" width="100%"-->
    </div>
    <div class="col-md-4 col-6 p-0">
      <!--img class="img-fluid" src="imagens/skies.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/sound.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/woods.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/workbench.jpg" alt="Bridge" width="100%"-->
    </div>
    <div class="col-md-4 col-12 p-0">
      <!--img class="img-fluid" src="imagens/london.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/nature.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/notebook.jpg" alt="Bridge" width="100%">
      <img class="img-fluid" src="imagens/rocks.jpg" alt="Bridge" width="100%"-->
    </div>
  </div>
  <div class="row mx-auto text-dark p-0">
    <p class="mx-auto" style="cursor:pointer;" id="para_cima">
      VOLTAR AO TOPO <i class="fa fa-arrow-circle-up" style="font-size:24px"></i>
    </p>
  </div>
  <div class="row mx-auto bg-dark text-light p-0">
    <p class="mx-auto pt-3">
      Desenvolvido por <strong><a href="https://igormmatos.github.io/" target="_blank">Igor M Matos</a></strong>
    </p>
  </div>
</div>
<?php include "modal/modal.php"?>
</body>
</html>
