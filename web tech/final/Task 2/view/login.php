<?php
session_start();

if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] === true) {
    header("Location: dashboard.php");
    exit();
}

$theme = $_COOKIE["theme"] ?? "light";
$bgColor = ($theme === "dark") ? "#1e1e1e" : "#ffffff";
$textColor = ($theme === "dark") ? "#f5f5f5" : "#111111";
$boxColor = ($theme === "dark") ? "#2e2e2e" : "#f3f3f3";

$errors = $_SESSION["login_errors"] ?? [];
$old = $_SESSION["login_old"] ?? [];
$generalError = $_SESSION["login_general_error"] ?? '';

unset($_SESSION["login_errors"]);
unset($_SESSION["login_old"]);
unset($_SESSION["login_general_error"]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="background-color: <?php echo $bgColor; ?>; color: <?php echo $textColor; ?>; font-family: Arial;">
    <div style="width: 420px; margin: 40px auto; padding: 20px; background: <?php echo $boxColor; ?>;">
        <h2>Login</h2>

        <form method="post" action="../controllers/AuthController.php?action=login">
            <table cellpadding="8">
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($old["username"] ?? ''); ?>">
                    </td>
                    <td style="color:red;">
                        <?php echo $errors["username"] ?? ''; ?>
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                    <td style="color:red;">
                        <?php echo $errors["password"] ?? ''; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td style="color:red;">
                        <?php echo $generalError; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Login">
                    </td>
                </tr>
            </table>
        </form>

        <p>New user? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>