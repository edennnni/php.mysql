<?php

include 'config.php';
session_start();

$id = $_GET['id'];
$mysqli->query("DELETE FROM users WHERE id=$id");
header("Location: users.php");


?>