<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['admin_id'])){
    $user_name = $_SESSION['name'];
}else{
    header("Location: ../login/index.php"); // ログイン画面へのリダイレクト
    exit;
}

$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');

//商品IDでproductから商品名を参照する
//user_idから名前と住所を参照する
foreach($sql=$pdo->query('SELECT * FROM purchase_history JOIN product ON purchase_history.purchase')as $row){
    $product_id=$row['product_id'];
    echo '<p>商品ID：',$product_id,'</p>';
    $product_name=$row['product_name'];
    echo '<p><span class=name_span>',$product_name,'</span></p>';
}



?>









<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/page.css">

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
                <a class="header-menu-btn" href="../../search"><img src="../../assets/img/menu/search.svg"></a>
                <a class="header-menu-btn" href="../../user"><img src="../../assets/img/menu/user.svg"></a>
                <a class="header-menu-btn" href="../../cart"><img src="../../assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <h1 class="page-title">注文情報</h1><br>
    <div class="order-info">
        <div class="order-item">
            <p>商品ID：〇〇〇</p>
            <p>商品名：〇〇〇</p>
            <p>個数：〇個</p>
            <p>お名前：〇〇〇</p>
            <p>住所：</p>
            <div class="status">未発送</div>
            <p class="status-text">指定：〇月〇日</p>
            <a href="#" class="change-status">発送完了に変更</a>
        </div>
        <div class="order-item">
            <p>商品ID：〇〇〇</p>
            <p>商品名：〇〇〇</p>
            <p>個数：〇個</p>
            <p>お名前：〇〇〇</p>
            <p>住所：</p>
            <div class="status1">発送済</div>
            <p class="status-text">指定：〇月〇日</p>
            <a href="#" class="change-status">発送完了に変更</a>
        </div>
    </div>

        
    </div>
</body>
</html>