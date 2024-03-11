<?php
namespace App\model;
use App\model\Model;
use Exception;
use PDO;

class Sale extends Model {
    
    public function create(array $param){
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("INSERT INTO venda(iduser, idtipo_pagamento, data_venda, valor_total) VALUES(:iduser, :idtipo_pagamento, :data_venda, :valor_total)");
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
            $insert = $this->conect->prepare("UPDATE venda SET data_venda= :data_venda, valor_total= :valor WHERE idvenda= :id");
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
            $insert = $this->conect->prepare("DELETE FROM venda WHERE idvenda= :id");
            //executa o sql e verifica se deu (aldo de errado
            if($insert->execute($param)) return true;
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }

    public function itemPedido(array $param) {
         //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $get = $this->conect->prepare("INSERT INTO item_pedido(idproduto, idusuario) VALUE (:idproduto, :idusuario)");
            //executa o sql e verifica se deu aldo de errado
            if($get->execute($param)) {
                $result = $get->fetchAll();
                return $result;
            }
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }

    public function getCart(array $param) {
         //verifica  se não algum erro na conexão.
         if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $get = $this->conect->prepare("SELECT p.name, p.foto, p.quantidade, p.preco, p.slug FROM produto p
            JOIN item_pedido ip ON ip.idproduto = p.idproduto WHERE ip.idusuario = :iduser");
            //executa o sql e verifica se deu aldo de errado
            $get->bindValue( ":iduser", $param['iduser'], PDO::PARAM_INT );
            if($get->execute()) {
                $result = $get->fetchAll();
                return $result;
            }
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }

    public function deletecartitem($param) {
        //verifica  se não algum erro na conexão.
        if(gettype($this->conect) == "object") {
            //perarando o sql a ser executado
            $insert = $this->conect->prepare("DELETE FROM item_pedido WHERE idusuario= :id AND idproduto = :idproduto");
            //executa o sql e verifica se deu (aldo de errado
            if($insert->execute($param)) return true;
            throw new Exception("[ATENÇÃO]Erro de execução", 30);
        }
        return $this->conect;//retorna o erro caso haja.
    }
}
