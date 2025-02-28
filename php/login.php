<?php 
    session_start(); // Start session to manage user session

    require_once(__DIR__."/sqlconfig.php"); // Include the database configuration file

    // Fetch all users from the database
    $userstatement = $mysqlClient->prepare('SELECT * FROM users');
    $userstatement->execute();
    $users = $userstatement->fetchAll();

    // Prepare and execute SQL statement to fetch likes of the current user
    $likestatement = $mysqlClient->prepare('SELECT * FROM likes');
    $likestatement->execute();
    $likes = $likestatement->fetchAll();

    $emailgood = false; // Initialize email check flag
    $passgood = false; // Initialize password check flag

    // Loop through each user
    foreach ($users as $user)
    {
        if ($user['user_email'] == $_POST['user_email']) // Check if user email matches input email
        {
            $emailgood = true; // Set email check flag to true

            if ($user['user_password'] == $_POST['user_password']) // Check if user password matches input password
            {
                $passgood = true; // Set password check flag to true
                break; // Exit the loop if password is found
            }
            break; // Exit the loop if email is found but password doesn't match
        }
    }
    
    // Check login credentials and redirect accordingly
    if ($emailgood && $passgood) {
        $_SESSION["user"] = $user; // Set session user variable
        $verif = false;

        foreach ($likes as $like) {
            if ($like['user_id'] == $_SESSION['user']['id']) {
                $verif = true;
                break;
            }
        }

        if(!$verif) {
            $initlikes = $mysqlClient->prepare('INSERT INTO likes(user_id, comment_id) VALUES (:user_id, :comment_id)');
            $initlikes->execute(['user_id' => $_SESSION['user']['id'], 'comment_id' => 0]);
        }

        header("Location: /index.php"); // Redirect to index page on successful login
        exit();
    } 
    else if ($emailgood && !$passgood) {
        header("Location: login_signup.php?error=zxfvwll22_6b"); // Redirect with error message for incorrect password
        exit();
    }
    else{
        header("Location: login_signup.php?error=zxfvwll22_6a"); // Redirect with error message for unknown email
        exit();
    }
?>
