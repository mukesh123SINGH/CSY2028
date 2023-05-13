<?php
define('ROOT', dirname(__DIR__, 2));
require_once ROOT . '/utils/loadPage.php';
AuthAdmin();
$data = [];
if (isFormSubmit()) {

    $data = $_POST['data'];
    require_once ROOT . '/model/model.php';
    addCategory($data);
    $data = [];
}
loadPage('categoryForm', ["currentCategory" => $data]);
