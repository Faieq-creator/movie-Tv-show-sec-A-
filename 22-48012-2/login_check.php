<?php
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    
    // Validate credentials (in a real app, you'd check against a database)
    $valid_users = [
        'user one' => '123456',
        'user two' => '123456'
    ];
    
    if (array_key_exists($username, $valid_users) && $password === $valid_users[$username]) {
        // Authentication successful - create session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirect to protected page
        header("Location: Catalog_ph.php");
        exit;
    } else {
        // Authentication failed
        header("Location: login.html?error=invalid_credentials");
        exit;
    }
} else {
    // Not a POST request
    header("Location: login.html");
    exit;
}
?>