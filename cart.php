<!-- カートに商品がない場合 -->
<?php
if(empty($_SESSION['order'])) {
    echo 'カートに商品がありません';
    exit();
}
?>
<!-- カートに商品がある場合 -->
<?php $total = 0; ?>
<table>
    <th>商品番号</th><th>商品名</th><th>価格</th><th>数量</th><th>小計</th>
    <?php foreach($_SESSION['order'] as $id => $order): ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $order['name']; ?></td>
            <td><?php echo $order['price']; ?></td>
            <td><?php echo $order['count']; ?></td>
            <?php $subtotal = $order['price'] * $order['count']; ?>
            <?php $total += $subtotal; ?>
            <td><?php echo $subtotal; ?></td>
            <td><a href="cart_delete.php?id=<?php echo $id; ?>">削除</a></td>
        </tr>
    <?php endforeach; ?>
    <tr><td>合計</td><td></td><td></td><td></td><td><?php echo $total; ?></td></tr>
</table>
<a href="menu.php">他にも注文する</a><br>
<a href="order.php">注文する</a>