<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Profile</title>
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

if(isset($_POST['update_user'])){
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update user data in the database
    $update_query = "UPDATE users SET fullname='$fullname', email='$email', username='$username', password='$password' WHERE email='$email'";
    
    $result = $connection->query($update_query);

    if ($result) {
        // User updated successfully
        // Redirect the user to a success page or profile page
        header("Location: profile.php?email=$email");
        exit();
    } else {
        // Update failed
        // Handle the error, such as displaying an error message
        echo "Update failed. Please try again.";
    }
}

// Retrieve user details for updating
if(isset($_GET['email'])){
    $email = $_GET['email'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    // Fetch values from the database
    $fullname = $row['fullname'];
    $email = $row['email'];
    $username = $row['username'];
    $password = $row['password'];
} else {
    // Redirect if user_id parameter is not set
    header("location: profile.php");
    exit();
}

$connection->close();
?>

<div class="container">
    <h2>Edit User Profile</h2>
    <form action="" method="post">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" value="<?php echo $fullname; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
        </div>
        <button type="submit"  name="update_user" value="Update">Save</button>
    </form>
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
