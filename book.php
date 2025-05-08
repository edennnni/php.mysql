<?php

session_start();

include_once('config.php');

$user_id=$_SESSION['id'];
$movie_id=$_SESSION['id'];

$nr_tickets=$_POST['nr_tickets'];
$data=$_POST['date'];
$time=$_POST['time'];

$sql="INSERT INTO bookings (user_id,movie_id,nr_tickets,date,time) VALUES (:user_id,:movie_id,:nr_tickets,:date,:time)";


$insertBookinga=$conn->prepare($sql);
$insertBookinga=$conn->bindParam(":user_id",$user_id);
$insertBookinga=$conn->bindParam("movie_id",$movie_id);
$insertBookinga=$conn->bindParam(":nr_tickets",$nr_tickets);
$insertBookinga=$conn->bindParam(":date",$date);
$insertBookinga=$conn->bindParam(":time",$time);


$insertBookinga=$conn->execute();

header('Location:home.php');


?>