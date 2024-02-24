<?php
 namespace src\radical;

 class get
 {
    public $values = "*";
    public $param = null;
    public $table;

    public function __construct($n_table) {
        $this->table = $n_table;
    }

    public function where(string $value1, string $condision, $value2) {
        $this->param = " WHERE ".$value1." ".$condision." ".$value2;
    }

    public function all() {
        $this->values = "*";
        $this->param = null;
    }

    public function values(string $values) {
        $this->values = $values;
    }
 }
 