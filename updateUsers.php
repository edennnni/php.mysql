<?php

include_once('config.php');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $emri = $_POST['emri'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // SQL query to update the user's details
    $sql = "UPDATE users SET emri = :emri, username = :username, email = :email WHERE id = :id";

    // Use the $db variable instead of $conn
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->bindParam(':emri', $emri);
    $prepareSQL->bindParam(':username', $username);
    $prepareSQL->bindParam(':email', $email);
    $prepareSQL->bindParam(':id', $id);
    $prepareSQL->execute();

    // Redirect to the dashboard after the update
    header('Location: dashboard.php');
    exit();  // Always call exit() after header redirection
}

?>