<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   
    header("Location: ../view/login.html");
    exit;
}
?>