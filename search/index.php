<?php 
    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554899-sd2d2g;charset=utf8',
    'LAA1554899',
    'pass2g');
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
        <form action="index.php" method="post">
            <input type="text" name="keyword" class="forminput1" placeholder="検索">
            <select name="keypref" class="selectstyle">
            <?php 
                $sql = $pdo->query('SELECT * FROM `pref`');
                foreach($sql as $row){
                    echo'<option value="'.$row['pref_id'].'">'.$row['pref_name'].'</option>';
                }
            ?>
            </select>
            <button type="submit">検索</button>
        </form>

        <div>
            <h3 class="result-title">「<?= $_POST['keyword'] ?>」の検索結果</h3>
            <div class="product-list">
            <?php
                /*検索結果*/

                $sql = $pdo->prepare('SELECT * FROM product WHERE product_name LIKE ? or seisanchi=?');
                $keyword = '%' . $_POST['keyword'] . '%';
                $sql->execute([$keyword,$_POST['keypref']]);
                foreach ($sql as $row) {
                    echo '
                    <a class="product-card" href="../product/?product_id='.$row['product_id'].'">
                        <img class="product-card-img"  src="../assets/img/product-img/1000.webp">
                        <h5 class="product-card-name">'. $row['product_name'].'</h5>
                        <p class="product-card-price">￥2000</p>
                        <button href="../product/" class="product-card-add-btn">商品を見る</button>
                    </a><!--product-card-->
                    ';
                }
            ?>
            </div>

        </div>
    </div>
</body>
</html>