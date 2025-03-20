<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 11</title>
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
            | <?="<a href='delete.php?id=$user[id]'> Delete </a>"?></td>
    </tr>
    <?php  
    }  
    ?>      
</body>
</table>
<a href="index.php">Add User</a>
</body>
</html>