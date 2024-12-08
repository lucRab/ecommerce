<?php
namespace App\http\request;
use stdClass;
use src\STR_RANDOM;

/**
 * Classe resposavel pelas requisições para o usuario
 */
class RequestUser {
    /**
     * Métodos responsavel por definir a requisição na criação de um usuário
     *
     * @param stdClass $param - dados enviados
     * @return array
     */
    static function createRequest(stdClass $param) {
        if(empty($param->name)) throw new \Exception("O campo nome deve ser preenchido!", 2);
        if(empty($param->password)) throw new \Exception("O campo senha deve ser preenchido!", 2);
        if(empty($param->email)) throw new \Exception("O campo email deve ser preenchido!", 2);
        if(empty($param->tell)) throw new \Exception("O campo telefone deve ser preenchido!", 2);
        if(empty($param->cpf)) throw new \Exception("O campo cpf deve ser preenchido!", 2);

        if(strlen($param->name) < 3) throw new \Exception("O campo nome deve ter pelo menos 3 caracteres!", 2);
        if(strlen($param->password) < 3) throw new \Exception("O campo senha deve ter pelo menos 3 caracteres!", 2);
        $slug = STR_RANDOM::slug($param->name);

        $result = ['name'=> $param->name, 'email'=> $param->email,'tell' => $param->tell, 'cpf' => $param->cpf,'password' =>password_hash($param->password, PASSWORD_BCRYPT),'slug' => $slug];
        return $result;
    }
    /**
     * Métodos responsavel por definir a requisição na atualização de um usuário
     *
     * @param stdClass $param - dados enviados
     * @return array
     */
    static function updateRequest(stdClass $param) {

        $result = [ 'name' => $param->name, 'email' => $param->email, 'tell' => $param->tell, 'cpf' => $param->cpf];
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

    static function loginRequest(stdClass $param) {
        if(empty($param->password)) throw new \Exception("O campo senha deve ser preenchido!", 2);
        if(empty($param->email)) throw new \Exception("O campo email deve ser preenchido!", 2);
        if(strlen($param->password) < 3) throw new \Exception("O campo senha deve ter pelo menos 3 caracteres!", 2);

        $result = ['email'=> $param->email, 'password' =>$param->password];
        return $result;
    }

    static function createEnderecoRequest(stdClass $param) {
        if(empty($param->endereco)) throw new \Exception("O campo Endereco deve ser preenchido!", 2);
        if(empty($param->cep)) throw new \Exception("O campo CEP deve ser preenchido!", 2);
        if(empty($param->id)) throw new \Exception("Não autorizado!", 2);

        $result = ['endereco'=> $param->endereco, 'cep'=> (int) $param->cep,'iduser' => (int) $param->id];
        return $result;
    }
    static function updateEnderecoRequest(stdClass $param) {
        if(empty($param->endereco)) throw new \Exception("O campo nome deve ser preenchido!", 2);
        if(empty($param->cep)) throw new \Exception("O campo senha deve ser preenchido!", 2);
        if(empty($param->id)) throw new \Exception("O campo email deve ser preenchido!", 2);

        $result = ['endereco'=> $param->endereco, 'cep'=> $param->cep,'iduser' => $param->id];
        return $result;
    }
}