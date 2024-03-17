<?php
namespace App\http\request;
use src\Slug;
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

       // if(empty($param->loja)) throw new \Exception("Ops algo deu errado!", 3);
        if(empty($param->name)) throw new \Exception("Esse campo deve ser preenchido!", 2);
        if(empty($param->preco)) throw new \Exception("Esse campo deve ser preenchido!", 2);
        if(empty($param->quantidade)) throw new \Exception("Esse campo deve ser preenchido!", 2);

        if(empty($param->descricao)) $param->descricao = null;
        if(empty($param->foto)) $param->foto = null;
        $explode = explode(' ', $param->name);
        $result = ['name'=> $param->name, 'descricao' => $param->descricao, 'preco' => intval($param->preco), 'quantidade' => $param->quantidade, 'foto' => $param->foto, 'slug' => Slug::created($explode[0]),'disponivel' => true];
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
    static function descriptioRequest($request) {
        $description = [];
        $index = sizeof($request) - 5;
        for ($i=0; $i < $index; $i++) { 
            array_push($description, $request[$i]);
        }
        return $description;
    }
}