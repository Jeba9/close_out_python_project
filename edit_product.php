<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Information</title>
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

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetching product details based on the provided ID
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id='$id'";
    $result = $connection->query($query);

    // Fetching values from the database
    if ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $description = $row['description'];
        $image = $row['image'];
    }
}


if(isset($_POST['submit'])){
    $id = $_POST['id'];
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
    
    // Updating data in the database
    $updateQuery = "UPDATE products SET name='$name', description='$description', image='$image' WHERE id='$id'";
    $result = $connection->query($updateQuery);
    
    if ($result) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $connection->error;
    }
}
?>

<div class="container">
    <h2>Edit Product</h2>
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <label for="image">New Image:</label>
        <input type="file"  name="image">
        <label for="description">Description:</label>
        <textarea name="description" rows="15"><?php echo $description; ?></textarea>
        <input type="submit" name="submit" value="Update">
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