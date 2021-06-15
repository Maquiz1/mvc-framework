<?php

class User {
    private $db;
    public function __construct() {
        try{
            $this->db = new Database;

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
        return $this->db;         
    }

    public function getUsers(){
        try{
            $this->db->query("SELECT * FROM users");
            $result = $this->db->resultSet();

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }

        return $result;
    }
}

?>