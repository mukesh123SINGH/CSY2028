<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
AuthUser();
if (isFormSubmit()) {
    $data = $_POST['data'];
    $data['user'] = $_SESSION['user']['email'];
    executeQuery("insert into  review (user,auctionUser,review) values(:user,:auctionUser,:review)", $data);
    header("Location:/auctionPage.php?pk=" . $_POST['auctionId'], true);
}
