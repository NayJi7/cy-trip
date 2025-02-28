<?php 
    // Start a new session or resume an existing session
    session_start();

    // Include the database configuration file to establish a database connection
    require_once(__DIR__."/sqlconfig.php");

    // Prepare and execute a SQL query to select all records from the 'comments' table
    $userstatement = $mysqlClient->prepare('SELECT * FROM comments');
    $userstatement->execute();
    // Fetch all the results from the executed query and store them in the $users array
    $users = $userstatement->fetchAll();

    // Prepare and execute a SQL query to select all records from the 'comments' table
    $commentstatement = $mysqlClient->prepare('SELECT * FROM comments');
    $commentstatement->execute();
    // Fetch all the results from the executed query and store them in the $comments array
    $comments = $commentstatement->fetchAll();
    
    // Prepare and execute a SQL query to select all records from the 'likes' table
    $likestatement = $mysqlClient->prepare('SELECT * FROM likes');
    $likestatement->execute();
    // Fetch all the results from the executed query and store them in the $likes array
    $likes = $likestatement->fetchAll();

    // Prepare and execute a SQL query to select all records from the 'ratings' table
    $ratingstatement = $mysqlClient->prepare('SELECT * FROM ratings');
    $ratingstatement->execute();
    // Fetch all the results from the executed query and store them in the $ratings array
    $ratings = $ratingstatement->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Defines the title of the document shown in the browser's title bar or tab -->
    <title>Cy Trip</title>

    <!-- Specifies the icon for the webpage (shown in the browser tab) -->
    <link rel="icon" href="/source/main.png">

    <!-- Links an external stylesheet for the main styles -->
    <link rel="stylesheet" type="text/css" href="/style/style.css">

    <!-- Links an external stylesheet for the header and footer styles -->
    <link rel="stylesheet" type="text/css" href="/style/header_footer.css">

    <!-- Links an external stylesheet for the admin styles -->
    <link rel="stylesheet" type="text/css" href="/style/admin.css">

    <!-- Links an external JavaScript file for header and footer functionality -->
    <script type="text/javascript" src="/script/header_footer.js"></script>

    <!-- Links an external JavaScript file for admin functionality -->
    <script type="text/javascript" src="/script/admin.js"></script>

    <!-- Preconnects to the Google Fonts API to improve loading speed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Preconnects to the Google Fonts static content delivery network (CDN) with CORS enabled -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Imports specific Google Fonts with specified styles and weights -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>


    <body>
    <?php 
    // Include the header.php file, which contains the header section of the webpage
    // __DIR__ is a magic constant that returns the directory of the current file
    // require_once ensures that the header.php file is included only once, avoiding multiple inclusions
    require_once(__DIR__ . "/header.php"); 
?>

        <main>
            <!-- Video element with autoplay, loop, and muted attributes for background video -->
<video autoplay loop muted id="bgvideo">
    <!-- Source of the video file -->
    <source src="../source/travel.mp4">
</video>

           <!-- Play/pause button for the video -->
<div id="playpausebtn">
    <!-- Unicode character for play symbol -->
    <span>&#9658;</span>
</div>

            
            <div class="container">
            <?php 
    // Loop through each user in the $users array
    foreach ($users as $user) {
        // Check if the ID of the current user matches the ID stored in the session data
        if ($user["id"] == $_SESSION["user"]["id"]) {
            // If a match is found, update the session's 'user' variable with the details of this user
            $_SESSION['user'] = $user;
        }
    }
?>

                <h1 id="allcoms">All comments</h1>
