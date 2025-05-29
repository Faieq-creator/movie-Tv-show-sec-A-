<?php
session_start();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? "");
    $otp = trim($_POST["otp"] ?? "");
    $newPassword = $_POST["newPassword"] ?? "";
    $confirmPassword = $_POST["confirmPassword"] ?? "";

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Enter a valid email address.";
    }

    // OTP validation (Static demo OTP: 123456)
    if ($otp !== "123456") {
        $errors['otp'] = "Invalid OTP.";
    }

    // Password length
    if (strlen($newPassword) < 6) {
        $errors['newPassword'] = "Password must be at least 6 characters.";
    }

    // Confirm password match
    if ($newPassword !== $confirmPassword) {
        $errors['confirmPassword'] = "Passwords do not match.";
    }


    if (empty($errors)) {
        echo "<h3 style='color:green;'>Password reset successful!</h3>";
        echo "<p><a href='../view/login.html'> Go to Login</a></p>";
    } else {
        echo "<h3 style='color:red;'>Please fix the following errors:</h3><ul>";
        foreach ($errors as $msg) {
            echo "<li>$msg</li>";
        }
        echo "</ul>";
        echo "<p><a href='javascript:history.back()'>← Back to form</a></p>";
    }
}
?>
