<?php
require "../vendor/autoload.php";
require "Database.php";
use Database\Database;

//--------------------------------------------|| START ||----------------------------------------------//
    Database::start();
//-----------------------------------------|| BANCO  USER||--------------------------------------------//
    // Database::$table->id();
    // Database::$table->string('name');
    // Database::$table->string('email', '80','UNIQUE');
    // Database::$table->string('password','100');

    // Database::create('usuario');
//----------------------------------------------------------------------------------------------------//

//------------------------------------------|| REFRESH ||---------------------------------------------//
//  Database::refresh();
//----------------------------------------------------------------------------------------------------//

//-------------------------------------------|| DROP ||-----------------------------------------------//
//  Database::drop();
//  Database::dropAll();
//---------------------------------------------------------------------------------------------------//
    
    Database::$table->int('idproduto');
    Database::$table->string('descricao');
    Database::create('descricao');