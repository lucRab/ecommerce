<?php
namespace App\http\controller;
use Dotenv\Dotenv;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
            

class AuthController {
    
    static private function loadEnv() {
        $dotenv = Dotenv::createImmutable(dirname(__FILE__,4));
        $dotenv->load();
    }
    static public function userToken(array $data) {
        self::loadEnv();
        $payload = [
            'exp' => time() + 1000,
            'iat' => time(),
            'name' => $data['name'],
            'id' => $data['iduser'],
        ];

        
        $encode = JWT::encode($payload, $_ENV['KEY'],'HS256');
        setcookie('token', $encode, time() + 10000,);
        return $encode;
    }
     static public function storeToken(array $data) {
        self::loadEnv();
        $payload = [
            'exp' => time() + 1000,
            'iat' => time(),
            'name' => $data['name'],
            'slug' => $data['slug'],
            'id' => $data['idloja'],
        ];

        
        $encode = JWT::encode($payload,$_ENV['KEY'],'HS256');
        setcookie('token', $encode, time() + 10000,);
        return $encode; 
    }
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
            }
            return true;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
