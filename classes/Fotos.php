,<?php

class Fotos
{
  private $id;
  private $caminho;
  private $alt;
  private $desc;

  public function __construct ($id=null, $caminho=null, $alt=null, $desc=null)
  {
    $tipo_conexao = $_SERVER['HTTP_HOST'];

    if (($tipo_conexao == 'localhost') || ($tipo_conexao == '127.0.0.1')){
      define('SERVIDOR', 'mysql:host=localhost;dbname=bd_nota');
      define('USUARIO', 'root');
      define('SENHA', 'root');
    }
    else {
      define('SERVIDOR', 'mysql:host=localhost;dbname=igor_taskmanager');
      define('USUARIO', 'igor_root2c');
      define('SENHA', 'rootigor');
    }

    $this -> id = $id;
    $this -> caminho = $caminho;
    $this -> alt = $alt;
    $this -> desc = $desc;
  }
  public function listar(){
    $con = new PDO(SERVIDOR, USUARIO, SENHA);

    $sql = $con->prepare("SELECT * FROM fotos ORDER BY id DESC");
    $sql->execute();
    $fotos=$sql->fetchAll(PDO::FETCH_CLASS);
    $listar0 = '<div class="col-md-4 p-0">';
    $listar1 = '<div class="col-md-4 p-0">';
    $listar2 = '<div class="col-md-4 p-0">';
    if($fotos)
    {
      $i = 0;
      foreach ($fotos as $foto) {
        if($i == 0){
          $listar0 .= '<div class="hovereffect">';
          $listar0 .= '<img class="img-fluid" src="'.$foto-> caminho.'" alt="'.$foto-> alt.'" width="100%">';
          $listar0 .= '<div class="overlay">';
          $listar0 .= '<span class="align-middle">';
          $listar0 .= '<h2>'.$foto-> alt.'</h2>';
          $listar0 .= '<p>';
          $listar0 .= $foto-> descricao;
          $listar0 .= '</p>';
          $listar0 .= '</span>';
          $listar0 .= '</div>';
          $listar0 .= '</div>';
          $i = 1;
        }
        else if($i == 1){
          $listar1 .= '<div class="hovereffect">';
          $listar1 .=  '<img class="img-fluid" src="'.$foto-> caminho.'" alt="'.$foto-> alt.'" width="100%">';
          $listar1 .= '<div class="overlay">';
          $listar1 .= '<span class="align-middle">';
          $listar1 .= '<h2>'.$foto-> alt.'</h2>';
          $listar1 .= '<p>';
          $listar1 .= $foto-> descricao;
          $listar1 .= '</p>';
          $listar1 .= '</span>';
          $listar1 .= '</div>';
          $listar1 .= '</div>';
          $i = 2;
        }
        else{
          $listar2 .= '<div class="hovereffect">';
          $listar2 .=  '<img class="img-fluid" src="'.$foto-> caminho.'" alt="'.$foto-> alt.'" width="100%">';
          $listar2 .= '<div class="overlay">';
          $listar2 .= '<span class="align-middle">';
          $listar2 .= '<h2>'.$foto-> alt.'</h2>';
          $listar2 .= '<p>';
          $listar2 .= $foto-> descricao;
          $listar2 .= '</p>';
          $listar2 .= '</span>';
          $listar2 .= '</div>';
          $listar2 .= '</div>';
          $i = 0;
        }
      }
      $listar0 .= '</div>';
      $listar1 .= '</div>';
      $listar2 .= '</div>';

      echo $listar0;
      echo $listar1;
      echo $listar2;

    }else{
      echo "
      <div class='col-md-12 topo'>
      <h4 class='text-center'>
      Não existem fotografias ainda..
      </h4>
      <hr / style='width: 50%'>
      </div>";
    }
  }public function add(){
    if (isset($_POST['alt'])){
      if($_POST['pwd'] == "2423")
      {
        $msg = "O arquivo <strong>não</strong> pode ser cadastrado!";
        $alert= "alert-danger";
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
            $msg = "O arquivo <strong>não</strong> é uma imagem!";
            $alert= "alert-danger";
            $uploadOk = 0;
          }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
          $msg= "Fotografia já foi <strong>cadastrada</strong>!";
          $alert= "alert-warning";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
          $msg= "São permitidos somente arquivos <strong>JPG, JPEG, PNG & GIF</strong>!";
          $alert= "alert-warning";
          $uploadOk = 0;
        }
        if ($uploadOk != 0 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          $con = new PDO(SERVIDOR, USUARIO, SENHA);

          $this->alt=$_POST['alt'];
          $this->desc=$_POST['desc'];


          $sql = $con->prepare("INSERT INTO fotos VALUES(NULL,?,?,?)");
          $sql->execute(array($target_file, $this->alt,$this->desc));

          $_SESSION['msg'] = 'Fotografia <strong>' .  $this->alt . '</strong> cadastrada com sucesso!';
          $_SESSION['alert'] = "alert-success";
          header("Location: index.php");
        } else {
          $_SESSION['msg'] = $msg;
          $_SESSION['alert'] = $alert;
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
