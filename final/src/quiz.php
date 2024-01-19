<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/quiz.css">
    <link rel="stylesheet" href="common/css/header.css">
    <title>水平思考クイズサイト</title>
</head>
<body>



    <header>
    <!-- 読み込み方式 -->
        <?php require 'common/php/header.php'; ?>
    </header>

    <!-- 問題詳細出力 -->
    <?php require 'common/php/quiz_detail.php'; ?>


    <script>
        function answer() {
            document.getElementById("answer").style.display = "block";
        }
    </script>




    <footer>
    <!-- 読み込み方式 -->
    </footer>


</body>
</html>