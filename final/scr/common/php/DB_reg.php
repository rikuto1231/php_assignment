<?php
session_start();

require '/php_assignment/final/src/common/php/DB.php';


// データベースへの接続を取得
$pdo = getDatabaseConnection();

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

try {
    // データベースにデータを挿入
    $stmt = $pdo->prepare("
        INSERT INTO User (
            name_family, name_personal, name_family_kana, name_personal_kana,
            post_code, prefecture, city_address, street_address, building,
            tel, mail_address, password
        ) VALUES (
            :name_family, :name_personal, :name_family_kana, :name_personal_kana,
            :post_code, :prefecture, :city_address, :street_address, :building,
            :tel, :mail_address, :password
        )
    ");


    $stmt->execute();

    // データベース接続を閉じる（適宜修正）
    $pdo = null;

    // セッションを破棄。ログイン時に情報は確保
    session_destroy();

    // 登録が成功したら遷移先にリダイレクト
    header('Location: /php_assignment/final/src/registration.php');
} catch (PDOException $e) {
    die("データベースエラー: " . $e->getMessage());
}
?>
