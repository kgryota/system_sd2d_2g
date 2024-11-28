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
        <h1 class="page-title">新規登録</h1>
    </div>
    アカウントをお持ちの場合、<a href="../login">ログイン</a>
    <form action="../singup-complete/index.php" method="post" id="app">
        <input type="text" name="user_name" class="forminput1" placeholder="お名前" v-model="name" required>
        <p v-if="isInValldName" class="err">名前は4文字以上で入力してください。</p>
        <input type="date" name="date" class="forminput1" placeholder="生年月日" required>
        <input type="email" name="email" class="forminput1" placeholder="メールアドレス" required>
        <input type="password" name="password" class="forminput1" placeholder="パスワード" v-model="password" required>
        <p v-if="isInValldPass" class="err">パスワードはは8文字以上で入力してください。</p>
        <input type="text" name="address" class="forminput1" placeholder="住所" v-model="address" required><br>
        <button id="" class="btn">
            <p>登録</p>
        </button>
    </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="../assets/js/input.js"></script>
</html>