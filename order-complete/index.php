<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$user_id=$_SESSION['user_id'];
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');
$sql2 = $pdo->prepare('SELECT * FROM cart WHERE user_id = ?');
$sql2->execute([$user_id]);

foreach ($sql2->fetchAll() as $row) {
    $product_id = $row['product_id'];
    $purchase_count = $row['count'];
    $purchase_date = date("Y-m-d");
    $states = '未発送';

    $sql = $pdo->prepare(
        'INSERT INTO purchase_history (purchase_date, purchase_count, status, user_id, product_id) VALUES (?, ?, ?, ?, ?)'
    );
    $sql->execute([$purchase_date, $purchase_count, $states, $user_id, $product_id]);
}

$sql1 = $pdo->prepare('DELETE FROM cart WHERE user_id = ?');
$sql1->execute([$user_id]);

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
            <h1 class="complete-title">ご注文ありがとうご<br>
            ざいました<br></h1>
        </div>
        <a href="../" class="btn back-home-btn">
            <p>ホームに戻る</p>
        </a>
    </div>
</body>
</html>