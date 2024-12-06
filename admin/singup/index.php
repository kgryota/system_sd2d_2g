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
    <h1 class="page-title"><span class="page-title-admin">管理者</span><br>新規登録</h1><br>
    管理者アカウントをお持ちの場合、<a href="../login/">ログイン</a>
    <form action="../sineup-complete/index.php" method="post">
        <input type="text" name="name" class="forminput1" placeholder="お名前">
        <input type="text" name="email" class="forminput1" placeholder="メールアドレス">
        <input type="password" name="password" class="forminput1" placeholder="パスワード">
        <button id="" class="btn">
            <p>登録</p>
        </button>
    </form>

    <?php
        $err = $_GET['err'];
        if($err){
            echo '<p class="error-message">エラー：IDまたはパスワードが違います。</p>';
        }
    ?>
    

        
    </div>
</body>
</html>