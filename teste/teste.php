<?php
require_once "../vendor/autoload.php";

use App\http\controller\SaleController;
use App\http\controller\StoreController;
use App\http\controller\ProductController;
use App\http\controller\UserController;

$usuario  = new UserController();

// $cuser = new stdClass;
// $cuser->name = "nome";
// $cuser->email = "email";
// $cuser->password = "senha";
// $cuser->tell = "telefone";
// $cuser->cpf = "cpf";

// $usuario->store($cuser);

$loja = new StoreController();

// $cloja = new stdClass;
// $cloja->name = "nome da loja";
// $cloja->email = "email da loja";
// $cloja->password = "123456";
// $cloja->tell = "4002-8922";

// $loja->store($cloja);

$produto = new ProductController();

// $cproduto = new stdClass;
// $cproduto->name = "nomde do produto";
// $cproduto->preco = 40.00;
// $cproduto->quantidade = 5;
// $cproduto->loja = 1;

// $produto->store($cproduto);

$venda = new SaleController();

$cvenda = new stdClass;
$cvenda->user = 1;
$cvenda->tipoPagamento = 1;
$cvenda->dataVenda = "2024-01-01";
$cvenda->valorTotal = 50.00;
$cvenda->itens = [1];

$venda->store($cvenda);
