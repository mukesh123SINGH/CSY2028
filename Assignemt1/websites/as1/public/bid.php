<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
require_once ROOT . '/component/head.php';
AuthUser();
if (isFormSubmit()) {
    $data = $_POST['data'];
    $data['user'] = $_SESSION['user']['email'];
    executeQuery("insert into bid (user,amount,productId) values(:user,:amount,:productId)", $data, "bid added success", "bid added failed");
?>
    <script>
        let id = <?php echo $data['productId'] ?>;
        setTimeout(() => window.location.href = `/auctionPage.php?pk=${id}`, 2000);
    </script>
<?php
}
