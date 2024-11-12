<?php
session_start();
$user_id = $_SESSION['user_id'];
if(isset($user_id)){
    $user_id=$_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
}else{
    header("Location: ../login/index.php"); // ログイン画面へのリダイレクト
    exit;
}
 
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');
$count=$_POST['kosuu'];
$product_id=$_POST['product_id'];
$sql=$pdo->prepare('INSERT INTO cart(product_id,user_id,count) VALUES(?,?,?)');
$sql->execute([$product_id,$user_id,$count]);






?>









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
        <div class="page-title">
            <img class="complete-title-img" src="../assets/img/cart-complete/cart.svg"><br>
            <h1 class="complete-title">カートに商品を<br>
            追加しました<br></h1>
        </div>
        <a href="../" class="btn back-home-btn">
            <p>ショッピングに戻る</p>
        </a>
        <a href="../cart/" class="btn2 back-home-btn">
            <p>カートを見る</p>
        </a>
        <div class="osusume-otumami">
        <p>おすすめのおつまみ</p>
        <div class="product-list">
        <div class="product-card">
                    <img class="product-card-img" src="../assets/img/product-img/1000.webp">
                    <h5 class="product-card-name">お酒の名前</h5>
                    <p class="product-card-price">￥2000</p>
                    <button href="../product/" class="product-card-add-btn">商品を見る</button>
                </div><!--product-card--> 
                <div class="product-card">
                    <img class="product-card-img" src="../assets/img/product-img/1000.webp">
                    <h5 class="product-card-name">お酒の名前</h5>
                    <p class="product-card-price">￥2000</p>
                    <button href="../product/" class="product-card-add-btn">商品を見る</button>
                </div><!--product-card--> 
                <form action="../order-complete/index.php" method="post">
                    <input type="hidden" value="$count">
                    <input type="hidden" value="$product_id">
                </form>
        </div>
       
        </div>
        


    </div>
</body>
</html>