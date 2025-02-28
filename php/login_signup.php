<?php 
    session_start(); // Start session to manage user session

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cy Trip</title>
        <link rel="icon" href="/source/main.png"> <!-- Favicon -->
        <link rel="stylesheet" type="text/css" href="/style/style.css"> <!-- Main CSS stylesheet -->
        <link rel="stylesheet" type="text/css" href="/style/header_footer.css"> <!-- Header and footer CSS -->
        <link rel="stylesheet" type="text/css" href="/style/login_signup.css"> <!-- Login/signup form CSS -->

        <script type="text/javascript" src="/script/header_footer.js"></script> <!-- Header/footer JavaScript -->

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php require_once(__DIR__."/header.php") ?>  <!-- Include header -->

        <main>
            <video autoplay loop muted id="bgvideo">
                <source src="../source/travel.mp4"> <!-- Background video -->
            </video>
            <div id="playpausebtn"><span>&#9658;</span></div> <!-- Play/pause button -->
            
            <div class="container" id="container">
                <div class="form-container sign-up">
                    <form action="signup.php" method="post"> <!-- Signup form -->
                        <h1>Create Account</h1>

                        <!-- Error/success messages for signup -->
                        <?php if (isset($_GET["error"]) && $_GET['error'] == 'zxfvwll22_6c') :?>
                            <span style="color:red;">an account already exist with this email</span>
                        <?php elseif (isset($_GET["error"]) && $_GET['error'] == 'zxfvwll22_6d') :?>
                            <span style="color:green;">account created succesfully, login to continue</span>
                        <?php else :?>
                            <span>use your email, username and password to register</span>
                        <?php endif;?>

                        <input type="text" placeholder="Username" name="user_name" maxlength="7"> <!-- Username field -->
                        <input type="email" placeholder="Email" name="user_email"> <!-- Email field -->
                        <input type="password" placeholder="Password" name="user_password"> <!-- Password field -->
                        <button type="submit">Sign Up</button> <!-- Signup button -->
                    </form>
                </div>

                <div class="form-container sign-in">
                    <form action="login.php" method="post"> <!-- Login form -->
                        <h1>Log In</h1>

                        <!-- Error messages for login -->
                        <?php if (isset($_GET["error"]) && $_GET['error'] == 'zxfvwll22_6a') :?>
                            <span style="color:red;">no account found with this email</span>
                        <?php elseif (isset($_GET["error"]) && $_GET['error'] == 'zxfvwll22_6b') :?>
                            <span style="color:red;">the password you entered is incorrect</span>
                        <?php else :?>
                            <span>use your email and password to connect</span>
                        <?php endif;?>

                        <input type="email" placeholder="Email" name="user_email"> <!-- Email field -->
                        <input type="password" placeholder="Password" name="user_password"> <!-- Password field -->
                        <button type="submit">Log In</button> <!-- Login button -->
                    </form>
                </div>

                <!-- Toggle panel for switching between login and signup forms -->
                <div class="toggle-container">
                    <div class="toggle">
                        <div class="toggle-panel toggle-left">
                            <h1>Hello, friend !</h1>
                            <p>Register with your personal details to use all of site features</p>
                            <button class="hidden" id="login">Log In</button> <!-- Hidden login button -->
                        </div>

                        <div class="toggle-panel toggle-right">
                            <h1>Welcome back !</h1>
                            <p>Enter your personal details to use all of site features</p>
                            <button class="hidden" id="register">Sign Up</button> <!-- Hidden signup button -->
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <script type="text/javascript" src="/script/login_signup.js"></script> <!-- Login/signup JavaScript -->
        <?php require_once(__DIR__."/footer.php") ?>  <!-- Include footer -->
    </body>
</html>
