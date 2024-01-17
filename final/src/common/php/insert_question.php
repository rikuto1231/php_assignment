<?php


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
        $uploadDir = "uploads/"; // アップロード先のディレクトリ
        $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);

        // ファイルをアップロード
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
            $img_path = $uploadFile;
        } else {
            echo "画像のアップロードに失敗しました。";
        }
    }

    // データ挿入
    try {
        $pdo = getDatabaseConnection();

        $sql = "INSERT INTO question_info (user_id, title, content, answer, img_path) VALUES (:user_id, :title, :content, :answer, :img_path)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":answer", $answer);
        $stmt->bindParam(":img_path", $img_path);
        $stmt->execute();

        echo "問題が登録されました！";
    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
}
?>
