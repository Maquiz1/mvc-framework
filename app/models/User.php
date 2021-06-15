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



// try {

//     $stmt = $conn->prepare("SELECT * FROM posts");
//     $stmt->execute();

//     // set the resulting array to associative
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     while($result){
//       return $result;
//     }

//   } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
//   }
//   $conn = null;

?>