<?php
require_once "../vendor/autoload.php";
require "../src/Route.php";
use src\Route;
 Route::route('/', 'GET', 'LoadPages:HomePage');
 Route::route('/teste', 'GET', 'LoadPages:Testepage');
 Route::route('/teste/{numeric}','GET','LoadPages:LojaPage');
 Route::route('/teste/{numeric}/name/{alpha}','GET','LoadPages:LojaPage');
 Route::route('/teste/{alpha}','GET','LoadPages:LojaPage');
 Route::route('/teste/{any}','GET','LoadPages:LojaPage');

 Route::route('/user', 'GET', 'LoadPages:UserPage');
 Route::route('/user', 'POST', 'UserController:index');

 Route::route('/cadastro', 'GET', 'LoadPages:CadastroPage');
 Route::route('/cadastro', 'POST', 'UserController:store');

 Route::route('/login', 'GET', 'LoadPages:LoginPage');
 Route::route('/login', 'POST', 'EndpoitController:login');
 Route::route('/logout', 'POST', 'EndpoitController:logout');

 Route::route('/store', 'POST', 'StoreController:store');
 Route::route('/store/update', 'POST', 'StoreController:pdate');
 Route::route('/store/delete', 'POST', 'StoreController:delete');
 Route::route('/store','GET','StoreController:index');
 Route::route('/store/{any}', 'GET', 'StoreController:show');
 Route::route('/store/cadastro', 'GET', 'LoadPages:CadastroLojaPage');

 Route::route('/sale', 'POST', 'SaleController:store');
 Route::route('/sale/update', 'POST', 'SaleController:update');
 Route::route('/sale/delete', 'POST', 'SaleController:delete');
 Route::route('/sale', 'GET', 'LoadPages:Salepage');

 Route::route('/product', 'POST', 'ProductController:store');
 Route::route('/product/update', 'POST', 'ProductController:update');
 Route::route('/product/delete', 'POST', 'ProductController:delete');
 Route::route('/product', 'GET', 'LoadPages:ProdutoPage');
 Route::route('/product/{any}', 'GET', 'ProductController:show');
 Route::route('/product/cadastro', 'GET','ProductController:create');
 try {
    $method = $_SERVER['REQUEST_METHOD'];
    
    $routeFoud = Route::verificate($method);
    $params = null;
    if(isset($routeFoud))$params = Route::routeParam($routeFoud);
    
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $routes = Route::allroutes($method);

    if(!isset(Route::$routes[$method])){
        throw new Exception("A metodo não exite");
    }
    $key  = Route::getKeyRoute($uri, $method, $routeFoud);
    if(!array_key_exists($key, $routes)){
        throw new Exception("A rota não exite"); 
    }
    if(isset($params)) {
        $controller = fn() => Route::load(Route::$routes[$method][$key]['action'][0],Route::$routes[$method][$key]['action'][1], $method, $params);
    }else{
        $controller = fn() => Route::load(Route::$routes[$method][$key]['action'][0],Route::$routes[$method][$key]['action'][1], $method);
    }
    $controller();
 }catch(Exception $e) {
     echo $e->getMessage();
 }