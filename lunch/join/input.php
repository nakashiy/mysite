<?php require_once('../header.php'); ?>
<?php require_once('../connect.php'); ?>
<?php
session_start();
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
<?php
if(isset($_POST)) {
    $error = array('name' => '', 'password' => '');

    if($_POST['name'] === '') {
        $error['name'] = 'blank';
    }
    if($_POST['password'] === '') {
        $error['password'] = 'blank';
    }
    echo "<pre>";
    print_r($error);
    echo "</pre>";

    if($error['name'] === '' && $error['password'] === '') {
        $_SESSION = array('name' => $_POST['name'], 'password' => $_POST['password']);

        header('location:output.php');
    }    
}
?>

<h1>ユーザー登録</h1>
<p>ユーザー名とパスワードを入力してください</p>
<form action="" method="POST">
ユーザー名
<input type="text" name="name"><br>
<p><?php if($error['name'] === 'blank') echo '*ユーザー名を入力してください'; ?></p>
パスワード
<input type="password" name="password"><br>
<p><?php if($error['password'] === 'blank') echo '*パスワードを入力してください'; ?></p>
<input type="submit" value="登録">
</form>

<?php require_once('../footer.php'); ?>