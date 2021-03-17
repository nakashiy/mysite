<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('list.php'); ?>
<?php require_once('connect.php'); ?>
<?php require_once('sql.php'); ?>
<?php
$sql = $db->prepare($history);
$sql->execute(array($_SESSION['user']['id']));
?>

<h1>購入履歴(<?php echo $_SESSION['user']['name']; ?>)</h1>
<?php $total = 0; ?>
<?php $count = 0; ?>
<table>
    <th>購入日</th><th>商品名</th><th>数量</th>
    <?php foreach($sql as $row): ?>
    <tr>
        <td><?php echo $row['order_date']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['count']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once('footer.php'); ?>