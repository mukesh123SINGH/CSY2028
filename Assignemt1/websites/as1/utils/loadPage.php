<?php
require_once ROOT . '/utils/checkLoginStatus.php';
require_once ROOT . '/utils/connectToDb.php';
function loadPage($page, array $data = [])
{
    require_once ROOT . '/model/model.php';
    $categories = getCategory();
    extract($data);
    require_once ROOT . '/component/head.php';
    require_once ROOT . "/component/{$page}.php";
    require_once ROOT . '/component/footer.php';
}
