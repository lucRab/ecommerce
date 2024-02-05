<?php
namespace App\http\controller;

require __DIR__."/../request/RequestProduct.php";

use App\http\request\RequestProduct;
use App\http\controller\AuthController;
use App\model\Product;
use src\File;
use Exception;
use stdClass;
/**
 * Classe responsavel pelo controle do usuário
 */
class ProductController {
    
    protected Product $repository;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new Product();
    }
    /**
     * Método responsavel pela criação do usuário
     */
    public function store($request) {
        try{
            $request->foto = $_FILES['foto'];
            $param = RequestProduct::createRequest($request);
            if($param['foto'] != null) {
               $dirFoto =  File::file($param['foto'],'products');
               $param['foto'] = $dirFoto;
            }
            $id = $this->repository->create($param);
            if(gettype($id) == "string") throw new Exception($id, "2002");
            return json_encode(true);
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
            $param = RequestProduct::updateRequest($request);
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
            $param = RequestProduct::destroyRequest($request);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}