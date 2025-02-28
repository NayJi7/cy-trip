<?php 
    session_start(); // Start the session

    require_once(__DIR__."/sqlconfig.php"); // Include the SQL configuration file

    // Prepare and execute SQL statement to fetch all users
    $userstatement = $mysqlClient->prepare('SELECT * FROM users');
    $userstatement->execute();
    $users = $userstatement->fetchAll();

    // Prepare and execute SQL statement to fetch comments of the current user, ordered by likes
    $commentstatement = $mysqlClient->prepare('SELECT * FROM comments WHERE sender = :sender ORDER BY likes DESC');
    $commentstatement->execute([
        'sender'=> $_SESSION['user']['user_name'],
    ]);
    $comments = $commentstatement->fetchAll();

    // Prepare and execute SQL statement to fetch likes of the current user
    $likestatement = $mysqlClient->prepare('SELECT * FROM likes WHERE user_id = :user_id');
    $likestatement->execute([
        'user_id'=> $_SESSION['user']['id'],
    ]);
    $likes = $likestatement->fetchAll();

    // Prepare and execute SQL statement to fetch ratings of the current user, ordered by grade
    $ratingstatement = $mysqlClient->prepare('SELECT * FROM ratings WHERE liker_id = :liker_id ORDER BY grade DESC');
    $ratingstatement->execute([
        'liker_id'=> $_SESSION['user']['id'],
    ]);
    $ratings = $ratingstatement->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cy Trip</title>
        <link rel="icon" href="/source/main.png">
        <link rel="stylesheet" type="text/css" href="/style/style.css">
        <link rel="stylesheet" type="text/css" href="/style/header_footer.css">
        <link rel="stylesheet" type="text/css" href="/style/profile.css">

        <script type="text/javascript" src="/script/header_footer.js"></script>
        <script type="text/javascript" src="/script/profile.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php require_once(__DIR__."/header.php") ?> 

        <main>
            <video autoplay loop muted id="bgvideo">
                <source src="../source/travel.mp4">
            </video>
            <div id="playpausebtn"><span>&#9658;</span></div>
            
            <div class="container">
                <?php 
                    foreach ($users as $user) {
                        if ($user["id"] == $_SESSION["user"]["id"]) {
                            $_SESSION['user'] = $user;
                        }
                    }
                ?>
                <!-- Form to display and edit user information -->
                <form id="form_user_info" action="editprofile.php" method="post">
                    <input class="infos pseudo" type="text" name="user_name" value="<?php echo $_SESSION['user']['user_name'];?>" disabled>

                    <!-- Input field for email -->
                    <label class="emaillabel" for="user_email">email :</label>
                    <input class="infos email" type="text" name="user_email" value="<?php echo $_SESSION['user']['user_email'];?>" disabled>

                    <!-- Input field for password -->
                    <label class="passwordlabel" for="user_password">password :</label>
                    <input class="infos password" type="password" name="user_password" value="<?php echo $_SESSION['user']['user_password'];?>" disabled>
                    
                    <!-- Button to submit the form -->
                    <button type="submit" style="display:none" id="valid"><img src="../source/valid.png" alt="edit"></button>
                </form>
                                
                <!-- Button to enable editing user information -->
                <button id="edit" type="button"><img src="../source/edit.png" alt="edit"></button>

                <div class="stats">
                    <!-- Display places the user has rated -->
                    <h1>You were there !</h1>
                    <div class="stat places">
                        <?php foreach ($ratings as $rating):?>
                            <img src="<?php echo "../source/".$rating['country']."pin.png"?>" alt="<?php echo $rating['country']."pin"?>">
                        <?php endforeach;?>
                    </div>         
                    
                    <!-- Display the number of posts the user has liked -->
                    <div class="stat likes">
                        <h1>Crazy liker !</h1>
                        <?php 
                            $count = 0; 
                            foreach ($likes as $like){
                                $count++;    
                            }
                        ?>
                        <span>You liked <?php echo $count-1?> posts !</span>
                    </div>  

                    <!-- Display the favorite trips of the user -->
                    <h1 id="favtrips">Your favorite trips</h1>
                    <div class="stat ratings">
                        <?php foreach ($ratings as $rating):?>
                            <div class="single">
                                <img src="<?php echo "../source/".$rating['country'].".png"?>" alt="<?php echo $rating['country']?>"> 
                                <!-- Display star ratings based on the grades -->
                                <?php 
                                    for($i = 1; $i <= 5; $i++) {
                                        if($rating['grade'] >= $i) {
                                            echo '<div class="starborder"><button type="submit" value="france" name="star'.$i.'" class="star '.$i.'"><div class="yellowrect_" id="'.$i.'_"></button></div>';
                                        } else {
                                            echo '<div class="starborder"><button type="submit" value="france" name="star'.$i.'" class="star '.$i.'"><div class="yellowrect" id="'.$i.'_"></button></div>';
                                        }
                                    }
                                ?>
                            </div>
                        <?php endforeach;?>
                    </div>  
                </div>

                <h1 id="yourcoms">Your comments</h1>
                <div class="blog"> 
                    <?php foreach ($comments as $comment) :?>
                        <div class="onecom">
                            <div class="pseudlike">
                                <!-- Display the sender's name -->
                                <span id="who">
                                    <?php echo $comment['sender'];?>
                                </span>
                                <span id="likes">
                                    <!-- Display delete button for user's own comments -->
                                    <?php if($comment["sender"] == $_SESSION['user']['user_name']): ?>
                                        <form action="comments.php" method="post">
                                            <button class="btndel spots" type="submit" name="delcomspots" value="<?php echo $comment['id'];?>"> <img src="../source/trash.png" alt="trash"> </button>
                                        </form>
                                    <?php endif;?>
                                    <!-- Display like/dislike buttons for comments -->
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
                            <!-- Display the comment content -->
                            <span id="com">
                                <?php echo $comment['content'];?>
                            </span>
                            <!-- Display the location of the comment with a link to the country's page -->
                            <span id="loc">
                                <a href="<?php echo $comment['country'].".php"."#hubtitle"; ?>">
                                    <?php echo "In ".$comment['country'];?>
                                    <?php echo $comment['category'];?>
                                </a>
                            </span>
                        </div>
                    <?php endforeach?>
                </div>

                <?php if ($_SESSION['user']['isroot'] == 1): ?>
                    <!-- Display admin mode button for root users -->
                    <form method="post" action="admin.php">
                        <button id="adminbtn" type="submit">Admin mode</button>
                    </form>
                <?php endif;?>

                <!-- Logout button -->
                <form method="post" action="logout.php">
                    <button id="logoutbtn" type="submit">Disconnect</button>
                </form>
                </div>
                </main>

                <!-- JavaScript file for login/signup functionality -->
                <script type="text/javascript" src="/script/login_signup.js"></script>
                <?php require_once(__DIR__."/footer.php") ?> 
        </body>
</html>
