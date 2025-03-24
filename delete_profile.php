<?php
include "connection.php";


$email = $_GET['email'];

$query = "DELETE FROM users WHERE email='$email'";

//$var=$con->query($query);

$connection->query($query);

//redirect to main page using header() library function in php

header("Location: login.php");

?>
