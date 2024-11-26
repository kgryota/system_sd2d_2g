<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
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
        <div class="page-title-area">
            <img class="page-title-img" src="../assets/img/icon/user.svg">
            <h1 class="page-title">ユーザ情報</h1><br>
        </div>
    <div class="user-info">
        <img src="../assets/img/icon/user_id.svg">
        <p><?= $user_name ?></p>
    </div>
    <div class="user-info">
        <img src="../assets/img/icon/mail.svg">
        <p><?= $email ?></p>
    </div>
    <div class="user-info">
        <img src="../assets/img/icon/address.svg">
        <p><?= $address ?></p>
    </div>
    <a class="btn" href="../logout/index.php">ログアウト</a>
    <button id="hensyu" class="btn" onclick="location.href='../user-update/index.php'">
            <p>編集</p>
    </button>
    <button id="user_del" class="btn">
            <p>アカウント削除</p>
    </button>
    </div>
    
    </button>
</body>
<script>
    const user_del = document.getElementById('user_del');
    user_del.addEventListener('click',function(){
        if(window.confirm('アカウントを削除しますか。この変更は取り消せません')){
            window.location.href = "../user-delete-complete/index.php"
        }
        
    })
</script>
</html>