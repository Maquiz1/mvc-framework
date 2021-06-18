<?php

class User
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "Data@2020";
    private $dbname = "mvc-framework";

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

    public function register($data){
        // $this->db->query('INSERT INT users (username, email, password) 
        // VALUES(:username, :email, :password)');


        // //Bind values
        // $this->db->bind(':username', $data['username']);
        // $this->db->bind(':email', $data['email']);
        // $this->db->bind(':password', $data['password']);

        // //Execution
        // if($this->db->execute()){
        //     return true;
        // }else{
        //     return false;
        // }

        try {
            $dns = "mysql:host=".$this->servername.";dbname=".$this->dbname;
            $conn = new PDO($dns,$this->username, $this->password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'INSERT INTO users (username, email, password) VALUES(:username, :email, :password)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password']
                ]);
            print_r($data['username']);

            } catch(PDOException $e) {
            echo "this Error: " . $e->getMessage();
            }

            $conn = null;


    }


    public function login($username, $password){

                try {
            $dns = "mysql:host=".$this->servername.";dbname=".$this->dbname;
            $conn = new PDO($dns,$this->username, $this->password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->execute(
                [
                'username' => $username
                // 'password' => $password
                ]
            );

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();

            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }

            $conn = null;   
            
            return $result;



        // $this->db->query('SELECT * FROM users WHERE username = :username');

        // //Bind value
        // $this->db->bind(':username',$username);

        // $row = $this->db->single();

        // $hashedPassword = $row->password;

        // if(password_verify($password,$hashedPassword)){
        //     return true;
        // }else{
        //     return false;
        // }


    }

    public function getUsers(){
        try {
            $sql = "SELECT * FROM users";
            // var_dump($sql);
            $this->db->query($sql);
            $result = $this->db->resultSet();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }

        return $result;


    // //find the user by email.Email is passed in by the controller
    // public function findUserByEmail($email){
    //     //prepared statement
    //     $this->db->query('SELECT * FROM users WHERE email = :email');

    //     //EMail param will be binded with the email variable
    //     $this->db->bind(':email', $email);

    //     //check if email exists
    //     if($this->db->rowCount() > 0){
    //         return true;
    //     }else {
    //         return false;
    //     }

    // }



        // try {
        //     $dns = "mysql:host=".$this->servername.";dbname=".$this->dbname;
        //     $conn = new PDO($dns,$this->username, $this->password);

        //     // set the PDO error mode to exception
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     $stmt = $conn->prepare("SELECT * FROM users");
        //     $stmt->execute();

            // set the resulting array to associative
            // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // $result = $stmt->fetchAll();

            // } catch(PDOException $e) {
            // echo "Error: " . $e->getMessage();
            // }

            // $conn = null;   
            
            // return $result;

    }
}

?>