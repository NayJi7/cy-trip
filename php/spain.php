<?php 
    // Start the session
    session_start();

    // Include the configuration file for database connection
    require_once(__DIR__."/sqlconfig.php");

    // Prepare and execute an SQL statement to select all comments from the database where the country is "spain",
    // ordering them by the number of likes in descending order
    $commentstatement = $mysqlClient->prepare('SELECT * FROM comments WHERE country = "spain" ORDER BY likes DESC');
    $commentstatement->execute();
    // Fetch all the comments and store them in the variable $comments
    $comments = $commentstatement->fetchAll();

    // Prepare and execute an SQL statement to select all likes from the database
    $likestatement = $mysqlClient->prepare('SELECT * FROM likes');
    $likestatement->execute();
    // Fetch all the likes and store them in the variable $likes
    $likes = $likestatement->fetchAll();

    // Prepare and execute an SQL statement to select all ratings from the database where the country is "spain"
    $ratingstatement = $mysqlClient->prepare('SELECT * FROM ratings WHERE country = "spain"');
    $ratingstatement->execute();
    // Fetch all the ratings and store them in the variable $ratings
    $ratings = $ratingstatement->fetchAll();
?>


<!DOCTYPE html>
<html>

<head>
    <!-- Link to the favicon for the website, indicating the icon displayed in the browser tab -->
    <link rel="icon" href="../source/spain.png">

    <!-- Title of the webpage -->
    <title>Spain</title>

    <!-- Link to the main stylesheet for styling the webpage -->
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    
    <!-- Link to the stylesheet specifically for styling the header and footer of the webpage -->
    <link rel="stylesheet" type="text/css" href="../style/header_footer.css">
    
    <!-- Link to the stylesheet specifically for styling elements related to Spain -->
    <link rel="stylesheet" type="text/css" href="../style/spain.css">

    <!-- Script for functionalities related to the header and footer of the webpage -->
    <script type="text/javascript" src="/script/header_footer.js"></script>
    
    <!-- Script for functionalities specific to the country page (Spain) -->
    <script type="text/javascript" src="/script/country.js"></script>

    <!-- Preconnect links for faster loading of Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Link to Google Fonts used for text styling -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>


<body>
        <?php require_once(__DIR__."/header.php") ?> 

    <main>
            <!-- Video element with autoplay, loop, and muted attributes for background video -->
<video autoplay loop muted id="bgvideo">
    <!-- Source of the video file -->
    <source src="../source/spain.mp4">
</video>

<!-- Play/pause button for the video -->
<div id="playpausebtn">
    <!-- Unicode character for play symbol -->
    <span>&#9658;</span>
</div>

<!-- Welcome message container -->
<div class="welcome">
    <!-- Heading for the welcome message -->
    <h3>Your journey in Spain begins here!</h3>
</div>


       <!-- Container for the description section -->
        <div class="descript">
            <!-- Container for the descriptive text -->
            <div class="descriptxt">
                <!-- Heading for the description -->
                <h3>Discover Spain!</h3>
                <br>
                <!-- Paragraph containing the description text -->
                <p>
                    Welcome to Spain, a vibrant and enchanting destination that seduces travellers from all over the world with its incomparable charm and cultural diversity. Whether you're drawn to the golden beaches of the Costa Brava, the historic treasures of Andalusia, or the hustle and bustle of big cities like Madrid and Barcelona, Spain has something for everyone. Renowned for its delicious cuisine, from savoury paella to a variety of tapas, and for lively festivals such as the Feria de Abril and La Tomatina, Spain promises unforgettable experiences.
                    <br><br>
                    Get carried away by the rhythm of flamenco, explore breathtaking landscapes, and discover warm hospitality that will make you feel right at home. Get ready for an extraordinary adventure in Spain, where every street corner tells a story and every moment is a celebration.
                </p>
            </div>
            <!-- Image representing the country -->
            <img id="countryico" src="../source/spanishgirl.png" alt="countryico">
        </div>


        <div class="advicezone">
            <h3 id=advicetitle>Our Advices</h3> <br>

           <!-- Container for the first advice section -->
