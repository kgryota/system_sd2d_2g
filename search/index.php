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
        <input type="text" name="" class="forminput1" placeholder="検索">
        <select name="" class="selectstyle">
            <option value="">テスト</option>
            <option value="">テスト</option>
        </select>
        <div>
            <h3 class="result-title">「<?= $_POST['keyword']  ?>」の検索結果</h3>
            <?php
                /*検索結果*/
                
            ?>
            <div class="product-list">
                <div class="product-card">
                    <img class="product-card-img" src="../assets/img/product-img/1000.webp">
                    <h5 class="product-card-name">お酒の名前</h5>
                    <p class="product-card-price">￥2000</p>
                    <button href="../product/" class="product-card-add-btn">商品を見る</button>
                </div><!--product-card-->
                <div class="product-card">
                    <img class="product-card-img"  src="../assets/img/product-img/1000.webp">
                    <h5 class="product-card-name">お酒の名前</h5>
                    <p class="product-card-price">￥2000</p>
                    <button class="product-card-add-btn">商品を見る</button>
                </div><!--product-card-->
                <div  class="product-card">
                    <img  class="product-card-img" src="../assets/img/product-img/1000.webp">
                    <h5 class="product-card-name">お酒の名前</h5>
                    <p class="product-card-price">￥2000</p>
                    <button class="product-card-add-btn">商品を見る</button>
                </div><!--product-card-->
                <div class="product-card">
                    <img class="product-card-img" src="../assets/img/product-img/1000.webp">
                    <h5 class="product-card-name">お酒の名前</h5>
                    <p class="product-card-price">￥2000</p>
                    <button class="product-card-add-btn">商品を見る</button>
                </div><!--product-card-->
            </div>

        </div>
    </div>
</body>
</html>