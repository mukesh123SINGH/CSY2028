<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
if (isset($_GET['pk'])) {
    $auction = executeQuery("select category.name as catName,auction.*,bid.amount,user.name as author from auction inner join category on category.id=auction.categoryId inner join user on user.email=auction.user left join bid on bid.productId =auction.id where (bid.amount=(select max(amount) from bid) OR bid.amount is null) and auction.id=:id", ["id" => $_GET['pk']]);
    $data = array_map(function ($item) {
        $item['comment'] = executeQuery("select review.* ,user.name  from review
        inner join user on user.email=review.user where review.auctionUser=:user", ["user" => $item['user']]);
        return $item;
    }, $auction);
}

loadPage('auctionPage', ["data" => $data[0] ?? []]);
