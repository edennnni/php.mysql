<?php
$host = "localhost";
$dbname = "rent_tesla"; 
$user = "root";
$pass = "";


session_name('rent_tesla');


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
<?php
$user="root";
$pass="";
$server="localhost";
$dbname="motovibe";

try {
	$conn =new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
} catch (PDOException $e) {
	echo "error: " . $e->getMessage();
}

?>