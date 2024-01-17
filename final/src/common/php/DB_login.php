<?php


require 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力されたメールアドレスとパスワードを取得
    $mail = $_POST['email'];
    $pass = $_POST['pass'];

    // データベースへの接続を取得
    $pdo = getDatabaseConnection();

    try {
        // データベースからユーザー情報を取得
        $stmt = $pdo->prepare("SELECT * FROM user_info WHERE mail_address = :mail");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // パスワードの照合
        if ($user && password_verify($pass, $user['password'])) {


            // ユーザ情報をセッションで保存
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['mail_address'] = $user['mail_address'];
            $_SESSION['password'] = $user['password'];


            // ログイン後の遷移先にリダイレクト
            header('Location: /php_assignment/final/src/home.php');
            exit();
            
        } else {
            // ログイン失敗時の処理
            echo "メールアドレスまたはパスワードが正しくありません。";
        }
    } catch (PDOException $e) {
        die("データベースエラー: " . $e->getMessage());
    }
}
?>
