<?php

require 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $question_id = $_GET['quiz'];

    // 問題取得処理
    try {
        $pdo = getDatabaseConnection();

        $sql = "SELECT * FROM question_info WHERE question_id = :question_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':question_id', $question_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // 問題が見つからない場合の処理
        if (!$result) {
            die('Question not found.');
        }

        // 取得した問題の情報を使って表示

        

    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    } finally {
        // データベース接続を閉じる
        $pdo = null;
    }
}
?>
