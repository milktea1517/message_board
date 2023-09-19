<?php
    require_once("db_connect.php");
    require_once("util.php");
    
    $nickname = $_POST["nickname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    user_register($nickname, $username, $hashed_password, $pdo);
?>