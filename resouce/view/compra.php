<?php
use App\http\controller\AuthController;
if(isset($_COOKIE['token'])) {
    if(gettype(AuthController::decodedToken($_COOKIE['token'])) == 'string') {
      setcookie("token", "", time()-3600,);
      session_destroy();
      header('Location: http://localhost:8000/');
    }
  }
$this->layout('master');
$tamanho = sizeof($this->data);
$total = 0;
?>

<div class="container mt-6">
    <div class="column">
        <div class="box">
            <nav class="navbar">
                <div class="navbar-brand">
                    <div class="navbar-item">
                        Produto
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="columns">
                        <div class="column">
                            <div class="navbar-item">
                                | Quantidade
                            </div>
                        </div>
                        <div class="column">
                            <div class="navbar-item">
                                | Preço Unitario
                            </div>
                        </div>
                        <div class="column">
                            <div class="navbar-item">
                                | Preço Total
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="obj">
                <?php for ($i=0; $i < $tamanho; $i++) { ?>
                    <form action="" class="<?= $_SESSION['slug']?>" id="<?= $this->data[$i]['slug']?>">
                        <div class="columns">
                            <div class="column is-two-thirds">     
                                <figure class="image is-96x96 ml-5">
                                    <img src="../<?= $this->data[$i]['foto']?>">
                                </figure>
                                <?= $this->data[$i]['name']?>
                            </div>
                            <div class="column">
                                <div class="columns">
                                    <div class="column is-3">
                                    <input type="number" min="1" id="<?=$this->data[$i]['preco']?>" name="<?=$i?>" class="input is-small" value="1">
                                    </div>
                                    <div class="column preco">
                                        <?= $this->data[$i]['preco']?>
                                    </div>
                                    <div class="column total">
                                        <?= $this->data[$i]['preco']?>
                                    </div>
                                </div>
                                <button class="button is-white" id="btn">
                                    Remover
                                </button>
                            </div>
                        </div>
                    </form>
                <?php $total = $total + (float) $this->data[$i]['preco']; }?>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="box">
            <div class="columns" >
                <div class="column">
                    <button class="button is-primary is-medium" id="btn">
                      Comprar
                    </button>
                </div>
                <div class="column">
                    <div class="title is-size-4">
                        Valor Total:    
                    </div>
                    <div class="is-size-4">
                        <div class="columns">
                            <div class="column is-one-fifth">
                                R$
                            </div>
                            <div class="column" id="valortotal">
                                <?= number_format($total, 2)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module" src="../accets/js/sale.js"></script>