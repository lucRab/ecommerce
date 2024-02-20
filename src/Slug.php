<?php
namespace src;

class Slug
{
    public static function created(string $name) {
        $slug = $name;
        if(str_contains($name, ' ')) $slug = str_replace(' ','-' , $name);
        
        $slug = strtolower($slug).rand(0,999);
        return $slug;
    }
}
