<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('connect.php'); ?>
<?php
$error['password'] = '';
//ログインボタンが押されたら実行
if(!empty($_POST)) {
    //パスワードが空であれば$errorにblankを格納
    if(empty($_POST['password'])) {
        $error['password'] = 'blank';
    }
    unset($_SESSION['user']);
    $sql = $db->prepare('select * from users where id=? and password=?');
    $sql->execute(array($_POST['user'], sha1($_POST['password'])));
    foreach($sql as $row) {
        $_SESSION['user'] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'password' => $row['password']
        ];
    }
}
//ユーザー名とパスワードが一致したらログイン
if(isset($_SESSION['user'])) {
    header('location:menu.php');
    exit();
}
?>

<h1>ログインする</h1>
<p>ユーザー名とパスワードを入力してください</p>
<form action="" method="POST">
ユーザー名
<select name="user">
    <?php foreach($db->query('select * from users') as $users): ?>
    <option value="<?php echo $users['id']; ?>"><?php echo $users['name']; ?></option>
    <?php endforeach; ?>
</select><br>
パスワード
<input type="text" name="password"><br>
<?php if($error['password'] === 'blank') echo '*パスワードを入力してください'.'<br>'; ?>
<input type="submit" value="ログインする">
</form>
<p>&raquo;<a href="join/">ユーザー登録をする</a></p>

<?php require_once('footer.php'); ?>