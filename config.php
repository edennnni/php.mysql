<?php 

$user="root";
$pass=:"";
$server="localhost";
$dbname="mms";

try {
    $db = new PDO("mysql:host=$server;dbanme=$dbname",$user,$pass);
}catch(PDOException $e){
    echo "error" . $e->getMessage();
}