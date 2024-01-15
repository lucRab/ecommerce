<?php
namespace App\http\controller;

require __DIR__."/../request/RequestStore.php";

use App\http\request\Request;
use App\http\controller\AuthController;
use App\model\Store;
use Exception;
use stdClass;
/**
 * Classe responsavel pelo controle do usuário
 */
class UserController {
    
    protected Store $repository;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new Store();
    }
    /**
     * Método responsavel pela criação do usuário
     */
    public function store(stdClass $request) {
        try{
            $param = Request::createRequest($request);
            $id = $this->repository->create($param);
            if(gettype($id) == "string") throw new Exception($id, "2002");
            $param += ['iduser' => strval($id)];
            $token = AuthController::cadastroToken($param);

            return json_encode($token);
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
            $param = Request::updateRequest($request);
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
            $param = Request::destroyRequest($request);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}