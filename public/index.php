<?php
require_once "../vendor/autoload.php";
require "../src/Route.php";
use src\Route;

 Route::route('/', 'GET', 'LoadPages', 'HomePage');

 Route::route('/user', 'GET', 'LoadPages', 'UserPage');
 Route::route('/user', 'POST', 'UserController','index');

 Route::route('/cadastro', 'GET', 'LoadPages', 'CadastroPage');
 Route::route('/cadastro', 'POST', 'UserController', 'store');

 Route::route('/login', 'GET', 'LoadPages', 'LoginPage');
 Route::route('/login', 'POST', 'UserController', 'login');

 Route::route('/store', 'POST', 'StoreController', 'store');
 Route::route('/store/update', 'POST', 'StoreController', 'update');
 Route::route('/store/delete', 'POST', 'StoreController', 'delete');
 Route::route('/store/cadastro', 'GET', 'LoadPages', 'CadastroLojaPage');

 Route::route('/sale', 'POST', 'SaleController', 'store');
 Route::route('/sale/update', 'POST', 'SaleController', 'update');
 Route::route('/sale/delete', 'POST', 'SaleController', 'delete');



 Route::route('/product', 'POST', 'ProductController', 'store');
 Route::route('/product/update', 'POST', 'productController', 'update');
 Route::route('/product/delete', 'POST', 'productcleController', 'delete');
 Route::route('/product', 'GET', 'LoadPages', 'ProdutoPage');



try {

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $method = $_SERVER['REQUEST_METHOD'];

    if(!isset(Route::$routes[$method])){
        throw new Exception("A metodo não exite");
    }
    if(!array_key_exists($uri, Route::$routes[$method])){
        var_dump($uri, $method);
       throw new Exception("A rota não exite"); 
    }
    $controller = Route::$routes[$method][$uri];
   $controller(); 
}catch(Exception $e) {
    echo $e->getMessage();
}