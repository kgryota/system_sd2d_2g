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

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql2=$pdo->prepare('UPDATE purchase_history SET status="発送済" WHERE purchase_id=?');
    $sql2->execute([$id]);
}

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
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <h1 class="page-title">注文情報</h1><br>
    <div class="order-info">

    <?php
    foreach($sql=$pdo->query('SELECT * FROM purchase_history JOIN product ON purchase_history.product_id=product.product_id JOIN user ON purchase_history.user_id=user.user_id')as $row){
        echo '<div class="order-item">';
    $product_id=$row['product_id'];
    echo '<p>商品ID：',$product_id,'</p>';
    $product_name=$row['product_name'];
    echo '<p><span class=name_span>',$product_name,'</span></p>';
    $kosuu=$row['purchase_count'];
    echo '<p>個数：',$kosuu,'個</p>';
    $name=$row['user_name'];
    echo '<p>お名前：',$name,'</p>';
    $address=$row['address'];
    echo '<p>住所：',$address,'</p>';
    $status=$row['status'];
    $purchase_id=$row['purchase_id'];
    if($status==='未発送'){
        echo '<div class="status">',$status,'</div>';
        echo '<a href="../order-information?id=',$purchase_id,'" class="change-status">発送完了に変更</a>';
    }else{
        echo '<div class="status1">',$status,'</div>';
    }
    echo '</div>';
    }
    
    ?>
        
    </div>

        
    </div>
</body>
</html>