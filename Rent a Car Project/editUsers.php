<?php
include 'config.php';
session_start();
$id = $_GET['id'];
$res = $mysqli->query("SELECT * FROM users WHERE id=$id");
$user = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Edit User</h2>

<form action="update_user.php" method="POST">
  <input type="hidden" name="id" value="<?= $user['id'] ?>">
  <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>"></label><br>
  <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"></label><br>
  <button type="submit">Update</button>
</form>


<a href="users.php">← Back</a>
</body>
</html>
