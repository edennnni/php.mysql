<?php

include 'config.php';
session_start();

$id = $_POST['id'];
$name = $mysqli->real_escape_string($_POST['name']);
$email = $mysqli->real_escape_string($_POST['email']);

$mysqli->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
header("Location: users.php");

?>