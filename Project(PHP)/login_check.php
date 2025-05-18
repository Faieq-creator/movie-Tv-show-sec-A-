<?php
session_start();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = strtolower(trim($_POST["username"]));
    $password = $_POST["password"];

    if (empty($username)) {
        $errors['username'] = "Username is required";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required";
    }

    if (empty($errors)) {
        $valid_users = [
            "user one" => "123456",
            "user two" => "123456"
        ];

        if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
            $_SESSION['status'] = true;
            $_SESSION['username'] = $username;
            header("Location: catalog_ph.php");
            exit;
        } else {
            $errors['login'] = "Invalid username or password";
        }
    }

    // Display error messages
    echo "<h3 style='color:red;'>Please correct the following errors:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul><p><a href='javascript:history.back()'>Back to login</a></p>";
}
?>
