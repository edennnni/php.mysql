<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 10</title>
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
    $get
    ?>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
</thead>
<tbody>
    <?php
    foreach($users as $user) {
        ?>
        <tr>
            <td><?= $user['id']?></td>
            <td><?= $user['name']?></td>
            <td><?= $user['surname']?></td>
            <td><?= $user['email']?></td>
    </tr>
    <?php  
    }  
    ?>      
</body>
</table>
<a href="index.php">Add User</a>
</body>
</html>