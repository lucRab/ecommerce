<?php
//autoload
require_once "../vendor/autoload.php";
use src\Route;

//Definindo as rotas
 Route::route('/', 'GET', 'ProductController:index');

 Route::route('/teste', 'GET', 'LoadPages:Testepage');

 Route::route('/user', 'GET', 'LoadPages:UserPage');
 Route::route('/user/{any}', 'GET', 'UserController:show');
 Route::route('/user/edit/{any}', 'GET', 'UserController:edit');
 Route::route('/user/edit', 'POST', 'UserController:update');
 Route::route('/user', 'POST', 'UserController:index');
 Route::route('sale/user/{any}/product/{any}', 'POST', 'SaleController:removeItemCart');

 Route::route('/cadastro', 'GET', 'LoadPages:CadastroPage');
 Route::route('/cadastro', 'POST', 'UserController:store');

 Route::route('/login', 'GET', 'LoadPages:LoginPage');
 Route::route('/login', 'POST', 'EndpoitController:login');
 Route::route('/logout', 'POST', 'EndpoitController:logout');

 Route::route('/store', 'POST', 'StoreController:store');
 Route::route('/store/update', 'POST', 'StoreController:pdate');
 Route::route('/store/delete', 'POST', 'StoreController:delete');
 Route::route('/store/edit', 'POST', 'StoreController:update');
 Route::route('/store','GET','StoreController:index');
 Route::route('/store/{any}', 'GET', 'StoreController:show');
 Route::route('/store/cadastro', 'GET', 'LoadPages:CadastroLojaPage');
 Route::route('/store/edit/{any}', 'GET', 'StoreController:edit');

 Route::route('/sale', 'POST', 'SaleController:store');
 Route::route('/sale/update', 'POST', 'SaleController:update');
 Route::route('/sale/delete', 'POST', 'SaleController:delete');
 Route::route('/sale/{any}/product/{any}', 'POST', 'SaleController:addproduct');
 Route::route('/sale', 'GET', 'SaleController:getcart');
 Route::route('/sale/{any}', 'GET', 'SaleController:showcart');

 Route::route('/product', 'POST', 'ProductController:store');
 Route::route('/product/update', 'POST', 'ProductController:update');
 Route::route('/product/delete/{any}', 'POST', 'ProductController:destroy');
 Route::route('/product', 'GET', 'LoadPages:ProdutoPage');
 Route::route('/product/{any}', 'GET', 'ProductController:show');
 Route::route('/product/cadastro', 'GET','ProductController:create');

//Inicia o sistemas de rotas
 Route::start();