<?php
// controller/check.php

require_once('DB.php');

function addUser($user) {
    $con = getConnection();
    $sql = "INSERT INTO users (username, password, email)
            VALUES (
                '{$user['username']}'
                '{$user['password']}'
                '{$user['email']}',
            )";
    return mysqli_query($con, $sql);
}

function login($user) {
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE email='{$user['email']}' AND password='{$user['password']}'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result) === 1;
}
?>
