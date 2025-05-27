<?php

require '../config.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $conn->query("UPDATE cars SET model='$model', year='$year', price_per_day='$price', image_url='$image' WHERE id=$id");
    header("Location: ../dashboard.php");
    exit();
}

$car = $conn->query("SELECT * FROM cars WHERE id=$id")->fetch_assoc();
?>

<html><head><title>Edit Tesla</title><link rel="stylesheet" href="../style.css"></head><body>
<form method="POST">
<h2>Edit Tesla</h2>
<input type="text" name="model" value="<?= $car['model'] ?>" required>
<input type="number" name="year" value="<?= $car['year'] ?>" required>
<input type="number" name="price" value="<?= $car['price_per_day'] ?>" required>
<input type="text" name="image" value="<?= $car['image_url'] ?>" required>
<button type="submit">Update</button>
</form></body></html>

?>