<?php
session_start();
$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');
$email=$_POST['email'];
$password=$_POST['password'];
$date=$_POST['date'];
$user_name=$_POST['user_name'];
$address=$_POST['address'];

$today = new DateTime(); 
$birthDate = new DateTime($date);
$age = $today->diff($birthDate)->y;

if($age < 20){
    echo'20歳未満は登録できません。';
    exit;
}

$sql=$pdo->prepare('SELECT * FROM user WHERE email=?');
$sql->execute([$email]);
$row_count = $sql->rowCount();
if($row_count != 0){
    echo 'このメールアドレスは既に登録されています。';
    exit;
}

$sql=$pdo->prepare('INSERT INTO user(email,password,date,user_name,address) VALUES(?,?,?,?,?)');
$sql->execute([$email,$password,$date,$user_name,$address]);
$pdo=null;
session_start();
$_SESSION['email'] = $email;

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
            <img class="page-title-img" src="../assets/img/icon/wine.svg">
            <h1 class="page-title">ようこそ乾杯市場へ</h1>
        </div>
        <form action="../favorite/" method="post">
            <input type="hidden" name="send_email" value="<?= $email ?>">
            <button href="../" class="btn back-home-btn"><p>好みの登録</p></button>
        </form>
    </div>
</body>
</html>