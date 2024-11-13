<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$user_id = $_SESSION['user_id'];
if(isset($user_id)){
    $user_name = $_SESSION['user_name'];
}else{
    header("Location: ../login/index.php"); // ログイン画面へのリダイレクト
    exit;
}




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
    <div class="cart-ravel">
    <img class="cart-img" src="../assets/img/menu/cart.svg" alt="お酒画像" height="100" width="100">
        <h5>カート</h5>
    </div>
    <div class="product-list">
        <?php
            $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
            dbname=LAA1554899-sd2d2g;charset=utf8',
            'LAA1554899',
            'pass2g');
            $sql = $pdo->prepare('SELECT cart.product_id, cart.user_id, cart.count, product.product_name, product.price 
            FROM cart 
            JOIN product ON cart.product_id = product.product_id 
            WHERE user_id = ? 
            ORDER BY cart.product_id DESC');
            $sql->execute([$user_id]);
            foreach ($sql as $row) {
                $count=$row['count'];
                $price=$row['price'];
                $product_name=$row['product_name'];
                echo '
                <div class="product-card">
                    <img class="product-card-img" src="../assets/img/product-img/1000.webp">
                    <h5 class="product-card-name">'.$product_name.'</h5>
                    <p class="product-card-price">'.$count.'</p>
                    <p class="product-card-price">'.$price.'</p>
                    <button href="../product/" class="cart-delete">削除</button>
                </div><!--product-card-->
                ';
            }
        ?>
    </div>
    <div class="cart-money">
    <?php
        $sql = $pdo->prepare('SELECT cart.product_id, cart.user_id, cart.count, product.product_name, product.price FROM cart JOIN product ON cart.product_id = product.product_id WHERE user_id = ?');
        $sql->execute([$user_id]);
        $sum_price = 0;
        foreach ($sql as $row) {
            $product_price = $row['price'] * $row['count']; // 商品単価に数量を掛けて小計を計算
            $sum_price += $product_price; // 合計金額に商品ごとの小計を加算
        }
        echo '合計：'.$sum_price.'円';
    ?>
    </div>
    <a href="../order-info/" class="btn">
            <p>購入手続き</p>
    </あ>
    </div>
</body>
</html>