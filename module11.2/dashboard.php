<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    table,td,th {
        border: 1px solid black;
        border-collapse: collapse;
    }
    td,th {
        padding: 10px 20px;
    }
</style>
</html>
<body>
    <?php
    include_once('config.php');
    $sql = 'SELECT * FROM users';
    $getUsers = $conn->prepare($sql);
    $getUsers ->execute();
    $users = $getUsers->fetchAll();
    
    ?>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Age</th>
</thead>
<tbody>
    <?php
    foreach($users as $user) {
        ?>
        <tr>
            <td> <?= $user['id']?></td>
            <td> <?= $user['name']?></td>
            <td> <?= $user['surname']?></td>
            <td> <?= $user['email']?></td>
            <td> <?= $user['age']?></td>
            <td> <?="<a href='edit.php?id=$user[id]'>Edit</a>"?>
            | <?="<a href='delete.php?id=$user[id]'> Delete </a> :
             <a href='edit.php?id=$User[id]'>Update </a>"?></td>
    </tr>
    <?php  
    }  
    ?>      
</body>
</table>
<a href="index.php">Add User</a>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
