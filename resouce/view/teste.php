<?php
use App\model\Product;

$teste = new Product();

$a = $teste->getByloja(['id' => 1]);

var_dump($a);