<?php 

session_start();

include_once ('config.php');

    $username=$_POST['username'];

    $password=$_POST['password'];

    if(empty($username) || empty($password)){
        echo "you have not filled in all the fields";
    }else{
        $sql="SELECT * FROM users WHERE username=:username";

        $selectUser=$conn->prepare($sql);

        $selectUser->bindParam(':username', $username);

        $selectUser->execute();

        $data=$selectUser->fetch();

        if($data==false){
            echo "the user does not exist";
        }else{
            if(password_verify($password,$data['password'])){
                $_SESSION['id']=$data['id'];
                $_SESSION['username']=$data['username'];
                $_SESSION['email']=$data['email'];
                $_SESSION['emri']=$data['emri'];
                $_SESSION['is_admin']=$data['is_admin'];

                header('Location:dashboard.php');
            }else{
                echo "password is not valid";
            }

        }
    }
}