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
    <h1 class="page-title">新規登録</h1><br>
    アカウントをお持ちの場合、<a href="../login">ログイン</a>
    <form action="../singup-complete/index.php" method="post">
    <input type="text" name="user_name" class="forminput1" placeholder="お名前" required>
    <input type="date" name="date" class="forminput1" placeholder="生年月日" required>
    <input type="email" name="email" class="forminput1" placeholder="メールアドレス" required>
    <input type="password" name="password" class="forminput1" placeholder="パスワード" required>
    <input type="text" name="address" class="forminput1" placeholder="住所" required><br>
    
    <p class="error-message">エラー：未入力の項目があります。</p><br>
    <p class="error-message">エラー：IDまたはパスワードが違います。</p>
    <button id="" class="btn">
            <p>登録</p>
        </button>
        </form>
    </div>
</body>
</html>