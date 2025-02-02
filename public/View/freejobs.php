<?php

include_once '../../userRepo/userRepo.php';


$jobRepo = new userRepo();

$jobs = $jobRepo->getFreeJobs();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset.css">
    <style>
        /* FONT */
        @import url('https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

        /* ------------------------------------------------ */

        .container {
            display: flex !important;
            flex-direction: column;
            align-items: center;
            
        }
        .container > h1{
            font-family: "Bai Jamjuree", serif;
            font-weight: 500;
            font-style: normal;
            margin-top: 20px;
        }

        .job-cards {
            display: flex;
            flex-wrap: wrap;
            row-gap: 30px;
            justify-content: space-between;
            width: 74%;
            margin-top: 40px;
        }

        .cards {
            padding: 8px 20px 8px 8px;
            width: 500px;
            height: 145px;
            display: flex;
            font-family: "Inter", sans-serif !important;
            font-optical-sizing: auto !important;
            font-style: normal !important;
            letter-spacing: .06em;
            font-weight: 600;
            line-height: 1.25em;

        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 126px;
            height: 126px;
            background-color: #F4F9FF
        }

        .content {
            height: 126px;
            margin-left: 10px;
            width: 280px;
            height: 94px;
            align-self: center;
        }
        .content > div > h4{
            font-size: 12px;
            color: #a0a2b3;
            margin: 0px 0px 8px;
        }
        .content > div > h3 {
            color: #232535;
            font-size: 18px;
            margin: 0px 0px 16px !important;
        }

        .tags{
            margin-top: 0px !important;
        }
        .tags > #location> svg{
            color: #7B66FF !important;
            width: 16px;
            margin-right: 4px;
        }
        .tags > #location > p{
            font-size: 12px !important;
            color: #232535 !important;
        
        }
    </style>
</head>

<body>
    <?php include '../partials/header.php' ?>

    <div class="container">
        <h1>All jobs</h1>
        <div class="job-cards">
            <?php foreach ($jobs as $job): ?>
                <div class="cards">

                    <div class="logo">
                        <img style="width: 64px; height: 64px; border-radius:5px" src="../<?php echo $job['company_logo']  ?>" alt="Could not retrieve data">

                    </div>
                    <div class="content">
                        <div>
                            <h4><?php echo $job['company_name'] ?></h4>
                        </div>
                        <div>
                            <h3><?php echo $job['job_title'] ?></h3>
                        </div>
                        <div class="tags">
                            <div id="location"><svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 22C16 18 20 14.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 14.4183 8 18 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p><?php echo $job['location'] ?></p>
                            </div>
                            <div id="location"><svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 9H11.5C10.6716 9 10 9.67157 10 10.5C10 11.3284 10.6716 12 11.5 12H12.5C13.3284 12 14 12.6716 14 13.5C14 14.3284 13.3284 15 12.5 15H10M12 8V9M12 15V16M18 12H18.01M6 12H6.01M2 8.2L2 15.8C2 16.9201 2 17.4802 2.21799 17.908C2.40973 18.2843 2.71569 18.5903 3.09202 18.782C3.51984 19 4.07989 19 5.2 19L18.8 19C19.9201 19 20.4802 19 20.908 18.782C21.2843 18.5903 21.5903 18.2843 21.782 17.908C22 17.4802 22 16.9201 22 15.8V8.2C22 7.0799 22 6.51984 21.782 6.09202C21.5903 5.7157 21.2843 5.40974 20.908 5.21799C20.4802 5 19.9201 5 18.8 5L5.2 5C4.0799 5 3.51984 5 3.09202 5.21799C2.7157 5.40973 2.40973 5.71569 2.21799 6.09202C2 6.51984 2 7.07989 2 8.2ZM18.5 12C18.5 12.2761 18.2761 12.5 18 12.5C17.7239 12.5 17.5 12.2761 17.5 12C17.5 11.7239 17.7239 11.5 18 11.5C18.2761 11.5 18.5 11.7239 18.5 12ZM6.5 12C6.5 12.2761 6.27614 12.5 6 12.5C5.72386 12.5 5.5 12.2761 5.5 12C5.5 11.7239 5.72386 11.5 6 11.5C6.27614 11.5 6.5 11.7239 6.5 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                </svg>
                                <p>$<?php echo $job['salary'] ?></p>
                            </div>

                        </div>


                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>