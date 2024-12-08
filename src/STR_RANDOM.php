<?php
namespace src;
/**
 * Classe para criar uma string aleatória
 */
class STR_RANDOM
{
    /**
     *  Método para criar um slug 
     *
     * @param string $name nome onde será gerado o slug
     * @return string retorna o slug gerado
     */
    public static function slug(string $name) {
        $slug = $name;
        if(str_contains($name, ' ')) $slug = str_replace(' ','-' , $name);
        $rand = self::str_random(7);
        $slug = strtolower($slug).$rand;
        return $slug;
    }
    /**
     * Método para gera uma string aleatória
     *
     * @param int $len_of_gen_str numero do tamanho da string gerada
     * @return string retorna a string gerada
     */
    static function str_random (int $len_of_gen_str){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789-";
        $var_size = strlen($chars);
        for( $x = 0; $x < $len_of_gen_str; $x++ ) {
            $random_str= $chars[ rand( 0, $var_size - 1 ) ];    
        }
        return $random_str;
    }
}
