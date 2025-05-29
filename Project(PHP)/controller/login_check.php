<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    
    $valid_users = [
        'user one' => '123456',
        'user two' => '123456'
    ];
    
    if (array_key_exists($username, $valid_users) && $password === $valid_users[$username]) {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: ../controller/Catalog_ph.php");
        exit;
    } else {
        
        header("Location: ../view/login.html?error=invalid_credentials");
        exit;
    }
} else {
    
    header("Location: ../view/login.html");
    exit;
}
?>