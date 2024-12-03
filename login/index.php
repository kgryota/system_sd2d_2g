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
                <a class="header-menu-btn" ><img src="../assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <div class="page-title-area">
        <img class="page-title-img" src="../assets/img/icon/user.svg">
        <h1 class="page-title">ログイン</h1>
    </div>
    アカウントをお持ちでない場合、<a href="../singup">新規作成</a>
    <form action="../login-complete/index.php" method="post" id="app">
        <input v-mdel="email" type="text" name="email" class="forminput1" placeholder="メールアドレス" required>
        <input v-mdel="password" type="password" name="password" class="forminput1" placeholder="パスワード" required>
        <button id="" class="btn">
            <p>ログイン</p>
        </button>
    </form>

    </div>
    
</body>
</html>