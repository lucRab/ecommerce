<?php
namespace App\http\request;
use stdClass;
use src\Slug;
/**
 * Classe resposavel pelas requisições para o usuario
 */
class RequestStore {
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
        if(empty($param->tell)) throw new \Exception("O campo telefone deve ser preencido!",2);

        if(strlen($param->name) < 3) throw new \Exception("O campo nome deve ter pelo menos 3 caracteres!", 2);
        if(strlen($param->password) < 3) throw new \Exception("O campo senha deve ter pelo menos 3 caracteres!", 2);
        $slug = Slug::created($param->name);

        if(empty($param->descricao)) $param->descricao = null;
        $result = ['name'=> $param->name, 'email'=> $param->email,'tell' => $param->tell,'descricao' => $param->descricao ,'password' =>password_hash($param->password, PASSWORD_BCRYPT), 'slug' => $slug];
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
        if(strlen($param->password) < 3) throw new \Exception("O campo senha deve ter pelo menos 3 caracteres!", 2);

        $result = [ 'name' => $param->name, 'email' => $param->email, 'password' => $param->password, 'id' => $param->id, 'descricao' => $param->descricao, 'tell' => $param->tell];
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
}