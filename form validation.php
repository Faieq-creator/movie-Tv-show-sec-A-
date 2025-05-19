<?php
$name = $email = "";
$nameErr = $emailErr = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = htmlspecialchars($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  } else {
    $email = htmlspecialchars($_POST["email"]);
  }

  if (empty($nameErr) && empty($emailErr)) {
    $success = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Validation</title>
  <style>
    body { font-family: Arial; padding: 2rem; }
    .error { color: red; font-size: 0.9rem; }
    .success { color: green; font-size: 1rem; margin-top: 1rem; }
    input { display: block; margin-bottom: 1rem; padding: 0.5rem; width: 300px; }
  </style>
</head>
<body>

<h2>Contact Form</h2>

<form id="myForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label>Name:</label>
  <input type="text" name="name" id="name" value="<?php echo $name; ?>">
  <span class="error" id="nameError"><?php echo $nameErr; ?></span>

  <label>Email:</label>
  <input type="text" name="email" id="email" value="<?php echo $email; ?>">
  <span class="error" id="emailError"><?php echo $emailErr; ?></span>

  <input type="submit" value="Submit">
</form>

<?php if ($success): ?>
  <div class="success">Form submitted successfully!</div>
<?php endif; ?>

<script>
document.getElementById("myForm").addEventListener("submit", function(event) {
  let valid = true;

  // Clear previous errors
  document.getElementById("nameError").innerText = "";
  document.getElementById("emailError").innerText = "";

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (name === "") {
    document.getElementById("nameError").innerText = "Name is required";
    valid = false;
  }

  if (email === "") {
    document.getElementById("emailError").innerText = "Email is required";
    valid = false;
  } else if (!email.match(emailPattern)) {
    document.getElementById("emailError").innerText = "Invalid email format";
    valid = false;
  }

  if (!valid) event.preventDefault();
});
</script>

</body>
</html>
