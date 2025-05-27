<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
  <header><h1>Your Tesla Rentals</h1></header>
  <div class="container">
    <p>
      <a href="add_car.php">+ Add Car</a> |
      <a href="logout.php">Logout</a>
    </p>
    <table class="table">
      <tr>
        <th>ID</th><th>Name</th><th>Model</th><th>Rate/day</th><th>Available</th><th>Actions</th>
      </tr>
      <?php
      $res = $mysqli->query("SELECT * FROM cars");
      while ($car = $res->fetch_assoc()):
      ?>
      <tr>
        <td><?= $car['id'] ?></td>
        <td><?= htmlspecialchars($car['name']) ?></td>
        <td><?= htmlspecialchars($car['model']) ?></td>
        <td>$<?= $car['daily_rate'] ?></td>
        <td><?= $car['available'] ? 'Yes' : 'No' ?></td>
        <td>
          <a href="edit_car.php?id=<?= $car['id'] ?>">Edit</a> |
          <a href="delete_car.php?id=<?= $car['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
