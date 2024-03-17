<?php
namespace App\http\controller;

require __DIR__."/../request/RequestStore.php";

use App\http\request\RequestStore;
use App\http\controller\AuthController;
use App\model\Store;
use App\model\Product;
use src\Plates;
use Exception;
use stdClass;
/**
 * Classe responsavel pelo controle do usuário
 */
class StoreController {
    
    protected Store $repository;
    protected Product $repo;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new Store();
        $this->repo = new Product();
    }
    /**
     * Método responsavel pela exibição de todas as lojas
     */
    public function index() {
        $this->repository->get->column("idloja, name, slug, imagem");
        $get = $this->repository->get();
        Plates::view('lojas', $get);
    }
    /**
     * Método responsavel pela criação
     */
    public function store(stdClass $request) {
        try{
            $param = RequestStore::createRequest($request);
            $id = $this->repository->create($param);
            if(gettype($id) == "string") throw new Exception($id, "2002");
            $param += ['idloja' => strval($id)];
            $token = AuthController::storeToken($param);

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
            echo json_encode(['message' => $e->getMessage()]);
        }
    }
    /**
     * Método responsavel pela view de edição
     */
    public function edit($request, $edit){
        $this->repository->get->column('name, email, descricao, tell');
        $this->repository->get->where('slug', '=', $edit);
        $get = $this->repository->get();
        Plates::view('form/loja', $get);
    }
    /**
     * Método resposavel pela exibição de uma loja especifica
     */
    public function show(stdClass $request, $store) {
        $get = $this->repository->getByslug(['slug' => $store]);

        $this->repo->get->column('name, preco, foto, disponivel, slug');
        $this->repo->get->where('idloja', '=', $get['idloja']);
        $product= $this->repo->get();

        $get['produtos'] = $product; 
        Plates::view('show/loja', $get);
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
            $token = AuthController::storeToken($get);

            return json_encode($token);
        }catch(Exception $e) {
            http_response_code(401);
            return json_encode($e->getMessage());
        }
    }
}