<?php

require '../config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM cars WHERE id=$id");
header("Location: ../dashboard.php");
exit();

?>