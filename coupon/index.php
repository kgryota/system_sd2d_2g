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
        <?php
        $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
        dbname=LAA1554899-sd2d2g;charset=utf8',
        'LAA1554899',
        'pass2g');
        foreach ($pdo->query('select * from coupon') as $row){
            echo '<p>';
            echo $row['coupon_id'], ':';
            echo $row['coupon_name'], ':';
            echo $row['coupon_explanation'], ':';
            echo $row['expiration_date'], ':';
            echo $row['user_name'], ':';
            echo '</p>';
        }
        $pdo = null;
        ?>
        
    <div class="page-title">
    <img class="complete-title-img" src="../assets/img/coupon/coupon.svg"><br>
    <h1 class="page-title">クーポン</h1><br>
    <p>現在所有しているクーポン一覧です。クーポンは購<br>
        入手続き画面で使用できます。</p>
    </div>
    <div class="coupon-card">
        <img src="../assets/img/coupon/beer_woman 1.png">
        <div class="coupon-card-viwe">
            <p class="coupon-title"></p>
            <p>日頃の感謝の気持ちです。ぜひご利用ください</p>
        </div>
    </div>
    </div>
</body>
</html>