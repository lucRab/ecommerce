<?php
namespace App\model;
use src\Conexao;
use src\radical\get;
/**
 * Class Model pai para implementação dos outros models
 * @abstract
 * @api
 */
abstract class Model {
    protected $conect;
    protected $table;
    public get $get;
    
    public function __construct() {
        $this->conect = Conexao::conexao();
        $this->get = new get($this->table);
    }
    abstract function create(array $param);

    abstract function update(array $param);

    abstract function delete(array $param);

    public function get() {
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
           $quary = "SELECT ".$this->get->values." FROM ".$this->table.$this->get->param;
           $get = $this->conect->prepare($quary);
           $get->execute();
           $result = $get->fetchAll();
           return $result;
        }
        return $this->conect;//retorna o erro caso haja.
    }
        
}