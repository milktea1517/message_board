<?php
    $hostname = "localhost";
    $dbname = "message_board";
    $username = "root";
    $password = "root";
    try{
        
        $pdo = new PDO("mysql:host=$hostname;dbname = $dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $err){
        echo "發生錯誤: " . $err->getMessage();
    }
?>