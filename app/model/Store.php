<?php
namespace App\model;
use App\model\Model;
use Exception;

class Store extends Model {

    public function create(array $param) {
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("INSERT INTO loja(name, email, password, tell, descricao) VALUES(:name, :email, :password, :tell, :descricao)");
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
            $insert = $this->conect->prepare("UPDATE loja SET name= :name, email= :email, password= :password, tell= :tell, descricao= :descricao WHERE idloja= :id");
            //executa o sql e verifica se deu aldo de errado
            if($insert->execute($param)) return true;
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }
    public function delete(array $param) {
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("DELETE FROM loja WHERE idloja= :id");
            //executa o sql e verifica se deu aldo de errado
            if($insert->execute($param)) return true;
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }

    public function getLogin(array $param) {
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //Execução da query sql
            $get = $this->conect->prepare("SELECT * FROM loja WHERE email= :email");
            $get->execute($param);
            //verifica e trata o resultado da query
            if($result = $get->fetch()) return $result;//retorna o resultado da query
            throw new Exception("Email incorreto");//retorna falso caso haja algum erro
        }
        return $this->conect;//retorna o erro caso haja.
    }
}

