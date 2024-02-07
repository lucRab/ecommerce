<?php
namespace src;
/**
 * Classe responsavevel por registar as views a serem rederizadas
 */
class LoadPages {
    /**
     * Método para registrar a view de login
     */
    public function LoginPage() {
        return Plates::view('form/login');
    }
    /**
     * Método para registar a view dos usuarios
     */
    public function UserPage() {
       return Plates::view('user');
    }
    /**
     * Método para registrar a view de cadastro
     */
    public function CadastroPage() {
        return Plates::view('form/cadastro');
    }
    /**
     * Método para registrar a view home
     */
    public function HomePage() {
        return Plates::view('home');
    }
    /**
     * Método para registrar a view de cadastro de loja
     */
    public function CadastroLojaPage() {
        return Plates::view('form/cadastroloja');  
    }
    /**
     * Método para registrar a view produto
     */
    public function ProdutoPage() {
        return Plates::view('produto');
    }
    /**
     * Método para registrar a view de cadastro de item
     */
    public function CadastroItemPage() {
        return Plates::view('form/cadastroitem');
    }
    /**
     * Método para registar a view loja 
     */    
    public function LojaPage() {
        return Plates::view('loja');
    }
}