<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
$data = executeQuery("SELECT  category.name AS catName, auction.*,bid.amount, TIMESTAMPDIFF(SECOND, NOW(), auction.endDate) AS `interval`
FROM auction
INNER JOIN category ON category.id = auction.categoryId
left join bid on bid.productId=auction.id  where (bid.amount=(select max(amount) from bid) OR bid.amount is null) and
 TIMESTAMPDIFF(SECOND, NOW(), auction.endDate)>0 limit 10
");
loadPage('categoryPages', ["data" => $data ?? []]);
