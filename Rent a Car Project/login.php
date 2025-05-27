<?php
include 'config.php';
session_start();


$email = $mysqli->real_escape_string($_POST['email']);
$password   = $_POST['password'];


$res = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ($res && $res->num_rows === 1) {
    $user = $res->fetch_assoc();
    if (password_verify($pwd, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit;
    }
}


if failed


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <p class="error">Invalid email or password.</p>
    <a href="signin.php">Try again</a>
  </div>
</body>
</html>
