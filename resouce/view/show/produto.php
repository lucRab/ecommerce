<?php 
use App\http\controller\AuthController;
$this->layout('master');
if(gettype(AuthController::decodedToken($_COOKIE['token'])) == 'string') {
    setcookie("token", "", time()-3600,);
    session_destroy();
    header('Location: http://localhost:8000/');
  }?>
<div class="column"></div>
<div class="column"></div>
<div class="container">
    <div class="columns">
        <div class="column">
            <div class="box">
                <div class="columns">
                    <div class="column is-two-thirds">
                        <figure class="image">
                            <img src="../<?= $this->data[0]["foto"]?>">
                        </figure>
                    </div>
                    <div class="column">
                        <div class="">
                            <div class="title is-size-4 m-4">
                                <?= $this->data[0]["name"]?>.
                            </div>
                            <div class="m-4 is-size-3">
                                R$ <?= $this->data[0]["preco"]?>
                                <p class="mt-4 title is-size-6"> 
                                    O que você precisa saber sobre este produto
                                </p>
                                <?php if (!empty($this->data['desc'])) {
                                    foreach ($this->data['desc'] as $key => $value) {
                                    ?>
                                    <li class="title is-size-6"><?= $value['descricao']?></li>
                                <?php }}?>
                            </div>
                            <div class="card is-shadowless">
                                <a href="http://localhost:8000/sale" class="button is-primary mx-6 my-3">Comprar</a>
                                <form action="http://localhost:8000/sale/<?= $_SESSION['id']?>/product/<?= $this->data[0]['slug']?>" method="POST">
                                    <button class="button is-light mx-6 my-3">ADD Carrinho</button>
                                </form>
                            </div>
                        </div> 
                        <div class="title is-size-6">
                            <p class="m-4 title is-size-6"> 
                                Descrição do produto
                            </p>
                            <?= $this->data[0]["descricao"]?>  
                        </div>
                        <?php if($_SESSION ['id'] == $this->data[0]['idloja']) {?>
                            <form action="http://localhost:8000/product/delete/<?= $this->data[0]['idproduto']?>" name="<?= $this->data[0]['idproduto']?>" method="POST" id="delete">
                                <button  class="button">DELETAR</button> 
                            </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module" src="../../accets/js/produto.js"></script>