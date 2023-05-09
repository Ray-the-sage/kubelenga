<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Perform validation
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Validate username and password (sample validation, modify as per your needs)
  if ($username === "admin" && $password === "password") {
    // Store username in session
    $_SESSION["username"] = $username;

    // Redirect to the home page or any other authenticated page
    header("Location: home.php");
    exit();
  } else {
    // Invalid login, display error message
    $errorMessage = "Invalid username or password!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="log-in.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <form method="post" action="login.php">
      <h2>Login</h2>
      <?php if (isset($errorMessage)) { ?>
        <div class="error"><?php echo $errorMessage; ?></div>
      <?php } ?>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Login">
      </div>