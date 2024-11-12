<?php
session_start();
$user_id = $_SESSION['user_id'];
if(isset($user_id)){
    $user_id=$_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
}else{
    header("Location: ../login/index.php"); // ログイン画面へのリダイレクト
    exit;
}

$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');
$sql=$pdo->prepare('SELECT * FROM user WHERE user_id=?');
$sql->execute([$user_id]);
foreach($sql as $row){
$email=$row['email'];
$user_name=$row['user_name'];
$address=$row['address'];
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
    <h1 class="page-title">配送先</h1><br>
    <h2 class="order-page-title">お客様情報</h2><br>
    <p>お名前：<?= $user_name ?></p>
    <p>住所：<?= $address ?></p>
    <input type="date" name="" class="forminput1" placeholder="お届け日指定">
    <p class="error-message">エラー：未入力の項目があります。</p>
    <h2 class="order-page-title siharai">支払方法</h2><br>
    <h2>合計：5,600円</h2>
    <input type="text" name="" class="forminput1" placeholder="クレジットカード番号">
    <input type="text" name="" class="forminput1" placeholder="有効期限">
    <input type="text" name="" class="forminput1" placeholder="パスワード">
    <select name="" class="selectstyle">
            <option value="">クーポンを選択</option>
            <option value="">テスト</option>
        </select>
        <button id="" class="btn">
            <p>購入を確定</p>
        </button>
    </div>
</body>
</html>