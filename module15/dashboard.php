<?php 

include_once('config.php');
$sql="SELECT * FROM products";
$selectProducts=$conn->prepare($sql);
$selectProducts->execute();

$products_data=$selectProducts->fetchAll();

?>

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
</head>

    <table>
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
    </thead>
    <tbody>
        <?php
        foreach($products_data as $product)
        ?>
        <tr>
            <td> <?= $product['id'] ?>
            <td> <?= $product['title'] ?>
            <td> <?= $product['description'] ?>
            <td> <?= $product['quantity'] ?>
            <td> <?= $product['price'] ?>
            <td> <?= "<a href='updateProduct.php?id=$product['id']'>Update</a>"?>Update</td>
            <td> <?= "<a href='updateProduct.php?id=$product['id']'>Update</a>"?>Delete</td>
        </tr>
<tbody>
</table>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md nowrap p-0 shadow">
<a href="#" class="navbar-brand col-sm-3 col-md-2 mr-0"> Welcome, <i><?php echo $_SESSION ['username'];?></i></a> 
<ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
        <a href="logout.php" class="nav-link">
</html>
