<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style.css">
  <title>留言板練習</title>

</head>
<body>
  

  <main class="board">
    <div class ="board__header">
      <h1 class="board__tittle">登入</h1>
      <div class="board__btn-block">
        <a class="board__btn" href="index.php">回首頁</a>
        <a class="board__btn" href="register.php">註冊</a>
      </div>
    </div>
 
    <form class="board__new-comment-form" method="POST" action="handle_login.php">
      <div class="board__nickname">
        <span>帳號：</span>
        <input type="text" name="username">
      </div>
        <div class="board__nickname">
        <span>密碼：</span>
        <input type="password" name="password">
      </div>
      <input class="board__submit-btn" type="submit">
    </form>

</body>
</html>