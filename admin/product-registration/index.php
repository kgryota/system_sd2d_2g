<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset( $_SESSION['admin_id'])){
    $user_name = $_SESSION['name'];
}else{
    header("Location: ../login/index.php"); // ログイン画面へのリダイレクト
    exit;
}
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');

$sql2=$pdo->query("SELECT MAX(product_id) AS max_id FROM product");
foreach($sql2 as $row){
    $maxproduct_id=$row['max_id'];
}
$maxproduct_id++;
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
    <h1 class="page-title">商品登録</h1><br>
   <p><h2>商品画像</h2></p>
    <form action="../product-complete/index.php" method="post">
        <!--<input type="file" name="product">-->
        <p>商品ID　限定商品以外はデフォルトのままで</p>
        <input type="number" name="product_id" value="<?=htmlspecialchars($maxproduct_id, ENT_QUOTES, 'UTF-8')?>" class="forminput1">
        <input type="text" name="product" class="forminput1" placeholder="テスト　本来は画像ファイル">
        <input type="text" name="product_name" class="forminput1" placeholder="商品名">
        <input type="number" name="zaiko_kosuu" class="forminput1" placeholder="在庫個数">
        <?php
        echo '<select name="seisanchi" class="selectstyle product-count">';
        $sql = $pdo->query('SELECT * FROM `pref`');
        foreach($sql as $row){
            echo'<option value="'.$row['pref_id'].'">'.$row['pref_name'].'</option>';
        }
        echo '</select>';
        ?>
        <input type="number" name="alcohol_dosuu" class="forminput1" placeholder="アルコール度数">
        <input type="text" name="price" class="forminput1" placeholder="価格">
        <input type="text" name="product_detel" class="forminput1" placeholder="説明">
        <input type="text" name="detel_ex" class="forminput1" placeholder="詳しい説明">
        <?php
        echo '<select name="category_id" class="selectstyle product-count">';
        $sql1 = $pdo->query('SELECT * FROM `category_type`');
        foreach($sql1 as $row){
            echo'<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
        }
        echo '</select>';
        ?>
        <button class="btn">
            <p>登録</p>
        </button>
    </form>

    
    

        
    </div>
</body>
</html>