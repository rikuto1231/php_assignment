<?php
session_start();
require 'common/php/DB.php';

// 編集する問題のIDを取得
if (isset($_GET["quiz"])) {
    $quiz_id = $_GET["quiz"];
} else {
    echo "編集する問題のIDが指定されていません。";
    exit;
}

// 問題データを取得
try {
    $pdo = getDatabaseConnection();

    $sql = "SELECT * FROM question_info WHERE question_id = :quiz_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":quiz_id", $quiz_id);
    $stmt->execute();

    $quiz_data = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
} finally {
    // データベース接続を閉じる
    $pdo = null;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/question.css">
    <link rel="stylesheet" href="common/css/header.css">
    <title>水平思考クイズサイト</title>
</head>
<body>

    <header>
        <!-- 読み込み方式 -->
        <?php require 'common/php/header.php'; ?>
    </header>

    <form method="post" action="common/php/quiz_up.php" enctype="multipart/form-data">

        <!-- 各フィールドに元々のデータを表示 -->
        <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
        <label for="title">タイトル:</label>
        <input type="text" name="title" value="<?php echo $quiz_data['title']; ?>" required><br>

        <label for="content">内容:</label>
        <textarea name="content" rows="12" required><?php echo $quiz_data['content']; ?></textarea><br>

        <label for="answer">答え:</label>
        <input type="text" name="answer" value="<?php echo $quiz_data['answer']; ?>" required><br>

        <label for="img_path">イメージ画像(任意):</label>
        <input type="file" name="image"><br>

        <button type="submit">問題を更新</button>
    </form>

    <footer>
        <!-- 読み込み方式 -->
    </footer>

</body>
</html>
