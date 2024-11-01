<?php
 $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
 dbname=LAA1554918-kanpaisd2d;charset=utf8',
 'LAA1554918',
 'pass2g');
 foreach($pdo->query('SELECT * FROM product WHERE product_id=1') as $row){
  $product_id=$row['product_id'];
  $product_name=$row['product_name'];
  $zaiko_kosuu=$row['zaiko_kosuu'];
  $pref_id=$row['pref_id'];
  $alcohol_dosuu=$row['alcohol_dosuu'];
  $price=$row['price'];
  $product_image=$row['product_image'];
  $product_detel=$row['product_detel'];
  $Detailed_ex=$row['Detailed_ex'];
  $category_id=$row['category_id'];
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
    <?php 
    
    
     ?>
     <img class="product-img" src="../assets/img/menu/cart.svg" alt="お酒画像">
     <div class="product-info">
        <h5><?= $product_name ?></h5>
        <p><?= $price ?></p>
     </div>
     <div class="product-kosu">
     <p>個数：</p>
     <?php   
        echo '<select name="kosuu" class="selectstyle product-count">';
        $num=1;
        for($i=1;$i<=$zaiko_kosuu;$i++){
        echo '<option value="',$i,'">',$i,'</option>';
        }
        echo '</select>'
     ?>
     </div>
     <button id="cart-tuika" class="btn">
            <p>カートに追加</p>
        </button>
        <div class="product-info2">
        <h5><?= $product_detel ?></h5>
        <p><?= $Detailed_ex ?></p>
        <form action=""></form>
    </div>
    </div>
</body>
</html>