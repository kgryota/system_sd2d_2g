<?php
$pdo = new PDO(
    'mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554899-sd2d2g;charset=utf8',
    'LAA1554899',
    'pass2g'
);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/page.css">

    <!--googleFont-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <title>乾杯市場 ～全国のお酒を販売～</title>
</head>

<body style="background-color: #F7F5EF;">
    <header>
        <div class="header-content">
            <div class="site-title">
                <h5>全国のお酒が楽しめる</h5>
                <h1>乾杯市場</h1>
            </div>
            <div class="header-menu">
                <a class="header-menu-btn" href="./search/index.php"><img src="assets/img/menu/search.svg"></a>
                <a class="header-menu-btn" href="./user/index.php"><img src="assets/img/menu/user.svg"></a>
                <a class="header-menu-btn" href="./cart/index.php"><img src="assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header>
    <div class="hero">
        <img src="assets/img/index/kanpai-heroimg.svg">
    </div>
    <h1 class="hero-title">乾杯市場</h1>
    <div class="content-area index">
        <div class="index-content">
            <form action="search/" method="post" class="index-search-input">
                <button class="search-btn" type="button" id="search-button">
                    <img class="search-btn-img" src="assets/img/index/search.svg" alt="検索">
                </button>
                <input type="text" name="keyword" placeholder="お酒の名前で検索">
            </form>
            <div class="index-recommend">
                <h2 class="index-list-title">商品一覧</h2>
                <div class="index-recommend-list">
                    <?php
                    /*検索結果*/

                    $sql = $pdo->query('SELECT * FROM product');
                    foreach ($sql as $row) {
                        echo '
                    <a class="index-product-card" href="product/?product_id=' . $row['product_id'] . '">
                        <img class="product-card-img"  src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">' . $row['product_name'] . '</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    ';
                    }
                    ?>
                </div>
            </div>
            <div class="index-repurchase">
                <h2 class="index-list-title">再度購入</h2>
                <div class="index-recommend-list">
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->
                    <a href="#" class="index-product-card">
                        <img class="product-card-img" src="assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">お酒の名前</h5>
                        <p class="product-card-price">￥2000</p>
                    </a><!--product-card-->

                </div>
            </div>
        </div>

    </div>
</body>

</html>