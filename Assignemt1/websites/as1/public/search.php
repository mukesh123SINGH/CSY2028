<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
if (isset($_GET['search'])) {
    $data = executeQuery("select category.name as catName,auction.*,match (auction.title,auction.description) against(:search) as score from auction inner join category on category.id=auction.categoryId  where  MATCH(auction.title, auction.description) AGAINST(:search)
ORDER BY score DESC", ["search" => $_GET['search']]);
}
loadPage('categoryPages', ["data" => $data ?? []]);
