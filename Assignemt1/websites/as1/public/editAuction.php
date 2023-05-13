<?php
define('ROOT', dirname(__DIR__, 1));
require_once ROOT . '/utils/loadPage.php';
AuthUser();
$currentItem = [];
if (isFormSubmit()) {
    $currentItem = $_POST['data'];
    $currentItem["id"] = $_GET['pk'];
    try {
        $queryString = "update  auction set title=:title,description=:description,categoryId=:categoryId,endDate=:endDate";

        if ($_FILES['image']['name']) {
            $currentItem['image'] = "/images/auctions/" . date('Y-m-d H:i:s') . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], ROOT . "/public" . $currentItem['image']);
            $queryString .= ",image=:image";
        }
        executeQuery($queryString . "  where id=:id", $currentItem, "auction edited", "unable to edit auction");
        $currentItem = [];
    } catch (\Throwable $th) {
        showFailedAlert($th->getMessage());
    }
}
if (isset($_GET['pk'])) {
    $currentItem = executeQuery("select * from auction where id=:id and user=:user", ["id" => $_GET['pk'], "user" => $_SESSION['user']['email']])[0] ?? [];
    if ($currentItem) loadPage('auctionForm', ["currentItem" => $currentItem, "edit" => true]);
    else {
        echo "error 404 unauthorized";
?>
        <script>
            setTimeout(() => {
                location.href = "/";
            }, 3000);
        </script>
    <?php
    }
} else {
    echo "page not found";
    ?>
    <script>
        setTimeout(() => {
            location.href = "/";
        }, 3000);
    </script>
<?php
}