<div class="blog"> 
    <?php foreach ($comments as $comment) :?>
        
        <div class="onecom">
            <div class="pseudlike">
                <!-- Display the sender of the comment -->
                <span id="who"><?php echo $comment['sender'];?></span>
                
                <!-- Form to delete the comment -->
                <form action="comments.php" method="post">
                    <button class="btndel <?php echo $comment['category'];?>" type="submit" name="delcom<?php echo $comment['category']; ?>" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                </form>

                <!-- Form for liking/disliking the comment -->
                <form action="like.php" method="post">
                    <?php foreach ($likes as $like) :?>
                        <?php if ($like['comment_id'] == $comment['id'] && $like['user_id'] == $_SESSION['user']['id']) :?>
                            <!-- If the user has already liked the comment, show a filled button -->
                            <button type="submit" name="disliked" value="<?php echo $comment['id'];?>" style="opacity:1;" class="filled"></button>
                        <?php else :?>
                            <!-- If the user hasn't liked the comment, show an empty button -->
                            <button type="submit" name="liked" value="<?php echo $comment['id'];?>" style="opacity:0;" class="filled"></button>
                        <?php endif?>
                    <?php endforeach?>
                </form>
                
                <!-- Empty button for styling purposes -->
                <button class="empty"></button>
                
                <!-- Display the number of likes the comment has -->
                <span class="likenb"><?php echo $comment['likes'];?></span>
            </div>
            
            <!-- Display the content of the comment -->
            <span id="com"><?php echo $comment['content'];?></span>
            
            <!-- Display the location of the comment with a link -->
            <span id="loc">
                <a href="<?php echo $comment['country'].".php"."#hubtitle"; ?>">
                    <?php echo "In ".$comment['country']." ".$comment['category'];?>
                </a>
            </span>
        </div>

    <?php endforeach?>
</div>


<h1 id="alllikes">All likes</h1>
<div class="bloglikes"> 
    <?php foreach ($likes as $like) :?>
        
        <div class="onecom">
            <div class="pseudlike">
                <!-- Display the username of the user who liked the comment -->
                <span id="who">
                    <?php foreach($users as $user) {
                        if ($user['id'] == $like['user_id']){
                            echo $user['user_name'];
                        }
                    }
                    ?>
                </span>
                
                <!-- Form to delete the like -->
                <form action="like.php" method="post">
                    <button class="btndel" type="submit" name="dellike" value="<?php echo $like['user_id'].'_'.$like['comment_id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                </form>
            </div>
            
            <!-- Display information about the like (user id, liked comment id) -->
            <span id="com">
                <?php 
                    echo "user id=".$like['user_id']." liked id=".$like["comment_id"]." comment";
                ?>
            </span>
        </div>

    <?php endforeach?>
</div>


<h1 id="allrates">All rates</h1>
<div class="blogrates"> 
    <?php foreach ($ratings as $rating) :?>
        
        <div class="onecom">
            <div class="pseudlike">
                <!-- Display the username of the user who rated the country -->
                <span id="who">
                    <?php foreach($users as $user) {
                        if ($user['id'] == $rating['liker_id']){
                            echo $user['user_name'];
                        }
                    }
                    ?>
                </span>
                
                <!-- Form to delete the rating -->
                <form action="like.php" method="post">
                    <button class="btndel" type="submit" name="delrate" value="<?php echo $rating['liker_id'].'_'.$rating['country'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                </form>
            </div>
            
            <!-- Display information about the rating (user id, rated country, and grade out of 5) -->
            <span id="com">
                <?php 
                    echo "user id=".$rating['liker_id']." rated ".$rating["country"]." country : ".$rating['grade']."/5";
                ?>
            </span>
        </div>

    <?php endforeach?>
</div>


<h1 id="allusers">All users</h1>
<div class="blogusers"> 
    <?php foreach ($users as $user) :?>
        
        <div class="onecom">
            <div class="pseudlike">
                <!-- Display the username of the user -->
                <span id="who">
                    <?php echo $user['user_name'];?>
                </span>
                
                <!-- Display a delete button for users (excluding the user with ID 1) -->
                <?php if($user['id'] != 1): ?>
                    <form action="like.php" method="post">
                        <button class="btndel" type="submit" name="deluser" value="<?php echo $user['id']?>"> <img src="../source/trash.png" alt="trash"> </button>
                    </form>
                <?php endif;?>
            </div>
            
            <!-- Display user information (ID, email, and password) -->
            <span id="com">
                <?php 
                    echo "user id=".$user['id']."; email= ".$user['user_email']."; password= ".$user["user_password"];
                ?>
            </span>
        </div>

    <?php endforeach?>
</div>

            </div>
        </main>

       <!-- This line includes a JavaScript file named "login_signup.js" -->
<script type="text/javascript" src="/script/login_signup.js"></script>

<?php 
    // This line includes a PHP file named "footer.php"
    require_once(__DIR__."/footer.php");
?>

    </body>
</html>
