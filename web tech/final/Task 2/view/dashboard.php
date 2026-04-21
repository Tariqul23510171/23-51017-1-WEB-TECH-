<?php
session_start();

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
    header("Location: login.php");
    exit();
}

$theme = $_COOKIE["theme"] ?? "light";
$bgColor = ($theme === "dark") ? "#1e1e1e" : "#ffffff";
$textColor = ($theme === "dark") ? "#f5f5f5" : "#111111";
$boxColor = ($theme === "dark") ? "#2e2e2e" : "#f3f3f3";

$username = $_SESSION["username"] ?? '';
$loginTime = $_SESSION["login_time"] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body style="background-color: <?php echo $bgColor; ?>; color: <?php echo $textColor; ?>; font-family: Arial;">
    <div style="width: 500px; margin: 40px auto; padding: 20px; background: <?php echo $boxColor; ?>;">
        <h2>Dashboard</h2>

        <p>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong></p>
        <p>Login Time: <?php echo htmlspecialchars($loginTime); ?></p>
        <p>Current Theme: <?php echo htmlspecialchars(ucfirst($theme)); ?></p>

        <p>
            <a href="settings.php">Settings</a> |
            <a href="../controllers/AuthController.php?action=logout">Logout</a>
        </p>
    </div>
</body>
</html>