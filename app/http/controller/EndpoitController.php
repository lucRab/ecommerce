<?php
namespace App\http\controller;
use App\http\request\RequestStore;
use App\http\request\RequestUser;
use App\model\User;
use App\model\Store;
use Exception;
use stdClass;

class EndpoitController {
    protected User $user;
    protected Store $store;
    /**
     * Método construtor da classe
     */
     public function __construct(){
        $this->user = new User();
        
        $this->store = new Store();
     }
    /**
     * Método responsavel pelo Login do usuario
     */
    public function login(stdClass $request) {
        try{
            //inicia a sessão
            session_start();
            $param = RequestUser::loginRequest($request);
            if($this->user->getLogin(['email' => $param['email']])){
                $get = $this->user->Login(['email' => $param['email']]);
                if(gettype($get) != "array") throw new Exception($get);
                if(!password_verify($param['password'], $get['password'])) throw new Exception ('Senha incorreta');
                $token = AuthController::userToken($get);
            }else if($this->store->getLogin(['email' => $param['email']])) {
                $get = $this->store->Login(['email' => $param['email']]);
                if(!password_verify($param['password'], $get['password'])) throw new Exception ('Senha incorreta');
                $token = AuthController::storeToken($get);
            }
            return json_encode(['message' => $token]);
        }catch(Exception $e) {
            http_response_code(401);
            echo json_encode(['message' => $e->getMessage()]);
        }
    }
    /**
     * Métpdp responsavel pelo Logout do usuario
     */
    public function logout() {
        setcookie("token", "", time()-3600,);
        session_destroy();
    }
}
