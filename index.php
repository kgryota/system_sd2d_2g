<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    if(isset($user_id)){
        $user_name = $_SESSION['user_name'];
    }
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
            <form action="search/index.php" method="post" class="index-search-input">
                <button class="search-btn" type="submit">
                    <img class="search-btn-img" src="assets/img/index/search.svg" alt="検索">
                </button>
                <input type="text" name="keyword" placeholder="お酒の名前で検索">
            </form>
            <a href="search/" class="pref-search-card">
                <img src="assets/img/index/pref-search.png">
                <div>
                    <h2>地域のお酒を発見</h2>
                    <h5>都道府県でお酒を検索！</h5>
                </div>
            </a>
            <div class="index-recommend">
                <h2 class="index-list-title">あなたの好み</h2>
                <div class="index-recommend-list">
                    <?php
                        // ユーザーのお気に入りカテゴリを取得
                        $favorite_sql = $pdo->prepare('SELECT `category_id` FROM `category_user_join` WHERE `user_id` = ?');
                        $favorite_sql->execute([$user_id]);

                        // お気に入りカテゴリIDを配列として取得
                        $category_ids = $favorite_sql->fetchAll(PDO::FETCH_COLUMN);

                        if (!empty($category_ids)) {
                            // 動的なプレースホルダーを生成
                            $placeholders = implode(',', array_fill(0, count($category_ids), '?'));

                            // `product` テーブルから該当カテゴリの商品を取得
                            $sql = $pdo->prepare("SELECT * FROM `product` WHERE `category_id` IN ($placeholders)");
                            $sql->execute($category_ids);

                            // 結果を取得して出力
                            foreach ($sql as $row) {
                                echo '
                                <a class="index-product-card" href="product/?product_id=' . $row['product_id'] . '">
                                    <img class="product-card-img"  src="assets/img/product-img/' . $row['product_id'] . '.png">
                                    <h5 class="product-card-name">' . $row['product_name'] . '</h5>
                                    <p class="product-card-price">¥' . $row['price'] . '</p>
                                </a><!--product-card-->';
                            }
                        } else {
                            echo "ログインお気に入りを登録すると利用できます";
                        }

                    ?>
                </div>
            </div>
            <div class="index-recommend">
                <h2 class="index-list-title">商品一覧</h2>
                <div class="index-recommend-list">
                    <?php
                    
                    $sql = $pdo->query('SELECT * FROM product');
                    foreach ($sql as $row) {
                        echo '
                    <a class="index-product-card" href="product/?product_id=' . $row['product_id'] . '">
                        <img class="product-card-img"  src="assets/img/product-img/' . $row['product_id'] . '.png">
                        <h5 class="product-card-name">' . $row['product_name'] . '</h5>
                        <p class="product-card-price">¥' . $row['price'] . '</p>
                    </a><!--product-card-->
                    ';
                    }
                    ?>
                </div>
            </div>
            <div class="index-repurchase">
                <h2 class="index-list-title">再度購入</h2>
                <div class="index-recommend-list">
                    <?php
                        $sql = $pdo->prepare('SELECT * FROM purchase_history join product on purchase_history.product_id = product.product_id where user_id = ?');
                        $sql->execute([$user_id]);
                        $rowCount = $sql->rowCount();
                        if($rowCount != 0){
                            foreach ($sql as $row) {
                                echo '
                                <a class="index-product-card" href="product/?product_id=' . $row['product_id'] . '">
                                    <img class="product-card-img"  src="assets/img/product-img/' . $row['product_id'] . '.png">
                                    <h5 class="product-card-name">' . $row['product_name'] . '</h5>
                                    <p class="product-card-price">¥' . $row['price'] . '</p>
                                </a><!--product-card-->
                            ';}
                        }else{
                            echo '<div class="history_none">購入すると履歴が表示されます</div>';
                        }
                    ?>

                </div>
            </div>
        </div>

    </div>
</body>

</html>