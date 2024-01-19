<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/login.css">
    <title>水平思考クイズサイト</title>
</head>
<body>


    <div class="slide-in">水平思考クイズ</div>

<div id="login">
    <form name='form-login' action='/php_assignment/final/src/common/php/DB_login.php' method='POST'>

        <span class="fontawesome-email"></span>
        <input type="text" id="email" placeholder="メールアドレス" name="email">

        <span class="fontawesome-lock"></span>
        <input type="password" id="pass" placeholder="パスワード" name="pass">
        
        <input type="submit" value="ログイン">

    </form>
</div>

<a href="registration.php"><img id="signup_img" src="common/img/reg.png" width="280px" height="300px"></a>
    

</body>
</html>