<div class="advice1">
    <!-- Container for the "Spots" area -->
    <div class="area Spots">
        <!-- Heading for the "Spots" area -->
        <h3>Spots</h3>

        <!-- First spot within the "Spots" area -->
        <div class="area_spots_one">
            <!-- Description of the spot -->
            <p>In this area you will find the best places in Spain along with their respective addresses.</p>
            <!-- Image representing the spot -->
            <img id="imgefalambra" src="../source/alambra.jpg" alt="alhambra">
            <!-- Title of the spot -->
            <p id="titlealhambra">The Alhambra</p>
            <!-- Description of the spot -->
            <p id="descriptalhambra">Immerse yourself in a tale from the Arabian Nights when you visit this majestic palace. Its lush gardens, fountain-filled courtyards and breathtaking views of the Andalusian mountains make the Alhambra a place where history and beauty meet in spectacular fashion.</p>
            <!-- Address of the spot with a link to Google Maps -->
            <a href="https://maps.app.goo.gl/AynaNFoVXfB6CE6P7" target="_blank" id="adressalhambra">Real de la Alhambra, 18009 Granada</a>
        </div>

        <!-- Second spot within the "Spots" area -->
        <div class="area_spots_two">
            <!-- Image representing the spot -->
            <img id="imgsagrada" src="../source/sagrada.png" alt="sagrada">
            <!-- Title of the spot -->
            <p id="titlesagrada">The Sagrada Família</p>
            <!-- Description of the spot -->
            <p id="descriptsagrada">A must-see on any trip to Barcelona (it is the city's most visited monument), the Sagrada Familia is as famous for its extravagant architecture, emblematic of Catalan modernism, as it is for its singular history.</p>
            <!-- Address of the spot with a link to Google Maps -->
            <a href="https://www.google.fr/maps/search/+C%2F+de+Mallorca,+401,+L'Eixample,+08013+Barcelona,+Espagne/@41.4033844,2.1718091,17z/data=!3m1!4b1?entry=ttu" target="_blank" id="adresssagrada"> <br>Mallorca, 08013 Barcelona</a>
        </div>

        <!-- Third spot within the "Spots" area -->
        <div class="area_spots_three">
            <!-- Image representing the spot -->
            <img id="imgsantiago" src="../source/santiago.jpg" alt="santiago">
            <!-- Title of the spot -->
            <p id="titlesantiago">Santiago de Compostela</p>
            <!-- Description of the spot -->
            <p id="descriptsantiago">Embark on a spiritual adventure through the picturesque landscapes of Spain. End your pilgrimage at Santiago de Compostela Cathedral, a medieval jewel in the heart of Galicia. The historic atmosphere and the stories told by pilgrims from all over the world make this an unforgettable journey.</p>
            <!-- Address of the spot with a link to Google Maps -->
            <a href="https://maps.app.goo.gl/1YS5dLjdK88Z9EkaA" target="_blank" id="adresssantiago">Saint-Jacques-de-Compostelle, Santiago de Compostela</a>
        </div>
    </div>
</div>


            <!-- Container for the second advice section -->
<div class="advice2">
    <!-- Container for the "restaurants" area -->
    <div class="area restaurants">
        <!-- Heading for the "Restaurants" area -->
        <h3>Restaurants</h3>

        <!-- First restaurant within the "restaurants" area -->
        <div class="area_restaurants_one">
            <!-- Description of the restaurant -->
            <p>In this section, you'll find the best restaurants and restaurants in Spain, along with their respective addresses.</p>
            <!-- Image representing the restaurant -->
            <img id="imgmina" src="../source/mina.png" alt="mina">
            <!-- Title of the restaurant -->
            <p id="titlemina">Restaurante Mina</p>
            <!-- Description of the restaurant -->
            <p id="descriptalhambra">MINA is a gastronomic restaurant located in the heart of Bilbao. Located on a pedestrian walkway next to the estuary, from its large windows you can see La Ribera market and the church and bridge of San Antón. Only 25 diners per service allow us to take care of the detail, the rhythm, the dedication.</p>
            <!-- Address of the restaurant with a link to its website -->
            <a href="https://www.restaurantemina.es/?idioma=es" target="_blank" id="adressmina">Martzana Kaia, 48003 Ibaiondo, Bizkaia</a>
        </div>

        <!-- Second restaurant within the "restaurants" area -->
        <div class="area_restaurants_two">
            <!-- Image representing the restaurant -->
            <img id="imgbaga" src="../source/baga.jpg" alt="baga">
            <!-- Title of the restaurant -->
            <p id="titlebaga">Restaurante Bagá</p>
            <!-- Description of the restaurant -->
            <p id="descriptbaga">Michelin-starred chef Pedro Sánchez offers you an intimate and innovative culinary experience. Enjoy exquisite restaurants that celebrate seasonal ingredients in a warm, modern atmosphere. Enjoy meals at the counter for a unique interaction with the chefs. A must for lovers of fine cuisine in Spain.</p><br>
            <!-- Address of the restaurant with a link to its website -->
            <a href="https://bagagastronomico.com/en/home/" target="_blank" id="adressbaga">Reja de la Capilla, 23001 Jaén</a>
        </div>

        <!-- Third restaurant within the "restaurants" area -->
        <div class="area_restaurants_three">
            <!-- Image representing the restaurant -->
            <img id="imgarrel" src="../source/arrel.jpg" alt="vieux_port">
            <!-- Title of the restaurant -->
            <p id="titlearrel">Restaurante Arrel</p>
            <!-- Description of the restaurant -->
            <p id="descriptarrel">The restaurant is located in the old town of Sagunto. You will find it going up towards El Castillo de Sagunto, at number 18. We are fortunate to have created Arrels in a magnificent location, the old stables of the Palace of the Dukes of Gaeta, a medieval palace from the 16th century. Two Gothic arches, one Mozarabic and one Romanesque, are still preserved there.</p>
            <!-- Address of the restaurant with a link to its website -->
            <a href="https://www.restaurantarrels.com" target="_blank" id="adressarrel">Castell, 46500 Sagunt, Valencia</a>
        </div>
    </div>
</div>
            <div class="advice3">
                <div class="area Activities">
                    <h3>Activities</h3>

                    <div class="area_activities_one">
                        <p>In this section, you'll find the best activities to do in Spain, along with their websites for bookings.</p>
                        <img id="imgcaminito" src="../source/caminito.jpg" alt="caminito">
                        <p id="titlecaminito">Caminito del Rey</p>
                        <p id="descriptcaminito">The Caminito del Rey route is spectacular from start to finish, as it winds its way through defiles, canyons and a large valley. It passes through the landscapes of the Los Gaitanes gorge, a gorge carved out by the Guadalhorce River, with walls up to 700 metres deep.</p>
                        <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0xd72be9311fa8f01:0x599abbe8aafbd4b8?sa=X&ved=1t:8290&ictx=111" target="_blank" id="adresscaminito"> El Caminito del Rey, 29550 Ardales, Málaga</a>
                    </div>

                    <div class="area_activities_two">
                        <img id="imgprado" src="../source/prado.png" alt="prado">
                        <p id="titleprado">Prado Museums</p>
                        <p id="descriptprado"> The Prado Museum boasts the most comprehensive collection of Spanish painting in the world. The visit can begin in the 11th century, with the Mozarabic frescoes in the church of San Baudelio de Berlanga. Works by Bartolomé Bermejo, Pedro Berruguete, Juan de Juanes and Luis de Morales provide a link between Hispano-Flemish Gothic painting and the Renaissance.</p><br>
                        <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0xd42289d66d8a2ed:0x1094f07d93ad885a?sa=X&ved=1t:8290&ictx=111" target="_blank" id="adressprado">Ruiz de Alarcón, 28014 Madrid</a>
                    </div>

                    <div class="area_activities_three">
                        <img id="imgtablao" src="../source/tablao.jpg" alt="tablao">
                        <p id="titletablao">Tablao El Arenal</p>
                        <p id="descripttablao">Tablao El Arenal, nestled in Seville's historic quarter, offers a spellbinding flamenco experience. Its captivating shows, performed by talented artists, transport spectators into the deep soul of this passionate dance. With its intimate atmosphere and traditional decor, this tablao promises an unforgettable evening where music, dance and emotion combine to create a breathtaking spectacle.</p>
                        <a href="https://tablaoelarenal.com" target="_blank" id="adresstablao">Rodo 7 Casco Antiguo, 41001 Sevilla</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="blogzone">
                <h3 id="hubtitle">The Hub</h3>

                <form action="spain.php#hubtitle" method="get">
                    <input type="text" maxlength="500" name="search" id="searchbar" class="txtsearch"></input>
                    <button type="submit" id="searchbtn"><img id="searchicon" src="../source/search.png" alt="search"></button>
                </form>

                <div class="hub">
                    <div class="section spots">
                        <h3>Spots</h3>
                            <div class="blog" id="spots">
                                    
                                <?php foreach ($comments as $comment) :
                                    if ($comment['category'] == 'spots' && isset($_GET['search']) && strpos($comment['content'],$_GET['search']) !== false) :?>
                                 
                                    <div class="onecom">
                                        <div class="pseudlike">
                                            <span id="who">
                                                <?php echo $comment['sender'];?>
                                            </span>
                                            <span id="likes">

                                            <?php if($comment["sender"] == $_SESSION['user']['user_name'] || $_SESSION['user']['isroot'] == 1): ?>
                                                <form action="comments.php" method="post">
                                                <button class="btndel spots" type="submit" name="delcomspots" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                                                </form>
                                            <?php endif;?>

                                            <form action="like.php" method="post">
                                                <?php foreach ($likes as $like) :?>
                                                <?php if ($like['comment_id'] == $comment['id'] && $like['user_id'] == $_SESSION['user']['id']) :?>
                                                    <button type="submit" name="disliked" value="<?php echo $comment['id'];?>" style="opacity:1;" class="filled"></button>
                                                <?php else :?>
                                                    <button type="submit" name="liked" value="<?php echo $comment['id'];?>" style="opacity:0;" class="filled"></button>
                                                <?php endif?>
                                                <?php endforeach?>
                                            </form>
                                            
                                            <button class="empty"></button>
                                            <span class="likenb"><?php echo $comment['likes'];?></span>
                                            </span>
                                        </div>
                                            <span id="com">
                                                <?php echo str_replace($_GET['search'],'<mark>'.$_GET['search'].'</mark>',$comment['content']);?>
                                            </span>
                                    </div>

                                    <?php elseif ($comment['category'] == 'spots' && !isset($_GET['search'])) :?>
                                 
                                    <div class="onecom">
                                        <div class="pseudlike">
                                            <span id="who">
                                                <?php echo $comment['sender'];?>
                                            </span>
                                            <span id="likes">

                                            <?php if($comment["sender"] == $_SESSION['user']['user_name'] || $_SESSION['user']['isroot'] == 1): ?>
                                                <form action="comments.php" method="post">
                                                <button class="btndel spots" type="submit" name="delcomspots" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                                                </form>
                                            <?php endif;?>

                                            <form action="like.php" method="post">
                                                <!-- Iterate through each like -->
                                                <?php foreach ($likes as $like) :?>
                                                    <!-- Check if the current like is for the current comment and by the current user -->
                                                    <?php if ($like['comment_id'] == $comment['id'] && $like['user_id'] == $_SESSION['user']['id']) :?>
                                                        <!-- If the user has already liked the comment, display the filled like button -->
                                                        <button type="submit" name="disliked" value="<?php echo $comment['id'];?>" style="opacity:1;" class="filled"></button>
                                                    <?php else :?>
                                                        <!-- If the user hasn't liked the comment yet, display the empty like button -->
                                                        <button type="submit" name="liked" value="<?php echo $comment['id'];?>" style="opacity:0;" class="filled"></button>
                                                    <?php endif?>
                                                <?php endforeach?>
                                            </form>

                                            
                                            <button class="empty"></button>
                                            <span class="likenb"><?php echo $comment['likes'];?></span>
                                            </span>
                                        </div>
                                        <span id="com">
                                                <?php echo $comment['content'];?>
                                        </span>
                                    </div>

                                <?php endif?>
                                <?php endforeach?>

                            </div>

                            <form action="comments.php" method="post">
                                <!-- Textarea for entering comments, with a maximum character limit of 500 -->
                                <textarea maxlength="1500" class="txtblog" id="txtspots" type="text" name="comspainspots"></textarea>
                                <!-- Button to expand or collapse the textarea, represented by an icon -->
                                <div class="btnsize sizespots"><img src="../source/openicon.png" alt="openicon"></div>
                                <!-- Button to submit the comment -->
                                <button type="submit" class="btnblog" id="btnspots">Send</button>
                            </form>

                    </div>

                    <div class="section restaurants">
                         <h3>Restaurants</h3>
                            <div class="blog" id="restaurants">
                                    
                            <?php foreach ($comments as $comment) :
                                    if ($comment['category'] == 'restaurants' && isset($_GET['search']) && strpos($comment['content'],$_GET['search']) !== false) :?>
                                 
                                    <div class="onecom">
                                        <div class="pseudlike">
                                            <span id="who">
                                                <?php echo $comment['sender'];?>
                                            </span>
                                            <span id="likes">

                                            <?php if($comment["sender"] == $_SESSION['user']['user_name'] || $_SESSION['user']['isroot'] == 1): ?>
                                                <form action="comments.php" method="post">
                                                <button class="btndel restaurants" type="submit" name="delcomrestaurants" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                                                </form>
                                            <?php endif;?>

                                            <form action="like.php" method="post">
                                                <?php foreach ($likes as $like) :?>
                                                <?php if ($like['comment_id'] == $comment['id'] && $like['user_id'] == $_SESSION['user']['id']) :?>
                                                    <button type="submit" name="disliked" value="<?php echo $comment['id'];?>" style="opacity:1;" class="filled"></button>
                                                <?php else :?>
                                                    <button type="submit" name="liked" value="<?php echo $comment['id'];?>" style="opacity:0;" class="filled"></button>
                                                <?php endif?>
                                                <?php endforeach?>
                                            </form>
                                            
                                            <button class="empty"></button>
                                            <span class="likenb"><?php echo $comment['likes'];?></span>
                                            </span>
                                        </div>
                                        <span id="com">
                                        <?php 
                                            // Highlight the search keyword in the comment content using HTML <mark> tag
                                            echo str_replace($_GET['search'],'<mark>'.$_GET['search'].'</mark>',$comment['content']);
                                        ?>
                                    </span>

                                    </div>

                                    <?php elseif ($comment['category'] == 'restaurants' && !isset($_GET['search'])) :?>
                                 
                                    <div class="onecom">
                                        <div class="pseudlike">
                                            <span id="who">
                                                <?php echo $comment['sender'];?>
                                            </span>
                                            <span id="likes">

                                            <?php if($comment["sender"] == $_SESSION['user']['user_name'] || $_SESSION['user']['isroot'] == 1): ?>
                                                <form action="comments.php" method="post">
                                                <button class="btndel restaurants" type="submit" name="delcomrestaurants" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                                                </form>
                                            <?php endif;?>

                                            <form action="like.php" method="post">
                                                <!-- Loop through each like -->
                                                <?php foreach ($likes as $like) :?>
                                                    <!-- Check if the user has liked the comment -->
                                                    <?php if ($like['comment_id'] == $comment['id'] && $like['user_id'] == $_SESSION['user']['id']) :?>
                                                        <!-- Button for unliking the comment -->
                                                        <button type="submit" name="disliked" value="<?php echo $comment['id'];?>" style="opacity:1;" class="filled"></button>
                                                    <?php else :?>
                                                        <!-- Button for liking the comment -->
                                                        <button type="submit" name="liked" value="<?php echo $comment['id'];?>" style="opacity:0;" class="filled"></button>
                                                    <?php endif?>
                                                <?php endforeach?>
                                            </form>

                                            
                                            <button class="empty"></button>
                                            <span class="likenb"><?php echo $comment['likes'];?></span>
                                            </span>
                                        </div>
                                        <span id="com">
                                                <?php echo $comment['content'];?>
                                        </span>
                                    </div>

                                <?php endif?>
                                <?php endforeach?>

                            </div>

                            <form action="comments.php" method="post">
                                <!-- Textarea for entering the comment -->
                                <textarea maxlength="1500" class="txtblog" id="txtrestaurants" type="text" name="comspainrestaurants"></textarea>
                                <!-- Button for toggling the size of the textarea -->
                                <div class="btnsize sizerestaurants"><img src="../source/openicon.png" alt="openicon"></div>
                                <!-- Button for submitting the comment -->
                                <button type="submit" class="btnblog" id="btnrestaurants">Send</button>
                            </form>

                    </div>
                    
                    <div class="section activities">
                         <h3>Activities</h3>
                            <div class="blog" id="activities">
                                    
                            <?php foreach ($comments as $comment) :
                                    if ($comment['category'] == 'activities' && isset($_GET['search']) && strpos($comment['content'],$_GET['search']) !== false) :?>
                                 
                                    <div class="onecom">
                                        <div class="pseudlike">
                                            <span id="who">
                                                <?php echo $comment['sender'];?>
                                            </span>
                                            <span id="likes">

                                            <?php if($comment["sender"] == $_SESSION['user']['user_name'] || $_SESSION['user']['isroot'] == 1): ?>
                                                <!-- Form for deleting a comment if the user is the sender or an admin -->
                                                <form action="comments.php" method="post">
                                                    <button class="btndel activities" type="submit" name="delcomactivities" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                                                </form>
                                            <?php endif;?>


                                            <form action="like.php" method="post">
                                                <!-- Loop through each like -->
                                                <?php foreach ($likes as $like) :?>
                                                    <?php if ($like['comment_id'] == $comment['id'] && $like['user_id'] == $_SESSION['user']['id']) :?>
                                                        <!-- If the user has already liked this comment, display a filled button -->
                                                        <button type="submit" name="disliked" value="<?php echo $comment['id'];?>" style="opacity:1;" class="filled"></button>
                                                    <?php else :?>
                                                        <!-- If the user has not liked this comment, display an empty button -->
                                                        <button type="submit" name="liked" value="<?php echo $comment['id'];?>" style="opacity:0;" class="filled"></button>
                                                    <?php endif?>
                                                <?php endforeach?>
                                            </form>

                                            
                                            <button class="empty"></button>
                                            <span class="likenb"><?php echo $comment['likes'];?></span>
                                            </span>
                                        </div>
                                            <span id="com">
                                                <?php echo str_replace($_GET['search'],'<mark>'.$_GET['search'].'</mark>',$comment['content']);?>
                                            </span>
                                    </div>

                                    <?php elseif ($comment['category'] == 'activities' && !isset($_GET['search'])) :?>
                                 
                                    <div class="onecom">
                                    <div class="pseudlike">
                                    <!-- Display the sender's name -->
                                    <span id="who">
                                        <?php echo $comment['sender'];?>
                                    </span>
                                    <!-- Container for likes -->
                                    <span id="likes">
                                        <!-- Check if the current user is the sender or has admin privileges -->
                                        <?php if($comment["sender"] == $_SESSION['user']['user_name'] || $_SESSION['user']['isroot'] == 1): ?>
                                            <!-- If the user is the sender or has admin privileges, display a delete button -->
                                            <form action="comments.php" method="post">
                                                <button class="btndel activities" type="submit" name="delcomactivities" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                                            </form>
                                        <?php endif;?>

                                        <!-- Form for liking/disliking comments -->
                                        <form action="like.php" method="post">
                                            <!-- Loop through each like -->
                                            <?php foreach ($likes as $like) :?>
                                                <?php if ($like['comment_id'] == $comment['id'] && $like['user_id'] == $_SESSION['user']['id']) :?>
                                                    <!-- If the user has already liked this comment, display a filled button -->
                                                    <button type="submit" name="disliked" value="<?php echo $comment['id'];?>" style="opacity:1;" class="filled"></button>
                                                <?php else :?>
                                                    <!-- If the user has not liked this comment, display an empty button -->
                                                    <button type="submit" name="liked" value="<?php echo $comment['id'];?>" style="opacity:0;" class="filled"></button>
                                                <?php endif?>
                                            <?php endforeach?>
                                        </form>
                                        
                                        <!-- Empty button for styling -->
                                        <button class="empty"></button>
                                        <!-- Display the number of likes -->
                                        <span class="likenb"><?php echo $comment['likes'];?></span>
                                    </span>
                                </div>

                                        <span id="com">
                                                <?php echo $comment['content'];?>
                                        </span>
                                    </div>

                                <?php endif?>
                                <?php endforeach?>

                            </div>

                            <form action="comments.php" method="post">
                                <!-- Textarea for entering comments with a maximum length of 500 characters -->
                                <textarea maxlength="1500" class="txtblog" id="txtactivities" type="text" name="comspainactivities"></textarea>
                                <!-- Button for expanding or collapsing the textarea -->
                                <div class="btnsize sizeactivities"><img src="../source/openicon.png" alt="openicon"></div>
                                <!-- Button for submitting the comment -->
                                <button type="submit" class="btnblog" id="btnactivities">Send</button>
                            </form>

                    </div>
                </div>

                <h3 id="ratetxt">Rate your experience in Spain : </h3>

                <?php 
                    $found = false;
                    foreach ($ratings as $rating) {
                        if ($rating['liker_id'] == $_SESSION["user"]['id'] && $rating['country'] == "spain") {
                            $found = true;
                            $grade = $rating['grade'];
                            break;
                        }
                    }
                    
                    if ($found) :?>

<!-- Add the rating system -->

                <form class="rating" action="like.php" method="post">
                        <?php if($grade == 5) :?>
                            <div class="starborder"><button type="submit" value="spain" name="starone" class="star one"><div class="yellowrect_" id="one_" ></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="startwo" class="star two"><div class="yellowrect_" id="two_">    </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starthree" class="star three"><div class="yellowrect_" id="three_"></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfour" class="star four"><div class="yellowrect_" id="four_">  </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfive" class="star five"><div class="yellowrect_" id="five_">  </button></div>
                        <?php elseif($grade == 4) :?>
                            <div class="starborder"><button type="submit" value="spain" name="starone" class="star one"><div class="yellowrect_" id="one_" ></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="startwo" class="star two"><div class="yellowrect_" id="two_">    </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starthree" class="star three"><div class="yellowrect_" id="three_"></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfour" class="star four"><div class="yellowrect_" id="four_">  </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfive" class="star five"><div class="yellowrect" id="five_">  </button></div>
                        <?php elseif($grade == 3) :?>
                            <div class="starborder"><button type="submit" value="spain" name="starone" class="star one"><div class="yellowrect_" id="one_" ></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="startwo" class="star two"><div class="yellowrect_" id="two_">    </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starthree" class="star three"><div class="yellowrect_" id="three_"></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfour" class="star four"><div class="yellowrect" id="four_">  </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfive" class="star five"><div class="yellowrect" id="five_">  </button></div>
                        <?php elseif($grade == 2) :?>
                            <div class="starborder"><button type="submit" value="spain" name="starone" class="star one"><div class="yellowrect_" id="one_" ></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="startwo" class="star two"><div class="yellowrect_" id="two_">    </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starthree" class="star three"><div class="yellowrect" id="three_"></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfour" class="star four"><div class="yellowrect" id="four_">  </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfive" class="star five"><div class="yellowrect" id="five_">  </button></div>
                        <?php elseif($grade == 1) :?>
                            <div class="starborder"><button type="submit" value="spain" name="starone" class="star one"><div class="yellowrect_" id="one_" ></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="startwo" class="star two"><div class="yellowrect" id="two_">    </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starthree" class="star three"><div class="yellowrect" id="three_"></button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfour" class="star four"><div class="yellowrect" id="four_">  </button></div>
                            <div class="starborder"><button type="submit" value="spain" name="starfive" class="star five"><div class="yellowrect" id="five_">  </button></div>
                        <?php endif;?>
                </form>

                <?php else :?>

                <form class="rating" action="like.php" method="post">
                        <div class="starborder"><button type="submit" value="spain" name="starone" class="star one"><div class="yellowrect" id="one" ></button></div>
                        <div class="starborder"><button type="submit" value="spain" name="startwo" class="star two"><div class="yellowrect" id="two">    </button></div>
                        <div class="starborder"><button type="submit" value="spain" name="starthree" class="star three"><div class="yellowrect" id="three"></button></div>
                        <div class="starborder"><button type="submit" value="spain" name="starfour" class="star four"><div class="yellowrect" id="four">  </button></div>
                        <div class="starborder"><button type="submit" value="spain" name="starfive" class="star five"><div class="yellowrect" id="five">  </button></div>
                </form>
                <?php endif;?>
                
                <h2 id="average">
    <?php
        // Initialize variables to calculate the average rating
        $av = 0; // Total rating
        $count = 0; // Number of ratings

        // Loop through each rating
        foreach ($ratings as $rating) {
            // Sum up the ratings
            $av += $rating['grade'];
            // Count the number of ratings
            $count++;
        }
        
        // Check if there are any ratings
        if ($count == 0) {
            // If no ratings, set average to 0
            $av = 0;
        }
        else{
            // Calculate the average rating and round to 1 decimal place
            $av = round($av / $count,1);
        }

        // Display the average rating for Spain
        echo 'Average rates for Spain : '.$av.'/5';
    ?>
</h2>

            </div>
    </main>
        <!-- Add the footer -->
    <?php require_once(__DIR__."/footer.php") ?> 
</body>

</html>