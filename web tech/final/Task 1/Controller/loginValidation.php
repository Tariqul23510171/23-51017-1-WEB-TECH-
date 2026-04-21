<?php 
session_start();

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

$hasUsernameError = false;
$hasPasswordError = false;

if(!$username){
    $_SESSION["usernameError"] = "Username is required";
    $hasUsernameError = true;
}else{
    unset($_SESSION["usernameError"]);
}

if(!$password){
    $_SESSION["passwordError"] = "Password is required";
    $hasPasswordError = true;
}else{
    unset($_SESSION["passwordError"]);
}



if($hasUsernameError || $hasPasswordError ){
$_SESSION["username"]= $username;  

header("Location: ../View/login.php");
    exit();
}else{
    
    $users = array("admin"=>"password", "user"=>"123");
  $isFound = false;
foreach($users as $user => $pass){
    if($username === $user && $password === $pass ){
        $isFound = true;
        $_SESSION["username"] = $username;
        $_SESSION["isLoggedIn"] = true;
        
        header("Location: ../View/dashboard.php");
        
    }}
    
    if(!$isFound){
        $_SESSION["credentialError"] = "Your username or password is incorrect!";
        Header("Location: ../View/login.php");
    }


}
?>
