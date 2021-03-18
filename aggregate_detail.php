<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('list.php'); ?>
<?php require_once('connect.php'); ?>
<?php require_once('sql.php'); ?>
<?php
$sql = $db->prepare($aggregate_detail);
$sql->execute(array($_GET['name']));
?>

<h1>集計(<?php echo $_GET['name']; ?>)</h1>
<?php $total = 0; ?>
<?php $count = 0; ?>
<table>
    <th>購入者</th><th>購入数</th>
    <?php foreach($sql as $row): ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['count']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once('footer.php'); ?>