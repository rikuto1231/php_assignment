<?php
session_start();

require 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $answer = $_POST["answer"];
    
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    } else {
        echo "ユーザーIDが取得できません。";
        exit;
    }

    $img_path = "";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $uploadDir = "../img/"; // アップロード先のディレクトリ
        $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);

        // ファイルをアップロード
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
            $img_path = $uploadFile;
        } else {
            echo "画像のアップロードに失敗しました。";
        }
    }

    // quiz_id の存在を確認
    if (isset($_POST["quiz_id"])) {
        $quiz_id = $_POST["quiz_id"];

        // データ更新
        try {
            $pdo = getDatabaseConnection();

            // 更新
            $updateSql = "UPDATE question_info SET title = :title, content = :content, answer = :answer, img_path = :img_path WHERE user_id = :user_id AND question_id = :quiz_id";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(":title", $title);
            $updateStmt->bindParam(":content", $content);
            $updateStmt->bindParam(":answer", $answer);
            $updateStmt->bindParam(":img_path", $img_path);
            $updateStmt->bindParam(":user_id", $user_id);
            $updateStmt->bindParam(":quiz_id", $quiz_id);
            $updateStmt->execute();

            header('Location: /php_assignment/final/src/mypage.php');
            exit();
        } catch (PDOException $e) {
            echo "エラー: " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    } else {
        echo "quiz_idがありません。";
    }
}
?>
