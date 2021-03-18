<?php
$dsn = 'mysql:dbname=lunch;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try {
    //例外が発生する可能性があるコード
    $db = new PDO($dsn,$user,$password);
    //echo '接続に成功しました。';
} catch (PDOException $e) {
    //例外発生時の処理
    echo "接続エラー：{$e->getmessage()}";
} finally {
    //例外の有無にかかわらず実行されるコード
}
?>