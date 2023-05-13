<?php
define('ROOT', dirname(__DIR__, 2));
require_once ROOT . '/utils/loadPage.php';
AuthAdmin();
$id = $_GET['pk'] ?? null;
if (isFormSubmit()) {
    $data = $_POST['data'];
    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
    executeQuery("update admin set name=:name,email=:email,password=:password where email=:pk", $data + $_GET, "admin edited successfully", "email already taken");
    $id = $data["email"];
?>
    <script>
        let id = '<?php echo $data['email'] ?>';
        history.pushState(null, null, `/admin/editAdmin.php?pk=${id}`)
    </script>
<?php
}
if (isset($_GET['pk'])) {
    require_once ROOT . '/model/model.php';
    $data = getAdminById($id);
}
loadPage('register', ["register" => false, "formData" => $data ?? []]);
