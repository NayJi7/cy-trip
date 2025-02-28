<?php 
session_start();

require_once(__DIR__."/sqlconfig.php");

// Fetch all users from the database
$userstatement = $mysqlClient->prepare('SELECT * FROM users');
$userstatement->execute();
$users = $userstatement->fetchAll();

// Fetch all ratings from the database
$ratingstatement = $mysqlClient->prepare('SELECT * FROM ratings');
$ratingstatement->execute();
$ratings = $ratingstatement->fetchAll();

// Fetch likes by the current user
$likestatement = $mysqlClient->prepare('SELECT * FROM likes WHERE user_id = :user_id');
$likestatement->execute(['user_id' => $_SESSION['user']['id']]);
$likes = $likestatement->fetchAll();

// Handle like actions
if (isset($_POST['liked'])) {
    $condition = false;

    foreach ($likes as $like) {
        if ($like['comment_id'] == $_POST['liked']) {
            $condition = true;
        }
    }

    if (!$condition) {
        // Increment like count for the comment
        $countcom = $mysqlClient->prepare('UPDATE comments SET likes = likes + 1 WHERE id = :id');
        $countcom->execute(['id' => $_POST['liked']]);

        // Add like record to the database
        $addlike = $mysqlClient->prepare('INSERT INTO likes(user_id, comment_id) VALUES (:user_id, :comment_id)');
        $addlike->execute(['user_id' => $_SESSION['user']['id'], 'comment_id' => $_POST['liked']]);
    } else {
        // Decrement like count for the comment
        $countcom = $mysqlClient->prepare('UPDATE comments SET likes = likes - 1 WHERE id = :id');
        $countcom->execute(['id' => $_POST['liked']]);

        // Remove like record from the database
        $dellike = $mysqlClient->prepare('DELETE FROM likes WHERE user_id = :user_id AND comment_id = :comment_id');
        $dellike->execute(['user_id' => $_SESSION['user']['id'], 'comment_id' => $_POST['liked']]);
    }
} elseif (isset($_POST['disliked'])) {
    // Decrement like count for the comment
    $countcom = $mysqlClient->prepare('UPDATE comments SET likes = likes - 1 WHERE id = :id');
    $countcom->execute(['id' => $_POST['disliked']]);

    // Remove like record from the database
    $dellike = $mysqlClient->prepare('DELETE FROM likes WHERE user_id = :user_id AND comment_id = :comment_id');
    $dellike->execute(['user_id' => $_SESSION['user']['id'], 'comment_id' => $_POST['disliked']]);
}

// Handle deletion of likes, ratings, and users
if (isset($_POST['dellike'])) {
    $dellike = $mysqlClient->prepare('DELETE FROM likes WHERE user_id = :user_id AND comment_id = :comment_id');
    $dellikecom = $mysqlClient->prepare('UPDATE comments SET likes = likes - 1 WHERE id = :comment_id');
    $tmp = explode('_', $_POST['dellike']);
    $user_id = $tmp[0];
    $comment_id = $tmp[1];

    $dellikecom->execute(['comment_id'=> $comment_id]);
    $dellike->execute(['user_id'=> $user_id, 'comment_id'=> $comment_id]);
} elseif (isset($_POST['delrate'])) {
    $delrate = $mysqlClient->prepare('DELETE FROM ratings WHERE liker_id = :liker_id AND country = :country');
    $tmp = explode('_', $_POST['delrate']);
    $liker_id = $tmp[0];
    $country = $tmp[1];

    $delrate->execute(['liker_id'=> $liker_id, 'country'=> $country]);
} elseif (isset($_POST['deluser'])) {
    $dellike = $mysqlClient->prepare('DELETE FROM likes WHERE user_id = :user_id');
    $delcom = $mysqlClient->prepare('DELETE FROM comments WHERE sender = :sender');
    $delrate = $mysqlClient->prepare('DELETE FROM ratings WHERE liker_id = :liker_id');
    
    foreach ($likes as $like) {
        if ($like['user_id'] == $_POST['deluser']) {
            $dellikecom = $mysqlClient->prepare('UPDATE comments SET likes = likes - 1 WHERE id = :comment_id');
            $dellikecom->execute(['comment_id'=> $like['comment_id']]);
        }
    }

    foreach ($users as $user) {
        if ($user['id'] == $_POST['deluser']) {
            $username = $user['user_name'];
        }
    }
    
    $delrate->execute(['liker_id'=> $_POST['deluser']]);
    $dellike->execute(['user_id'=> $_POST['deluser']]);
    $delcom->execute(['sender'=> $username]);
    $deluser = $mysqlClient->prepare('DELETE FROM users WHERE id = :id');
    $deluser->execute(['id'=> $_POST['deluser']]);
}

// Function to handle ratings
function handleRating($mysqlClient, $ratings, $postKey, $grade) {
    if (isset($_POST[$postKey])) {
        $found = false;
        foreach ($ratings as $rating) {
            if ($rating['liker_id'] == $_SESSION["user"]['id']) {
                $found = true;
                break;
            }
        }

        if ($found) {
            $delrate = $mysqlClient->prepare('DELETE FROM ratings WHERE liker_id = :liker_id AND country = :country');
            $delrate->execute(['liker_id' => $_SESSION['user']['id'], 'country' => $_POST[$postKey]]);
        }

        $addrate = $mysqlClient->prepare('INSERT INTO ratings(liker_id, country, grade) VALUES (:liker_id, :country, :grade)');
        $addrate->execute(['liker_id' => $_SESSION['user']['id'], 'country' => $_POST[$postKey], 'grade' => $grade]);
    }
}

// Handle different star ratings
handleRating($mysqlClient, $ratings, 'starone', 1);
handleRating($mysqlClient, $ratings, 'startwo', 2);
handleRating($mysqlClient, $ratings, 'starthree', 3);
handleRating($mysqlClient, $ratings, 'starfour', 4);
handleRating($mysqlClient, $ratings, 'starfive', 5);

// Redirect back to the referrer page
header('Location: ' . $_SERVER['HTTP_REFERER'].'#hubtitle');
exit();
?>