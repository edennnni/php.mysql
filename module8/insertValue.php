<?php


$host = "localhost";
$db = "db";
$user = "root";
$pass = "";

try{

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

$username="John";
$password = password_hash("mypassword",PASSWORD_DEFAULT);


$sql  = "INSERT INTO user1 (username,password) VALUES ('$username')";

$pdo->exec($sql);

echo "New record inserted succsesfully"
}catch (Exeption $e) {

    echo .$e->getMessage();
}

?>