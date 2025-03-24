<?php
include "connection.php";


$productId = $_GET['id'];

$query = "DELETE FROM products WHERE id = '$productId'";

//$var=$con->query($query);

$connection->query($query);

//redirect to main page using header() library function in php

header("Location: aquatic.php");

?>


