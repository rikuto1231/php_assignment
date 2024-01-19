<? session_start();?>
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

    <h1>削除画面</h1>
<?php

require 'common/php/DB.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // ユーザID取得
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];

        // 問題取得処理
        try {
            $pdo = getDatabaseConnection();

            $sql = "SELECT * FROM question_info WHERE user_id = :user_id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // 表示を整えて出力
            echo '<div id="quiz_body">';
            echo '<div id="quiz_area">';

            foreach($result as $row){
                echo '<div class="quiz_out">';
                echo '<h2><a href="quiz_delete.php?quiz='.$row['question_id'].'">'.$row['title'].'</a></h2>';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';

        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            // データベース接続を閉じる
            $pdo = null;
        }
    } else {
        echo "ユーザーIDが取得できません。";
    }
}

?>

    <footer>
    <!-- 読み込み方式 -->
    </footer>

</body>
</html>