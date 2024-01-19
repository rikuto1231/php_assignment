<?php


require 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力されたメールアドレスとパスワードを取得
    $mail = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $name = $_POST['user_name'];


    // データベースへの接続を取得
    $pdo = getDatabaseConnection();


    try {
        // メルアド重複判定処理入れる
        

        // ユーザテーブルにデータを挿入
        $stmt = $pdo->prepare("
        INSERT INTO user_info (mail_address, password, user_name) VALUES (:mail_address, :password, :user_name)
    ");

    // プリペアドステートメントにデータをバインド
    $stmt->bindParam(':mail_address', $mail);
    $stmt->bindParam(':password', $pass);
    $stmt->bindParam(':user_name', $name);



        $stmt->execute();

        // データベース接続を閉じる（適宜修正）
        $pdo = null;

        // 登録が成功したら遷移先にリダイレクト
        header('Location: /php_assignment/final/src/login.php');
    } catch (PDOException $e) {
        die("データベースエラー: " . $e->getMessage());
    }
}
?>
