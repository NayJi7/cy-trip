<?php 
    // Start a new session or resume an existing session
    session_start();    
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Specifies the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!-- Defines the title of the document shown in the browser's title bar or tab -->
    <title>Cy Trip</title>

    <!-- Specifies the icon for the webpage (shown in the browser tab) -->
    <link rel="icon" href="/source/main.png">

    <!-- Links an external stylesheet for the main styles -->
    <link rel="stylesheet" type="text/css" href="/style/style.css">

    <!-- Links an external stylesheet for the header and footer styles -->
    <link rel="stylesheet" type="text/css" href="/style/header_footer.css">

    <!-- Links an external stylesheet for the map styles -->
    <link rel="stylesheet" type="text/css" href="/style/map.css">

    <!-- Links an external JavaScript file for the map functionality -->
    <script type="text/javascript" src="/script/map.js"></script>

    <!-- Links an external JavaScript file for header and footer functionality -->
    <script type="text/javascript" src="/script/header_footer.js"></script>

    <!-- Preconnects to the Google Fonts API to improve loading speed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Preconnects to the Google Fonts static content delivery network (CDN) with CORS enabled -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Imports specific Google Fonts with specified styles and weights -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>


<body>
    <!-- Include the header file -->
    <?php require_once(__DIR__."/php/header.php") ?> 

    <main>
        <div class="map"> 
            <!-- Display the world map image -->
            <img id="worldmap" src="/source/worldmap.jpg" alt="worldmap">

            <!-- Conditional link to France page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="/php/france.php">
                    <div class="france">
                        <div class="FR name">France</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="france">
                        <div class="FR name">France</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to Spain page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="/php/spain.php">
                    <div class="spain">
                        <div class="SP name">Spain</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="spain">
                        <div class="SP name">Spain</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to Japan page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="index.php">
                    <div class="japan">
                        <div class="JP name">Japan</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="japan">
                        <div class="JP name">Japan</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to Australia page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="index.php">
                    <div class="australia">
                        <div class="AU name">Australia</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="australia">
                        <div class="AU name">Australia</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to Germany page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="index.php">
                    <div class="germany">
                        <div class="GE name">Germany</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="germany">
                        <div class="GE name">Germany</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to Morocco page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="/php/morocco.php">
                    <div class="morocco">
                        <div class="MR name">Morocco</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="morocco">
                        <div class="MR name">Morocco</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to USA page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="index.php">
                    <div class="usa">
                        <div class="USA name">USA</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="usa">
                        <div class="USA name">USA</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to Russia page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="index.php">
                    <div class="russia">
                        <div class="RU name">Russia</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="russia">
                        <div class="RU name">Russia</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to Brazil page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="index.php">
                    <div class="brasil">
                        <div class="BR name">Brazil</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="brasil">
                        <div class="BR name">Brazil</div>
                    </div>
                </a>
            <?php endif ?>

            <!-- Conditional link to South Africa page based on user session -->
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="index.php">
                    <div class="southafrica">
                        <div class="SA name">South<br>Africa</div>
                    </div>
                </a>
            <?php else : ?>
                <a href="/php/login_signup.php">
                    <div class="southafrica">
                        <div class="SA name">South<br>Africa</div>
                    </div>
                </a>
            <?php endif ?>

        </div>
    </main>

    <!-- Include the footer file -->
    <?php require_once(__DIR__."/php/footer.php") ?> 
</body>
</html>