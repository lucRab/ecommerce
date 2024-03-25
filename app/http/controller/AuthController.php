<?php
namespace App\http\controller;
use Dotenv\Dotenv;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
/**
 * Classe de autorização de usuario
 */            
class AuthController {
    
    static private function loadEnv() {
        $dotenv = Dotenv::createImmutable(dirname(__FILE__,4));
        $dotenv->load();
    }
    /**
     * Método para cria o token do usuario
     *
     * @param array $data dados do usuario
     * @return string token do usuario
     */
    static public function userToken(array $data) {
        self::loadEnv();
        $payload = [
            'exp' => time() + 100000000,
            'iat' => time(),
            'name' => $data['name'],
            'slug' => $data['slug'],
            'id' => $data['iduser'],
            'type' => 0,
        ];

        
        $encode = JWT::encode($payload, $_ENV['KEY'],'HS256');
        setcookie('token', $encode, time() + 100000000000,);
        return $encode;
    }
    /**
     * Método para cria o token da loja
     *
     * @param array $data dados da loja
     * @return string token da loja
     */
     static public function storeToken(array $data) {
        self::loadEnv();
        $payload = [
            'exp' => time() + 100000000,
            'iat' => time(),
            'name' => $data['name'],
            'slug' => $data['slug'],
            'id' => $data['idloja'],
            'type' => 1,
        ];

        
        $encode = JWT::encode($payload,$_ENV['KEY'],'HS256');
        setcookie('token', $encode, time() + 100000000000,);
        return $encode; 
    }
    /**
     * Método para decodificar o token
     *
     * @param string $token token a ser docodificado
     */
    static public function decodedToken($token) {
        self::loadEnv();
        try {  
            if(!$decoded = JWT::decode($token, new Key($_ENV['KEY'], 'HS256'))) {
                throw new Exception("Toke invalido");    
            }
            if (empty($_SESSION)) {
                $_SESSION['id'] = $decoded->id;
                $_SESSION['name'] = $decoded->name;
                $_SESSION['slug'] = $decoded->slug;
                $_SESSION['type'] = $decoded->type;
            }
            return true;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
