<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aquatic Panaroma</title>
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
include 'connection.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];

    // File upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    // Inserting data into database
    $insertQuery = "INSERT INTO products (name, description, image) VALUES ('$name', '$description', '$image')";
    $result = $connection->query($insertQuery);
    
    if ($result) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $connection->error;
    }
}
?>



<div class="container">
<section id="add-product">
    <h2 style="text-align: center;">Add Item</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="name"> Name:</label>
        <input type="text"  name="name" required>
        
        <label for="image"> Image:</label>
        <input type="file" name="image" accept="image/*" required>
        
        <label for="description">Description:</label>
        <textarea name="description" rows="8" required></textarea>
    
        
        <button type="submit" name="submit">Add</button>
    </form>
</section>
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
