<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
if (isset($_GET['pk'])) {
    $data = executeQuery("select category.name as catName,auction.*,bid.amount,user.name as author,user.email as userId from auction inner join category on category.id=auction.categoryId inner join user on user.email=auction.user left join bid on bid.productId =auction.id where (bid.amount=(select max(amount) from bid) OR bid.amount is null) and auction.categoryId=:id", ["id" => $_GET['pk']]);
}

loadPage('categoryPages', ["data" => $data ?? []]);
