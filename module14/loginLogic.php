<?php
include_once('config.php');

if(isset($_POST['submit'])){
    $password=['password'];
    $username=$_POST['username'];

    if(empty($username) || empty($password)){
    echo "fill all the fields";
    header("refresh:2,url=login.php")};
}else{
  $sql="SELECT * FORM users WHERE username=:username";
  $insertSql=$conn->prepare($sql);
  $bindSql->bindParam(':username',$username);
  $insertSql->execute();} 
  
if($insertSql->rowcount() > 0 ) {
  $data = $insertSql->fetch();
  if(password_verify($password, $data['password'])) {
    $_SESSION ['username']=$datap['username'];
    header("Location: dashboard.php");
  }
}else{
echo "password incorrect"
header ("refresh:2; url=login.php");
}else{
  echo "username not found"
}

  
  
  
  ?>

