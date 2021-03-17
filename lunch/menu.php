<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('list.php'); ?>
<?php require_once('connect.php'); ?>

<?php
//ログインしていない(url直打ちの)場合はログイン画面へ
if(!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>

<h1>メニュー</h1>
<p>ようこそ <?php echo $_SESSION['user']['name']; ?> さん</p>
<p><a href="logout.php">ログアウト</a></p>

<?php foreach($db->query('select * from menus') as $row): ?>
<div class="menu">
    <form action="cart_insert.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
    <div><?php echo $row['name']; ?></div>
    <img class="image" src="image/<?php echo $row['name']; ?>.jpg">
    <div><?php echo $row['price']; ?>円</div>
    <select name="count">
        <?php for($i=1;$i<10;$i++): ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
    </select>
    <input type="submit" value="カートへ追加">
    </form>
</div>
<?php endforeach; ?>
<?php require_once('footer.php'); ?>