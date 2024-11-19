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
$product_id=$_GET['product_id'];

$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');

$sql=$pdo->prepare('SELECT product_name FROM product WHERE product_id=?');
$sql->execute([$product_id]);
foreach($sql as $row){
    $product_name=$row['product_name'];
}



?><!DOCTYPE html>
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
    <h1 class="page-title">商品更新</h1><br>
   <h2>商品ID：<?= $product_id ?><br>
   商品名：<?= $product_name ?>の情報を更新します</h2>
    <form action="../product-update-complete/index.php" method="post">
        <input type="text" name="product_name" class="forminput1" placeholder="商品名">
        <input type="text" name="price" class="forminput1" placeholder="価格">
        <input type="text" name="explanation" class="forminput1" placeholder="説明">
        <?="<input type=hidden name=product_id value=",$product_id,">"; ?>
        <a href="../product-delete-complete/?product_id=<?=$product_id?>" class="delete" >削除</a>
        <button type="submit" class="btn">
          <p>更新</p>
        </button>
        
    </form>

    

        
    </div>
</body>
</html>