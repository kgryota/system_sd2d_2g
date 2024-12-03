<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
            <img class="page-title-img" src="../assets/img/icon/deliver.svg">
            <h1 class="page-title">注文情報入力</h1>
        </div>
    <div>
        <div class="sub-title">
            <img src="../assets/img/icon/user.svg">
            <h2 class="order-page-title">お客様情報</h2>
        </div>
        <p class="user-orderinfo">お名前：<?= $user_name ?></p>
        <p class="user-orderinfo">住所：<?= $address ?></p>
        
    </div>

    <div class="sub-title">
            <img src="../assets/img/icon/card.svg">
            <h2 class="order-page-title">お支払情報</h2>
    </div>
    <div id="app">
        <input type="text" name="" class="forminput1" placeholder="クレジットカード番号" v-model="number" required>
        <p v-if="isInValldNumber" class="err">クレジットカード番号は14桁以上で入力してください。</p>
        <input type="text" name="" class="forminput1" placeholder="有効期限">
        <input type="password" name="" class="forminput1" placeholder="パスワード" v-model="password" required>
        <p v-if="isInValldPassword" class="err">パスワードは8文字以上で入力してください。</p>
    </div>
    
    <div class="order-price">
        <select id="coupon_select" name="" class="selectstyle">
            <option value="0">クーポンを選択</option>
            <?php
                // ユーザーの使用済みクーポンIDを取得
                $sql2 = $pdo->prepare('SELECT coupon_id FROM coupon_usage_history WHERE user_id = ?');
                $sql2->execute([$user_id]);
                $used_coupons = $sql2->fetchAll(PDO::FETCH_COLUMN);

                foreach ($pdo->query('SELECT * FROM coupon') as $row) {
                    // 使用済みクーポンIDリストに含まれていない場合のみ表示
                    if (!in_array($row['coupon_id'], $used_coupons)) {
                        echo '<option value="'.$row['coupon_id'].'">'.$row['coupon_name'].'</option>';
                    }
                }

            $pdo = null;
        ?>
        </select>
        <?php
            $pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
            dbname=LAA1554899-sd2d2g;charset=utf8',
            'LAA1554899',
            'pass2g');
            $sql = $pdo->prepare('SELECT cart.product_id, cart.user_id, cart.count, product.product_name, product.price FROM cart JOIN product ON cart.product_id = product.product_id WHERE user_id = ?');
            $sql->execute([$user_id]);
            $sum_price = 0;
            foreach ($sql as $row) {
                $product_price = $row['price'] * $row['count']; // 商品単価に数量を掛けて小計を計算
                $sum_price += $product_price; // 合計金額に商品ごとの小計を加算
            }
            echo '<h2>合計：'.$sum_price.'円</h2>';
        ?>
        <h2 style="color: red;" id="out_price"></h2>

    </div>
    <form action="../order-complete/" method="post">
        <p class="user-orderinfo">お届け日指定
        <input type="date" name="delivery_date" class="forminput1" placeholder="お届け日指定"></p>

        <input type="hidden" name="coupon" id="coupon_input">
        
        <button class="btn">購入を確定</button>
    </form>
    </div>
    <script>
        const print_price = document.getElementById('out_price');
        const before_price = <?= $sum_price ?>;
        const coupon_select = document.getElementById('coupon_select');
        const coupon_input = document.getElementById('coupon_input');

        coupon_select.addEventListener('change',function(){
            const coupon_value = this.value;
            console.log(coupon_value);
            const after_price = coupon_calc(before_price,coupon_value);
            print_price.innerText = '値引き後：' + after_price + '円';
            coupon_input.value = coupon_value;

        });

        function coupon_calc(before_price,coupon_value){
            var after_price = 0;
            if(!coupon_value){
                after_price = before_price;
            }
            if(coupon_value == 1){//10%off
                const waribiki = before_price / 10;
                after_price = before_price - waribiki;
            }
            if(coupon_value == 2){//50%off
                const waribiki = before_price / 2;
                after_price = before_price - waribiki;
            }

            return Math.floor(after_price);
        }
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="../assets/js/order_input.js"></script>
</body>
</html>