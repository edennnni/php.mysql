<?php

include_once('config.php');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $movie_name = $_POST['movie_name'];  // Correct variable name
    $movie_desc = $_POST['movie_desc'];  // Correct variable name
    $movie_quality = $_POST['movie_quality'];  // Correct variable name

    // SQL query to update the movie's details
    $sql = "UPDATE movies SET movie_name = :movie_name, movie_desc = :movie_desc, movie_quality = :movie_quality WHERE id = :id";

    // Prepare and bind the parameters to prevent SQL injection
    $prepareSQL = $db->prepare($sql);
    $prepareSQL->bindParam(':movie_name', $movie_name);
    $prepareSQL->bindParam(':movie_desc', $movie_desc);
    $prepareSQL->bindParam(':movie_quality', $movie_quality);
    $prepareSQL->bindParam(':id', $id);

    // Execute the query
    $prepareSQL->execute();

    // Redirect to the dashboard after the update
    header('Location: list_movies.php');
    exit();  // Always call exit() after header redirection
}

?>