<?php 

$user = "root";
$pass = "";
$server = "localhost";
$dbname = "mms";

try {
    // Corrected the typo from "dbanme" to "dbname"
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Display error message if connection fails
    echo "Error: " . $e->getMessage();
}
?>