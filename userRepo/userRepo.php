<?php
    include_once __DIR__ . '/../database/database.php';


    
    


    class userRepo
    {
        private $connection;

        function __construct()
        {
            $conn = new Database();
            $this->connection = $conn->getConnection();
        }

        function insertUser($user)
        {
            $conn = $this->connection;


            $username = $user->getUsername();
            $password = $user->getPassword();
            $email = $user->getEmail();



            $sql = "INSERT INTO users (username, password, email) 
                        VALUES(?,?,?)";
            try {
                $statement = $conn->prepare($sql);
                $statement->execute([$username, $password, $email]);
            } catch (PDOException $e) {
                echo "<script>alert('Error Inserting user!!!" . $e->getMessage() . "')</script>";
            }
        }


        function getUserByEmail($email)
        {
            $conn = $this->connection;
            $sql = "SELECT * FROM users WHERE email = ?";



            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute([$email]);

                return $stmt->fetch();
            } catch (PDOException $e) {
                echo "User doesnt exist!!!";
            }
        }

        
        function getAllUsers() {
            $conn = $this->connection;

            $sql = "SELECT * FROM users";

            $statement = $conn->query($sql); 
            $users = $statement->fetchAll(); 

            return $users; 
        }


    function countUsers(){
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) FROM users";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo "Error counting users: " . $e->getMessage();
        }
    }

        
    }
