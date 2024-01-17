<?php

// heder内の要素を出力

// 上別色用の部分化divを設定,名前とマイページ要素検討。
echo '<div id="header_top">
<p>マイページ</p>';
echo '<p>'.$_SESSION['user_name'].'様</p>';
echo '</div>';

//headerの2層目。メニュー部分
echo '<div id="header_center">';

    echo '<div id="header_in_left">';

    echo '<p>ルール確認</p>';

    echo '</div>';

    // 2層目の中央div
    echo '<div id="header_in_center">';

    echo '<a href="#"><img id="signup_img" src="common/img/logo1.png" width="150px" height="150px"></a>';

    echo '</div>';

    echo '<div id="header_in_right">';

    echo '<a href=question.php><p>出題する</p></a>';

    echo '</div>';

echo '</div>';

echo '    <!-- 問題検索部分 -->
<div id="quiz_search">
    <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold">
        <a href="home.php?search=0" class="btn btn-border-gradient">
            <span class="btn-text-gradient--gold">問題に挑戦</span>
        </a>
    </div>
</div>';


?>