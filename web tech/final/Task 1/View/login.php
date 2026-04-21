<?php 
session_start();

$usernameError = $_SESSION["usernameError"] ?? "";
$passwordError = $_SESSION["passwordError"] ?? "";
$credentialError = $_SESSION["credentialError"] ?? "";
$username = $_SESSION["username"] ?? "";
$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;

if($isLoggedIn){
    Header("Location: dashboard.php");
    exit();
}

unset($_SESSION["usernameError"]);
unset($_SESSION["passwordError"]);
unset($_SESSION["username"]);
unset($_SESSION["credentialError"]);

?>

<html>
<body>
<form method="post" action="../Controller/loginValidation.php">
<table>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" placeholder="Enter username" value="<?php echo $username; ?>"/></td>
        <td style="color:red"><?php echo $usernameError; ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" placeholder="Enter Password"/></td>
        <td style="color:red"><?php echo $passwordError; ?></td>
    </tr>
    <tr>
        <td></td>
        <td style="color:red"><?php echo $credentialError; ?></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Login"/></td>
    </tr>
</table>


</form>
</body>
</html>
