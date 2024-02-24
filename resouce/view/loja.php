<?php $this->layout('master');
use App\http\controller\AuthController;
    $t = AuthController::decodedToken($_COOKIE['token']);
    $q = sizeof($this->data['produtos'])
?>
<div class="container is-max-desktop">
    <div class="column">
        <div class="box" style="background-image: url('../<?php echo $this->data['imagem']?>'); background-position: center; ">
            <figure class="image is-128x128 is-center">
                <img class="is-rounded" src="../accets/img/perfil.jpg">
            </figure>
        </div>
    </div>
</div>
<div class="column">
    <div class="title text-center">
            <?php echo $this->data['name']?>
        </div>
    </div>
    <?php if($this->data['idloja'] == $_SESSION['id']) {?>
        <a>Editar</a>
    <?php } ?>
</div>

<div class="column has-background-grey-lighter" >
    Produtos: <?php echo $q ?>
    <div class="columns is-desktop mt-6">
        <?php for ($i=0; $i < $q; $i++) { ?>
            <?php if($this->data['produtos'][$i]['disponivel'] == 1) {?>
                <div class="column is-one-quarter">    
                    <div class="box is-4" >
                        <div class="card-image m-2">
                            <figure class="image is-128x128 ml-6">
                              <img src="../<?php echo $this->data['produtos'][$i]['foto']?>">
                            </figure>
                        </div>
                        <div class="card-boddy">
                            <div class="title is-size-5">
                                <?php echo $this->data['produtos'][$i]['name']?>
                            </div>
                            R$ <?php echo $this->data['produtos'][$i]['preco']?>
                        </div>
                    </div>
                </div>
            <?php  }?>
        <?php  }?>
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
            <?php echo $this->data['descricao'] ?>
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
                       <?php echo $this->data['email'] ?>
                    </p>
                </div>
            </div>
            <div class="column" >
                <div class="text-center box">
                    <h2 class="is-size-4">
                        Telefone
                    </h2>
                    <p>
                        <?php echo $this->data['tell'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>