<?php
session_start();

    $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
    dbname=LAA1554899-sd2d2g;charset=utf8',
    'LAA1554899',
    'pass2g');

    $email = $_SESSION['email'];
    $sql=$pdo->prepare('SELECT * FROM user WHERE email=?');
    $sql->execute([$email]);
    foreach($sql as $row){
        $user_id = $row['user_id'];
    }

    $sql = $pdo->query('SELECT COUNT(*) FROM category_type');
    $row_count = $sql->fetchColumn(); // 行数を取得

    for($i=1;$i<=$row_count;$i++){
        if(isset($_POST["category{$i}"])){
            $sql = $pdo->prepare("INSERT INTO `category_user_join` (`user_id`, `category_id`) VALUES (?, ?)");
            $sql->execute([$user_id, "{$i}"]);        
        }
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
    <div class="page-title">
            <img class="complete-title-img" src="../assets/img/cart-complete/cart.svg"><br>
            <h1 class="complete-title">登録しました。<br>
            <br></h1>
        </div>
        <a href="../login/" class="btn back-home-btn">
            <p>買い物を始める</p>
        </a>
    </div>
</body>
</html>