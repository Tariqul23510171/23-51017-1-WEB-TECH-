<?php
session_start();
require_once __DIR__ . '/../models/ValidationModel.php';

$action = $_GET['action'] ?? '';
$dataFile = __DIR__ . '/../data/users.json';

if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode([], JSON_PRETTY_PRINT));
}

function readUsers($dataFile)
{
    $content = file_get_contents($dataFile);
    $users = json_decode($content, true);

    if (!is_array($users)) {
        $users = [];
    }

    return $users;
}

function saveUsers($dataFile, $users)
{
    file_put_contents($dataFile, json_encode($users, JSON_PRETTY_PRINT));
}

if ($action === 'register') {
    $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');
    $confirmPassword = trim($_POST["confirm_password"] ?? '');

    $errors = ValidationModel::validateRegistration($username, $email, $password, $confirmPassword);
    $users = readUsers($dataFile);

    foreach ($users as $user) {
        if ($user["username"] === $username) {
            $errors["username"] = "Username already exists";
        }
        if ($user["email"] === $email) {
            $errors["email"] = "Email already exists";
        }
    }

    if (!empty($errors)) {
        $_SESSION["register_errors"] = $errors;
        $_SESSION["register_old"] = [
            "username" => $username,
            "email" => $email
        ];
        header("Location: ../views/register.php");
        exit();
    }

    $users[] = [
        "username" => $username,
        "email" => $email,
        "password" => $password
    ];

    saveUsers($dataFile, $users);

    $_SESSION["username"] = $username;
    $_SESSION["login_time"] = date("Y-m-d h:i:s A");
    $_SESSION["isLoggedIn"] = true;

    header("Location: ../views/dashboard.php");
    exit();
}

if ($action === 'login') {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');

    $errors = ValidationModel::validateLogin($username, $password);

    if (!empty($errors)) {
        $_SESSION["login_errors"] = $errors;
        $_SESSION["login_old"] = [
            "username" => $username
        ];
        header("Location: ../views/login.php");
        exit();
    }

    $users = readUsers($dataFile);
    $isFound = false;

    foreach ($users as $user) {
        if ($user["username"] === $username && $user["password"] === $password) {
            $isFound = true;
            $_SESSION["username"] = $username;
            $_SESSION["login_time"] = date("Y-m-d h:i:s A");
            $_SESSION["isLoggedIn"] = true;
            header("Location: ../views/dashboard.php");
            exit();
        }
    }

    if (!$isFound) {
        $_SESSION["login_general_error"] = "Invalid username or password";
        $_SESSION["login_old"] = [
            "username" => $username
        ];
        header("Location: ../views/login.php");
        exit();
    }
}

if ($action === 'logout') {
    session_unset();
    session_destroy();
    header("Location: ../views/login.php");
    exit();
}
?>