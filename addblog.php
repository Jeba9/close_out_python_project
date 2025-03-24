<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog</title>
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

<div class="container">
    <h2>Add Blog Post</h2>
    <form action="add_blog_post.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
        </div>
        <button type="submit"  name="add_post">Add Post</button>
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
