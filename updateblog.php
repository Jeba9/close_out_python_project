<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Blog Post</title>
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

// Retrieve post details for updating
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];

    $query = "SELECT * FROM blog_posts WHERE post_id='$post_id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    // Fetch values from the database
    $title = $row['title'];
    $content = $row['content'];
} else {
    // Redirect if post_id parameter is not set
    header("location: blog.php");
    exit();
}

if(isset($_POST['update_post'])){
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update blog post data in the database
    $update = "UPDATE blog_posts SET title='$title', content='$content' WHERE post_id='$post_id'";
    
$result = $connection->query($update);


header("Location: blog.php");
echo "Updated";
}

$connection->close();
?>


<div class="container">
    <h2>Edit Blog Post</h2>
    <form action="" method="post">
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" rows="15"><?php echo $content; ?></textarea><br>
        </div>
        <button type="submit"  name="update_post" value="Update">Save</button>
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