<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['admin_id'])){
    $user_name = $_SESSION['name'];
}else{
    header("Location: ../login/index.php"); // ログイン画面へのリダイレクト
    exit;
}

$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');






//foreach($sql->$pdo('SELECT product_id,product_name FROM product') as $row){
  //  $product_id=$row['product_id'];
    //$product_name=$row['product_name'];
//}




?>







<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/page.css">

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
                <a class="header-menu-btn" href="../../search"><img src="../../assets/img/menu/search.svg"></a>
                <a class="header-menu-btn" href="../../user"><img src="../../assets/img/menu/user.svg"></a>
                <a class="header-menu-btn" href="../../cart"><img src="../../assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <div class="container">
        <div class="header">
            <button class="header-button">注文情報</button>
            <form action="../product-registration/index.php">
            <button class="header-button">新規登録</button>
            </form>
        </div>

    <form method="post">
        <?php
        foreach($sql=$pdo->query('SELECT product_id,product_name FROM product') as $row){
            echo '<div class="product-list">';
            echo '<div class="product-item">';
            echo '<div class="product-info">';
            $product_id=$row['product_id'];
            echo '<p>商品ID：',$product_id,'</p>';
            $product_name=$row['product_name'];
            echo '<p class="product_name_size">商品名：',$product_name,'</p>';
            echo '</div>';
            echo '<div class="product-buttons">';
            echo '<p><a class="button-add" href="../product-update,delete/?product_id='.$row['product_id'].'">更新</a></p><br>';
            echo '<p><a class="button-add" href="../product-addition/?product_id='.$row['product_id'].'">在庫追加</a></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }
        
        ?>
    </form>









        <div class="product-list">
            <!-- Repeat this block for each product -->
            <div class="product-item">
                <div class="product-info">
                    <p>商品ID：〇〇</p>
                    <p>商品名：〇〇</p>
                </div>
                <div class="product-buttons">
                    <button type="button" class="button-update">更新</button>
                    <button type="button" class="button-add">在庫追加</button>
                </div>
            </div>
            <!-- End of product block -->
        </div>
        <div class="product-list">
            <!-- Repeat this block for each product -->
            <div class="product-item">
                <div class="product-info">
                    <p>商品ID：〇〇</p>
                    <p>商品名：〇〇</p>
                </div>
                <div class="product-buttons">
                    <button type="button" class="button-update">更新</button>
                    <button type="button" class="button-add">在庫追加</button>
                </div>
            </div>
            <!-- End of product block -->
        </div>
        <div class="product-list">
            <!-- Repeat this block for each product -->
            <div class="product-item">
                <div class="product-info">
                    <p>商品ID：〇〇</p>
                    <p>商品名：〇〇</p>
                </div>
                <div class="product-buttons">
                    <button type="button" class="button-update">更新</button>
                    <button type="button" class="button-add">在庫追加</button>
                </div>
            </div>
            <!-- End of product block -->
        </div>
        <div class="product-list">
            <!-- Repeat this block for each product -->
            <div class="product-item">
                <div class="product-info">
                    <p>商品ID：〇〇</p>
                    <p>商品名：〇〇</p>
                </div>
                <div class="product-buttons">
                    <button type="button" class="button-update">更新</button>
                    <button type="button" class="button-add">在庫追加</button>
                </div>
            </div>
            <!-- End of product block -->
        </div>
    </div>

    
        
    </div>
</body>
</html>