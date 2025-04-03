<?php

include_once('config.php');

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $tempPass=$_POST['password'];
    $passworde=$_POST=password_hash($tempPass, PASSWORD_DEFAULT);

    if((empty($name)) || empty ($surname) || empty($email) || empty($password)){
        echo "You need to fill all the fields";
    }else{
        $sql="SELECT username FROm users WHERE username=:username";

        $tempSQL=$conn->prepare($sql);
        $tempSQL=$conn->prepare(':username', $username);
        $tempSQL=$conn->execute();
        
        if ($tempSQL->rowCount()>0){
echo "Username Exists!";
header("refresh:2;url=signup.php");
        }else{
            $sql="INSERT INTO users (name,surname,username,email,password) VALUES (:name,:surname,:username,:email,:password)";
            $insertSql=$conn->prepare($sql);

    $sqlQuery->bindParam(':name', $name);
    $sqlQuery->bindParam(':surname', $surname);
    $sqlQuery->bindParam(':email', $email);
    $sqlQuery->bindParam(':age', $age);

    $insertSql->execute();
    
    }    

}
}

?>

