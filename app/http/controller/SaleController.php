<?php
namespace App\http\controller;

require __DIR__."/../request/RequestSale.php";

use App\http\request\RequestSale;
use App\http\controller\AuthController;
use App\model\Product;
use App\model\Sale;
use App\model\User;
use Exception;
use PDO;
use src\Conexao;
use src\Plates;
use stdClass;
/**
 * Classe responsavel pelo controle do usuário
 */
class SaleController {
    
    protected Sale $repository;
    protected Product $product;

    protected User $user;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new Sale();
        $this->product = new Product();
        $this->user = new User();
    }
    /**
     * Método responsavel pela criação do usuário
     */
    public function store(stdClass $request) {
        try{
            $param = RequestSale::createRequest($request);
            $itens = RequestSale::itensPedido($request->itens);
           
            $id = $this->repository->create($param);
            if(gettype($id) == "string") throw new Exception($id, "2002");
            
            $quantidade = count($itens);
            for ($i=0; $i < $quantidade; $i++) { 
                if(!empty($itens[$i])){
                    $result = $this->repository->itemPedido(['idproduto' => $itens[$i], 'idvenda' => $id]);
                    if(gettype($result) == "string") throw new Exception($id, "2002");
                }
            }
        }catch(Exception $e){
           
            http_response_code(401);
            if($e->getCode() == "23000") return json_encode("Esse email já estar registrado");
            return json_encode($e->getMessage());
        }
    }
    /**
     * Método responsavel pela atualização dos dados do usuário
     */
    public function update(stdClass $request) {
        try {
            $param = RequestSale::updateRequest($request);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Método resposavel pela deleção de usuário
     */
    public function destroy(stdClass $request) {
        try{
            $param = RequestSale::destroyRequest($request);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function addproduct(stdClass $param, $sale, $product) {
        try{
            $this->product->get->column('disponivel, idproduto');
            $this->product->get->where('slug', '=', $product);
            $get = $this->product->get();
            if($get[0]['disponivel'] == 1) {
                $this->repository->itemPedido(['idproduto' => $get[0]['idproduto'],'idusuario' => intval($sale)]);
                header('Location: http://localhost:8000/sale');
            }
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    public function showcart (stdClass $request, $sale) {
        $this->user->get->where('slug','=', $sale);
        $this->user->get->column('iduser');
        $get = $this->user->get();
       
        $cart = $this->repository->getCart($get[0]);
        return Plates::view('compra', $cart);
    }
    public function removeItemCart ($request, $user, $product) {
        try {
            $this->user->get->where('slug','=', $user);
            $this->user->get->column('iduser');
            $iduser = $this->user->get();
            
            $this->product->get->where('slug','=', $product);
            $this->product->get->column('idproduto');
            $idproduct = $this->product->get();
            
            $this->repository->deletecartitem(['id' => $iduser[0]['iduser'], 'idproduto' => $idproduct[0]['idproduto']]);
        }catch(Exception $e) {
            http_response_code(401);
            return $e->getMessage();
        }
    }
}