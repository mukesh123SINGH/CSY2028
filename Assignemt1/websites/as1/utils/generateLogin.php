<?php
require_once ROOT . '/utils/loadPage.php';
function generateLogin($role = "user")
{
    $reqData = ["user" => ["tbName" => "user", "redirect" => "/"], "admin" => ["tbName" => "admin", "redirect" => "/admin/manageAdmin.php"]];
    if (isFormSubmit()) {
        try {
            $data = $_POST['data'];
            $user = executeQuery("select * from {$reqData[$role]["tbName"]} where email=:email", ["email" => $data['email']])[0] ?? false;

            if (!$user) throw new Exception("email or password incorrect");
            if (!password_verify($data['password'], $user['password'])) throw new Exception("email or password incorrect");
            unset($user['password']);
            $_SESSION[$role] = $user;
            header("Location:{$reqData[$role]['redirect']}");
        } catch (\Throwable $th) {
            showFailedAlert($th->getMessage());
        }
    }
    loadPage("loginForm", ["data" => $data ?? []]);
}
