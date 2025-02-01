<?php
    session_start();
    require_once __DIR__ . '/../config/config.php'; 
    include_once '../userRepo/userRepo.php';
    $userRepo = new userRepo();
    $user_id = $_SESSION['user_id'] ?? null;
    $package = $userRepo->getUserPackage($user_id);

    
    $disable_post_job = !$user_id; // Only check if user is logged in
    $disable_premium_button = !$user_id || $package === 'basic'; 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DevJobs</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="stylesheet" href="css/reset.css">

</head>

<body>

    <div>

    <?php   include('../public/partials/header.php')   ?>


        <div class="hero-aboutus">
            <div class="inner-hero">
                <h1 id="her-title">About our company</h1>
                <p>Our platform connects skilled developers with top employers, simplifying job searches and empowering
                    tech professionals to achieve their dream roles effortlessly. Join us!</p>

                <div id="buttonat">
                    <a href="<?php echo BASE_URL ?>View/jobForm.php">
                        <input type="submit" value="Post a free job" id="post-job" <?php echo $disable_post_job ? 'disabled' : ''; ?>>
                    </a>
                   
                    <a href="<?php echo BASE_URL ?>View/freeJob.php">
                        <input type="submit" value="Learn more" id="learn-more" <?php echo $disable_premium_button ? 'disabled' : ''; ?>>
                    </a>
                   

                </div>
            </div>
        </div>


        <div class="Our-Numbers">
            <div class="display">
                <h1>Our Numbers</h1>
                <div class="Numbers">
                    <div class="numbers-paragraph">
                        <h1>20,583<span>+</span></h1>
                        <p>JOB POSTED</p>
                    </div>

                    <div class="numbers-paragraph">
                        <h1>200<span>+</span></h1>
                        <p>VERIFIED COMPANIES</p>
                    </div>

                    <div class="numbers-paragraph">
                        <h1>3,896<span>+</span></h1>
                        <p>SUCCESSFUL HIRES</p>
                    </div>
                    <div class="numbers-paragraph">
                        <h1>100K<span>+</span></h1>
                        <p>MONTHLY VISITS</p>
                    </div>
                </div>
                <hr>
            </div>

        </div>

        <div class="our-values">
            <div class="our-values-container">
                <div class="our-values-title">
                    <h1>Our Values</h1>
                    <p>Our shared values keep us connected and guide us as one team.</p>
                </div>

                <div class="our-values-cards">
                    <!-- First three cards -->
                    <div class="values">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="24" fill="#F4EBFF" />
                            <path
                                d="M29 33V31C29 29.9391 28.5786 28.9217 27.8284 28.1716C27.0783 27.4214 26.0609 27 25 27H17C15.9391 27 14.9217 27.4214 14.1716 28.1716C13.4214 28.9217 13 29.9391 13 31V33M35 33V31C34.9993 30.1137 34.7044 29.2528 34.1614 28.5523C33.6184 27.8519 32.8581 27.3516 32 27.13M28 15.13C28.8604 15.3503 29.623 15.8507 30.1676 16.5523C30.7122 17.2539 31.0078 18.1168 31.0078 19.005C31.0078 19.8932 30.7122 20.7561 30.1676 21.4577C29.623 22.1593 28.8604 22.6597 28 22.88M25 19C25 21.2091 23.2091 23 21 23C18.7909 23 17 21.2091 17 19C17 16.7909 18.7909 15 21 15C23.2091 15 25 16.7909 25 19Z"
                                stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h4>Care about the team</h4>
                        <p>Understand what matters to our employees. Give them what they need to do their best work.</p>
                    </div>
                    <div class="values">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="24" fill="#F4EBFF" />
                            <path
                                d="M32.8401 16.61C32.3294 16.099 31.7229 15.6936 31.0555 15.4171C30.388 15.1405 29.6726 14.9982 28.9501 14.9982C28.2276 14.9982 27.5122 15.1405 26.8448 15.4171C26.1773 15.6936 25.5709 16.099 25.0601 16.61L24.0001 17.67L22.9401 16.61C21.9084 15.5783 20.5092 14.9987 19.0501 14.9987C17.5911 14.9987 16.1918 15.5783 15.1601 16.61C14.1284 17.6417 13.5488 19.041 13.5488 20.5C13.5488 21.959 14.1284 23.3583 15.1601 24.39L16.2201 25.45L24.0001 33.23L31.7801 25.45L32.8401 24.39C33.3511 23.8792 33.7565 23.2728 34.033 22.6053C34.3096 21.9379 34.4519 21.2225 34.4519 20.5C34.4519 19.7775 34.3096 19.0621 34.033 18.3946C33.7565 17.7272 33.3511 17.1208 32.8401 16.61V16.61Z"
                                stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h4>Be excellent to each other</h4>
                        <p>No games. No bullshit. We rely on our peers to improve. Be open, honest and kind.</p>
                    </div>
                    <div class="values">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="24" fill="#F4EBFF" />
                            <path
                                d="M16 27C16 27 17 26 20 26C23 26 25 28 28 28C31 28 32 27 32 27V15C32 15 31 16 28 16C25 16 23 14 20 14C17 14 16 15 16 15V27ZM16 27V34"
                                stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <h4>Do the impossible</h4>
                        <p>Be energized by difficult problems. Revel in unknowns. Ask "Why?", but always question, "Why
                            not?"</p>
                    </div>

                    <!-- Second row Cards -->
                    <div class="values">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="24" fill="#F4EBFF" />
                            <path d="M25 14L15 26H24L23 34L33 22H24L25 14Z" stroke="#7F56D9" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>


                        <h4>Sweat the small stuff</h4>
                        <p>We believe the best products come from the best attention to detail. Sweat the small stuff.
                        </p>
                    </div>
                    <div class="values">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="24" fill="#F4EBFF" />
                            <path d="M35 18L25.5 27.5L20.5 22.5L13 30M35 18H29M35 18V24" stroke="#7F56D9"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>


                        <h4>Pride in what we do</h4>
                        <p>Value quality and integrity in everything we do. At all times. No exceptions.</p>
                    </div>
                    <div class="values">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="24" fill="#F4EBFF" />
                            <path
                                d="M20 26C20 26 21.5 28 24 28C26.5 28 28 26 28 26M21 21H21.01M27 21H27.01M34 24C34 29.5228 29.5228 34 24 34C18.4772 34 14 29.5228 14 24C14 18.4772 18.4772 14 24 14C29.5228 14 34 18.4772 34 24Z"
                                stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <h4>Don't #!&$ the customer</h4>
                        <p>Understand customers' stated and unstated needs. Make them wildly successful.</p>
                    </div>
                </div>
                <hr>
            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <?php include  './partials/footer.php' ?>




    <script src="js/main.js"></script>

</body>

</html>