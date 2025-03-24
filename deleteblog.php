<?php
include "connection.php";


$post_id = $_GET['post_id'];

$query = "DELETE FROM blog_posts WHERE post_id='$post_id'";

//$var=$con->query($query);

$connection->query($query);

//redirect to main page using header() library function in php

header("location: blog.php");

?>


