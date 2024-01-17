<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/home.css">
    <link rel="stylesheet" href="common/css/header.css">
    <title>水平思考クイズサイト</title>
</head>
<body>
    <header>
    <!-- 読み込み方式 -->
        <?php require 'common/php/header.php'; ?>
    </header>


    <form method="post" action="common/php/insert_question.php" enctype="multipart/form-data">

        <label for="title">タイトル:</label>
        <input type="text" name="title" required><br>

        <label for="content">内容:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <label for="answer">答え:</label>
        <input type="text" name="answer" required><br>

        <label for="img_path">イメージ画像(任意):</label>
        <input type="file" name="image"><br>

        <button type="submit">問題を登録</button>
    </form>



    <footer>
    <!-- 読み込み方式 -->
    </footer>
</body>
</html>