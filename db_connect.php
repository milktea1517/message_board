<?php
    $hostname = "localhost";
    $dbname = "side_project";
    $username = "ajie1517";
    $password = "yoyo8914";
    try{
        
        $pdo = new PDO("mysql:host=$hostname;dbname = $dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $err){
        echo "發生錯誤: " . $err->getMessage();
    }
?>