<?php
define('ROOT', dirname(__DIR__, 2));
require_once ROOT . '/utils/loadPage.php';
AuthAdmin();
$data = [];
if (isFormSubmit()) {
    $data = $_POST['data'];
    $data['id'] = $_GET['pk'];
    executeQuery("update category set name=:name where id=:id", $data, "data updated", "unable to update");
    $data = [];
}
if ($_GET['pk']) {
    $data = executeQuery("select * from category where id=:id", ["id" => $_GET['pk']])[0] ?? [];
    loadPage('categoryForm', ["currentCategory" => $data, "edit" => true]);
} else {
    echo "data not found";
}
