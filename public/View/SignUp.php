<?php
    require_once __DIR__ . '/../../config/config.php'; 
    session_start();

    if(isset($_SESSION["username"])){
        header("Location: " . BASE_URL . "index.php");
        exit();
    }
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/pages/sign-up.css">
    <title>Sign Up</title>
</head>

<body>
    <nav class="navbar">

        <div class="navbar-logo">
            <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M36.9997 20.0416L50.8747 12.3333L66.2913 21.4181V54.1234L52.4163 63.2083L21.583 44.7083V27.7499L52.4163 45.0386V29.2916L36.9997 20.0416ZM36.9997 20.0416L23.1247 12.3333L7.70907 21.5833L7.70801 53.9583L23.1247 63.2083L36.9997 53.9583"
                    stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <a href="../index.php">Devjobs</a>

        </div>

    </nav>


    <div class="sign-up-container">
        <div class="sign-up-cards">
            <!-- Card for existing users -->
            <div class="sign-up-card" id="test">
                <h2>Create account</h2>
                <p>
                    Already have an account? 
                    <span><a href="<?php  BASE_URL ?>login.php">Sign in</a></span>
                </p>
    
                <div class="form-container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="post" id="sign-up">
                        <!-- Labels and inputs for name and email -->
                        <div class="form-group">
                            <div class="labels">
                                <label for="username">Name</label>
                                <label for="email">Email</label>
                            </div>
                            <div class="inputs">
                                <div class="username">
                                    <input type="text" id="username" name="username" placeholder="Username">
                                    <span class="error" id="usernameError"></span>
                                </div>
                                
                                <div class="email">
                                    <input type="email" id="email" name="email" placeholder="Email address">
                                    <span class="error" id="emailError"></span>
                                </div>
                                
                            </div>
                        </div>
    
              
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password">
                            <span class="error" id="passwordError"></span>
    
                            <label id="confirm-pw" for="confirmPassword">Confirm your password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password">
                            <span class="error" id="confirmPasswordError"></span>
                        </div>
    
                        
                        <button type="submit" name="register" id="submitBtn">Sign Up</button>
                        <hr>
    
              
                        <div class="login-socials">
                            <a href="https://www.google.com/">
                                <img src="../assets/images/Gmail.png" alt="Google">
                                <p>Sign up with Google</p>
                            </a>
                            <a href="https://www.facebook.com/">
                                <img src="../assets/images/Facebook.png" alt="Facebook">
                                <p>Sign up with Facebook</p>
                            </a>
                        </div>
    
                    </form>
                    
                
                </div>
            </div>

        </div>
    </div>

    
        
     <footer id="footer">
        <div class="footer-container-row-1">
            <div class="logo">
                <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M36.9997 20.0416L50.8747 12.3333L66.2913 21.4181V54.1234L52.4163 63.2083L21.583 44.7083V27.7499L52.4163 45.0386V29.2916L36.9997 20.0416ZM36.9997 20.0416L23.1247 12.3333L7.70907 21.5833L7.70801 53.9583L23.1247 63.2083L36.9997 53.9583"
                        stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="#">Devjobs</a>


            </div>
            <div class="footer-copyright">

                <div style="align-content: center;">
                    <p id="copyright">&copy; 2024 DevJobs. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>



    <!-- SCRIPT JS -->
    <script src="../js/sign-up.js"></script>
    

</body>

</html>