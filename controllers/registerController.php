<?php
    include_once '../userRepo/userRepo.php';
    include_once '../model/User.php';
    

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // $user = new User($id,$username, $email, $hash);

        $userRepo = new userRepo();

        if ($userRepo->userExists($username, $email)) {
            echo "<script>
                    alert('User already exists! Please use a different username or email.');
                    window.location.href = '../public/View/signup.php';        
                </script>";
        } else {
            $user = new User(null, $username, $email, $hash);
            $userRepo->insertUser($user);
            
            header("Location: ../public/View/login.php");
            exit();
        }

        // $userRepo->insertUser($user);
        
        // header("Location: ../public/View/login.php");
        // exit();
       
    }



?>
