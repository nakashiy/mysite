<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('list.php'); ?>
<?php require_once('connect.php'); ?>

<h1>カート</h1>

<?php
if(!empty($_POST)) {
    $id = $_POST['id'];
    //order変数が未定義の場合は初期化
    if(!isset($_SESSION['order'])) {
        $_SESSION['order'] = [];
    }
    //注文数を計算する変数を初期化
    $count = 0;
    //既に同じ商品がカートに入っている場合は現在の数量を取得
    if(isset($_SESSION['order'][$id])) {
        $count = $_SESSION['order'][$id]['count'];
    }
    //対象の商品のカート変数を定義
    $_SESSION['order'][$id] = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'count' => $count += $_POST['count']
    ];
    echo 'カートに商品を追加しました';
    echo '<hr>';
}
?>
<?php require_once('cart.php'); ?>
<?php require_once('footer.php'); ?>