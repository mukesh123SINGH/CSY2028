<?php

function loadCreateUser(bool $register = true)
{
    if (isFormSubmit()) {
        $tbName = $register ? "user" : "admin";
        $data = $_POST['data'];
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        executeQuery("insert into {$tbName} (name,email,password) values(:name,:email,:password)", $data, "{$tbName} added successfully", "email already taken");
        $data = [];
    }
    loadPage('register', ["register" => $register, "formData" => $data ?? []]);
}
