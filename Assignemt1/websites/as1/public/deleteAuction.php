<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
AuthUser();
require_once ROOT . '/component/head.php';
executeQuery("delete from auction  where id=:id and user=:user", ["id" => $_GET["pk"], "user" => $_SESSION['user']['email']], "auction deleted!!", "unable to delete");
?>
<script>
    setTimeout(() => {
        location.href = "/"
    }, 2000);
</script>