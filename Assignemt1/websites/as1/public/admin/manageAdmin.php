<?php
define('ROOT', dirname(__DIR__, 2));
require_once ROOT . '/utils/loadPage.php';
AuthAdmin();
$data = executeQuery("select * from admin ");
loadPage('manageAdmin', ["data" => $data]);
