<?php
// Include the database connection file
include 'connection.php';

// Get user input from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to retrieve user data by email
$query = "SELECT * FROM users WHERE email = '$email'";

// Execute the query
$result = mysqli_query($connection, $query);

if ($result) {
  // Check if a user with the given email exists
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $storedPassword = $row['password']; // Assuming the password is stored as plain text

    // Verify the password against the stored password in the database
    if ($password === $storedPassword) { // No hashing (warning: insecure)
      // Password is correct
      // Set up a session for the authenticated user
     
      // Redirect the user to their profile page
      $username = $row['username']; // Assuming username is fetched from the database
      header("Location: profile.php?email=$email");

      exit(); // Stop further execution
    } else {
      // Password is incorrect
      // You can handle the incorrect password scenario here
      header("Location: login.php?error=incorrect_password");
      exit(); // Stop further execution
    }
  } else {
    // User with the given email does not exist
    // You can handle the non-existent user scenario here
    header("Location: login.php?error=user_not_found");
    exit(); // Stop further execution
  }
} else {
  // Database error handling
  // You can handle the database error scenario here
  header("Location: login.php?error=database_error");
  exit(); // Stop further execution
}

// Close the database connection
mysqli_close($connection);
?>
