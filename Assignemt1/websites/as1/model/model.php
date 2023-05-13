<?php
function addCategory(array $data)
{
    $query = "insert into category (name) values (:name)";
    executeQuery($query, $data, "category added successfully", "unable to add category");
}

function getCategory()
{
    $query = "select * from category";
    $res = executeQuery($query, errorMsg: "unable to load");
    return $res;
}
function getAdminById($email)
{
    $query = "select * from admin where email=:email";
    $res = executeQuery($query, ["email" => $email], errorMsg: "unable to load");
    return $res[0] ?? [];
}
