<?php
include 'connection.php';

if(isset($_POST['add_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert blog post data into the database
    $query = "INSERT INTO blog_posts (title, content) VALUES ('$title', '$content')";

    if ($connection->query($query) === TRUE) {
        $post_id = $connection->insert_id;
        header("Location: blog.php");
        exit();
    } else {
        // Error handling
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

// Close connection
$connection->close();
?>
