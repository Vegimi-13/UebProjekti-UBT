<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
if(!(isset($_SESSION["role"]) && $_SESSION["role"] === "admin")){
    header("Location: " . BASE_URL . "index.php");
    exit(); 
}




include_once '../../userRepo/userRepo.php';

$userRepo = new userRepo();

$users = $userRepo -> getAllUsers();
$jobs = $userRepo ->getFreeJobs();

$userCount = $userRepo ->countUsers();
$jobCount = $userRepo->countJobs();




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <title>Document</title>

</head>

<body>




    <div class="sidebar">
        <div class="navbar-logo">
            <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M36.9997 20.0416L50.8747 12.3333L66.2913 21.4181V54.1234L52.4163 63.2083L21.583 44.7083V27.7499L52.4163 45.0386V29.2916L36.9997 20.0416ZM36.9997 20.0416L23.1247 12.3333L7.70907 21.5833L7.70801 53.9583L23.1247 63.2083L36.9997 53.9583"
                    stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <a href="<?php echo BASE_URL ?>/index.php">Devjobs</a>
        </div>


        

        



        <div class="links">
            <a href="#" onclick="showContent('stats')">Stats</a>
            <a href="#" onclick="showContent('users')">Users</a>
            <a href="#" onclick="showContent('jobs')">Jobs</a>
            <a href="#" onclick="showContent('options')">Options</a>

        </div>


    </div>

    <div class="content">
        <div id="stats" class="content-section ">
            <p>Statistics</p>
            
            <div class="stats-card shine-effect">
                <h1>User stats</h1>
                <hr>
                <h3>Number of users registered: </h3>
                <h3 id="count"><?php echo $userCount?></h3>
               
            </div>
            <div class="stats-card shine-effect">
                <h1>Total Job Listings</h1>
                <hr>
                <h3>Number of active job postings</h3>
                <h3 id="count"><?php echo $jobCount?></h3>
            </div>
        </div>

        <div id="users" class="content-section hidden">
            <h1>Users</h1>
            
            <table id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th>PACKAGE</th>
                        <th>DATE CREATED</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td><?php echo htmlspecialchars($user['package']); ?></td>
                            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                            <td colspan="3" id="editBTN"><a  href="edit.php<?php echo"?id=$user[id]"?>">EDIT</a></td>
                            <td id="deleteBTN"><a href="delete.php<?php echo"?id=$user[id]"?>">DELETE</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <div id="jobs" class="content-section hidden">
            <h1>Jobs</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>COMPANY NAME</th>
                        <th>Job Title</th>
                        <th>Job Description</th>
                        <th>Salary</th>
                        <th>Job Type</th>
                        <th>Created By</th>
                        <th>Created at</th>
                        <th>Location</th>
                        <th>Job post</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jobs as $job): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($job['id'])?></td>
                            <td><?php echo htmlspecialchars($job['company_name'])?></td>
                            <td><?php echo htmlspecialchars($job['job_title'])?></td>
                            <td><?php echo htmlspecialchars($job['job_desc'])?></td>
                            <td><?php echo htmlspecialchars($job['salary'])?></td>
                            <td><?php echo htmlspecialchars($job['job_type'])?></td>
                            <td><?php echo htmlspecialchars($job['creator_name'])?></td>
                            <td><?php echo htmlspecialchars($job['created_at'])?></td>
                            <td><?php echo htmlspecialchars($job['location'])?></td>
                            <td><?php echo htmlspecialchars($job['job_post'])?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        </div>


        <div id="options" class="content-section hidden">
            <h1>Options</h1>
            <p>Settings and configurations...</p>
        </div>
    </div>


    <script>
        function showContent(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>


    






</body>

</html>