<header>
    <?php 
        // Includes the database configuration file
        require_once(__DIR__."/sqlconfig.php");

        // Prepares an SQL statement to select all records from the 'users' table
        $userstatement = $mysqlClient->prepare('SELECT * FROM users');
        // Executes the SQL statement
        $userstatement->execute();
        // Fetches all results from the executed statement
        $users = $userstatement->fetchAll();
        
        // Checks if a user is logged in by verifying if 'user' is set in the session
        if (isset($_SESSION['user'])){
            // Loops through each user record retrieved from the database
            foreach ($users as $user) {
                // Checks if the current user's ID matches the logged-in user's ID
                if ($user["id"] == $_SESSION["user"]["id"]) {
                    // Updates the session user data with the current user's data from the database
                    $_SESSION['user'] = $user;
                }
            }
        }
    ?>

    <!-- Link to the home page with an icon image -->
    <a href="/index.php"><img id="logoheader" src="../source/icon.png" alt="icon"></a>

    <!-- Horizontal bar (possibly a separator or menu bar) -->
    <div id="bar"></div>

    <!-- Display a welcome message if the user is logged in, otherwise prompt to log in -->
    <?php if (isset($_SESSION['user']['user_name'])) : ?>
        <h2>Welcome <?php echo $_SESSION['user']['user_name']?></h2>
    <?php else :?>
        <h2>Log in to start travelling</h2>
    <?php endif?>

    <!-- Navigation menu -->
    <nav>
        <!-- Button to toggle country options -->
        <button id="btncountries">Countries <img id="openicon" src="../source/openicon.png" alt="openicon"></button>
        <!-- Link to the profile page if the user is logged in, otherwise link to login/signup page -->
        <?php if (isset($_SESSION['user']['user_name'])) :?>
            <a href="/php/profile.php">Your profile</a>
        <?php else :?>
            <a href="/php/login_signup.php">Log in / Sign up</a>
        <?php endif?>
    </nav>
</header>

<?php 
    // Array of featured countries
    $countries = ["france", "spain", "morocco"];
    // Array of additional countries
    $otherones = ["japan", "australia", "germany", "usa", "russia", "brasil", "south africa"];
?>

<div class="menu-deroulant">
    <!-- Loop through each country in the featured countries array -->
    <?php foreach ($countries as $country) :?>
        <!-- Create a link to the country's page if the user is logged in, otherwise link to login/signup page -->
        <a class="countryslot" <?php if(isset($_SESSION['user'])) : echo "href=\"/php/".$country.".php\""; else : echo "href=\"/php/login_signup.php\""; endif;?>>
            <span id="countryname"><?php echo ucfirst($country)?></span> 
            <img id="openicon2" src="../source/openicon.png" alt="openicon">
        </a>
    <?php endforeach?>

    <!-- Loop through each country in the additional countries array -->
    <?php foreach ($otherones as $otherone) :?>
        <!-- Create a link to the homepage if the user is logged in, otherwise link to login/signup page -->
        <a class="countryslot" <?php if(isset($_SESSION['user'])) : echo "href=\"/index.php\""; else : echo "href=\"/php/login_signup.php\""; endif;?>>
            <span id="countryname"><?php echo ucfirst($otherone)?></span> 
            <img id="openicon2" src="../source/openicon.png" alt="openicon">
        </a>
    <?php endforeach?>
</div>
