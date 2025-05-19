<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPass = $_POST["new_password"];
    // Simulate password update
    echo "Password updated successfully. <a href='dashboard.php'>Back</a>";
}
?>
