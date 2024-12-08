<?php
namespace App\http\controller;

require __DIR__."/../request/RequestUser.php";

use App\http\request\RequestUser;
use App\model\Endereco;
use Exception;
use src\Plates;
use stdClass;
use App\model\User;
/**
 * Classe responsavel pelo controle do usuário
 */
class EnderecoController {
    
    protected Endereco $repository;
    protected User $user;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new Endereco();
        $this->user = new User();
    }
    /**
     * Método responsavel pela visualização de todos os endereços
     */
    public function index (stdClass $request, $endereco){
        $this->user->get->column('iduser');
        $this->user->get->where('slug', '=', $endereco);
        $id = $this->user->get();
        $this->repository->get->where('idenduser)ereco','=', $id);
        $get = $this->repository->get();
        $get['slug'] = $endereco;
        return Plates::view('show/endereco', $get);
    }

    /**
     * Método responsavel pela criação do endereço
     */
    public function store(stdClass $request, $endereco) {
        try{
            $param = RequestUser::createEnderecoRequest($request);
            $id = $this->repository->create($param);
            if(gettype($id) == "string") throw new Exception($id, "2002");
            return json_encode("OK");
        }catch(Exception $e){
           
            http_response_code(401);
            if($e->getCode() == "23000") return json_encode("Esse email já estar registrado");
            echo json_encode(['message' => $e->getMessage()]);
        }
    }
    
    public function create(stdClass $request, $endereco) {
        $this->user->get->column('iduser');
        $this->user->get->where('slug', '=', $endereco);
        $id= $this->user->get();
        return Plates::view('form/cadastroendereco', [$endereco, $id[0]["iduser"]]);
    }
    /**
     * Método responsavel pela atualização dos dados do endereço
     */
    public function update(stdClass $request) {
        try {
            $param = RequestUser::updateRequest($request);
            $param['id'] = intval($_REQUEST['idendereco']);
            $this->repository->update($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit (stdClass $request, $endereco) {
        $this->repository->get->column('endereco, cep');
        $this->repository->get->where('idendereco', '=', $endereco);
        $get = $this->repository->get();
        return Plates::view('form/updateendereco', $get);
    }
    /**
     * Método resposavel por deletar endereços
     */
    public function destroy(stdClass $request) {
        try{
            $param = RequestUser::destroyRequest($request);
            $this->repository->delete($param);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}