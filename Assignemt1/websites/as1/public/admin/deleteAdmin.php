<?php
define('ROOT', dirname(__DIR__, 2));
require_once ROOT . '/utils/loadPage.php';
AuthAdmin();
require_once ROOT . '/component/head.php';
executeQuery("delete from admin  where email=:id", ["id" => $_GET["pk"]], "admin deleted!!", "unable to delete");
?>
<script>
    setTimeout(() => {
        location.href = "/admin/manageAdmin.php"
    }, 2000);
</script>