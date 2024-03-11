<?php
namespace App\http\controller;

require __DIR__."/../request/RequestUser.php";

use App\http\request\RequestUser;
use App\http\controller\AuthController;
use App\model\User;
use Exception;
use src\Plates;
use stdClass;
/**
 * Classe responsavel pelo controle do usuário
 */
class UserController {
    
    protected User $repository;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new User();
    }
    /**
     * Método responsavel por listar todos os usuários
     */
    public function index() {
        try{
            $a = $this->repository->get();
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Método responsavel pela criação do usuário
     */
    public function store(stdClass $request) {
        try{
            $param = RequestUser::createRequest($request);
            $id = $this->repository->create($param);
            if(gettype($id) == "string") throw new Exception($id, "2002");
            $param += ['iduser' => strval($id)];
            $token = AuthController::userToken($param);

            return json_encode($token);
        }catch(Exception $e){
           
            http_response_code(401);
            if($e->getCode() == "23000") return json_encode("Esse email já estar registrado");
            return json_encode($e->getMessage());
        }
    }
    public function showcart (stdClass $request, $sale) {
        $this->repository->get->where('slug','=', $sale);
        $this->repository->get->column('iduser');
        $get = $this->repository->get();
        var_dump($get);
        //return Plates::view('show/user', $get);
     }
    public function show (stdClass $request, $user) {
       $this->repository->get->where('slug','=', $user);
       $get = $this->repository->get();
       return Plates::view('show/user', $get);
    }
    /**
     * Método responsavel pela atualização dos dados do usuário
     */
    public function update(stdClass $request) {
        try {
            $param = RequestUser::updateRequest($request);
            $param['id'] = intval($_REQUEST['id']);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit (stdClass $request, $edit) {
        $this->repository->get->column('name, email, tell, cpf, iduser');
        $this->repository->get->where('slug', '=', $edit);
        $get = $this->repository->get();
        return Plates::view('form/user', $get);
    }
    /**
     * Método resposavel pela deleção de usuário
     */
    public function destroy(stdClass $request) {
        try{
            $param = RequestUser::destroyRequest($request);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function addProductCart(stdClass $request) {
        try {
            $this->repository->addCart(['idusuario' => $request->iduser, 'idproduto' => $request->idproduct]);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function removeProductCart(stdClass $request) {
        try {
            $this->repository->remove(['idcarrinho' => $request->idcart]);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function teste($teste, $name = null) {
       // var_dump($teste, $name, "aaaaa");
    }
}