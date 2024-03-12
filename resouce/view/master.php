<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyAPI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost:8000/accets/css/style.css">
</head>
<body>
  <?php
    use App\http\controller\AuthController;
    $type = null;
    if(isset($_COOKIE['token'])) {
      if(gettype(AuthController::decodedToken($_COOKIE['token'])) == 'string') {
        setcookie("token", "", time()-3600,);
        session_destroy();
        header('Location: http://localhost:8000/');
      }
      if($_SESSION['type'] == 0) $type = "user";
      if($_SESSION['type'] == 1) $type = "store";
    }
  ?>
  <nav class="navbar has-background-primary" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="http://localhost:8000">
        <figure class="image">
          <img src="http://localhost:8000/accets/img/logo.png" width="112" height="28">
        </figure>
          ECOMMERCE
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
      <div class="navbar-end">
        <?php if(!isset($_COOKIE['token'])){?>
        <div class="navbar-item" id="div">
          <div class="buttons">
            <button class="js-modal-trigger button is-primary" data-target="modal-js-example">
              Sign up
            </button>
            <a href="http://localhost:8000/login" class="button is-light">
              Log in
            </a>
          </div>
        </div>
        <?php } else { ?>
        <div class="navbar-item">
          <a href="http://localhost:8000/<?= $type?>/<?=$_SESSION['slug']?>">
            <figure class="image is-32x32 is-center mr-2">
              <img class="is-rounded" src="http://localhost:8000/accets/img/perfil.jpg">
            </figure>
          </a>
            <div class="mr-2">
              <?= $_SESSION['name'] ?>
            </div>
            <?php if ($type == 'user') { ?>
              <a href="http://localhost:8000/sale/<?= $_SESSION['slug']?>" class="button is-light">
                Carrinho
              </a>
            <?php } ?>
          <button class="button is-primary" id="btn">
            Log out
          </button>
        </div>
        <?php } ?>
      </div>
    </div>
  </nav>

  <div id="modal-js-example" class="modal">
  <div class="modal-background"></div>

  <div class="modal-content">
    <div class="box">
      <div class="columns">
        <div class="column">
          <p>Deseja ser um usuario?</p>
          <a href="http://localhost:8000/cadastro" class="button  is-success">
            <strong>Usuario</strong>
          </a>
        </div>
        <div class="column">
          <p>Deseja cadastrar sua loja ?</p>
          <a href="http://localhost:8000/store/cadastro" class="button  is-success">
            <strong>Loja</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>
   
  <?=$this->section('content')?>
  <script src="http://localhost:8000/accets/js/button.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
