<?php
 namespace src\radical;

 class get extends sql
 {
    public $table;
    public $column = "*";
    public $param = null;

    public $join = null;

    public function __construct($n_table) {
        $this->table = $n_table;
    }

    public function all() {
        $this->values = "*";
        $this->param = null;
    }
 }
 