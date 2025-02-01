<?php
session_start();
$userId = intval($_GET['id']);

include_once '../../userRepo/userRepo.php';


$userRepository = new userRepo();
$user = $userRepository->getUserById($userId);

if(!(isset($_SESSION["role"]) && $_SESSION["role"] === "admin")){
    header("Location: " . BASE_URL . "index.php");
    exit(); 
}



if (isset($_POST['editBtn'])) {
    $id = $user['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];


    $userRepository->updateUser($id, $username, $email, $role);
    header("location:../dashboard/dashboard.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container>h3 {
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding: 25px;
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            min-width: 300px;
            border: 1px solid #eaebf3;
            box-shadow: 0 1px 6px #9c9fb526;
            border-radius: 6px;
            flex-shrink: 1;
        }

        label {
            display: inline-block;
            width: 100px;
        }

        input {
            padding: 8px 12px;
            height: 20px;    
            margin-bottom: 0;
            font-size: 14px;
            outline: 0;
            border-radius: 6px;
            border: 1px solid #eaebf3;
            color: #6e7186;
            transition: box-shadow .3s, color .3s, border-color .3s;
        }

        form>input:focus {
            border-color: #7B66FF;
            color: #232535;
        }

        form>input:hover {
            border-color: #a0a2b3;
            box-shadow: 0 2px 12px 0 #9c9fb521;
        }

        #editButton {
            width: 100%;
            background-color: #7B66FF;
            color: white;
            cursor: pointer;
            height: 31px;

            transition: background-color 0.3s ease, color 0.3s ease
        }

        #editButton:hover {
            background-color: white;
            color: #7B66FF;
        }

        select {
            border-radius: 0;
            border-color: #7B66FF;
            width: 100%;
            height: 30px;
        }

        @media (max-width: 576px) {
            /* Styles for tablets */


        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Edit User</h3>
        <form action="" method="post">

            <label class="labels">User ID:</label>
            <input type="text" name="id" value="<?= htmlspecialchars($user['id']) ?>" readonly placeholder="ID"> <br>



            <label for="username">Username:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required placeholder="Enter your new Username"> <br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required placeholder="Enter your new Email"> <br>

            <label for="role">Role:</label>
            <select name="role" required>
                <option value="user" <?= ($user['role'] == 'user') ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
            </select> <br>

            <input id="editButton" type="submit" name="editBtn" value="Save Changes"> <br><br>
        </form>

    </div>
</body>

</html>