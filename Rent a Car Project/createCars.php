<?php
require '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $conn->query("INSERT INTO cars (model, year, price_per_day, image_url) VALUES ('$model', '$year', '$price', '$image')");
    header("Location: ../dashboard.php");
    exit();
}
?>
<html><head><link rel="stylesheet" href="style.css">
<title>Add Tesla</title><link rel="stylesheet" href="../style.css"></head><body>
<form method="POST">
<h2>Add New Tesla</h2>
<input type="text" name="model" placeholder="Model" required>
<input type="number" name="year" placeholder="Year" required>
<input type="number" name="price" placeholder="Price per day" required>
<input type="text" name="image" placeholder="Image URL (images/model3.jpg)" required>
<button type="submit">Add Tesla</button>
</form></body></html>