<?php
include '../includes/db_config.php';

$sql = "SELECT * FROM car_images";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Images</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Car Images</h1>
    <a href="add_car_image.php">Add New Image</a>
    <table border="1">
        <tr>
            <th></th>
            <th>911 Turbo S 2024'</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['car_model']; ?></td>
            <td><img src="<?= $row['image_url']; ?>" width="100"></td>
            <td>
                <a href="edit_car_image.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="delete_car_image.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this image?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>