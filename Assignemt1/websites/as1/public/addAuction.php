<?php
define('ROOT', dirname(__DIR__, 1));
require(ROOT . "/utils/checkLoginStatus.php");
AuthUser();
require_once ROOT . '/utils/loadPage.php';

if (isFormSubmit()) {
    $currentItem = $_POST['data'];
    $currentItem["user"] = $_SESSION['user']['email'];
    try {
        if (!isset($_FILES['image']['name']))  throw new Exception("chose a file");
        $currentItem['image'] = "/images/auctions/" . date('Y-m-d H:i:s') . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], ROOT . "/public/" . $currentItem['image']);
        executeQuery("INSERT INTO auction (title, description, categoryId, endDate, image,user) VALUES (:title, :description,:categoryId, :endDate, :image,:user)", $currentItem, "auction item added", "unable to  add auction item");
        $currentItem = [];
    } catch (\Throwable $th) {
        showFailedAlert($th->getMessage());
    }
}
loadPage('auctionForm', ["currentItem" => $currentItem ?? []]);
