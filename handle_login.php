<?php
    session_start();
    require_once("db_connect.php");
    require_once("util.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    user_login($username, $password, $pdo);
?>