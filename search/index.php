<?php 
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
        <form action="index.php" method="post">
            <input type="text" name="keyword" class="forminput1" placeholder="検索">
            <select name="keypref" class="selectstyle">
            <?php 
                $sql = $pdo->query('SELECT * FROM `pref`');
                foreach($sql as $row){
                    echo'<option value="'.$row['pref_id'].'">'.$row['pref_name'].'</option>';
                }
            ?>
            </select>
            <button class="btn" type="submit">検索</button>
        </form>


        
        <div>
            <?php
            if(isset($_POST['keypref'])){
            $pref_id=$_POST['keypref'];
            $sqlpref=$pdo->prepare('SELECT pref_name FROM pref WHERE pref_id=?');
            $sqlpref->execute([$pref_id]);
            foreach($sqlpref as $row){
                $pref_name=$row['pref_name'];
            }
            }
            ?>
            <h3 class="result-title">「<?= $_POST['keyword'] ,$pref_name?>」の検索結果</h3>
            <div class="product-list">
            <?php
                // 検索キーワードを準備
                $keyword = '%' . $_POST['keyword'] . '%';

                if (!$_POST['keyword']){
                    $sql = $pdo->prepare('SELECT * FROM product WHERE seisanchi = ?');
                    $sql->execute([$_POST['keypref']]);
                    
                } else {
                    $sql = $pdo->prepare('SELECT * FROM product WHERE product_name LIKE ?');
                    $sql->execute([$keyword]);
                }

                foreach ($sql as $row) {
                    
                    echo '<a class="product-card" href="../product/?product_id=',$row['product_id'],'">';
                    
                    echo '<img class="product-card-img" src="../assets/img/product-img/'.$row['product_image'].'">';
                        
                        echo'
                        <h5 class="product-card-name">'. $row['product_name']. '</h5>
                        <p class="product-card-price">¥'.$row['price'].'</p>
                        <button href="../product/" class="product-card-add-btn">商品を見る</button>
                    </a><!--product-card-->
                    ';
                }
                
            ?>
            </div>

        </div>
    </div>
</body>
</html>





<?php
//$images = $sql->fetchAll(PDO::FETCH_ASSOC);
//<img src="uploads/<?php echo htmlspecialchars('.$row.'["product_image"]); " alt="Image" style="max-width: 300px;"> <p>ファイル名: <?php echo htmlspecialchars('.$row.'["product_image"]); 

?>