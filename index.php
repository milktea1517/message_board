<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "css/style.css">
        <script src = "js/jquery-3.7.1.min.js"></script>
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
                        if(!isset($_SESSION["verify"]) || !$_SESSION["verify"]){
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
                                <input class="board__submit-btn" type="submit" value="送出">
                              </form>';
                    }
                ?>
            <div class = "board__hr"></div>
            <section>
            </section>
            <script>
                    $(document).ready(function(){
                        $.ajax({
                            url: "get_comment.php",
                            method: "GET",
                            datatype: "json",
                            success: function(data){
                                var section_element =$('section');
                                var data = JSON.parse(data);
                                $.each(data, function(index, comment){
                                    var create_time = new Date(comment.create_at);
                                    var year = create_time.getFullYear();
                                    var month = String(create_time.getMonth() + 1).padStart(2, '0');
                                    var day = String(create_time.getDate()).padStart(2, '0');
                                    var hours = String(create_time.getHours()).padStart(2, '0');
                                    var minutes = String(create_time.getMinutes()).padStart(2, '0');
                                    var seconds = String(create_time.getSeconds()).padStart(2, '0');

                                    var formatted_time = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

                                    var list_obj = `<div class="card">
                                                        <div class = "card__avatar"></div>
                                                    <div class="card__body">
                                                        <div class = "card__info">
                                                            <span class = "card__author">${comment.nickname}</span>
                                                            <span class = "card__time">${formatted_time}</span>
                                                        </div>
                                                        <p class = "card__content">${comment.content}</p>
                                                    </div>
                                                    <div class = "board__hr"></div>
                                                    `;
                                });
                            },
                            error: function(){

                            }
                        });
                    });
            </script>
        </main>
    </body>
</html>