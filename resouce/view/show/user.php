<?php 
use App\http\controller\AuthController;
$this->layout('master');
AuthController::decodedToken($_COOKIE['token']);
if(!$_SESSION['id'])header('Location: http://localhost:8000/');
if($_SESSION['id'] != $this->data[0]['iduser']) header('Location: http://localhost:8000/');
?>
<div class="columns">
    <div class="column is-one-quarter">
        <div class="box">
            <ul class="list-group list-group-flush">
                <li class="list-group-item m-2">
                    <a href="http://localhost:8000/user/edit/<?= $this->data[0]['slug']?>">
                        Atualizar Dados
                    </a>
                </li>
                <li class="list-group-item m-2">
                    <a href="http://localhost:8000/sale/<?= $_SESSION['slug']?>">
                        Seu Carrinho de Compras
                    </a>
                </li>
                <li class="list-group-item m-2">
                    <a href="">
                        Endereços
                    </a>
                </li>
                <li class="list-group-item m-2">
                    <a href="">
                        Cartões
                    </a>
                </li>
                <li class="list-group-item m-2">
                    <a href="">
                        Seus Pedidos
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <div class="column">
        <div class="has-background-grey-lighter">
            <div class="container">
                <div class="columns div-flex">
                    <div class="column is-half">
                        <div class="box m-6">
                            <div class="columns">
                                <div class="column is-one-fifth">
                                    <div class="image is-64x64 is-center">
                                        <img class="is-rounded" src="../accets/img/perfil.jpg">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="title">
                                        <?= $this->data[0]['name']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div cass="card-head">
                                <h3 class="title text-center m-1">Seu Dados</h3>
                            </div>
                            <div class="card-body">
                                <div class="m-2">
                                    <h4>NOME</h4>
                                    <?= $this->data[0]['name']?>
                                </div>
                                
                                <div class="m-2">
                                    <h4>EMAIL</h4>
                                    <?= $this->data[0]['email']?>
                                </div>
                                <div class="m-2">
                                    <h4>TELEFONE</h4>
                                    <?= $this->data[0]['tell']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

