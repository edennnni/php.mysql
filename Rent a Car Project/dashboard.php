<?php
session_start();
include_once('config.php');

if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch all Tesla models
$stmtModels = $conn->prepare("SELECT * FROM models");
$stmtModels->execute();
$models = $stmtModels->fetchAll(PDO::FETCH_ASSOC);

// Fetch all Prices with model name
$stmtPrices = $conn->prepare("SELECT prices.*, models.model_name FROM prices JOIN models ON prices.model_id = models.id");
$stmtPrices->execute();
$prices = $stmtPrices->fetchAll(PDO::FETCH_ASSOC);

// Fetch all Bookings with model name
$stmtBookings = $conn->prepare("SELECT bookings.*, models.model_name FROM bookings JOIN models ON bookings.model_id = models.id");
$stmtBookings->execute();
$bookings = $stmtBookings->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once "config.php";

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

// Create prices table if not exists
$conn->exec("CREATE TABLE IF NOT EXISTS prices (
  id INT AUTO_INCREMENT PRIMARY KEY,
  model_id INT,
  daily_price DECIMAL(10,2),
  weekly_price DECIMAL(10,2),
  monthly_price DECIMAL(10,2),
  FOREIGN KEY (model_id) REFERENCES models(id) ON DELETE CASCADE
)");

// Handle Create Price
if (isset($_POST['add_price'])) {
  $model_id = $_POST['model_id'];
  $daily_price = $_POST['daily_price'];
  $weekly_price = $_POST['weekly_price'];
  $monthly_price = $_POST['monthly_price'];

  $stmt = $conn->prepare("INSERT INTO prices (model_id, daily_price, weekly_price, monthly_price) VALUES (?, ?, ?, ?)");
  $stmt->execute([$model_id, $daily_price, $weekly_price, $monthly_price]);
  header("Location: dashboard.php");
  exit();
}

// Handle Delete Price
if (isset($_GET['delete_price'])) {
  $id = $_GET['delete_price'];
  $stmt = $conn->prepare("DELETE FROM prices WHERE id = ?");
  $stmt->execute([$id]);
  header("Location: dashboard.php");
  exit();
}

// Handle Edit Price
if (isset($_POST['edit_price'])) {
  $id = $_POST['id'];
  $model_id = $_POST['model_id'];
  $daily_price = $_POST['daily_price'];
  $weekly_price = $_POST['weekly_price'];
  $monthly_price = $_POST['monthly_price'];

  $stmt = $conn->prepare("UPDATE prices SET model_id = ?, daily_price = ?, weekly_price = ?, monthly_price = ? WHERE id = ?");
  $stmt->execute([$model_id, $daily_price, $weekly_price, $monthly_price, $id]);
  header("Location: dashboard.php");
  exit();
}

$models = $conn->query("SELECT * FROM models")->fetchAll();
?>

<!-- Insert this block in your HTML body under the models section -->
<h2>Manage Prices</h2>
<form method="post">
  <label>Model:</label>
  <select name="model_id" required>
    <?php foreach ($models as $model): ?>
      <option value="<?= $model['id'] ?>"><?= $model['model_name'] ?></option>
    <?php endforeach; ?>
  </select>
  <label>Daily Price:</label>
  <input type="number" name="daily_price" step="0.01" required>
  <label>Weekly Price:</label>
  <input type="number" name="weekly_price" step="0.01" required>
  <label>Monthly Price:</label>
  <input type="number" name="monthly_price" step="0.01" required>
  <button type="submit" name="add_price">Add Price</button>
</form>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Model</th>
      <th>Daily</th>
      <th>Weekly</th>
      <th>Monthly</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($prices as $price): ?>
      <tr>
        <td><?= $price['id'] ?></td>
        <td><?= $price['model_name'] ?></td>
        <td><?= $price['daily_price'] ?></td>
        <td><?= $price['weekly_price'] ?></td>
        <td><?= $price['monthly_price'] ?></td>
        <td>
          <a href="?delete_price=<?= $price['id'] ?>" onclick="return confirm('Delete this price?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <style>
   <style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
}

.sidebar {
    width: 200px;
    background-color: #2ecc71;
    color: white;
    padding: 20px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
}

.sidebar h2 {
    font-size: 24px;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    margin-bottom: 15px;
    font-size: 18px;
}

.sidebar a:hover {
    text-decoration: underline;
}

.content {
    margin-left: 220px; /* leave space for sidebar */
    padding: 20px;
    flex-grow: 1;
}

/* Optional: make tables look better */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

table th {
    background-color: #27ae60;
    color: white;
}
</style>
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>TeslaRental</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main-content">
    <div class="header">Admin Dashboard</div>

    <div class="table-responsive">
      <h2>Models</h2>
      <table>
        <thead><tr><th>ID</th><th>Model Name</th><th>Year</th><th>Description</th></tr></thead>
        <tbody>
          <?php foreach ($models as $model): ?>
          <tr>
            <td><?= htmlspecialchars($model['id']) ?></td>
            <td><?= htmlspecialchars($model['model_name']) ?></td>
            <td><?= htmlspecialchars($model['year']) ?></td>
            <td><?= htmlspecialchars($model['description']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="table-responsive">
      <h2>Prices</h2>
      <table>
        <thead><tr><th>ID</th><th>Model</th><th>Daily</th><th>Weekly</th><th>Monthly</th></tr></thead>
        <tbody>
          <?php foreach ($prices as $price): ?>
          <tr>
            <td><?= htmlspecialchars($price['id']) ?></td>
            <td><?= htmlspecialchars($price['model_name']) ?></td>
            <td>$<?= htmlspecialchars($price['daily_price']) ?></td>
            <td>$<?= htmlspecialchars($price['weekly_price']) ?></td>
            <td>$<?= htmlspecialchars($price['monthly_price']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="table-responsive">
      <h2>Bookings</h2>
      <table>
        <thead><tr><th>ID</th><th>Customer</th><th>Model</th><th>Start</th><th>End</th><th>Status</th></tr></thead>
        <tbody>
          <?php foreach ($bookings as $booking): ?>
          <tr>
            <td><?= htmlspecialchars($booking['id']) ?></td>
            <td><?= htmlspecialchars($booking['customer_name']) ?></td>
            <td><?= htmlspecialchars($booking['model_name']) ?></td>
            <td><?= htmlspecialchars($booking['start_date']) ?></td>
            <td><?= htmlspecialchars($booking['end_date']) ?></td>
            <td><?= htmlspecialchars($booking['status']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</body>
</html>