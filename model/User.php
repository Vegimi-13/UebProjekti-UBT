<?php



    class User{
        private $id;
        private $username;
        private $email;
        private $password;
        private $role;
        
        public function __construct($username, $email, $password)
        {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }




        function getUsername() {
            return $this->username;
        }
    
        function getEmail() {
            return $this->email;
        }
    
        function getPassword() {
            return $this->password;
        }
    }


?>