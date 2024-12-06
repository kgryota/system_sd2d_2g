<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['admin_id'])){
    $user_name = $_SESSION['name'];
}else{
    header("Location: ../login/index.php"); // ログイン画面へのリダイレクト
    exit;
}

$pdo=new PDO('mysql:host=mysql309.phy.lolipop.lan;
dbname=LAA1554899-sd2d2g;charset=utf8',
'LAA1554899',
'pass2g');


$product_id=$_POST['product_id'];
$product_name=$_POST['product_name'];
$zaiko_kosuu=$_POST['zaiko_kosuu'];
$seisanchi=$_POST['seisanchi'];
$alcohol_dosuu=$_POST['alcohol_dosuu'];
$price=$_POST['price'];
//ファイル送信に変えるとき削除
$product_detel=$_POST['product_detel'];
$detailed_ex=$_POST['detel_ex'];
$category_id=$_POST['category_id'];

//if(is_uploaded_file($_FILES['product']['tmp_name'])){
  //  if(!file_exists('upload')){
    //    mkdir('upload');
    //}
    //$file='upload/'.basename($_FILES['product']['name']);
    //move_uploaded_file($_FILES['product']['tmp_name'],$file);
//}

//$sql=$pdo->prepare("INSERT INTO product(product_id,product_name,zaiko_kosuu,seisanchi,alcohol_dosuu,price,product_detel,detailed_ex,category_id) VALUES(?,?,?,?,?,?,?,?,?)");
//$sql->execute([$product_id,$product_name,$zaiko_kosuu,$seisanchi,$alcohol_dosuu,$price,$product_detel,$detailed_ex,$category_id]);
$uploadDir = '../../assets/img/product-img/';

/*if (!is_dir($uploadDir)) {

    mkdir($uploadDir, 0777, true); // フォルダを作成

}*/

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {

    $file = $_FILES['file'];

    // エラーチェック

    if ($file['error'] !== UPLOAD_ERR_OK) {

        die('アップロードエラーが発生しました。');

    }

    // ファイル名を安全に生成

    $filename = uniqid() . '_' . basename($file['name']);

    $filepath = $uploadDir . $filename;

    // ファイルをサーバーに移動

    if (move_uploaded_file($file['tmp_name'], $filepath)) {

        // DBにファイルパスを保存

        $stmt = $pdo->prepare("
    INSERT INTO product 
    (product_id, product_name, zaiko_kosuu, seisanchi, alcohol_dosuu, price, product_image, product_detel, detailed_ex, category_id) 
    VALUES (:product_id, :product_name, :zaiko_kosuu, :seisanchi, :alcohol_dosuu, :price, :product_image, :product_detel, :detailed_ex, :category_id)
");

$stmt->execute([
    ':product_id' => $product_id,
    ':product_name' => $product_name,
    ':zaiko_kosuu' => $zaiko_kosuu,
    ':seisanchi' => $seisanchi,
    ':alcohol_dosuu' => $alcohol_dosuu,
    ':price' => $price,
    ':product_image' => $filename,
    ':product_detel' => $product_detel,
    ':detailed_ex' => $detailed_ex,
    ':category_id' => $category_id,
]);


        echo 'アップロード成功: ' . htmlspecialchars($filename);

    } else {

        echo 'ファイルの保存に失敗しました。';

    }

} else {

    echo '無効なリクエストです。';

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
            <h1 class="complete-title">商品登録を<br>
            完了しました<br></h1>
        </div>
        <a href="../product-list/index.php" class="btn back-home-btn">
            <p>ホームに戻る</p>
        </a>
    

        
    </div>
</body>
</html>