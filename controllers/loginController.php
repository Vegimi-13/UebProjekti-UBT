<?php

 
    include_once __DIR__ . '/../database/database.php';
    include_once __DIR__ . '/../userRepo/userRepo.php';
    session_start();
    $errorMessage ='';


    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])){
        $email = $_POST['email'];
        $password = $_POST["passwordField"];
        $rememberMe = isset($_POST['rememberMe']);

        try{
            $userRepo = new userRepo();

            $user = $userRepo->getUserByEmail($email);


            if($user && password_verify($password, $user["password"])){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION["email"] = $user['email'];
                $_SESSION["username"] = $user['username'];
                $_SESSION["role"] = $user['role'];
                if ($rememberMe) {
                    setcookie("remember_email", $email, time() + (86400 * 30), "/"); // 30 days expiration
                } else {
                    // Clear the cookie if Remember Me is not checked
                    setcookie("remember_email", "", time() - 3600, "/");
                }

                header("Location: ../public/index.php");
                exit();
            }else{
                $_SESSION["errorMessage"] = "Invalid password or username";
                header("Location: ../public/View/login.php");
            }
        }catch(Exception $e){
            $_SESSION["errorMessage"] = "An error has occurred!!1" .  $e->getMessage();
            header("Location: ../public/View/login.php");
            exit();
        }

    }



?>