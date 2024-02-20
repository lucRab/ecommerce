<?php $this->layout('master');
use App\http\controller\AuthController;
    $t = AuthController::decodedToken($_COOKIE['token']);
?>
<div class="container is-max-desktop">
    <div class="column">
        <div class="box" style="background-image: url('accets/img/banner.png'); background-position: center; ">
            <figure class="image is-128x128 is-center">
                <img class="is-rounded" src="accets/img/perfil.jpg">
            </figure>
        </div>
    </div>
</div>
<div class="column">
    <div class="title text-center">
            <?php echo $_SESSION['name']?>
        </div>
    </div>
</div>

<div class="column has-background-grey-lighter" >
    Produtos: 39
    <div class="columns mt-6">
        <div class="column">    
            <div class="box" >
                <div class="card-image m-2">
                    <figure class="image is-128x128 ml-6">
                      <img src="accets/img/celular.png">
                    </figure>
                </div>
                <div class="card-boddy">
                    <div class="title is-size-5">
                        Celular Gamer 1.0
                    </div>
                    R$ 89,99
                </div>
            </div>
        </div>
        <div class="column">  
            <div class="box" >
            </div>
        </div>
        <div class="column"> 
            <div class="box" >
            </div>
        </div>
        <div class="column">
            <div class="box" >
            </div>
        </div>
        <div class="column">
            <div class="box">
            </div>
        </div>
    </div>
</div>
<div class="column" >
    <div class="title text-center">
        Sobre Nós
    </div>
    <div class="container">
        <p>
            <?php echo $_SESSION['descricao'] ?>
        </p>
    </div>
    <div class="title text-center mt-6">
        Nossos Contatos
    </div>
    <div class="container">
        <div class="columns">
            <div class="column" >
                <div class="text-center box">
                    <h2 class="is-size-4">
                        Email
                    </h2>
                    <p>
                       <?php echo $_SESSION['email'] ?>
                    </p>
                </div>
            </div>
            <div class="column" >
                <div class="text-center box">
                    <h2 class="is-size-4">
                        Telefone
                    </h2>
                    <p>
                        <?php echo $_SESSION['tell'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>