<?php
            session_start();
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
            dbname=LAA1554899-sd2d2g;charset=utf8',
            'LAA1554899',
            'pass2g');
            $sql = $pdo->prepare('SELECT * FROM admin WHERE email=? and password=?');
            $sql->execute([$email,$password]);
            $rowCount = $sql->rowCount();
            if($rowCount == 1){
                foreach ($sql as $row) {
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['name'] = $row['name'];
                }
            }else{
                header("Location: ../login/index.php?err=notpassid"); // ログイン画面へのリダイレクト
                exit;
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
            <a class="site-title" href="../product-list/index.php">
                <h5>全国のお酒が楽しめる</h5>
                <h1>乾杯市場</h1>
            </a>
            <div class="header-menu">
               
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <div class="page-title">
            <img class="complete-title-img" src="../../assets/img/cart-complete/cart.svg"><br>
            <h1 class="complete-title">こんにちは<?= $_SESSION['name'] ?>さん<br>
            <br></h1>
        </div>
        <a href="../product-list/index.php" class="btn back-home-btn">
            <p>ホームに戻る</p>
        </a>
    </div>
</body>
</html>