<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$user_id=$_SESSION['user_id'];
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');
$sql2 = $pdo->prepare('SELECT * FROM cart WHERE user_id = ?');
$sql2->execute([$user_id]);
$delivery_date=$_POST['delivery_date'];

foreach ($sql2->fetchAll() as $row) {
    $product_id = $row['product_id'];
    $purchase_count = $row['count'];
    $purchase_date = date("Y-m-d");
    $states = '未発送';$sql_productcount = $pdo->prepare('SELECT * FROM product WHERE product_id = ?');
    $sql_productcount->execute([$product_id]);
    foreach($sql_productcount as $row){
        $before_count = $row['zaiko_kosuu'];
    }
    if($purchase_count>$before_count){
        echo '<h2>在庫不足</h2>';
        $fusoku=$purchase_count-$before_count;
        echo '<p>',$fusoku,'個不足しています。</p>';
        echo '<a href="../cart/index.php">カートへ戻る</a>';
        exit;
    }
    //カートから削除
    $sql = $pdo->prepare(
        'INSERT INTO purchase_history (purchase_date, purchase_count, status, delivery_date, user_id, product_id) VALUES (?, ?, ?, ?, ?, ?)'
    );
    $sql->execute([$purchase_date, $purchase_count, $states, $delivery_date, $user_id, $product_id]);
    //在庫削除
    
    
    $after_count = $before_count - $purchase_count;
    $sql_del = $pdo->prepare("UPDATE `product` SET `zaiko_kosuu` = ? WHERE `product`.`product_id` = ?;");
    $sql_del->execute([$after_count,$product_id]);
    //クーポン削除
    if(isset($_POST['coupon'])){
        $coupon = $_POST['coupon'];
        if($coupon>0){
        $sql_coupon_del = $pdo->prepare("INSERT INTO `coupon_usage_history` (`coupon_id`, `user_id`) VALUES (?,?)");
        $sql_coupon_del->execute([$coupon,$user_id]);
    }
}

}

$sql1 = $pdo->prepare('DELETE FROM cart WHERE user_id = ?');
$sql1->execute([$user_id]);
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
            <img class="page-title-img" src="../assets/img/icon/cmp.svg">
            <h1 class="page-title">注文完了</h1>
            <h5>ご注文ありがとうございました。またのご利用お待ちしております。</h5>
        </div>
    <div>
        <a href="../" class="btn back-home-btn">
            <p>ホームに戻る</p>
        </a>
    </div>
</body>
</html>