<?php

class User extends Database {
    private $db;
    public function __construct() {
        $this->db = new Database ;
    }
}

?>