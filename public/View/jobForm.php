<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ./View/login.php");
        exit();
    }

    



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>

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
            row-gap: 20px;
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
            width: 15
            0px;
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
        .company-logo-name{
            display: flex;
            flex-direction: row;
            gap: 25px;
            text-align: center;
            align-items: center;
        }

        @media (max-width: 576px) {
            /* Styles for tablets */


        }
    </style>
</head>

<body>
    <div class="container">


        <h3>Post a New Job</h3>
        <form action="../../controllers/job_controller.php" method="post" enctype="multipart/form-data">

            <div class="company-logo-name">

            
                <label>Company Logo:</label>
                <input type="file" name="company_logo" required><br><br>

                <label>Company Name:</label>
                <input type="text" name="company_name" required><br><br>

            </div>
            

            <label for="">Company Description</label>
            <textarea name="company_desc" rows="4" required> </textarea>
            <div class="company-logo-name">

            

                <label>Job Title:</label>
                <input type="text" name="job_title" required><br><br>

                <label>Job Description:</label><br>
                <textarea name="job_description" rows="4" required></textarea><br><br>

            </div>  
            <div class="company-logo-name">

           
                <label>Salary:</label>
                <input type="text" name="salary" required><br><br>

                <label for="">Location:</label>
                <input type="text" name="location" required>

                <label>Job Type:</label>
                <select name="job_type" required>
                    <option value="Remote">Remote</option>
                    <option value="On-site">On-site</option>
                    <option value="Hybrid">Hybrid</option>
                </select><br><br>
            </div>
            <input type="hidden" name="job_post" value="<?php echo htmlspecialchars($_GET['job_post'] ?? 'free'); ?>">


            <button type="submit" name="submit">Post Job</button>
        </form>
    </div>
</body>

</html>