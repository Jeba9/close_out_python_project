<?php
  // Start the session (if not already started)
  session_start();

  // Unset all session variables
  session_unset();

  // Destroy the session
  session_destroy();

  // Redirect user to the login page after logout
  header("Location: login.php");
  exit();
?>
