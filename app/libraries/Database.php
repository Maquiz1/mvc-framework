<?php 
    class Database {
        private $dbHost = 'localhost';
        private $dbUser = 'root';
        private $dbPass = 'Data@2020';
        private $dbName = 'mvc-framework';

        private $statement;
        private $dbHandler;
        private $error;

        public function __construct(){
            $conn = 'mysql:host=' . $this->dbHost . ';dbName=' . $this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT = true,
                PDO::ATTR_ERRMODE = PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
                echo 'connected';
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

    }

?>