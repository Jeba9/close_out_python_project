<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Profile</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section id="header">
  <img src="logo.gif" width="120" height="120"/>
  <p>Think Fish Aquatics</p>
  <div>
    <ul id="navbar">
      <li><a href="index.php">Home</a></li>
      <li><a href="aquatic.php">Aquatic Panaroma</a></li>
      <li><a href="blog.php">Blog</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
</section>


  <?php
// Database connection
include 'connection.php';

// Fetch user data based on email address from URL parameter
if(isset($_GET['email'])) {
    $email = $_GET['email'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fullname = $row['fullname'];
        $email = $row['email'];
        $username = $row['username'];
    } else {
        echo "User not found.";
    }
} else {
    echo "Email parameter not provided.";
}
?>

<div class="pro_container">
     <h2 style="color: #2fbd76; padding: 25px; font-size: 20px; text-align: center;">Welcome to Your Profile Page</h2>
     <h1>Profile</h1>
     <p>Name:<?php echo $fullname; ?></p>
     <p>Email: <?php echo $email; ?></p>
     <p>Username: <?php echo $username; ?></p>
    
        
     <button button class="pro_buttons"><a href="edit_profile.php?email=<?php echo $email; ?>" >Edit</a></buttom>
     <button button class="pro_buttons"><a href="delete_profile.php?email=<?php echo $email; ?>" >Delete</a></button>


</div>

<section id="contact">
  <div class="col">
    <img class="logo" src="logo.png" width="300" height="300">
    <h4>Contact</h4>
    <p>Address: Dhaka, Bangladesh</p>
    <p>Phone: +8801754567367</p>
    <p>Email: <a href="mailto:nirob16-615@diu.edu.bd">nirob16-615@diu.edu.bd</a></p>

    <div class="follow">
      <h4>Follow Us!</h4>
      <div class="socials">
        <img src="fb.png" width="70" height="70">
        <img src="twi.png" width="70" height="50">
        <img src="insta.jpeg" width="70" height="70">
      </div>
    </div>
  </div>
</section>

</body>
</html>
