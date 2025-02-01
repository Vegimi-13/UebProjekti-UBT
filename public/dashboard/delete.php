<?php
session_start();
include '../../config/config.php';
include_once '../../userRepo/userRepo.php';

$userId = intval($_GET['id']); 

$userRepository = new userRepo();
$is_current_user = ($_SESSION['user_id'] == $userId); 

// Attempt to delete the user
if ($userRepository->deleteUser($userId)) {

    if($is_current_user){
        session_destroy();
        header("Location:" . BASE_URL . 'View/login.php?msg=UserDeleted');
        exit();
    }else{
        header("Location: dashboard.php?msg=UserDeleted"); 
        exit();
    }
    
    
} else {
    die("Error: Could not delete user.");
}
?>

?>
