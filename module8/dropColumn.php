<?php


$host = "localhost";
$db = "db";
$user = "root";
$pass = "";

try{

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);


$sql  = "ALTER TABLE user1 DROP COLUMN email VARCHAR (255)";

$pdo->exec($sql);

echo "Drop column succsesfully";

}catch (Exeption $e) {

    echo $e->getMessage();
}

?>