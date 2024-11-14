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
                <a class="header-menu-btn" href="../../search"><img src="../../assets/img/menu/search.svg"></a>
                <a class="header-menu-btn" href="../../user"><img src="../../assets/img/menu/user.svg"></a>
                <a class="header-menu-btn" href="../../cart"><img src="../../assets/img/menu/cart.svg"></a>
            </div>
        </div>
    </header><!--ヘッダー-->
    <div class="content-area">
    <h1 class="page-title">商品更新</h1><br>
   <h2>商品ID：〇〇の情報を更新します</h2>
    <form action="../product-update-complete/index.php" method="post">
        <input type="text" name="product_name" class="forminput1" placeholder="商品名">
        <input type="text" name="price" class="forminput1" placeholder="価格">
        <input type="text" name="explanation" class="forminput1" placeholder="説明">
        <a href="../product-delete-complete/index.php" class="delete" >削除</a>
        <button id="" class="btn">
            <p>更新</p>
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