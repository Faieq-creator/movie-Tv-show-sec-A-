<?php 
require_once 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border: 2px solid #cc0000;
            border-radius: 10px;
            width: 500px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #cc0000;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            color: #cc0000;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #cc0000;
            color: #fff;
            border: none;
            font-size: 1.1em;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #a80000;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin: -8px 0 10px 0;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Contact Us</h1>
    <form method="post" action="contact_us.php" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <p class="error" id="nameError"></p>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <p class="error" id="emailError"></p>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject">
        <p class="error" id="subjectError"></p>

        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
        <p class="error" id="messageError"></p>

        <label id="captchaLabel"></label>
        <input type="text" id="captcha" name="captcha" placeholder="Enter answer">
        <p class="error" id="captchaError"></p>

        <!-- Hidden field to store correct answer -->
        <input type="hidden" id="correctAnswer" name="correctAnswer">

        <input type="submit" value="Submit">
    </form>
</div>

<script>
    let correctAnswer = 0;

    function generateCaptcha() {
        const num1 = Math.floor(Math.random() * 10 + 1);
        const num2 = Math.floor(Math.random() * 10 + 1);
        const operator = Math.random() > 0.5 ? '+' : '-';

        document.getElementById("captchaLabel").innerText = `Solve: ${num1} ${operator} ${num2} = ?`;

        correctAnswer = operator === '+' ? num1 + num2 : num1 - num2;
        document.getElementById("correctAnswer").value = correctAnswer;
    }

    function validateForm() {
        let valid = true;

        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const subject = document.getElementById("subject").value.trim();
        const message = document.getElementById("message").value.trim();
        const captcha = document.getElementById("captcha").value.trim();
        const correct = parseInt(document.getElementById("correctAnswer").value);

        // Clear previous errors
        document.getElementById("nameError").innerText = "";
        document.getElementById("emailError").innerText = "";
        document.getElementById("subjectError").innerText = "";
        document.getElementById("messageError").innerText = "";
        document.getElementById("captchaError").innerText = "";

        if (name === "") {
            document.getElementById("nameError").innerText = "Name is required.";
            valid = false;
        }

        if (email === "" || !email.includes("@") || !email.includes(".")) {
            document.getElementById("emailError").innerText = "Enter a valid email.";
            valid = false;
        }

        if (subject === "") {
            document.getElementById("subjectError").innerText = "Subject is required.";
            valid = false;
        }

        if (message === "") {
            document.getElementById("messageError").innerText = "Message cannot be empty.";
            valid = false;
        }

        if (captcha === "" || isNaN(captcha)) {
            document.getElementById("captchaError").innerText = "Enter the CAPTCHA answer.";
            valid = false;
        } else if (parseInt(captcha) !== correct) {
            document.getElementById("captchaError").innerText = "Incorrect CAPTCHA answer.";
            valid = false;
        }

        return valid;
    }

    // Generate captcha when page loads
    window.onload = generateCaptcha;
</script>
</body>
</html>
