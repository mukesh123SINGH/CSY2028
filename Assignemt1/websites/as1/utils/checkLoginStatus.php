<?php
if (session_status() == PHP_SESSION_NONE) session_start();
function isUserLogin()
{
    return isset($_SESSION['user']) && $_SESSION['user'];
}
function isAdminLogin()
{
    return isset($_SESSION['admin']) && $_SESSION['admin'];
}
function AuthUser()
{
    if (!isUserLogin()) header("location:/userLogin.php", true);
}
function AuthAdmin()
{
    if (!isAdminLogin()) header("location:/adminLogin.php", true);
}
