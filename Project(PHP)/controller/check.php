<?php
session_start();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username
    $username = trim($_POST["username"]);
    if (empty($username) || str_word_count($username) < 2) {
        $errors['username'] = "Enter first and last name";
    }

    // Email
    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Enter a valid email";
    }

    // Password
    $password = $_POST["password"];
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }

    // Confirm Password
    $confirm_password = $_POST["confirm_password"];
    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    // Phone
    $phone = trim($_POST["phone"]);
    if (!preg_match('/^\d{10}$/', $phone)) {
        $errors['phone'] = "Enter a 10-digit number";
    }

    // Gender
    $gender = $_POST["gender"] ?? '';
    if (empty($gender)) {
        $errors['gender'] = "Select your gender";
    }

    // DOB
    $dob = $_POST["dob"];
    if (empty($dob)) {
        $errors['dob'] = "Select your birth date";
    }

    // Country
    $country = $_POST["country"];
    if (empty($country)) {
        $errors['country'] = "Select a country";
    }

    // Terms
    if (!isset($_POST["terms"])) {
        $errors['terms'] = "You must agree to the terms";
    }

    // Final check
    if (empty($errors)) {
        $_SESSION['status'] = true;
        header('location: ../view/login.html');
        // echo "<h2 style='color:green;'>Form Submitted Successfully!</h2>";
        // echo "<h3>User Details:</h3>";
        // echo "<ul>";
        // echo "<li><strong>Username:</strong> " . htmlspecialchars($username) . "</li>";
        // echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
        // echo "<li><strong>Phone Number:</strong> " . htmlspecialchars($phone) . "</li>";
        // echo "<li><strong>Gender:</strong> " . htmlspecialchars($gender) . "</li>";
        // echo "<li><strong>Date of Birth:</strong> " . htmlspecialchars($dob) . "</li>";
        // echo "<li><strong>Country:</strong> " . htmlspecialchars($country) . "</li>";
        // echo "</ul>";
        // echo "<p><a href='javascript:history.back()'>← Back to form</a></p>";
    } else {
        echo "<h3 style='color:red;'>Please correct the following errors:</h3><ul>";
        foreach ($errors as $msg) {
            echo "<li>$msg</li>";
        }
        echo "</ul>";
        echo "<p><a href='javascript:history.back()'>Back to form</a></p>";
    }
}
?>
