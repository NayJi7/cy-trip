<?php 
    // Starts a new session or resumes an existing session
    session_start();

    // Includes the database configuration file
    require_once(__DIR__."/sqlconfig.php");

    // Prepares an SQL statement to select all records from the 'users' table
    $userstatement = $mysqlClient->prepare('SELECT * FROM users');
    // Executes the SQL statement
    $userstatement->execute();
    // Fetches all results from the executed statement
    $users = $userstatement->fetchAll();

    // Loops through each user record retrieved from the database
    foreach ($users as $user)
    {
        // Checks if the current user's ID matches the logged-in user's ID
        if ($user['id'] == $_SESSION['user']['id']){
            // Checks if the new username from the form is different from the current username
            if ($_POST['user_name'] != $user['user_name']) {
                // Prepares an SQL statement to update the username in the 'users' table
                $editusername = $mysqlClient->prepare('UPDATE users SET user_name = :user_name WHERE id = :id');
                // Executes the SQL statement with the new username and user ID
                $editusername->execute([
                    'user_name'=> $_POST['user_name'],
                    'id'=> $_SESSION['user']['id'],
                ]);
            }

            // Checks if the new email from the form is different from the current email
            elseif ($_POST['user_email'] != $user['user_email']) {
                // Prepares an SQL statement to update the email in the 'users' table
                $edituseremail = $mysqlClient->prepare('UPDATE users SET user_email = :user_email WHERE id = :id');
                // Executes the SQL statement with the new email and user ID
                $edituseremail->execute([
                    'user_email'=> $_POST['user_email'],
                    'id'=> $_SESSION['user']['id'],
                ]);
            }

            // Checks if the new password from the form is different from the current password
            elseif ($_POST['user_password'] != $user['user_password']) {
                // Prepares an SQL statement to update the password in the 'users' table
                $edituserpassword = $mysqlClient->prepare('UPDATE users SET user_password = :user_password WHERE id = :id');
                // Executes the SQL statement with the new password and user ID
                $edituserpassword->execute([
                    'user_password'=> $_POST['user_password'],
                    'id'=> $_SESSION['user']['id'],
                ]);
            }
            // Redirects the user to the profile page
            header("Location: profile.php");
            // Exits the script to ensure no further code is executed
            exit();
        }
    }
?>
