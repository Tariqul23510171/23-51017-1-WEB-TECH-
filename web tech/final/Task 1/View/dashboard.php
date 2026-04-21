<?php
session_start();

$username = $_SESSION["username"] ?? "";
$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;

if(!$isLoggedIn){
    Header("Location: login.php");
    exit();
}
?>

<html>
    <body>
        <h1>Greetings! Welcome to Dashboard <strong><?php echo $username; ?></strong></h1>
        <form method="post" action="../Controller/logout.php">
            <button type="submit">Logout</button>
        </form>
    </body>
</html>
