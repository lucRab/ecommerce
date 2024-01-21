<?php
namespace App\http\request;
use stdClass;
/**
 * Classe resposavel pelas requisições para o usuario
 */
class RequestProduct {
    /**
     * Métodos responsavel por definir a requisição na criação de um usuário
     *
     * @param stdClass $param - dados enviados
     * @return array
     */
    static function createRequest(stdClass $param) {

        if(empty($param->loja)) throw new \Exception("Ops algo deu errado!", 3);
        if(empty($param->name)) throw new \Exception("Esse campo deve ser preenchido!", 2);
        if(empty($param->preco)) throw new \Exception("Esse campo deve ser preenchido!", 2);
        if(empty($param->quantidade)) throw new \Exception("Esse campo deve ser preenchido!", 2);

        if(empty($param->descricao)) $param->descricao = null;
        $result = ['idloja'=> $param->loja, 'name'=> $param->name, 'descricao' => $param->descricao, 'preco' => $param->preco, 'quantidade' => $param->quantidade, 'disponivel' => true];
        return $result;
    }
    /**
     * Métodos responsavel por definir a requisição na atualização de um usuário
     *
     * @param stdClass $param - dados enviados
     * @return array
     */
    static function updateRequest(stdClass $param) { 
        
        if(strlen($param->name) < 3) throw new \Exception("O campo nome deve ter pelo menos 3 caracteres!", 2);

        $result = ['name'=> $param->name, 'preco' => $param->preco, 'quantidade' => $param->quantidade];
        return $result;
    }
    /**
     * Métodos responsavel por definir a requisição na deleção de um usuário
     *
     * @param stdClass $param - dados enviados
     * @return array
     */
    static function destroyRequest(stdClass $param ) {
        $result = [ 'id' => $param->id];
        return $result;
    }

}