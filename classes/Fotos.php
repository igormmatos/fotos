<?php

class Fotos
{
  private $id;
  private $caminho;
  private $alt;

  public function __construct ($id=null, $caminho=null, $alt=null)
  {
    $tipo_conexao = $_SERVER['HTTP_HOST'];

    define('SERVIDOR', 'mysql:host=localhost;dbname=fotos');
    define('USUARIO', 'root');
    define('SENHA', 'root');

    $this -> id = $id;
    $this -> caminho = $caminho;
    $this -> alt = $alt;
  }
  public function listar(){
    $con = new PDO(SERVIDOR, USUARIO, SENHA);

    $sql = $con->prepare("SELECT * FROM fotos ORDER BY id DESC");
    $sql->execute();
    $fotos=$sql->fetchAll(PDO::FETCH_CLASS);
  }
  public function add(){
    if (isset($_POST['alt'])){
      if($_POST['pwd'] == "2423")
      {
        $target_dir = "imagens/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if ($check !== false) {
            $uploadOk = 1;
          } else {
            /*$_SESSION['msg'] = "O arquivo <strong>não</strong> é uma imagem!";
            $_SESSION['alert'] = "alert-danger";*/
            $uploadOk = 0;
          }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
          $_SESSION['msg'] = "Fotografia já foi <strong>cadastrada</strong>!";
          $_SESSION['alert'] = "alert-warning";
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 999999) {
          $_SESSION['msg'] = "Tamanho de arquivo <strong>excedeu</strong> o limite permitido!";
          $_SESSION['alert'] = "alert-warning";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
          $_SESSION['msg'] = "São permitidos somente arquivos <strong>JPG, JPEG, PNG & GIF</strong>!";
          $_SESSION['alert'] = "alert-warning";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0)
        {
        } else {
          $con = new PDO(SERVIDOR, USUARIO, SENHA);

          $this->alt=$_POST['alt'];


          $sql = $con->prepare("INSERT INTO fotos VALUES(NULL,?,?)");
          $sql->execute(array($target_file, $this->alt));

          $_SESSION['msg'] = "<strong>Cadastrado</strong> com sucesso!";
          $_SESSION['alert'] = "alert-success";
          header("Location: index.php");


          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['msg'] = 'Fotografia <strong>' .  $this->alt . '</strong> cadastrada com sucesso!';
            $_SESSION['alert'] = "alert-success";
          } else {
            $_SESSION['msg'] = 'Algo deu errado <strong>tente novamente</strong>..';
            $_SESSION['alert'] = "alert-danger";
          }
        }
      }
      else
      {
        $_SESSION['msg'] = "<strong>Palavra Chave</strong> incorreta, fotografia não cadastrada!";
        $_SESSION['alert'] = "alert-danger";
      }
    }
  }
}
