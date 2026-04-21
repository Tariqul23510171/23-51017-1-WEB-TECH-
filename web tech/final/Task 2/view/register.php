<?php
session_start();

$theme = $_COOKIE["theme"] ?? "light";
$bgColor = ($theme === "dark") ? "#1e1e1e" : "#ffffff";
$textColor = ($theme === "dark") ? "#f5f5f5" : "#111111";
$boxColor = ($theme === "dark") ? "#2e2e2e" : "#f3f3f3";

$errors = $_SESSION["register_errors"] ?? [];
$old = $_SESSION["register_old"] ?? [];

unset($_SESSION["register_errors"]);
unset($_SESSION["register_old"]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body style="background-color: <?php echo $bgColor; ?>; color: <?php echo $textColor; ?>; font-family: Arial;">
    <div style="width: 420px; margin: 40px auto; padding: 20px; background: <?php echo $boxColor; ?>;">
        <h2>Registration</h2>

        <form method="post" action="../controllers/AuthController.php?action=register">
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
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo htmlspecialchars($old["email"] ?? ''); ?>">
                    </td>
                    <td style="color:red;">
                        <?php echo $errors["email"] ?? ''; ?>
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
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password">
                    </td>
                    <td style="color:red;">
                        <?php echo $errors["confirmPassword"] ?? ''; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Register">
                    </td>
                </tr>
            </table>
        </form>

        <p>Already registered? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>