<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">

    <!--googleFont-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <title>乾杯市場 ～全国のお酒を販売～</title>
</head>
<body>
    <header>
        <div class="header-content">
            <a class="site-title" href="../">
                <h5>全国のお酒が楽しめる</h5>
                <h1>乾杯市場</h1>
            </a>
            <div class="header-menu">
                <a class="header-menu-btn" href="../search"><img src="../assets/img/menu/search.svg"></a>
                <a class="header-menu-btn" href="../user"><img src="../assets/img/menu/user.svg"></a>
                <a class="header-menu-btn" href="../cart"><img src="../assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <?php 
     //DB接続
     ?>
     <img class="product-img" src="../assets/img/menu/cart.svg" alt="お酒画像">
     <div class="product-info">
        <h5>酒名</h5>
        <p>金額</p>
     </div>
     <!--<?php   
        //個数の最大を在庫数にするなら下記？
        //foreach($pdo->query('在庫数を持ってくる') as $row)
        //<option value=$row>$row</option>
     ?>-->
     <div class="product-kosu">
     <p>個数：</p>
        <select name="" class="selectstyle product-count">
            <option value="">テスト</option>
            <option value="">テスト</option>
        </select>
     </div>
     <button id="cart-tuika" class="btn">
            <p>カートに追加</p>
        </button>
        <div class="product-info2">
        <h5>お酒の概要</h5>
        <p>お酒の詳しい紹介</p>
    </div>
    </div>
</body>
</html>