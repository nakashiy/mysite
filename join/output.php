<?php require_once('../header.php'); ?>
<?php require_once('../connect.php'); ?>

<?php
session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
$sql = $db->prepare('insert into users set name=?, password=?');
$sql->execute(array($_SESSION['name'], sha1($_SESSION['password'])));
echo 'ユーザー登録が完了しました';
?>

<?php require_once('../footer.php'); ?>