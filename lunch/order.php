<?php session_start(); ?>
<?php require_once('header.php'); ?>
<?php require_once('list.php'); ?>
<?php require_once('connect.php'); ?>
<?php
//採番用のIDを取得(2つのテーブルに共通の「order_id」で追加するため)
$order_id = 1;
foreach($db->query('select max(order_id) from orders') as $row) {
    $order_id = $row['max(order_id)'] + 1;
}
$sql = $db->prepare('insert into orders set order_id=?, user_id=?, order_date=now()');
if($sql->execute(array($order_id, $_SESSION['user']['id']))) {
    foreach($_SESSION['order'] as $lunch_id => $lunch) {
        $sql = $db->prepare('insert into orders_detail set order_id=?, menu_id=?, count=?');
        $sql->execute(array($order_id, $lunch_id, $lunch['count']));
    }
    unset($_SESSION['order']);
    echo '注文が完了しました';
} else {
    echo '注文手続き中にエラーが発生しました';
}
?>

<?php require_once('footer.php'); ?>