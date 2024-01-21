<?php
namespace App\http\controller;

require __DIR__."/../request/RequestStore.php";

use App\http\request\RequestStore;
use App\http\controller\AuthController;
use App\model\Store;
use Exception;
use stdClass;
/**
 * Classe responsavel pelo controle do usuário
 */
class StoreController {
    
    protected Store $repository;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new Store();
    }
    /**
     * Método responsavel pela criação
     */
    public function store(stdClass $request) {
        try{
            $param = RequestStore::createRequest($request);
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
     * Método responsavel pela atualização dos dados
     */
    public function update(stdClass $request) {
        try {
            $param = RequestStore::updateRequest($request);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Método resposavel pela deleção
     */
    public function destroy(stdClass $request) {
        try{
            $param = RequestStore::destroyRequest($request);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Método resposavel para login
     */
    public function login(stdClass $request) {
        try{
            $param = RequestStore::loginRequest($request);
            $get = $this->repository->getLogin(['email' => $param['email']]);
            if(!password_verify($param['password'], $get['password'])) throw new Exception ('Senha incorreta');
            $token = AuthController::cadastroToken($get);

            return json_encode($token);
        }catch(Exception $e) {
            http_response_code(401);
            return json_encode($e->getMessage());
        }
    }
}