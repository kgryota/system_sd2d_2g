<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
    }

    $product_id=$_GET['product_id'];

 $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
 dbname=LAA1554899-sd2d2g;charset=utf8',
 'LAA1554899',
 'pass2g');
    if(isset($_POST['rating'])){
        $product_id = $_POST['product_id_submit'];
        $star=$_POST['rating'];
        $comment=$_POST['comment'];
        $sql=$pdo->prepare('INSERT INTO `review` (`product_id`, `star`, `comment`, `user_id`) VALUES (?, ?, ?, ?)');
        $sql->execute([$product_id,$star,$comment,$user_id]);
     }


 $review = 'false';
 $sql=$pdo->prepare('SELECT * FROM review WHERE product_id=?');
 $sql->execute([$product_id]);
 foreach($sql as $row){ 
     if($row['user_id'] == $user_id){
        $review = 'ture';
     }
}






 $sql=$pdo->prepare('SELECT * FROM product WHERE product_id=?');
 $sql->execute([$product_id]);
 foreach($sql as $row){
  $product_name=$row['product_name'];
  $zaiko_kosuu=$row['zaiko_kosuu'];
  $pref_id=$row['seisanchi'];
  $alcohol_dosuu=$row['alcohol_dosuu'];
  $price=$row['price'];
  $product_image=$row['product_image'];
  $product_detel=$row['product_detel'];
  $detailed_ex=$row['detailed_ex'];
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
     <img class="product-img" src="../assets/img/product-img/<?= $product_image ?>" alt="お酒画像">
     <div class="product-info">
        <h5><?= $product_name ?></h5>
        <p>￥<?= $price ?></p>
     </div>
     <div class="product-kosu">
     <p>個数：</p>
     <form action="../cart-complete/index.php" method="post">
     <?php   
            echo '<select name="kosuu" class="selectstyle product-count">';
            for ($i = 1; $i <= $zaiko_kosuu; $i++) {
                echo '<option value="', $i, '">', $i, '</option>';
            }
            echo '</select>';
            echo '<input type="hidden" name="product_id" value="', $product_id, '">';
        ?>

     </div>
    <?php
    if(isset($_SESSION['user_id'])){
        $sql = $pdo->prepare('SELECT * FROM cart WHERE user_id = ?');
        $sql->execute([$user_id]);
        foreach ($sql as $row) {
            if($product_id == $row['product_id']){
                $add_product_duplication = 'true'; //カートにすでに同じ商品がある
            }
        }
    }

    if (isset($add_product_duplication)) {
        echo '
        <div class="btn add_product_none">
            <p>すでに追加されています</p>
        </div>';
    } else {
        echo '
        <button id="cart-tuika" class="btn btn-show" onclick="location.href=\'../cart/index.php\'">
            <p>カートに追加</p>
        </button>';
    }
    
    ?>
    </form>

    <div class="product-info-card">
        <div class="product-info-pref">
            <p>生産地</p>
            <?php
                $sql=$pdo->prepare('SELECT * FROM pref WHERE pref_id=?');
                $sql->execute([$pref_id]);
                foreach($sql as $row){ ?>
                    <h5 class="pref-name"><?=$row['pref_name']?></h5>
                <?php }
            ?>
        </div>
        <?php
        if($category_id == 8){
            $alcohol_dosuu = '---';
        }
        ?>
        <div class="product-info-alcohol">
            <p>アルコール度数</p>
            <h5 class="alcohol-level"><?= $alcohol_dosuu ?>%</h5>
        </div>
    </div>
    <div class="product-info2">
        <h5><?= $product_detel ?></h5>
        <p><?= $detailed_ex ?></p>
    </div>
    <div class="review">
        <h2>商品レビュー</h2>
        <?php 
        if(isset($_SESSION['user_id'])){
            if($_SESSION['user_id'] != null && $review == 'false'){
        ?>
                <form action="./?product_id=<?= $product_id ?>" method="post">
                    <!-- 星評価 -->
                    <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">★</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">★</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">★</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">★</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">★</label>
                    </div>

                    <!-- コメント入力 -->
                    <div class="comment">
                    <textarea class="comment-area" name="comment" rows="4" cols="40" placeholder="コメントを入力してください"></textarea>
                    </div>

                    <input type="hidden" name="product_id_submit" value="<?= $product_id ?>">                    <!-- 送信ボタン -->
                    <button type="submit" class="btn">投稿</button>
                </form>
         <?php }} ?>

    </div>
    <div class="review_list">
        <?php
            $sql=$pdo->prepare('SELECT * FROM review WHERE product_id=?');
            $sql->execute([$product_id]);
            foreach($sql as $row){
                $star = $row['star'];
                $comment=$row['comment'];
                echo '
                <div class="review_card">
                    <img src="../assets/img/icon/review_user.svg" width="50px">
                    <div class="review_card_info">
                        <img class="star-img" src="../assets/img/star/star'.$star.'.svg">
                        <p>'.$comment.'</p>
                    </div>
                </div>
                ';
            }
        ?>

    </div>
    </div>
</body>
</html>