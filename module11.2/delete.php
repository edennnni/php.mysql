<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "db"; 

$id = 1;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 


    $sql = "DELETE FROM"
?>