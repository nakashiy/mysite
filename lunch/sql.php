<?php
$aggregate =
'
SELECT
	orders.order_date,
    menus.name,
    menus.price,
    SUM(orders_detail.count) as "count",
    SUM(menus.price * orders_detail.count) as "total"
FROM
	users,
    menus,
    orders,
	orders_detail
WHERE
	orders.user_id = users.id AND
    orders.order_id = orders_detail.order_id AND
    orders_detail.menu_id = menus.id AND
    orders.order_date = CURDATE()
GROUP BY
	orders.order_date,
    menus.name,
    menus.price
';
$aggregate_detail =
'
SELECT
    users.name,
    SUM(orders_detail.count) as "count"
FROM
    users,
    menus,
    orders,
    orders_detail
WHERE
    users.id = orders.user_id AND
    menus.id = orders_detail.menu_id AND
    orders.order_id = orders_detail.order_id AND
    orders.order_date = CURRENT_DATE() AND
    menus.name = ?
GROUP BY
    users.name
';
$history =
'
SELECT
    orders.order_date,
    menus.name,
    SUM(orders_detail.count) as "count"
FROM
    users,
    menus,
    orders,
    orders_detail
WHERE
    users.id = orders.user_id AND
    menus.id = orders_detail.menu_id AND
    orders.order_id = orders_detail.order_id AND
    users.id = ?
GROUP BY
    orders.order_date,
    menus.name
'
?>