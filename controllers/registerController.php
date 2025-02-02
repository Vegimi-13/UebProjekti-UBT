<?php
    include_once '../userRepo/userRepo.php';
    include_once '../model/User.php';
    

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $user = new User($id,$username, $email, $hash);

        $userRepo = new userRepo();

        $userRepo->insertUser($user);
        
        header("Location: ../public/View/login.php");
        exit();
       
    }



?>
