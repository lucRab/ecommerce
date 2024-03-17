<?php
namespace App\http\controller;

require __DIR__."/../request/RequestProduct.php";

use App\http\request\RequestProduct;
use App\http\controller\AuthController;
use App\model\Descricao;
use App\model\Product;
use src\File;
use Exception;
use src\Plates;
use stdClass;
/**
 * Classe responsavel pelo controle do usuário
 */
class ProductController {
    
    protected Product $repository;
    protected Descricao $descricao;
   /**
    * Método construtor da classe
    */
    public function __construct(){
        $this->repository = new Product();
        $this->descricao = new Descricao();
    }
    /**
     * Método index
     */
    public function index () {
        try {
            $this->repository->get->all();
            $products = $this->repository->get();
            $allproduct = [];
            foreach ($products as $key => $value) {
                if($value['disponivel'] == 1 ) {
                    array_push($allproduct, $value);
                }
            }
            return Plates::view('home', $allproduct);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
    /**
     * Método responsavel pela criação do usuário
     */
    public function store($request) {
        try{
            $request->foto = $_FILES['foto'];
            $param = RequestProduct::createRequest($request);
            $description = RequestProduct::descriptioRequest($_REQUEST);
            if($param['foto'] != null) {
               $dirFoto =  File::file($param['foto'],'products');
               $param['foto'] = $dirFoto;
            }
            $param['idloja'] = intval($_REQUEST['id']);
            $id = $this->repository->create($param);
            foreach ($description as $key => $value) {
                $this->descricao->create(['idproduto' => $id, 'descricao' => $value]);
            }
            if(gettype($id) == "string") throw new Exception($id, "2002");
            return json_encode(true);
        }catch(Exception $e){
            http_response_code(401);
            if($e->getCode() == "23000") return json_encode("Esse email já estar registrado");
            echo json_encode(['message' => $e->getMessage()]);
        }
    }
    /**
     * Método responsavel tela de visualização de um produto
     */
    public function  show(stdClass $request, $product) {
            $columns = 'produto.name, '.
            'produto.descricao, '.
            'produto.foto, '.
            'produto.preco, '.
            'produto.quantidade, '.
            'produto.idloja, '.
            'produto.slug, '.
            'produto.idproduto ';
            $this->repository->get->column($columns);
            $this->repository->get->where('slug','= ',$product);
            $get = $this->repository->get();
            $this->descricao->get->column('descricao');
            $this->descricao->get->where('idproduto', '=', $get[0]['idproduto']);
            $descricao = $this->descricao->get();
            if(!empty($descricao)) {
                $get['desc'] = $descricao;
            }
            return Plates::view('show/produto', $get); 
    }
    /**
     * Método responsavel pela tela de criação de produto
     */
    public function create() {
        return Plates::view('form/cadastroitem');
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
    public function destroy(stdClass $request, $delete) {
        $this->repository->delete(['id' => (int) $delete]);
    }
}