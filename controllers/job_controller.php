<?php

session_start();


include_once '../userRepo/userRepo.php';
include_once '../model/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    // Debugging: Check file details
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    // Get data from the form
    $company_name = $_POST["company_name"];
    $company_desc = $_POST["company_desc"];
    $job_title = $_POST["job_title"];
    $job_description = $_POST["job_description"];
    $salary = $_POST["salary"];
    $job_type = $_POST["job_type"];

    $job_post = $_POST["job_post"];
    // echo "Job Post: " . $job_post;

    

    // Ensure uploads directory exists
    $target_dir = '../public/assets/uploads/';
    

   
    // Define file path
    $target_file = $target_dir . basename($_FILES["company_logo"]["name"]);

    // Check if file was uploaded
    if (!is_uploaded_file($_FILES["company_logo"]["tmp_name"])) {
        echo "Error: File was not uploaded properly.";
        exit();
    }

    // Move file to uploads folder
    if (move_uploaded_file($_FILES["company_logo"]["tmp_name"], $target_file)) {
        echo "File successfully uploaded to: " . $target_file;
        $company_logo = str_replace(__DIR__ . '/../', '', $target_file); // Store relative path
    } else {
        echo "Error moving file! Check folder permissions.";
        exit();
    }
    
    $created_by = $_SESSION['user_id']; 

    // Create Job object
    $job = new Job($company_logo, $company_name, $job_title, $company_desc, $job_description, $salary, $job_type, $created_by, $job_post);
    echo "Job object is ready to be inserted!<br>";
    print_r($job);


    // Insert Job into database
    $jobRepo = new userRepo();
    $jobRepo->insertJob($job);

    


    // Redirect to job posting page
    header("Location: ../public/index.php");
    exit();
}




?>