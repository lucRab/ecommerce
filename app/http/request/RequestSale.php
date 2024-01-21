<?php
namespace App\http\request;
use stdClass;
/**
 * Classe resposavel pelas requisições para o usuario
 */
class RequestSale {
    /**
     * Métodos responsavel por definir a requisição na criação de um usuário
     *
     * @param stdClass $param - dados enviados
     * @return array
     */
    static function createRequest(stdClass $param) {

        if(empty($param->user)) throw new \Exception("Ops algo deu errado!", 3);
        if(empty($param->tipoPagamento)) throw new \Exception("Ops algo deu errado!", 3);
        if(empty($param->dataVenda)) throw new \Exception("Ops algo deu errado!", 3);
        if(empty($param->valorTotal)) throw new \Exception("Ops algo deu errado!", 3);

        $result = ['iduser'=> $param->user, 'idtipo_pagamento'=> $param->tipoPagamento, 'data_venda' => $param->dataVenda,
        'valor_total' => $param->valorTotal];
        return $result;
    }
    /**
     * Métodos responsavel por definir a requisição na atualização de um usuário
     *
     * @param stdClass $param - dados enviados
     * @return array
     */
    static function updateRequest(stdClass $param) {
        if(empty($param->dataVenda)) throw new \Exception("Ops algo deu errado!", 3);
        if(empty($param->valorTotal)) throw new \Exception("Ops algo deu errado!", 3);

        $result = ['data_venda' => $param->dataVenda,
        'valor_total' => $param->valorTotal];
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

    static function itensPedido(array $param) {
        $quantidade = count($param);
        $itens = [];
        for ($i=0; $i < $quantidade; $i++) { 
            if(!empty($param[$i])) {
                array_push($itens, $param[$i]);
            }
        }
        return $itens;
    }

}