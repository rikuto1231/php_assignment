<?php

// heder内の要素を出力

// 上別色用の部分化divを設定,名前とマイページ要素検討。
echo '<div id="header_top">
<p>マイページ</p>
<p>名前  様</p>
</div>';

//headerの2層目。メニュー部分
echo '<div id="header_center">';

    echo '<p>ルール確認</p>';

    // 2層目の中央div
    echo '<div id="header_in_center">';

    echo '<a href="#"><img id="signup_img" src="common/img/logo1.png" width="150px" height="150px"></a>';

    echo '</div>';

    echo '<p>出題する</p>';

echo '</div>';


?>