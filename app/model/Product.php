<?php
namespace App\model;
use App\model\Model;
use Exception;

class Product extends Model {
    protected $table = "produto";
    
    public function create(array $param){
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("INSERT INTO produto(idloja, name, descricao, preco, quantidade, disponivel, foto, slug) VALUES(:idloja, :name, :descricao, :preco, :quantidade, :disponivel, :foto, :slug)");
            //executa o sql e verifica se deu aldo de errado
            
            if($insert->execute($param)) {
                $id = $this->conect->lastInsertId();
                return intval($id);
            } 
            
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }

    public function update(array $param){
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("UPDATE produto SET name= :name, descricao= :descricao, preco= :preco, quantidade= :quantidade, disponivel= :disponivel WHERE idproduto= :id");
            //executa o sql e verifica se deu aldo de errado
            if($insert->execute($param)) return true;
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }

    public function delete(array $param){
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("DELETE FROM produto WHERE idproduto= :id");
            //executa o sql e verifica se deu aldo de errado
            if($insert->execute($param)) return true;
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }

    public function getByloja(array $param) {
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            $get = $this->conect->prepare("SELECT p.name, p.preco, p.foto, p.disponivel FROM produto p
            INNER JOIN loja l ON l.idloja = p.idloja
            WHERE l.idloja = :id GROUP BY p.name");
            $get->execute($param);
            $result = $get->fetchAll();

            return $result;
        }   
        return $this->conect;//retorna o erro caso haja.
    }
    public function insertDescricao(array $param) {
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("INSERT INTO descricao(idproduto, descricao) VALUES(:idproduto, :descricao)");
            //executa o sql e verifica se deu aldo de errado
            if($insert->execute($param)) {
                return true;
            } 
            
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }
}