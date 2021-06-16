<?php

class User
{

    private $servername = "";
    private $username = "";
    private $password = "";
    private $dbname = "";

    private $db;
    public function __construct(){
        try {
            $this->db = new Database;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
        return $this->db;
    }

    public function getUsers(){
        // try {
        //     $sql = "SELECT * FROM users";
        //     // var_dump($sql);
        //     $this->db->query($sql);
        //     $result = $this->db->resultSet();
        // } catch (PDOException $e) {
        //     $this->error = $e->getMessage();
        //     echo $this->error;
        // }

        // return $result;





        try {
            $dns = "mysql:host=".$this->servername.";dbname=".$this->dbname;
            $conn = new PDO($dns,$this->username, $this->password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users");
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();

            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }

            $conn = null;   
            
            return $result;

    }
}

?>