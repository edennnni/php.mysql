<?php
include 'config.php';
session_start();

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $res = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ($res && $res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard.php');
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post" action="">
    <h2>Sign In</h2>
    
    <?php if ($error): ?>
        <p class="error">Invalid email or password.</p>
    <?php endif; ?>
    
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    
    <button type="submit">Sign In</button>
</form>

</body>
</html>
