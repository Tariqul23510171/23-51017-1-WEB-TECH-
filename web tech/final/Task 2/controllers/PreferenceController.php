<?php
session_start();

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
    header("Location: ../views/login.php");
    exit();
}

$theme = $_POST["theme"] ?? "light";

if ($theme !== "light" && $theme !== "dark") {
    $theme = "light";
}

setcookie("theme", $theme, time() + (30 * 24 * 60 * 60), "/");

header("Location: ../views/settings.php");
exit();
?>