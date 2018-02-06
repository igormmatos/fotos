<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();
header("Content-type: text/html; charset=utf-8");
require_once ("classes/Fotos.php");

$fotos = new Fotos();

$fotos->add();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyPhoto</title>
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
  .hovereffect {
    width: 100%;
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
    font-family: 'Dosis', sans-serif;
  }

  .hovereffect .overlay {
    position: absolute;
    overflow: hidden;
    width: 80%;
    height: 80%;
    left: 10%;
    top: 10%;
    border-bottom: 1px solid #FFF;
    border-top: 1px solid #FFF;
    -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
    transition: opacity 0.35s, transform 0.35s;
    -webkit-transform: scale(0,1);
    -ms-transform: scale(0,1);
    transform: scale(0,1);
  }

  .hovereffect:hover .overlay {
    opacity: 1;
    filter: alpha(opacity=100);
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
  }

  .hovereffect img {
    display: block;
    position: relative;
    -webkit-transition: all 0.35s;
    transition: all 0.35s;
  }

  .hovereffect:hover img {
    filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="linear" slope="0.6" /><feFuncG type="linear" slope="0.6" /><feFuncB type="linear" slope="0.6" /></feComponentTransfer></filter></svg>#filter');
    filter: brightness(0.6);
    -webkit-filter: brightness(0.6);
  }

  .hovereffect h2 {
    text-transform: uppercase;
    text-align: center;
    position: relative;
    font-size: 17px;
    background-color: transparent;
    color: #FFF;
    padding: 1em 0;
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
    transition: opacity 0.35s, transform 0.35s;
    -webkit-transform: translate3d(0,-100%,0);
    transform: translate3d(0,-100%,0);
  }

  .hovereffect a, .hovereffect p {
    color: #FFF;
    padding: 1em 0;
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
    transition: opacity 0.35s, transform 0.35s;
    -webkit-transform: translate3d(0,100%,0);
    transform: translate3d(0,100%,0);
  }

  .hovereffect:hover a, .hovereffect:hover p, .hovereffect:hover h2 {
    opacity: 1;
    filter: alpha(opacity=100);
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
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
  <div class="pop_msg mt-4 ml-2">
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
        <h1><i>My</i>Photo</h1>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-12">
        <h2>"A fotografia é uma das poucas coisas que tem poder sobre o tempo: ela o paralisa.."</h2>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid p-0">
  <div class="row mx-auto">
    <?php
    $fotos->listar();
    ?>
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
