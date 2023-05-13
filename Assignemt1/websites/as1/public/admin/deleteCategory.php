<?php
define('ROOT', dirname(__DIR__, 2));
require_once ROOT . '/utils/loadPage.php';
AuthAdmin();
require_once ROOT . '/component/head.php';
executeQuery("delete from category  where id=:id", ["id" => $_GET["pk"]], "category deleted!!", "unable to delete");
?>
<script>
    setTimeout(() => {
        location.href = "/admin/adminCategory.php"
    }, 2000);
</script>