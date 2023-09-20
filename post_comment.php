<?php
    require_once("db_connect.php");
    require_once("util.php");

    $content = $_POST['content'];
    $nickname = $_SESSION['nickname'];

    post($nickname, $content, $pdo);
?>