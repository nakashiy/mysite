<?php session_start(); ?>
<?php require_once('header.php'); ?>

<?php unset($_SESSION['user']); ?>
<?php unset($_SESSION['order']); ?>
<p>ログアウトしました</p>
<a href="login.php">ログイン画面へ</a>

<?php require_once('footer.php'); ?>