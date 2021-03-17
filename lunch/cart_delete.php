<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('list.php'); ?>
<?php require_once('connect.php'); ?>

<h1>カート</h1>

<?php
unset($_SESSION['order'][$_GET['id']]);
echo 'カートに商品を削除しました';
echo '<hr>';
?>

<?php require_once('cart.php'); ?>
<?php require_once('footer.php'); ?>