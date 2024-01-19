<?php

require 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // ユーザIDと問題ID取得
    session_start();
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        
        if (isset($_GET["quiz"])) {
            $question_id = $_GET["quiz"];

            try {
                $pdo = getDatabaseConnection();

                // 問題の所有者を確認
                $checkOwnershipSql = "SELECT user_id FROM question_info WHERE question_id = :question_id";
                $stmt = $pdo->prepare($checkOwnershipSql);
                $stmt->bindParam(":question_id", $question_id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$row || $row["user_id"] != $user_id) {
                    echo "問題が見つかりません。または、問題の所有者ではありません。";
                    exit;
                }

                // 問題削除処理
                $deleteSql = "DELETE FROM question_info WHERE question_id = :question_id";
                $stmt = $pdo->prepare($deleteSql);
                $stmt->bindParam(":question_id", $question_id);
                $stmt->execute();

                header('Location: /php_assignment/final/src/mypage.php');
                exit();

            } catch (PDOException $e) {
                echo "エラー: " . $e->getMessage();
            } finally {
                // データベース接続を閉じる
                $pdo = null;
            }
        } else {
            echo "問題IDが指定されていません。";
        }

    } else {
        echo "ユーザーIDが取得できません。";
    }
}

?>
