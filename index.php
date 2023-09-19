<?php
    session_start();
    $_SESSION["verify"] = false;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "css/style.css">
        <title>留言板練習</title>
    </head>
    <body>
        <main class = "board">
            <div class = "board__header">
                <div class = "board__word-block">
                    <h1 class = "board__title">留言板</h1>
                </div>
                <div class = "board__btn-block">
                    <!--這邊判斷是否登入-->
                    <?php
                        if(!$_SESSION["verify"]){
                            echo '<a class = "board__btn" href = register.php>註冊</a>
                                  <a class = "board__btn" href = login.php>登入</a>';
                        }
                        else{
                            echo '<a class="board__btn" href="logout.php">登出</a> <h4>你好啊' . $_SESSION["nickname"] . '</h4>';
                        }
                    ?>
                </div>
            </div> 
                <?php
                    if(!$_SESSION["verify"]){
                        echo '<h3>請登入發布留言</h3>';
                    }
                    else{
                        echo '<form class="board__new-comment-form" method="POST" action="post_comment.php">
                                <textarea name="content" rows="5" placeholder="請輸入留言"></textarea>
                                <input class="board__submit-btn" type="submit">
                              </form>';
                    }
                ?>
            <div class = "board__hr"></div>
            <section>
            </section>
        </main>
    </body>
</html>