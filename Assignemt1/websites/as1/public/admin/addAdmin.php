<?php
define('ROOT', dirname(__DIR__, 2));
require_once ROOT . '/utils/loadPage.php';
AuthAdmin();
require_once ROOT . '/utils/loadCreateUser.php';
loadCreateUser(false);
