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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
</head>
<body style="background-color: <?php echo $bgColor; ?>; color: <?php echo $textColor; ?>; font-family: Arial;">
    <div style="width: 420px; margin: 40px auto; padding: 20px; background: <?php echo $boxColor; ?>;">
        <h2>Settings</h2>

        <form method="post" action="../controllers/PreferenceController.php">
            <p>Select Theme:</p>

            <label>
                <input type="radio" name="theme" value="light" <?php echo ($theme === "light") ? "checked" : ""; ?>>
                Light
            </label>
            <br><br>

            <label>
                <input type="radio" name="theme" value="dark" <?php echo ($theme === "dark") ? "checked" : ""; ?>>
                Dark
            </label>
            <br><br>

            <input type="submit" value="Save Preference">
        </form>

        <p>
            <a href="dashboard.php">Back to Dashboard</a>
        </p>
    </div>
</body>
</html>