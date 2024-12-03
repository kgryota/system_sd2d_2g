<?php
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
 dbname=LAA1554899-sd2d2g;charset=utf8',
 'LAA1554899',
 'pass2g');
//$category_id=$_GET['category_id'];
//echo $category_id;
$sql=$pdo->query('SELECT * FROM category_type s');

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
    <div class="page-title-area">
            <img class="page-title-img" src="../assets/img/icon/favorite.svg">
            <h3 class="page-title">好みのお酒を選択してください</h3>
            <h5>ここで選択するとホームでおすすめが表示されるようになります。</h5>
        </div>
    <div class="option-container">
    <!--<label class="option">
        <input type="radio" name="gender" value="男性">
        男性
    </label>
    <label class="option">
        <input type="radio" name="gender" value="女性">
        女性
    </label>
    <label class="option">
        <input type="radio" name="gender" value="その他">
        その他
    </label>
    <label class="option">
        <input type="radio" name="gender" value="回答しない">
        回答しない
    </label>
    <h2 class="page-title">好きなお酒のカテゴリーを教えてください</h2><br>
    <p>*複数回答可</p>-->

    
    <form action="../favorite-complete/" method="post">

        <?php
            $sql=$pdo->query('SELECT * FROM category_type WHERE category_id != 8');
            foreach($sql as $row){
                echo '        
                <div>
                    <input type="checkbox" name="category'.$row['category_id'].'">
                    <label>'.$row['category_name'].'</label>
                </div>';
            }
        ?>

        <button id="okonomi-touroku" class="btn" onclick="location.href=' '">
            <p>登録</p>
        </button>
    </form>

    </div>
    </div>
</body>
</html>