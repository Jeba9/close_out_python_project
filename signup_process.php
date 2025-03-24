<?php
//database connection
include 'connection.php';

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert user data into the database
    $query = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";

    $result = $connection->query($query);

    if ($result) {
        // User registered successfully
        // Redirect the user to a success page or login page
        header("Location: login.php");
        exit();
    } else {
        // Registration failed
        // Handle the error, such as displaying an error message
        echo "Registration failed. Please try again.";
    }
}

// Close the database connection
$connection->close();
?>
