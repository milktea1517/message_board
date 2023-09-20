<?php
    require_once("db_connect.php");
    session_start();

    function user_register($nickname, $username, $hashed_password, $pdo){
        $sql = "INSERT INTO `message_board`.`userdata` (nickname, username, password) VALUE (:nickname, :username, :password); ";
        try{
            $stmt = $pdo -> prepare($sql);
        
            $stmt->bindParam(":nickname", $nickname, PDO::PARAM_STR);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $hashed_password, PDO::PARAM_STR);

            $stmt->execute();

            header("Location: login.php");
        }catch(PDOException $err){
            echo "錯誤: " . $err -> getMessage();
        }
    }

    function user_login($username, $password, $pdo){
        $sql = "SELECT * FROM `message_board`.`userdata` WHERE `username` = :username ;" ;
        try{
            $stmt = $pdo -> prepare($sql);

            $stmt->bindParam(":username", $username, PDO::PARAM_STR);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($password, $row['password']) === true){
                $_SESSION["verify"] = true;
                $_SESSION["nickname"] = $row["nickname"];
                header("Location: index.php");
            }
            else{
                $_SESSION["verify"] = false;
                $_SESSION["login_fail"] = "帳號密碼錯誤！！";
                header("Location: login.php");
            }  
        }catch(PDOException $err){
            echo "錯誤: " . $err -> getMessage();
        }
    }

    function post($nickname, $content, $pdo){
        $sql = "INSERT INTO `message_board`.`message_data` (nickname, content) VALUE (:nickname, :content); ";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":nickname", $nickname, PDO::PARAM_STR);
        $stmt->bindParam(":content", $content, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: index.php");
    }

    function get_comment($pdo){
        $sql = "SELECT * FROM `message_board`.`message_data` ORDER BY `create_at` DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
    }
?>