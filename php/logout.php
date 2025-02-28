<?php
session_start(); // Start PHP session to enable the use of session variables
session_unset(); // Unset all session variables
session_destroy(); // Destroy the current session
header("Location: login_signup.php"); // Redirect to the login page
exit(); // Stop the execution of the PHP script
?>
