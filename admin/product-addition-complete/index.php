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
 echo $product_id=$_POST['product_id'];
$addition_num=$_POST['addition_num'];

$sql=$pdo->prepare('SELECT zaiko_kosuu FROM product WHERE product_id=?');
$sql->execute([$product_id]);
foreach($sql as $row){
    $zaiko_kosuu=$row['zaiko_kosuu'];
    echo $zaiko_kosuu;
}

$new_zaiko_kosuu=$addition_num+$count;

$sql1=$pdo->prepare('UPDATE product SET zaiko_kosuu=? WHERE product_id=?');
$sql1->execute([$new_zaiko_kosuu,$product_id]);



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
    <div class="page-title">
            <img class="complete-title-img" src="../../assets/img/cart-complete/cart.svg"><br>
            <h1 class="complete-title">商品追加が<br>
            完了しました<br></h1>
        </div>
        <a href="../product-list/index.php" class="btn back-home-btn">
            <p>商品登録一覧へ</p>
        </a>

        
    </div>
</body>
</html>