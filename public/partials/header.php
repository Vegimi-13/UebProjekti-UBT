


<?php 
    session_start();
    require_once __DIR__ . '/../../config/config.php';
    $current_page = basename($_SERVER["SCRIPT_NAME"]);

?>




<nav class="navbar">

<div class="navbar-logo">
    <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M36.9997 20.0416L50.8747 12.3333L66.2913 21.4181V54.1234L52.4163 63.2083L21.583 44.7083V27.7499L52.4163 45.0386V29.2916L36.9997 20.0416ZM36.9997 20.0416L23.1247 12.3333L7.70907 21.5833L7.70801 53.9583L23.1247 63.2083L36.9997 53.9583"
            stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    <a href="#">Devjobs</a>

</div>

<div class="nav-container">
    <ul class="nav-menu">
        <li class="nav-item <?php echo ($current_page == 'index.php') ? 'active-link' : ''; ?> ">
            <a href="<?php echo BASE_URL; ?>index.php">Find Jobs</a></li>

        <li class="nav-item <?php echo($current_page == 'about.php') ? 'active-link' : ''; ?> ">
            <a href="<?php echo BASE_URL;?>about.php" >About Us</a></li>

        <li class="nav-item <?php echo ($current_page == 'pricing.php') ? 'active-link': '' ?> ">
            <a href="<?php echo BASE_URL; ?>pricing.php" >Pricing</a></li>


        <?php if(isset($_SESSION["role"])): ?>
            <li class="nav-item"><?php echo htmlspecialchars($_SESSION["username"])  . " (" . htmlspecialchars($_SESSION["role"]) . ")"?></li>
            
        <?php if($_SESSION["role"] === "admin"): ?>
            <a href="#">Dashboard</a>
        <?php endif;?>

        <a href="<?php echo BASE_URL; ?>partials/logout.php">Log Out</a>



        <?php else: ?>
            <form action="<?php echo BASE_URL;?>View/login.php" class="login-button" method="post">
                <input type="submit" name="login" value="Sign in" id="SignIn">
            </form>
        <?php endif; ?>
    </ul>

    
   
</div>
<div class="hamburger">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</div>
</nav>
