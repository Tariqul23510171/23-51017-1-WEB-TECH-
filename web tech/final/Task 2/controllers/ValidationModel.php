<?php

class ValidationModel
{
    public static function validateRegistration($username, $email, $password, $confirmPassword)
    {
        $errors = [];

        if (empty($username)) {
            $errors["username"] = "Username is required";
        } elseif (strlen($username) < 3) {
            $errors["username"] = "Username must be at least 3 characters";
        }

        if (empty($email)) {
            $errors["email"] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }

        if (empty($password)) {
            $errors["password"] = "Password is required";
        } elseif (strlen($password) < 6) {
            $errors["password"] = "Password must be at least 6 characters";
        }

        if (empty($confirmPassword)) {
            $errors["confirmPassword"] = "Confirm password is required";
        } elseif ($password !== $confirmPassword) {
            $errors["confirmPassword"] = "Passwords do not match";
        }

        return $errors;
    }

    public static function validateLogin($username, $password)
    {
        $errors = [];

        if (empty($username)) {
            $errors["username"] = "Username is required";
        }

        if (empty($password)) {
            $errors["password"] = "Password is required";
        }

        return $errors;
    }
}
?>