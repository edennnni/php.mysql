<?php

include_once('config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id =:id";

$prep = $conn->prepare($sql);

$prep->bindParam(':id' , $id);

$prep->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        form>input{
            margin-bottom: 10px;
            font-size: 20px;
            padding: 5px;
        }
        button{
            background: none;
            border: none;
            border: 1px solid black;
            padding: 10px 40px;
            font-size: 20px;
            cursor: pointer;
        }
        </style>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']?>"><br>
        <input type="hidden" name="name" value="<?php echo $data['name']?>"><br>
        <input type="hidden" name="surname" value="<?php echo $data['surname']?>"><br>
        <input type="hidden" name="email" value="<?php echo $data['email']?>"><br>
        <input type="hidden" name="age" value="<?php echo $data['age']?>"><br>

        <br><br>
        <button type="submit" name="update">Update</button>

         </form>
         <a href="dashboard.php">dashboard</a>
</body>
</html>