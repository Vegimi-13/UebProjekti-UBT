<?php 

include_once  __DIR__ . '/../../config/config.php';






?>


<div>
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
        </div>
        <div class="footer-pages">
            <ul>
                <li class="<?php echo ($current_page == 'index.php') ? 'active-link' : ''; ?>"><a href="<?php echo BASE_URL ?>index.php">Find Jobs</a></li>
                <li class="<?php echo ($current_page == 'about.php') ? 'active-link' : ''; ?>"> <a href="<?php echo BASE_URL ?>about.php">About Us</a></li>
                <li class="<?php echo ($current_page == 'pricing.php') ? 'active-link' : ''; ?>"> <a href="<?php echo BASE_URL ?>pricing.php">Pricing</a></li>
                <li><a href="<?php echo BASE_URL ?>View/freejobs.php">See All Jobs</a></li>
            </ul>


            <?php if(isset($_SESSION["role"])): ?>
                <p>You are logged in as: <?php echo htmlspecialchars($_SESSION["role"]) ?></p>
            <?php else: ?>
                <div class="login-button">
                    <form action="<?php echo BASE_URL?>View/login.php">
                        <input type="submit" value="Sign in" id="SignIn">
                    
                    </form>
                    <form action="<?php echo BASE_URL?>View/SignUp.php">
                        <input type="submit" value="Sign up" id="signup-button">
                    </form>
                    
                </div>
            <?php endif; ?>

        </div>
        <hr>





        <div class="footer-copyright">
            <ul>
                <li>Terms</li>
                <li>Privacy</li>
                <li>Cookies</li>
            </ul>
            <div style="align-content: center;">
                <p id="copyright">&copy; 2024 DevJobs. All rights reserved.</p>
            </div>
        </div>

        </footer>
    </div>


