<?php



   

    class Database{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "projekti_db";
       


        function getConnection(){
            try {
               $conn = new PDO("mysql:host={$this->host}; dbname={$this->dbname}", $this-> username, $this->password);
               $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
               return $conn;
            }catch(PDOException $e){
                echo "DATABASE CONNECTION FAILED!!!" . $e->getMessage();
            }
        }

    }




?>