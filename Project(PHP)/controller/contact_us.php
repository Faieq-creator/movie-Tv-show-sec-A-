<?php
session_start();
$errors = [];

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);
    $userCaptcha = trim($_POST["captcha"]);
    $correctCaptcha = trim($_POST["correctAnswer"]);

    // Validate Name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate Email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    // Validate Subject
    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }

    // Validate Message
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

    // Validate CAPTCHA
    if ($userCaptcha === "" || !is_numeric($userCaptcha)) {
        $errors[] = "Please enter a valid number for CAPTCHA.";
    } elseif ((int)$userCaptcha !== (int)$correctCaptcha) {
        $errors[] = "CAPTCHA answer is incorrect.";
    }

    // Final decision
    if (empty($errors)) {
        echo "<script>
        alert('Message sent successfully!');
        window.location.href='../controller/contact_us1.php';
        </script>";
        
    } else {
        echo "<h3 style='color:red;'>Please correct the following errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><p><a href='javascript:history.back()'>← Back to form</a></p>";
    }
}
?>
