<?php 

include_once ('config.php');

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $emri=$_POST['emri'];
    $username=$_POST['username'];
    $email=$_POST['email'];

    $sql="UPDATE users SET id=:id,movie_name=:movie_movie_desc,movie_desc=:movie_quality WHERE id=:id";


    $prep=$conn->prepare($sql);
    $prep->bindParam(':id',$id);
    $prep->bindParam(':movie_name',$movie_name);
    $prep->bindParam(':movie_desc',$movie_desc);
    $prep->bindParam(':movie_quality',$movie_quality);

    header('Location:dashboard.php');
}