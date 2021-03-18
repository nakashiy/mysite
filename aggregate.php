<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('list.php'); ?>
<?php require_once('connect.php'); ?>
<?php require_once('sql.php'); ?>

<h1>集計</h1>
<?php $total = 0; ?>
<?php $count = 0; ?>
<table>
    <th>注文日</th><th>商品名</th><th>価格</th><th>注文数</th><th>金額</th>
    <?php foreach($db->query($aggregate) as $row): ?>
        <tr>
            <td><?php echo $row['order_date']; ?></td>
            <td><a href="aggregate_detail.php?name=<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['count']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <?php $total += $row['total']; ?>
            <?php $count += $row['count']; ?>
        </tr>
    <?php endforeach; ?>
    <td>合計</td><td></td><td></td><td><?php echo $count; ?></td><td><?php echo $total; ?></td>
</table>

<?php require_once('footer.php'); ?>