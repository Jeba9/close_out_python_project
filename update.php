<?php
// Start session
session_start();

include 'db_conn.php';

// Validate user input
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

        // Check if email is already registered
        $sql = "SELECT * FROM user_info WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows != 1) {
            echo "Invalid email or password";
        } else {
            // Insert user into database
            $sql = "UPDATE user_info SET firstName='$firstName', lastName='$lastName', phone='$phone', address='$address' WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                echo "Update successfully.";
                
                $row = $result->fetch_assoc();
                // Set session variables
                $_SESSION['user'] = $row;
                // Redirect to login page or any other page after successful updation
                header("Location: dashboard.html");
                exit(); // Stop script execution after redirection
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
}

$conn->close();
?>
