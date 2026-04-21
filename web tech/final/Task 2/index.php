<?php
session_start();

$dataFile = __DIR__ . '/data/users.json';
$users = [];

if (file_exists($dataFile)) {
    $content = file_get_contents($dataFile);
    $users = json_decode($content, true);
    if (!is_array($users)) {
        $users = [];
    }
}

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header("Location: views/dashboard.php");
    exit();
}

if (empty($users)) {
    header("Location: views/register.php");
    exit();
}

header("Location: views/login.php");
exit();
?>