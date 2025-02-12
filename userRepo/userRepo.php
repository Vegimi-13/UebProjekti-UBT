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



            $sql = "INSERT INTO users (username,email ,password) 
                        VALUES(?,?,?)";
            try {
                $statement = $conn->prepare($sql);
                $statement->execute([$username, $email, $password]);
            } catch (PDOException $e) {
                echo "<script>alert('Error Inserting user!!!" . $e->getMessage() . "')</script>";
            }
        }

        function getUserById($id) {
            $conn = $this->connection;
    
         
            $sql = "SELECT * FROM users WHERE id='$id'";
    
            $statement = $conn->query($sql); 
            $user = $statement->fetch(); 
    
            return $user;
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
    function insertJob($job)
        {
            $conn = $this->connection;

            $company_logo = $job->getCompanyLogo();
            $company_name = $job->getCompanyName();
            $job_title = $job->getJobTitle();
            $company_desc = $job->getCompanyDesc();
            $job_description = $job->getJobDescription();
            $salary = $job->getSalary();
            $location = $job->getLocation();
            $job_type = $job->getJobType();
            $created_by = $job->getCreatedBy();
            $job_post = $job->getJobPost();

            $sql = "INSERT INTO jobs (company_logo, company_name, job_title, company_desc, job_description, salary, location, job_type, created_by, job_post)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

            try {
                // Prepare and execute the statement
                $statement = $conn->prepare($sql);
                $statement->execute([$company_logo, $company_name, $job_title, $company_desc, $job_description, $salary,$location, $job_type, $created_by, $job_post]);

                echo "Job successfully inserted into the database!";
            } catch (PDOException $e) {
                // Debugging: catch and display any errors
                echo "Error: " . $e->getMessage();
            }
        }
    


    function getJobs()
    {
        $conn = $this->connection;

        $sql = "SELECT jobs.*, users.username AS creator_name
            FROM jobs
            JOIN users ON jobs.created_by = users.id
            WHERE jobs.job_post = 'premium'
            LIMIT 9";
        try {
            $statement = $conn->query($sql);
            $jobs = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all jobs
            return $jobs;
        } catch (PDOException $e) {
            echo "Error fetching jobs: " . $e->getMessage();
            return [];
        }
    }

    function countJobs(){
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) FROM jobs";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo "Error counting users: " . $e->getMessage();
        }
    }




    function deleteUser($id) {
        $conn = $this->connection;

      
        $sql = "DELETE FROM users WHERE id=?";

        $statement = $conn->prepare($sql); 

       
        return $statement->execute([$id]);
        

       
        echo "<script>alert('Delete was successful');</script>";
    }


    function updateUser($id, $username, $email,$package, $role) {
        $conn = $this->connection;


        $sql = "UPDATE users SET username=?, email=?,package=?, role=? WHERE id=?";

        $statement = $conn->prepare($sql); 

      
        $statement->execute([ $username,$email, $package,$role, $id]);

      
        echo "<script>alert('Update was successful');</script>";
    }

    function getUserPackage($id) {
        $conn = $this->connection;
    
        $sql = "SELECT package FROM users WHERE id = ?";
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $package = $stmt->fetchColumn(); // Fetch only the package column
    
            return $package; // Returns 'basic' or 'premium'
        } catch (PDOException $e) {
            echo "Error fetching package: " . $e->getMessage();
            return null;
        }
    }

    function getFreeJobs()
    {
        $conn = $this->connection;

        $sql = "SELECT jobs.*, users.username AS creator_name
        FROM jobs
        JOIN users ON jobs.created_by = users.id";
        try {
            $statement = $conn->query($sql);
            $jobs = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all jobs
            return $jobs;
        } catch (PDOException $e) {
            echo "Error fetching jobs: " . $e->getMessage();
            return [];
        }
    }

    public function userExists($username, $email) {
        $conn = $this->connection;
    
        $sql = "SELECT id FROM users WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $email]);
        
        return $stmt->fetch() ? true : false;
    }


    

        
    }
