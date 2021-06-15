<?php 
    class Database {
        private $dbHost = '';
        private $dbUser = '';
        private $dbPass = '';
        private $dbName = '';

        private $statement;
        private $dbHandler;
        private $error;

            
            public function __construct(){   
                $conn = "mysql:host=".$this->dbHost.";dbname=".$this->dbName;
    
                try {

                    $this->dbHandler = new PDO($conn,$this->dbUser, $this->dbPass);
    
                    // set the PDO error mode to exception
                    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // return $conn;
    
                    } catch(PDOException $e) {
                      echo "Connection failed: " . $e->getMessage();
                    }

                    return $this->dbHandler;
            } 


       


        // Alows to write queries
        public function query($sql){
            $this->statement = $this->dbHandler->prepare($sql);
        }

        //bind values
        public function bind($parameter, $value, $type = null){
            switch (is_null($type)){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }

            $this->statement->bindValue($parameter, $value, $type);
        }


        // //EXECUTE PREPARED STATEMENT
        public function execute() {
            return $this->statement->execute();
        }

        //RETURN ARRAY
        public function resultSet() {
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        // //RETURN A SPECIFIC RWO AS AN OBJECT
        public function single() {
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        // //Get the row count
        public function rowCount() {
            return $this->statement->rowCount();
        }

    }

?>