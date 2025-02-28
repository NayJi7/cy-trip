<?php 
    try
    {
        $mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=cytrip;charset=utf8', 'root', 'cytech0001');
    }
    catch (Exception $e)
    {    
        die('Erreur : ' . $e->getMessage());
    }
?>