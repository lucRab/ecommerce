<?php $this->layout('master');
use App\http\controller\AuthController;
    $t = AuthController::decodedToken($_COOKIE['token']);
    $q = sizeof($this->data['produtos']);
    $ix = 0;
?>
<div class="container is-max-desktop">
    <div class="column">
        <div class="box" style="background-image: url('../<?= $this->data['imagem']?>'); background-position: center; ">
            <figure class="image is-128x128 is-center">
                <img class="is-rounded" src="../accets/img/perfil.jpg">
            </figure>
        </div>
    </div>
</div>
<div class="column">
    <div class="title text-center">
            <?= $this->data['name']?>
        </div>
    </div>
    <?php if($this->data['idloja'] == $_SESSION['id']) {?>
        <a>Editar</a>
    <?php } ?>
</div>
<div class="column has-background-grey-lighter" >
    Produtos: <?= $q ?>
    <div class="columns is-desktop mt-6">
        <div class="cont">
        <?php for ($i=0; $i < $q; $i++) { $ix ++;?>
            <?php if($this->data['produtos'][$i]['disponivel'] == 1) {?>
                <div class="column is-one-third">  
                    <a href="http://localhost:8000/product/<?= $this->data['produtos'][$i]['slug']?>">
                        <div class="box is-4" >
                            <div class="card-image m-2">
                                <figure class="image is-128x128 ml-6">
                                    <img src="../<?= $this->data['produtos'][$i]['foto']?>">
                                </figure>
                            </div>
                            <div class="card-boddy">
                                <div class="title is-size-5">
                                    <?= $this->data['produtos'][$i]['name']?>
                                </div>
                                R$ <?= $this->data['produtos'][$i]['preco']?>
                            </div>
                        </div>
                    </a>  
                </div>
            <?php  }?>
        <?php  }?>
        </div>
    </div>
    <?php if($this->data['idloja'] == $_SESSION['id']) {?>
        <a href="http://localhost:8000/product/cadastro">Add Produto</a>
    <?php } ?>
</div>
<div class="column" >
    <div class="title text-center">
        Sobre Nós
    </div>
    <div class="container text-center">
        <p>
            <?= $this->data['descricao'] ?>
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
                       <?= $this->data['email'] ?>
                    </p>
                </div>
            </div>
            <div class="column" >
                <div class="text-center box">
                    <h2 class="is-size-4">
                        Telefone
                    </h2>
                    <p>
                        <?= $this->data['tell'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>