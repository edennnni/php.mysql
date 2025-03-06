<?php
require('config.php');
if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"]
    $sql = "insert INTO users (name,username,email)
    VALUES(:NAME, :USERNAME, :EMAIL)"
    
    $sqlQuery = $conn -> prepare ($sql);
    $sqlQuery -> $bindParam(':name', '$name');
    $sqlQuery = $conn -> prepare (':$username', '$username');
    $sqlQuery = $conn -> prepare (':email', '$email');
    $sqlQuery->execute();
}

?>