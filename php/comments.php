<?php 
    // Starts a new session or resumes an existing session
    session_start();

    // Includes the database configuration file
    require_once(__DIR__."/sqlconfig.php");

    // Checks if the form for adding a comment on France spots has been submitted
    if (isset($_POST['comfrancespots'])) {
        // Prepares the SQL query to insert a comment into the 'comments' table
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        // Executes the query with the appropriate values
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "france",
            "category"=> "spots",
            "content"=> $_POST['comfrancespots'],
        ]);
    }

    // Checks if the form for adding a comment on France restaurants has been submitted
    if (isset($_POST['comfrancerestaurants'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "france",
            "category"=> "restaurants",
            "content"=> $_POST['comfrancerestaurants'],
        ]);
    }

    // Checks if the form for adding a comment on France activities has been submitted
    if (isset($_POST['comfranceactivities'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "france",
            "category"=> "activities",
            "content"=> $_POST['comfranceactivities'],
        ]);
    }

    // Checks if the form for adding a comment on Spain spots has been submitted
    if (isset($_POST['comspainspots'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "spain",
            "category"=> "spots",
            "content"=> $_POST['comspainspots'],
        ]);
    }

    // Checks if the form for adding a comment on Spain restaurants has been submitted
    if (isset($_POST['comspainrestaurants'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "spain",
            "category"=> "restaurants",
            "content"=> $_POST['comspainrestaurants'],
        ]);
    }

    // Checks if the form for adding a comment on Spain activities has been submitted
    if (isset($_POST['comspainactivities'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "spain",
            "category"=> "activities",
            "content"=> $_POST['comspainactivities'],
        ]);
    }

    // Checks if the form for adding a comment on Morocco spots has been submitted
    if (isset($_POST['commoroccospots'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "morocco",
            "category"=> "spots",
            "content"=> $_POST['commoroccospots'],
        ]);
    }

    // Checks if the form for adding a comment on Morocco restaurants has been submitted
    if (isset($_POST['commoroccorestaurants'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "morocco",
            "category"=> "restaurants",
            "content"=> $_POST['commoroccorestaurants'],
        ]);
    }

    // Checks if the form for adding a comment on Morocco activities has been submitted
    if (isset($_POST['commoroccoactivities'])) {
        $addcom = $mysqlClient->prepare('INSERT INTO comments(sender, country, category, content) VALUES (:sender, :country, :category, :content)');
        
        $addcom->execute([
            "sender"=> $_SESSION["user"]['user_name'],
            "country"=> "morocco",
            "category"=> "activities",
            "content"=> $_POST['commoroccoactivities'],
        ]);
    }

    // Checks if the form for deleting a comment on spots has been submitted
    if (isset($_POST['delcomspots'])) {
        // Prepares the SQL query to delete a comment from the 'comments' table
        $delcom = $mysqlClient->prepare('DELETE FROM comments WHERE id = :id');

        // Executes the query with the appropriate value
        $delcom->execute([
            'id' => $_POST['delcomspots'],
        ]);
    }

    // Checks if the form for deleting a comment on restaurants has been submitted
    if (isset($_POST['delcomrestaurants'])) {
        $delcom = $mysqlClient->prepare('DELETE FROM comments WHERE id = :id');

        $delcom->execute([
            'id' => $_POST['delcomrestaurants'],
        ]);
    }

    // Checks if the form for deleting a comment on activities has been submitted
    if (isset($_POST['delcomactivities'])) {
        $delcom = $mysqlClient->prepare('DELETE FROM comments WHERE id = :id');

        $delcom->execute([
            'id' => $_POST['delcomactivities'],
        ]);
    }

    // Redirects the user back to the previous page
    header('Location: ' . $_SERVER['HTTP_REFERER'].'#hubtitle');
    exit();
?>
