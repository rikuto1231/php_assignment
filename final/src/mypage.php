<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/mypage.css">
    <link rel="stylesheet" href="common/css/header.css">
    <title>水平思考クイズサイト</title>
</head>
<body>


    <header>
    <!-- 読み込み方式 -->
        <?php require 'common/php/header.php'; ?>
    </header>


    <div id="quiz_body">
        <div id="quiz_area">

                <div class="quiz_out">
                    <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold">
                        <a href="home_up.php" class="btn btn-border-gradient">
                            <span class="btn-text-gradient--gold">投稿問題の更新</span>
                        </a>
                    </div>
                </div>



                <div class="quiz_out">
                    <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold">
                        <a href="home_delete.php" class="btn btn-border-gradient">
                            <span class="btn-text-gradient--gold">投稿問題の削除</span>
                        </a>
                    </div>
                </div>


        </div>
    </div>




    <footer>
    <!-- 読み込み方式 -->
    </footer>

</body>
</html>