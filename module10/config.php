
<?php

$server = 'localhost';
$username = 'root';
$dbname = 'db';



try {
$conn = new PDO("mysql:host = $server;$dbname;",$username);
// $sql = "CREATE DATABASE project1"
// $conn->exec($sql)

echo "Connection Succseful";


}

catch(Exception $e){
    echo "error " .$e;
}
    
?>