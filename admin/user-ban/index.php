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
                <a class="header-menu-btn" href="../search"><img src="../../assets/img/menu/search.svg"></a>
                <a class="header-menu-btn" href="../user"><img src="../../assets/img/menu/user.svg"></a>
                <a class="header-menu-btn" href="../cart"><img src="../../assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <div class="page-title">
            <?php
            foreach($pdo->query('SELECT * FROM user') as $row){
                echo '<ul>';
                $user_id=$row['user_id'];
                echo '<li>',$user_id,'   ';
                
                echo $row['user_name'],'   ';
                echo "<a href=../user-delete-complete/index.php?user_id=".$user_id.">ユーザー削除</a></li>";
                echo '</ul>';
            }
            ?>
        </div>
        <a href="../product-list/index.php" class="btn back-home-btn">
            <p>ホームに戻る</p>
        </a>
    </div>
</body>
<script>
    const user_del = document.getElementById('user_del');
    user_del.addEventListener('click',function(){
        if(window.confirm('アカウントを削除しますか。この変更は取り消せません')){
            window.location.href = "../user-delete-complete/index.php?user_id=".$user_id
        }
        
    })
</script>
</html>