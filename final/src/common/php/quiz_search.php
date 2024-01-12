<?php

require 'DB.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // 後で詳細検索追加するならこの部分

    // 問題取得処理
    try {
        $pdo = getDatabaseConnection();
    
        $sql = "SELECT * FROM question_info";

        $stmt = $pdo->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 表示を整えて出力


        // 


    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    } finally {
        // データベース接続を閉じる
        $pdo = null;
    }

}
?>
