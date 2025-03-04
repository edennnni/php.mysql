<?php
$server = 'localhost';
$username = 'root';
$dbname = 'db';
$password = '';

try {
    $connection = new PDO ("mysql:host=$server;dbname=$dbname;", $username, $password);
} catch (exception $e) {
    echo "Something went wrong";
}
 
?>